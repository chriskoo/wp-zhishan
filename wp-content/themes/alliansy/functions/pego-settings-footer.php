<?php
$parent_slug_7 = "pego_admin";
$page_title_7 = __("Top Panel Options", "pego_tr");
$menu_title_7 = __("Top Panel (animation)", "pego_tr");
$capability_7 = "manage_options";
$menu_slug_7 = "pego_admin_7";
$function_7 = "mytheme_admin7";





global $pego_prefix, $themedir;

$themedir = get_template_directory_uri();




function mytheme_add_admin7() 
{
global            $parent_slug_7, $page_title_7, $menu_title_7, $capability_7, $menu_slug_7, $function_7;
$page_details = add_submenu_page( $parent_slug_7, $page_title_7, $menu_title_7, $capability_7, $menu_slug_7, $function_7);

add_action('admin_print_scripts-' . $page_details, 'my_admin_scripts');
}

add_action('admin_menu', "mytheme_add_admin7");







 

function mytheme_admin7() {

global $menu_slug_7, $page_title_7, $pego_prefix; 
?>
<div class='wrap'>  
<?php

if (isset($_POST["submit"]))
{
if ($_POST["submit"] == "Save Changes")
{
?>
<div class="updated"><?php _e("Options saved", "pego_tr"); ?></div>
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


 
<h2><?php echo $page_title_7; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug_7; ?>" method="post">
<table class="form-table">
<tbody>
<?php pego_option_select($pego_prefix."closeTopPanel", __("Close Top Panel by Default?", "pego_tr"), array("no" => __("No", "pego_tr"), 
                                                          "yes" => __("Yes", "pego_tr")), "", "", ""); ?>     
<?php pego_option_textarea($pego_prefix."topContent", __("Top Panel Content(accepts shortcodes)", "pego_tr"), 500, "", "", ""); ?>
  
<td><h3><?php _e("Background Settings", "pego_tr"); ?></h3></td>    
<?php pego_option_color($pego_prefix."bgColUpperBar", __("Background Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_upload($pego_prefix."bgImgUpperBar", __("Background image", "pego_tr"), "" , "", __("Upload", "pego_tr"), "bgImgUpperBar"); ?>  
<?php pego_option_select($pego_prefix."bgRepeatUpperBar", __("Background repeat", "pego_tr"), array("no-repeat" => __("No repeat", "pego_tr"), 
                                                          "repeat-x" => __("Repeat x", "pego_tr"), 
                                                          "repeat-y" => __("Repeat y", "pego_tr"),
                                                          "repeat" => __("Repeat", "pego_tr")), "", "", ""); ?>
<?php pego_option_text($pego_prefix."bgPosUpperBar", __("Background Position", "pego_tr"), 100, "top center", "", ""); ?>

<?php pego_option_color($pego_prefix."topBorderColor", __("Border color", "pego_tr"),100, "", "",""); ?>




</tbody>
</table>

<?php pego_option_submit(); ?> 


</form>
</div> 
<?php
}
?>