<?php
$parent_slug_20 = "pego_admin";
$page_title_20 = __("Portfolio Settings", "pego_tr");
$menu_title_20 = __("Portfolio", "pego_tr");
$capability_20 = "manage_options";
$menu_slug_20 = "pego_admin_20";
$function_20 = "mytheme_admin20";



$themedir = get_template_directory_uri();

global $pego_prefix;



function mytheme_add_admin20() 
{
global            $parent_slug_20, $page_title_20, $menu_title_20, $capability_20, $menu_slug_20, $function_20;
$page_details = add_submenu_page( $parent_slug_20, $page_title_20, $menu_title_20, $capability_20, $menu_slug_20, $function_20);

add_action('admin_print_scripts-' . $page_details, 'my_admin_scripts');
}

add_action('admin_menu', "mytheme_add_admin20");







 

function mytheme_admin20() {

global $menu_slug_20, $page_title_20, $pego_prefix; 
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


 
<h2><?php echo $page_title_20; ?></h2>
 
<form action="admin.php?page=<?php echo $menu_slug_20; ?>" method="post">
<table class="form-table">
<tbody>
<?php pego_option_text($pego_prefix."singlePortfTitle", __("Single Portfolio Main Title", "pego_tr"), 500, "Portfolio", "", ""); ?>  											
<?php pego_option_text($pego_prefix."singlePortfTitleText", __("Single Portfolio Text Next To Title", "pego_tr"), 500, "// check our custom work for our clients", "", ""); ?>  

<?php pego_option_text($pego_prefix."col1Title", __("Portfolio Description Column Title", "pego_tr"), 500, "What we have done", "", ""); ?>  											
<?php pego_option_text($pego_prefix."col2Title", __("Portfolio Content Column Title", "pego_tr"), 500, "Overview", "", ""); ?>  

<td><h3><?php _e("Portfolio Description Fields Settings", "pego_tr"); ?></h3></td>
<?php pego_option_text($pego_prefix."portfDesc1", __("Portfolio Description 1", "pego_tr"), 500, "Field 1", "", ""); ?>  
<?php pego_option_select($pego_prefix."portfDesc1Link", __("Open Description 1 by default?", "pego_tr"), array("no" => __("No", "pego_tr"), 
                                                          "yes" => __("Yes", "pego_tr")), "", "", ""); ?>     
                                                          
<?php pego_option_text($pego_prefix."portfDesc2", __("Portfolio Description 2", "pego_tr"), 500, "Field 2", "", ""); ?>  
<?php pego_option_select($pego_prefix."portfDesc2Link", __("Open Description 2 by default?", "pego_tr"), array("no" => __("No", "pego_tr"), 
                                                          "yes" => __("Yes", "pego_tr")), "", "", ""); ?>  
                                                          
<?php pego_option_text($pego_prefix."portfDesc3", __("Portfolio Description 3", "pego_tr"), 500, "Field 3", "", ""); ?>  
<?php pego_option_select($pego_prefix."portfDesc3Link", __("Open Description 3 by default?", "pego_tr"), array("no" => __("No", "pego_tr"), 
                                                          "yes" => __("Yes", "pego_tr")), "", "", ""); ?>                                                          
                                                          
<?php pego_option_text($pego_prefix."portfDesc4", __("Portfolio Description 4", "pego_tr"), 500, "Field 4", "", ""); ?>  
<?php pego_option_select($pego_prefix."portfDesc4Link", __("Open Description 4 by default?", "pego_tr"), array("no" => __("No", "pego_tr"), 
                                                          "yes" => __("Yes", "pego_tr")), "", "", ""); ?>   
                                                                                                                                                   
<?php pego_option_text($pego_prefix."portfDesc5", __("Portfolio Description 5", "pego_tr"), 500, "Field 5", "", ""); ?>  
<?php pego_option_select($pego_prefix."portfDesc5Link", __("Open Description 5 by default?", "pego_tr"), array("no" => __("No", "pego_tr"), 
                                                          "yes" => __("Yes", "pego_tr")), "", "", ""); ?>  
														  


						  
											
</tbody>
</table>

<?php pego_option_submit(); ?> 


</form>
</div> 
<?php
}
?>