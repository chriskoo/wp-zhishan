<?php
$parent_slug_9 = "pego_admin";
$page_title_9 = __("Contact Template Options", "pego_tr");
$menu_title_9 = __("Contact", "pego_tr");
$capability_9 = "manage_options";
$menu_slug_9 = "pego_admin_9";
$function_9 = "mytheme_admin9";





global $pego_prefix, $themedir;

$themedir = get_template_directory_uri();




function mytheme_add_admin9() 
{
global            $parent_slug_9, $page_title_9, $menu_title_9, $capability_9, $menu_slug_9, $function_9;
$hook = add_submenu_page( $parent_slug_9, $page_title_9, $menu_title_9, $capability_9, $menu_slug_9, $function_9);

add_action('admin_print_scripts-' . $hook, 'my_admin_scripts');
}

add_action('admin_menu', "mytheme_add_admin9");







 

function mytheme_admin9() {

global $menu_slug_9, $page_title_9, $pego_prefix; 
?>
<div class='wrap'>  
<?php

if (isset($_POST["submit"]))
{
if ($_POST["submit"] == "Save Changes")
{
?>
<div class="updated"><?php _e("Options Saved", "pego_tr"); ?></div>
<?php


    foreach($_POST as $key=>$value)
    {
        
        if (substr($key, 0, 5) == $pego_prefix)
        {           
            if (is_array($value))
            {
                $serialized_value = serialize($value);
                update_option($key, $serialized_value);
            }
            else
            {
                $value = str_replace("\\", "", $value); 
                update_option($key, $value);
            }
        }
        
                
    }
}


} 
?>


 
<h2><?php echo $page_title_9; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug_9; ?>" method="post">
<table class="form-table">
<tbody>
<td><h3><?php _e("Map Settings", "pego_tr"); ?></h3></td>

<?php pego_option_text($pego_prefix."mapLat", __("Map Lat", "pego_tr"), 100, 46.361801, "", ""); ?>
<?php pego_option_text($pego_prefix."mapLng", __("Map Lng", "pego_tr"), 100, 15.869790, "", ""); ?>
			  
<td><h3><?php _e("Contact Form", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."contact_form_title", __("Contact form title", "pego_tr"), 500, "Contact form", "", ""); ?>
<?php pego_option_text($pego_prefix."map_title", __("Map title", "pego_tr"), 500, "How to find us", "", ""); ?>
<?php pego_option_text($pego_prefix."content_title", __("Content title", "pego_tr"), 500, "Our address", "", ""); ?>

<?php pego_option_text($pego_prefix."input_one_title", __("Name prevalue", "pego_tr"), 500, "Name", "", ""); ?>
<?php pego_option_text($pego_prefix."input_two_title", __("E-mail prevalue", "pego_tr"), 500, "E-mail", "", ""); ?>
<?php pego_option_text($pego_prefix."input_three_title", __("Phone prevalue", "pego_tr"), 500, "Phone", "", ""); ?>
<?php pego_option_text($pego_prefix."textarea_title", __("Message prevalue", "pego_tr"), 500, "Message", "", ""); ?>

<?php pego_option_text($pego_prefix."input_one_titleError", __("Name error", "pego_tr"), 500, "*This is not a valid name.", "", ""); ?>
<?php pego_option_text($pego_prefix."input_two_titleError", __("E-mail error", "pego_tr"), 500, "*This is not a valid email address.", "", ""); ?>
<?php pego_option_text($pego_prefix."input_three_titleError", __("Phone error", "pego_tr"), 500, "*This is not a valid phone number", "", ""); ?>
<?php pego_option_text($pego_prefix."textarea_titleError", __("Message error", "pego_tr"), 500, "*The message is too short.", "", ""); ?>

<?php pego_option_text($pego_prefix."clearButton", __("Clear button text", "pego_tr"), 500, "clear", "", ""); ?>														  
<?php pego_option_text($pego_prefix."sendButton", __("Send button text", "pego_tr"), 500, "send", "", ""); ?>														  

</tbody>
</table>

<?php pego_option_submit(); ?> 


</form>
</div> 
<?php
}
?>