<?php
$parent_slug_2 = "pego_admin";
$page_title_2 = __("Left Side Options", "pego_tr");
$menu_title_2 = __("Left Side", "pego_tr");
$capability_2 = "manage_options";
$menu_slug_2 = "pego_admin_2";
$function_2 = "mytheme_admin2";



$themedir = get_template_directory_uri();

global $pego_prefix;



function mytheme_add_admin2() 
{
global            $parent_slug_2, $page_title_2, $menu_title_2, $capability_2, $menu_slug_2, $function_2;
$page_details = add_submenu_page( $parent_slug_2, $page_title_2, $menu_title_2, $capability_2, $menu_slug_2, $function_2);

add_action('admin_print_scripts-' . $page_details, 'my_admin_scripts');
}

add_action('admin_menu', "mytheme_add_admin2");







 

function mytheme_admin2() {

global $menu_slug_2, $page_title_2, $pego_prefix; 
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


 
<h2><?php echo $page_title_2; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug_2; ?>" method="post">
<table class="form-table">
<tbody>
<?php pego_option_upload($pego_prefix."headerLogo", __("Logo", "pego_tr"), "" , "", __("Upload", "pego_tr"), "headerLogo"); ?>  

<td><h3><?php _e("Header Widget Area Settings", "pego_tr"); ?></h3></td>
<?php pego_option_textarea($pego_prefix."headerWidgetArea", __("Input for widget header area(HTML)", "pego_tr"), 500, "", "", ""); ?>

<td><h3><?php _e("Menu Settings", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."fontFamMenu", __("Font Family", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontFamUrlMenu", __("Font URL", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontSizeMenu", __("Font Size", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_text($pego_prefix."fontSizeMenuSub", __("Font Size For Sub Menu", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_color($pego_prefix."fontColMenu", __("Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontColMenuHover", __("Hover/Active Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontShadowMenu", __("Shadow Color", "pego_tr"),100, "", "",""); ?>



</tbody>
</table>

<?php pego_option_submit(); ?> 


</form>
</div> 
<?php
}
?>