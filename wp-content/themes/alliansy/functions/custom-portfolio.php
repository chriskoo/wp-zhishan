<?php


// creating portfolio 



add_action('init', 'portfolio_register');
 
function portfolio_register() {
 
	$labels = array(
		'name' => _x('Portfolio', 'post type general name'),
		'singular_name' => _x('Portfolio Item', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New Portfolio Item', "pego_tr"),
		'edit_item' => __('Edit Portfolio Item', "pego_tr"),
		'new_item' => __('New Portfolio Item', "pego_tr"),
		'view_item' => __('View Portfolio Item', "pego_tr"),
		'search_items' => __('Search Portfolio', "pego_tr"),
		'not_found' =>  __('Nothing found', "pego_tr"),
		'not_found_in_trash' => __('Nothing found in Trash', "pego_tr"),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail', 'custom-fields')
	  ); 
 
	register_post_type( 'portfolio' , $args );
}

//portfolio editing

	add_action( 'admin_menu', 'hybrid_create_meta_box_portfolio' );
	add_action( 'save_post', 'hybrid_save_meta_data_portfolio' );

function hybrid_create_meta_box_portfolio() {
	global $theme_name;
	add_meta_box( 'post-meta-boxes_portfolio', __('Portfolio options', "pego_tr"), 'post_meta_boxes_portfolio', 'portfolio', 'normal', 'high' );
	add_meta_box( 'post-meta-boxes_portfolio_video', __('Portfolio video options', "pego_tr"), 'post_meta_boxes_portfolio_video', 'portfolio', 'normal', 'high' );
}

register_taxonomy("portfolio_categories", array("portfolio"), array("hierarchical" => true, "label" => "Portfolio categories", "singular_label" => "Portfolio categorie", "rewrite" => true));

function hybrid_post_meta_boxes_portfolio() {

	/* Array of the meta box options. */
	$meta_boxes = array(
			'portfolio_type_selected' => array( 
							'name' => 'portfolio_type_selected', 
							'title' => __(' Type', 'pego_tr'), 
							'description' => __('Select portfolio type.', 'pego_tr'), 
							'type' => "select", 
							'std' => 'Image',
							'options' => array('Image', 'Slideshow', 'Video')),
			'portfolio_desc1' => array( 
							'name' => 'portfolio_desc1',
							'title' => __('Description1', 'pego_tr'), 
							'description' => __('Enter the first description.', 'pego_tr'), 
							'type' => 'textarea' ),	
			'portfolio_desc2' => array( 
							'name' => 'portfolio_desc2',
							'title' => __('Description2', 'pego_tr'), 
							'description' => __('Enter the second description.', 'pego_tr'), 
							'type' => 'textarea' ),	
			'portfolio_desc3' => array( 
							'name' => 'portfolio_desc3',
							'title' => __('Description3', 'pego_tr'), 
							'description' => __('Enter the third description.', 'pego_tr'), 
							'type' => 'textarea' ),		
			'portfolio_desc4' => array( 
							'name' => 'portfolio_desc4',
							'title' => __('Description4', 'pego_tr'), 
							'description' => __('Enter the third description.', 'pego_tr'), 
							'type' => 'textarea' ),	
			'portfolio_desc5' => array( 
							'name' => 'portfolio_desc5',
							'title' => __('Description5', 'pego_tr'), 
							'description' => __('Enter the third description.', 'pego_tr'), 
							'type' => 'textarea' )	
	);

	return apply_filters( 'hybrid_post_meta_boxes_portfolio', $meta_boxes );
}

function hybrid_post_meta_boxes_portfolio_video() {

	/* Array of the meta box options. */
	$meta_boxes = array(
			'portfolio_video_url' => array( 
							'name' => 'portfolio_video_url',
							'title' => __('Video URL(iframe):', 'pego_tr'), 
							'description' => __('Enter the embedded code of the portfolio.', 'pego_tr'),
							'type' => 'textarea' ),
			'portfolio_video_url_gal' => array( 
							'name' => 'portfolio_video_url_gal',
							'title' => __('Video URL(embed link):', 'pego_tr'), 
							'description' => __('Enter just the embedded link of the video for the gallery.', 'pego_tr'),
							'type' => 'text' )		
	);

	return apply_filters( 'hybrid_post_meta_boxes_portfolio_video', $meta_boxes);
}


function post_meta_boxes_portfolio() {
	global $post;
	$meta_boxes = hybrid_post_meta_boxes_portfolio(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select_portfolio( $meta, $value );

	endforeach; ?>
	</table>
<?php
}

function post_meta_boxes_portfolio_video() {
	global $post;
	$meta_boxes = hybrid_post_meta_boxes_portfolio_video(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select_portfolio( $meta, $value );

	endforeach; ?>
	</table>
<?php
}


/**
 * Outputs a text input box with arguments from the
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_text_input_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span  style="color:#777777;"><?php echo $description; ?></span></label>
		</th>
		<td>
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_html( $value );  ?>" size="30" tabindex="30" style="width: 97%;" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

/**
 * Outputs a select box with arguments from the
 * parameters.  Used for__(' Type:', 'pego_tr'),  both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_select_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span style="color:#777777;" ><?php echo $description; ?></span></label>
		</th>
		<td>
			<select style="width:100px;" name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $options as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

/**
 * Outputs a textarea with arguments from the
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_textarea_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span style="color:#777777;"><?php echo $description; ?></span></label>
		</th>
		<td>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo esc_html( $value );  ?></textarea>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_color_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span style="color:#777777;" ><?php echo $description; ?></span></label>
		</th>
		<td>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/functions/css/colorpicker.css" type="text/css" media="screen" />
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/jquery.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/colorpicker.js"></script>	
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/eye.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/layout.js?ver=1.0.2"></script>
		   #<input type="text" maxlength="6" size="6" name="<?php echo $name; ?>"  id="colorpickerField1" value="<?php echo esc_html( $value );  ?>"  />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}



/**
 * Loops through each meta box's set of variables.
 * Saves them to the database as custom fields.
 *
 * @since 0.3
 * @param int $post_id
 */
function hybrid_save_meta_data_portfolio( $post_id ) {
	global $post;

		$meta_boxes = array_merge( hybrid_post_meta_boxes_portfolio() );

	foreach ( $meta_boxes as $meta_box ) :

		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
			return $post_id;

		if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

		elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		$data = stripslashes( $_POST[$meta_box['name']] );

		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );

		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );

		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );

	endforeach;
	
	$meta_boxes = array_merge( hybrid_post_meta_boxes_portfolio_video() );

	foreach ( $meta_boxes as $meta_box ) :

		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
			return $post_id;

		if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

		elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		$data = stripslashes( $_POST[$meta_box['name']] );

		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );

		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );

		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );

	endforeach;
	
	
}



?>
