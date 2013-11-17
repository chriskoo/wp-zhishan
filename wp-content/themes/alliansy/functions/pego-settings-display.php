<?php

function my_admin_styles() 
{   
    global $themedir;
    wp_enqueue_style('thickbox'); 
}
add_action('admin_print_styles', 'my_admin_styles'); 

function my_admin_scripts() {
global $themedir;
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('my-upload');


}

function pego_option_text($id, $title = null, $width = 500, $default = null, $desc = null, $class = null)
{
    $html = "<tr valign='top' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "  <input type='text' name='$id' id='$id' value=\"". pego_display($id, $default, false)."\" style='width:" . $width . "px'/>\n";
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    echo $html;
}


function pego_option_textarea($id, $title = null, $width = 500, $rows = 4, $default = null, $desc = null, $class = null)
{
    $html = "<tr valign='top' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<textarea rows='$rows' name='$id' id='$id' style='width:" . $width . "px'>". pego_display($id, $default, false) ."</textarea>\n";
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    echo $html;
}


function pego_option_select($id, $title = null, $options = null, $default = "Please select", $desc = null, $class = null)
{
    $default_selected = "";
    $db_value = get_option($id);
    if ($db_value == $default || $db_value == "") $default_selected = 'selected="selected"'; 
    $html = "<tr valign='top'  id='tr_$id' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<select id='$id' name='$id' >\n"; 
    if ($default != "") $html .= "<option ". $default_selected .">$default</option>\n";
    $no_of_options = count($options);
    foreach ($options as $value => $option)
    {
        if ($db_value == $value) $selected = 'selected="selected"'; else $selected = "";
        $html .= "<option value=\"$value\" $selected>$option</option>\n";
    }
    $html .= "</select>\n";
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    
    
    
    
    echo $html;
    
}

function pego_option_color($id, $title = null, $options = null, $default = "Please select", $desc = null, $class = null)
{
    $html = "<tr valign='top' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<link rel='stylesheet' href='". get_bloginfo('template_url') ."/includes/css/colorpicker.css' type='text/css' media='screen' />";
    $html .= "<script type='text/javascript' src='". get_bloginfo('template_url') ."/includes/js/jquery.js'></script>";
	 $html .= "<script type='text/javascript' src='". get_bloginfo('template_url') ."/includes/js/colorpicker.js'></script>";	
	 $html .= "<script type='text/javascript' src='". get_bloginfo('template_url') ."/includes/js/eye.js'></script>";
	 $html .= "<script type='text/javascript' src='". get_bloginfo('template_url') ."/includes/js/layout.js?ver=1.0.2'></script>";	
			
	
    
    $html .= "  #<input type='text' name='$id' id='colorpickerField1' value=\"". pego_display($id, $default, false)."\" style='width:100px'/>\n";
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    echo $html;
    
 

    
    
    
   
    
}




function pego_option_upload($id = "", $title = null, $default = null, $desc = "Upload file, or choose it from the media library", $submit = "Upload", $class = null)
{
    $html = "<tr valign='top'  id='tr_$id' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<input id='$id' type='text' style='width:400px' name='$id' value='".pego_display($id, $default, false)."' />\n";
    $html .= "<input id='$id"."_button' type='button' value='$submit' />\n";
    $html .= "<script type=\"text/javascript\">\n";
    $html .= "jQuery(document).ready(function() {\n";
    $html .= "jQuery('#$id"."_button').click(function() {\n";
    $html .= "formfield = jQuery('#$id').attr('name');\n";
    $html .= "tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');\n"; 
    $html .= "window.send_to_editor = function(html) {\n"; 
    $html .= "imgurl = jQuery('img',html).attr('src');\n"; 
    $html .= "jQuery('#$id').val(imgurl);\n"; 
    $html .= "tb_remove();\n";
    $html .= "}\n";
    $html .= "return false;\n";
    $html .= "});\n";
    $html .= "})\n"; 
    $html .= "</script>\n"; 
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "<div id='". $id ."_show'><img src='".pego_display($id, $default, false)."'></div>\n"; 
    $html .= "</td>\n";
    $html .= "</tr>\n";
    
    echo $html;
}

function pego_option_submit()
{
    $html = "<p class='submit'> \n";
    $html .= "<input type='submit' value='Save Changes' class='button-primary' id='submit' name='submit'>\n";
    $html .= "</p>\n";
    echo $html;
}

function pego_display($field, $default, $echo = true)
{
    $saved = get_option($field);
    
    if ($saved == "") $show = $default;
    else $show = $saved;
    
    if ($echo) echo $show; else return $show;
}



?>
