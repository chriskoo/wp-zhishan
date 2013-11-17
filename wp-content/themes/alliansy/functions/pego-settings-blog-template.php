<?php
$parent_slug_78 = "pego_admin";
$page_title_78 = __("Blog Template Settings", "pego_tr");
$menu_title_78 = __("Blog", "pego_tr");
$capability_78 = "manage_options";
$menu_slug_78 = "pego_admin_78";
$function_78 = "mytheme_admin78";





global $pego_prefix, $themedir;

$themedir = get_template_directory_uri();




function mytheme_add_admin78() 
{
global            $parent_slug_78, $page_title_78, $menu_title_78, $capability_78, $menu_slug_78, $function_78;
$page_details = add_submenu_page( $parent_slug_78, $page_title_78, $menu_title_78, $capability_78, $menu_slug_78, $function_78);

add_action('admin_print_scripts-' . $page_details, 'my_admin_scripts');
}

add_action('admin_menu', "mytheme_add_admin78");







 

function mytheme_admin78() {

global $menu_slug_78, $page_title_78, $pego_prefix; 
?>
<div class='wrap'>  
<?php

if (isset($_POST["submit"]))
{
if ($_POST["submit"] == "Save Changes")
{
?>
<div class="updated"><?php __("Options saved", "pego_tr"); ?></div>
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


 
<h2><?php echo $page_title_78; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug_78; ?>" method="post">

<table class="form-table">
<tbody>
<td><h3><?php _e("Blog Settings", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."singleBlogTitle", __("Single Blog Main Title", "pego_tr"), 500, "Blog", "", ""); ?>  											
<?php pego_option_text($pego_prefix."singleBlogTitleText", __("Single Blog Text Next To Title", "pego_tr"), 500, "// check our latest blog posts", "", ""); ?>  
</tbody>
</table>

<?php pego_option_submit(); ?> 


</form>
</div> 
<?php
}
?>