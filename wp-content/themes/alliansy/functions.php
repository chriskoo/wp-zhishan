<?php
	/* to remove notifications for upgrade wordpress */
	add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

	$pego_prefix = "pego_";
	$themedir_one = get_template_directory_uri();
	
	function my_javascripts() {
		wp_enqueue_script('jquery-1.7.1', get_template_directory_uri() . '/js/jquery-1.7.1.js','','',true);	
		//wp_enqueue_script('jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js','','',true);	
		wp_enqueue_script('jquery-min', "http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"); 
		wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js','','',true);
		wp_enqueue_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.pack.js','','',true);	
		wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.8.11.custom.min.js','','',true);
		wp_enqueue_script('jquery-transform-0-9-3-min', get_template_directory_uri() . '/js/jquery.transform-0.9.3.min.js','','',true);		
		wp_enqueue_script('jquery-animate-colors', get_template_directory_uri() . '/js/jquery.animate-colors-min.js','','',true);
		wp_enqueue_script('jquery-backgroundpos-min', get_template_directory_uri() . '/js/jquery.backgroundpos.min.js','','',true);
		wp_enqueue_script('mathUtils', get_template_directory_uri() . '/js/mathUtils.js','','',true);
		wp_enqueue_script('hoverSprite', get_template_directory_uri() . '/js/hoverSprite.js','','',true);
		wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js','','',true);
		wp_enqueue_script('switcher', get_template_directory_uri() . '/js/switcher.js','','',true);	
		wp_enqueue_script('mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js','','',true);	
		wp_enqueue_script('jquery-tinyscrollbar-min', get_template_directory_uri() . '/js/jquery.tinyscrollbar.min.js','','',true);
		wp_enqueue_script('sprites', get_template_directory_uri() . '/js/sprites.js','','',true);
		wp_enqueue_script('forms', get_template_directory_uri() . '/js/forms.js','','',true);		
		
		wp_enqueue_script('gallery', get_template_directory_uri() . '/js/gallery.js','','',true);	
		wp_enqueue_script('slider', get_template_directory_uri() . '/js/slider.js','','',true);
		wp_enqueue_script('slides-min-jquery', get_template_directory_uri() . '/js/slides.min.jquery.js','','',true);
		wp_enqueue_script('jquery-quicksand', get_template_directory_uri() . '/js/jquery.quicksand.js','','',true);	
		wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js','','',true);	
		wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js','','',true);				
	}
	add_action('wp_enqueue_scripts', 'my_javascripts');
	
	
	
	include("functions/pego-settings.php");
	include("functions/pego-settings-footer.php");
	include("functions/pego-settings-panel1.php");
	include("functions/pego-settings-portfolio-items.php");
	include("functions/pego-settings-blog-template.php");
	include("functions/pego-settings-contact.php");
	include("functions/pego-settings-display.php");
	
	
	
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size('SliderBig', 700, 566, true);
		add_image_size('SliderSmall', 54, 44, true);
		add_image_size('PortfImg', 190, 134, true);
		add_image_size('BlogImg', 305, 196, true);
		add_image_size('PortfImgBig', 640, 9999);
	}
	
	/* specify content width */
	if ( ! isset( $content_width ) ) $content_width = 960;
	
	
	function getPostViews($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
		}
		return $count;
	}
	function setPostViews($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	
	function remove_wpautop($content) { 
			$content = do_shortcode( shortcode_unautop($content) ); 
			$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		return $content;
	}
	
	//changing the login logo ********************************************************************************************************
	
	function my_custom_login_logo() {
		$read_logo='';
		$pego_prefix = "pego_";
	   $read_logo = get_option($pego_prefix.'headerLogo');

		if($read_logo != '') {
						echo '<style type="text/css">
				h1 a { background-image:url('.$read_logo.') !important; margin-top: -80px !important; margin-bottom: 30px !important; padding-bottom: 100px !important;   }
			</style>';	
		}	
		else {
					echo '<style type="text/css">
			h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo2.png) !important; margin-top: -80px !important; margin-bottom: 30px !important; padding-bottom: 100px !important;   }
		</style>';
		}
    }
    add_action('login_head', 'my_custom_login_logo');
	
	function remove_empty_tags($html)
	{
		$pattern = "/<[^\/>]*>([\s]?)*<\/[^>]*>/";
		return preg_replace($pattern, '', $html);
	}

	function remove_images($posttext, $echo = true)
	{
		$posttext1 = $posttext;
		 
		// We will search for the src="" in the post content
		$regular_expression = '~src="[^"]*"~';
		$regular_expression1 = '~<img [^\>]*\ />~';
		 
		// WE will grab all the images from the post in an array $allpics using preg_match_all
		preg_match_all( $regular_expression, $posttext, $allpics );
		 
		// This time we replace/remove the images from the content
		
		$only_post_text = preg_replace( $regular_expression1, '' , $posttext1);
		$only_post_text = remove_empty_tags($only_post_text);
		
		if ($echo) echo $only_post_text; else return $only_post_text;
	}


	function get_images($posttext)
	{
		// We will search for the src="" in the post content
		$regular_expression = '~src="[^"]*"~';
		$regular_expression1 = '~<img [^\>]*\ />~';
		 
		// WE will grab all the images from the post in an array $allpics using preg_match_all
		preg_match_all( $regular_expression, $posttext, $allpics );
		 
		// Count the number of images found.
		$NumberOfPics = count($allpics[0]);
		
		$images_src = $allpics[0];
		
		foreach($images_src as $image_src)
		{
			$image = ltrim($image_src, 'src="');
			$image = rtrim($image, '"');
			$images[] = $image;
		} 
		
		if (isset($images)) return $images; else return array();
	}

	function no_wpautop($content) 
	{ 
			$content = do_shortcode( shortcode_unautop($content) ); 
			$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
			return $content;
	}

	function page_have_children($id){
		$children = get_pages('child_of='.$id);
		if(count($children) == 0){
			return false;
		}
		else{
			return true;
		}
	}
	
	
	
	
	
	/* start for comments */
if ( ! function_exists( 'alliansy_comment' ) ) :
function alliansy_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php 'Pingback:' ?> <?php comment_author_link(); ?><?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 39;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf(  '%1$s <span class="date-and-time">%2$s</span>',
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'pego_tr' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'pego_tr' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'pego_tr' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'pego_tr' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for alliansy_comment()
	
/* end for comments */
	
	include("functions/custom-slider.php");
	include("functions/custom-page.php");
	include("functions/custom-portfolio.php");
	include("functions/custom-post.php");
	include("functions/shortcodes.php");
?>