<?php

global $pego_prefix, $themedir;



$themedir = get_template_directory_uri();
 
$page_title = __("General Theme Options", "pego_tr");
$menu_title = __("Theme Options", "pego_tr");
$capability = "manage_options";
$menu_slug = "pego_admin";
$function = "mytheme_admin";
$position = "61";

   

function mytheme_add_admin() 
{
global $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position; 
$page_details = add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

add_action('admin_print_scripts-' . $page_details, 'my_admin_scripts');
}
add_action('admin_menu', 'mytheme_add_admin');



function mytheme_admin() {
 
global $pego_prefix, $menu_slug, $themedir, $page_title; 
$i=0;

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

<h2><?php echo $page_title; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug; ?>" method="post">


                                                                                            

<table class="form-table">
<tbody>    
<?php pego_option_color($pego_prefix."mainTemplateColor", __("Main Template Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_upload($pego_prefix."favicon", __("Favicon", "pego_tr"), "" , "", __("Upload", "pego_tr"), "favicon"); ?>  
<?php pego_option_select($pego_prefix."responsivePage", __("Make Template Responsive?", "pego_tr"), array("yes" => __("Yes", "pego_tr"), 
                                                          "no" => __("No", "pego_tr")), "", "", ""); ?>  

<td><h3><?php _e("Default Background Settings", "pego_tr"); ?></h3></td>  
<?php pego_option_color($pego_prefix."bgColDefault", __("Background Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_upload($pego_prefix."bgImgDefault", __("Background image", "pego_tr"), "" , "", __("Upload", "pego_tr"), "bgImgDefault"); ?>  
<?php pego_option_select($pego_prefix."bgRepeatDefault", __("Background repeat", "pego_tr"), array("no-repeat" => __("No repeat", "pego_tr"), 
                                                          "repeat-x" => __("Repeat x", "pego_tr"), 
                                                          "repeat-y" => __("Repeat y", "pego_tr"),
                                                          "repeat" => __("Repeat", "pego_tr")), "", "", ""); ?>
<?php pego_option_text($pego_prefix."bgPosDefault", __("Background Position", "pego_tr"), 100, "top center", "", ""); ?>

<td><h3><?php _e("Content Background Settings", "pego_tr"); ?></h3></td>  
<?php pego_option_color($pego_prefix."bgColContent", __("Background Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_upload($pego_prefix."bgImgContent", __("Background image", "pego_tr"), "" , "", __("Upload", "pego_tr"), "bgImgContent"); ?>  
<?php pego_option_select($pego_prefix."bgRepeatContent", __("Background repeat", "pego_tr"), array("no-repeat" => __("No repeat", "pego_tr"), 
                                                          "repeat-x" => __("Repeat x", "pego_tr"), 
                                                          "repeat-y" => __("Repeat y", "pego_tr"),
                                                          "repeat" => __("Repeat", "pego_tr")), "", "", ""); ?>
<?php pego_option_text($pego_prefix."bgPosContent", __("Background Position", "pego_tr"), 100, "top center", "", ""); ?>

<td><h3><?php _e("Main Text Font Settings", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."fontFamText", __("Font Family", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontFamUrlText", __("Font URL", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontSizeText", __("Font Size", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_color($pego_prefix."fontColText", __("Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontShadowText", __("Shadow Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontURLCol", __("Url Font Color", "pego_tr"),100, "", "",""); ?>

<td><h3><?php _e("Page titles", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."fontFamPageTitles", __("Font Family", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontFamUrlPageTitles", __("Font URL", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontSizePageTitles", __("Font Size", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_color($pego_prefix."fontColPageTitles", __("Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontShadowPageTitles", __("Shadow Color", "pego_tr"),100, "", "",""); ?>

<td><h3><?php _e("Page titles text", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."fontFamPageTitlesText", __("Font Family", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontFamUrlPageTitlesText", __("Font URL", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontSizePageTitlesText", __("Font Size", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_color($pego_prefix."fontColPageTitlesText", __("Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontShadowPageTitlesText", __("Shadow Color", "pego_tr"),100, "", "",""); ?>

<td><h3><?php _e("Heading h1", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."fontFamH1", __("Font Family", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontFamUrlH1", __("Font URL", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontSizeH1", __("Font Size", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_color($pego_prefix."fontColH1", __("Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontShadowH1", __("Shadow Color", "pego_tr"),100, "", "",""); ?>

<td><h3><?php _e("Heading h2", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."fontFamH2", __("Font Family", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontFamUrlH2", __("Font URL", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontSizeH2", __("Font Size", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_color($pego_prefix."fontColH2", __("Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontShadowH2", __("Shadow Color", "pego_tr"),100, "", "",""); ?>

<td><h3><?php _e("Heading h3", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."fontFamH3", __("Font Family", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontFamUrlH3", __("Font URL", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontSizeH3", __("Font Size", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_color($pego_prefix."fontColH3", __("Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontShadowH3", __("Shadow Color", "pego_tr"),100, "", "",""); ?>

<td><h3><?php _e("Heading h4", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."fontFamH4", __("Font Family", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontFamUrlH4", __("Font URL", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontSizeH4", __("Font Size", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_color($pego_prefix."fontColH4", __("Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontShadowH4", __("Shadow Color", "pego_tr"),100, "", "",""); ?>

<td><h3><?php _e("Heading h5", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."fontFamH5", __("Font Family", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontFamUrlH5", __("Font URL", "pego_tr"), 500, "", "", ""); ?>
<?php pego_option_text($pego_prefix."fontSizeH5", __("Font Size", "pego_tr"), 100, "", "px", ""); ?>
<?php pego_option_color($pego_prefix."fontColH5", __("Font Color", "pego_tr"),100, "", "",""); ?>
<?php pego_option_color($pego_prefix."fontShadowH5", __("Shadow Color", "pego_tr"),100, "", "",""); ?>



</tbody>
</table>

<?php pego_option_submit(); ?> 
</form>
</div> 
<?php
}
?>