<?php
//page editing
	add_action( 'admin_menu', 'hybrid_create_meta_box_page' );
   add_action( 'save_post', 'hybrid_save_meta_data_page' );



function hybrid_create_meta_box_page() {
	global $theme_name;

	add_meta_box( 'page-meta-boxes', __('Page options', "pego_tr"), 'page_meta_boxes', 'page', 'normal', 'high' );
}



function hybrid_page_meta_boxes() {

	/* Array of the meta box options. */
	$meta_boxes = array(
			'page_template' => array( 
							'name' => 'page_template', 
							'title' => __(' Page Template', 'pego_tr'), 
							'description' => __('Select page template.', 'pego_tr'), 
							'type' => "select", 
							'std' => '',
							'options' => array('','Portfolio', 'Blog', 'Contact', 'Home')),
			'text_page_title' => array( 
							'name' => 'text_page_title', 
							'title' => __(' Page title text', 'pego_tr'), 
							'description' => __('Enter text that will be displayed next to the page title(optional)', 'pego_tr'), 
							'type' => 'text' ),
			'external_link' => array( 
							'name' => 'external_link', 
							'title' => __(' Insert link of the external page ', 'pego_tr'), 
							'description' => __('Enter the link only if you want to inclide the external page.', 'pego_tr'), 
							'type' => 'text' ),
			'include_category' => array( 
							'name' => 'include_category', 
							'title' => __(' Include category: ', 'pego_tr'), 
							'description' => __('Used only for portfolio/template! Insert portf category SLUG. If empty all will be choosen.', 'pego_tr'), 
							'type' => 'text' ),
			'show_filter' => array( 
							'name' => 'show_filter', 
							'title' => __(' Show filter?', 'pego_tr'), 
							'description' => __('Used only for portfolio template!', 'pego_tr'), 
							'type' => "select", 
							'std' => 'Yes',
							'options' => array('Yes','No'))
	);

	return apply_filters( 'hybrid_page_meta_boxes', $meta_boxes );
}












/**
 * Displays meta boxes on the Write Page panel.  Loops
 * through each meta box in the $meta_boxes variable.
 * Gets array from hybrid_page_meta_boxes()
 *
 * @since 0.3
 */
function page_meta_boxes() {
	global $post;
	$meta_boxes = hybrid_page_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );

		if ( $meta['type'] == 'text' )
			get_meta_text_input_page( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea_page( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select_page( $meta, $value );

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
function get_meta_text_input_page( $args = array(), $value = false ) {

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
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_select_page( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span style="color:#777777;" ><?php echo $description; ?></span></label>
		</th>
		<td>
			<select style="width:90px;" name="<?php echo $name; ?>" id="<?php echo $name; ?>">
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


function get_meta_color_page( $args = array(), $value = false ) {

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
 * Outputs a textarea with arguments from the
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_textarea_page( $args = array(), $value = false ) {

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
function hybrid_save_meta_data_page( $post_id ) {
	global $post;
	
	$meta_boxes = array_merge( hybrid_page_meta_boxes() );
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