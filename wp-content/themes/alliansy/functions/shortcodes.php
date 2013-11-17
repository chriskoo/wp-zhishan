<?php 
global $themedir, $pego_prefix;

	$pego_prefix = "pego_";
	$themedir = get_template_directory_uri();

	
//typography
function paragraph( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'color' => '',
		'align' => ''
	), $atts ) );
	$together='';
	if(($color !='')||($align !='')) { $together = ' style=" '; }
	if($color !='') { $together .= ' color:'.$color.'; ';}
	if($align !='') { $together .= ' text-align:'.$align.'; ';}
	if(($color !='')||($align !='')) { $together .= '" '; }
	return	'<p'.$together.'>' . do_shortcode($content) . '</p>';
  
}
add_shortcode('p', 'paragraph');

function strong ( $atts, $content = null ) {
	return	'<strong>' . do_shortcode($content) . '</strong>';
  
}
add_shortcode('strong', 'strong');

function headingH1 ( $atts, $content = null ) {
	return	'<h1>' . do_shortcode($content) . '</h1>';
  
}
add_shortcode('h1', 'headingH1');

function headingH2 ( $atts, $content = null ) {
	return	'<h2>' . do_shortcode($content) . '</h2>';
  
}
add_shortcode('h2', 'headingH2');

function headingH3 ( $atts, $content = null ) {
	return	'<h3>' . do_shortcode($content) . '</h3>';
  
}
add_shortcode('h3', 'headingH3');

function headingH4 ( $atts, $content = null ) {
	return	'<h4>' . do_shortcode($content) . '</h4>';
  
}
add_shortcode('h4', 'headingH4');

function headingH5 ( $atts, $content = null ) {
	return	'<h5>' . do_shortcode($content) . '</h5>';
  
}
add_shortcode('h5', 'headingH5');


function headingH6 ( $atts, $content = null ) {
	return	'<h6>' . do_shortcode($content) . '</h6>';
  
}
add_shortcode('h6', 'headingH6');



function pre ( $atts, $content = null ) {
	return	'<pre>' . do_shortcode($content) . '</pre><div class="clear"></div>';
  
}
add_shortcode('pre', 'pre');

function li ( $atts, $content = null ) {
	return	'<li>' . do_shortcode($content) . '</li>';
  
}
add_shortcode('li', 'li');

function ul ( $atts, $content = null ) {
	return	'<ul>' . do_shortcode($content) . '</ul>';
  
}
add_shortcode('ul', 'ul');


//layout 
function one_half( $atts, $content = null ) {
   return '<div  class="one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'one_half');


function one_half_last( $atts, $content = null ) {
   return '<div  class="one-half last-column">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'one_half_last');


function one_third ( $atts, $content = null ) {
   return '<div  class="one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'one_third');


function one_third_last( $atts, $content = null ) {
   return '<div  class="one-third last-column">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'one_third_last');

function one_fourth ( $atts, $content = null ) {
   return '<div  class="one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'one_fourth');


function one_fourth_last( $atts, $content = null ) {
   return '<div  class="one-fourth last-column">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'one_fourth_last');

function one_fifth ( $atts, $content = null ) {
   return '<div  class="one-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'one_fifth');


function one_fifth_last( $atts, $content = null ) {
   return '<div  class="one-fifth last-column">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fifth_last', 'one_fifth_last');

function one_sixth ( $atts, $content = null ) {
   return '<div  class="one-sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'one_sixth');


function one_sixth_last( $atts, $content = null ) {
   return '<div  class="one-sixth last-column">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_sixth_last', 'one_sixth_last');

function two_third ( $atts, $content = null ) {
   return '<div  class="two-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'two_third');


function two_third_last( $atts, $content = null ) {
   return '<div  class="two-third-last last-column">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'two_third_last');

function two_third_last1 ( $atts, $content = null ) {
   return '<div  class="two-third-last1 last-column">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last1', 'two_third_last1');


function two_third1( $atts, $content = null ) {
   return '<div  class="two-third1">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third1', 'two_third1');

function three_fourth ( $atts, $content = null ) {
   return '<div  class="three-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'three_fourth');


function three_fourth_last( $atts, $content = null ) {
   return '<div  class="three-fourth-last last-column">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'three_fourth_last');


function clear( $atts, $content = null ) {
   return '<div class="clear"></div>';
}
add_shortcode('clear', 'clear');

function youtube_video( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id' => '',
		'width' => 'auto',
		'height' => 'auto'
	), $atts ) );
	  
	return '<div class="video-wrapper"><div class="video-container"><iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'"></iframe></div></div>';
}

add_shortcode('youtube', 'youtube_video');

function vimeo_video( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id' => '',
		'width' => '560',
		'height' => '315'
	), $atts ) );
	  
	return '<div class="video-wrapper"><div class="video-container"><iframe src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'"></iframe></div></div>';
}

add_shortcode('vimeo', 'vimeo_video');

//buttons

function button( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'url' => '#',
		'color' => 'black',
		'type' => 'small',
		'codecol' => ''
	), $atts ) );
	
	$stil = '';
	if ( !empty($codecol)) {
		$stil = 'style=" background-color:'.$codecol.'; " ';
	}
	
	return '<a class="a_button '.$type.' '.$color.'" href="'.$url.'" '.$stil.'><span>'. do_shortcode($content) . '</span></a>';                    
}
add_shortcode('button', 'button');

//lists
function listt( $atts, $content = null  ) {
		extract( shortcode_atts( array(
		'type' => 'arrow',
		'icon' => ''
	), $atts ) );  
	$listStyle='';
	if($icon != '')
	{
		$listStyle =  'style="list-style-image: url('.$icon.');"';
	}
	
	$return = '<ul class="list list-'.$type.'" '.$listStyle.'>';
	$return .= remove_wpautop($content);
	$return .= '</ul>';		
	
	return $return;	
}
add_shortcode('list', 'listt');

function list_li( $atts, $content = null  ) { 
		extract( shortcode_atts( array(
		'url' => '#'
	), $atts ) );  
	$return = '<li>';
	$return .= remove_wpautop($content);
	$return .= '</li>';		
	
	return $return;	
}
add_shortcode('list_li', 'list_li');

function list_a( $atts, $content = null  ) { 
		extract( shortcode_atts( array(
		'url' => '#'
	), $atts ) );  
	$return = '<li><a href="'.$url.'">';
	$return .= remove_wpautop($content);
	$return .= '</a></li>';		
	
	return $return;	
}
add_shortcode('list_a', 'list_a');

function highlight( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'color' => ''
	), $atts ) );
	  
	return '<span class="hl '.$color.'"> ' . do_shortcode($content) .' </span>';
}

