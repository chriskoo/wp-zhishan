<?php get_header(); ?> 
		 	<article id="content">
    			<ul>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<?php setPostViews(get_the_ID()); ?><!--  counting views of post -->	
				 <li id="pageSinglePost">
					   <div class="box">
                            <div class="containerContent">								
								<h1 class="head1"><?php echo get_option($pego_prefix.'singleBlogTitle'); ?><strong><?php echo get_option($pego_prefix.'singleBlogTitleText'); ?></strong></h1>
                                <?php
												 
														$post_type = get_post_meta($post->ID, 'post_type_selected' , true);
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
																							
								  ?>
								<h2><span></span><?php the_title(); ?></h2><span class="btn-back"><img src="<?php bloginfo('template_url'); ?>/images/comment-icon.png" style="position: relative; top: 11px; margin-right: 7px;" alt="" /><?php comments_number( '0', '1', '%' ); ?></span>
								<div class="singleBlogItem">
								<?php
																if($post_type == 'Image') {
																?>
																		<img class="bigBlogImg" src="<?php echo $image[0]; ?>" />	
																<?php
																}
																?>
																<?php
																if($post_type == 'Slideshow') { //under construction
																?>
																		
																	<?php
																			$attachments = get_children(array('post_parent' => $post->ID,
																				'post_status' => 'inherit',
																				'post_type' => 'attachment',
																				'post_mime_type' => 'image',
																				'order' => 'ASC',
																				'orderby' => 'menu_order ID'));
																
																		echo '<div id="slides">';
																			echo '<div class="slides_container">';
																			foreach($attachments as $att_id => $attachment) {
																				$full_img_url = wp_get_attachment_url($attachment->ID);
																				echo '<div class="slide">';
																				?>
																				<a href="#"><img src="<?php echo $full_img_url; ?>" title="" alt=""></a>
																				<?php
																				echo '</div>';
																		} //end foreach
																		echo '</div>';
																		echo '</div>';
																		echo '<div class="clear"></div>';
																	?>
																	
																<?php
																}
																?>
																<?php
																if($post_type == 'Video') {
															
																	$video_url= get_post_meta($post->ID, 'post_video_url' , true);   
																	if(!empty($video_url)) 
																	{
																		echo '<div class="postVideo"><div class="video-wrapper"><div class="video-container">'.$video_url.'</div></div></div>';
																	}	
															
																}
								?>
								</div>
								<div class="under-date">
									<div class="post-details-date"><h2 class="date-time"><span></span><?php the_time('F j, Y') ?></h2></div>
									<div class="post-details-other">
										<ul class="post-details">
											<li><?php echo getPostViews(get_the_ID()); ?> views</li>
											<li>/</li>
											<li><?php comments_number( '0', '1', '%' ); ?> comments</li>
											<li>/</li>
											<li>in <?php $cats= get_the_category_list(', '); echo strip_tags($cats); ?></li>
											<li>/</li>
											<li>by <?php the_author(); ?></li>
											<li><span></span></li>
										</ul>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>
								<div class="post-overview">
									<h3><span></span>Overview</h3>
									<?php the_content(); ?>
								</div>
								
								<!-- start comments -->
								<div>
									<?php comments_template(); ?>
								</div>					
								
								
                            </div>
							<div style="clear:both;"></div>
					</li>
					<?php endwhile; endif; ?>
				</ul>
			</article>
			<!--content end-->
            </div>
		</div>
         
</div>
<?php get_footer(); ?> 