<?php


// creating portfolio 

add_action('init', 'slider_register');
 
function slider_register() {
 
	$labels = array(
		'name' => _x('Slider', 'post type general name'),
		'singular_name' => _x('Slider Item', 'post type singular name'),
		'add_new' => _x('Add New', 'slide item'),
		'add_new_item' => __('Add New Slide Item', "pego_tr"),
		'edit_item' => __('Edit Slide Item', "pego_tr"),
		'new_item' => __('New Slide Item', "pego_tr"),
		'view_item' => __('View Slide Item', "pego_tr"),
		'search_items' => __('Search Slide', "pego_tr"),
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
 
	register_post_type( 'slider' , $args );
}

//slider editing

	add_action( 'admin_menu', 'hybrid_create_meta_box_slider' );
	add_action( 'save_post', 'hybrid_save_meta_data_slider' );

function hybrid_create_meta_box_slider() {
	global $theme_name;
	add_meta_box( 'post-meta-boxes_slider', __('Slider options', "pego_tr"), 'post_meta_boxes_slider', 'slider', 'normal', 'high' );

}


function hybrid_post_meta_boxes_slider() {

	/* Array of the meta box options. */
	$meta_boxes = array(
			
	);

	return apply_filters( 'hybrid_post_meta_boxes_slider', $meta_boxes );
}



function post_meta_boxes_slider() {
	global $post;
	$meta_boxes = hybrid_post_meta_boxes_slider(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'	], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input_slider( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea_slider( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select_slider( $meta, $value );

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
function get_meta_text_input_slider( $args = array(), $value = false ) {

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
function get_meta_select_slider( $args = array(), $value = false ) {

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
function get_meta_textarea_slider( $args = array(), $value = false ) {

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





/**
 * Loops through each meta box's set of variables.
 * Saves them to the database as custom fields.
 *
 * @since 0.3
 * @param int $post_id
 */
function hybrid_save_meta_data_slider( $post_id ) {
	global $post;

		$meta_boxes = array_merge( hybrid_post_meta_boxes_slider() );

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