add_shortcode('hl', 'highlight');	

function dotUnd( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'color' => ''
	), $atts ) );
	  
	return '<span class="dottedUnderline">' . do_shortcode($content) .'</span>';
}
add_shortcode('dotUnd', 'dotUnd');	

function img( $atts, $content = null  ) {
		extract( shortcode_atts( array(
		'url' => '',
		'title' => ''
	), $atts ) );  
	$return = '<img class="imgWithBorder"  src="'.$url.'" style="max-width:100%; height:auto;" alt="" />';
	return $return;	
}
add_shortcode('img', 'img');

function url( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'url' => '#',
		'target' => '_self'
	), $atts ) );
	
	
	return '<a  href="'.$url.'" target="'.$target.'">'. do_shortcode($content) . '</a>';                    
}
add_shortcode('a', 'url');

function toggle( $atts, $content = null  ) { 
		extract( shortcode_atts( array(
		'img' => '',
		'title' => '',
		'url' => '',
		'status' => 'closed'
	), $atts ) );  
	
	if($status == 'opened')
	{
		$status='';
	}
	
	$return = '<div class="shortcode-toggle '.$status.'"><h4 class="toggle-trigger"><a href="#">'.$title.'</a></h4><div class="toggle-content">' . do_shortcode($content) .'</div></div>';

	
	return $return;	
}
add_shortcode('toggle', 'toggle');


add_shortcode( 'team', 'team' );
function team( $atts, $content ){
	$GLOBALS['tab_count'] = 0;

	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
	$st=0;
	foreach( $GLOBALS['tabs'] as $tab ){
	$st++;
	$tabs[] = '<li><div class="test"><div class="prevPic"><img src="'.$tab['img1'].'" alt=""></div>
			   <div class="prevDescr">
			   <h3 class="profile-desc">Name: <span>'.$tab['desc1'].'</span></h3>
			   <h3 class="profile-desc">Position: <span>'.$tab['desc2'].'</span></h3>
			   <h3 class="profile-desc">Skills: <span>'.$tab['desc3'].'</span></h3>
			   <div class="line-separator-team"></div>
			   <h3 class="profile-desc">My Description:</h3><p>'.do_shortcode($tab['content']).'</p>
			   </div>
			   </div>
			   </li>';
	
	$panes[] = '<li><div class="_over2"></div><img src="'.$tab['img2'].'" alt=""></li>';
	}
	$return = "\n".'<div class="iconHolder">
						<div class="women_slider">
							<ul class="_preview">'.implode( "\n", $tabs ).'</ul><ul class="_trumb">  '."\n".''.implode( "\n", $panes ).'</ul><a href="#" class="next moreButton"><span>next</span></a>
                                    <a href="#" class="prev moreButton"><span>prev</span></a>
									</div></div>
									'."\n";
	}
	return $return;
}

add_shortcode( 'team_member', 'team_member' );
function team_member( $atts, $content ){
	extract(shortcode_atts(array(
	'desc1' => '',
	'desc2' => '',
	'desc3' => '',
	'img1' => '',
	'img2' => ''
	), $atts));

	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'content' =>  $content, 'desc1' =>  $desc1, 'desc2' =>  $desc2, 'desc3' =>  $desc3, 'img1' =>  $img1, 'img2' =>  $img2  );

	$GLOBALS['tab_count']++;
}



function twitter( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'account' => '',
		'tweets_number' => '1'
	), $atts ) );
	$address = get_bloginfo('template_directory');
	$return = '<div id="twitter_div"><ul id="twitter_update_list"></ul></div><script type="text/javascript" src="'.$address.'/js/blogger.js"></script><script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$account.'.json?callback=twitterCallback2&amp;count='.$tweets_number.'"></script>';

	
	return $return;                   
}
add_shortcode('twitter', 'twitter');




//
?>