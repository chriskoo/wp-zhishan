<?php 
global $themedir, $pego_prefix;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon Icon -->
  <link rel="shortcut icon" href="<?php echo get_option($pego_prefix.'favicon'); ?>" type="image/vnd.microsoft.icon"/>
  <link rel="icon" href="<?php echo get_option($pego_prefix.'favicon'); ?>" type="image/x-ico"/>	
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/reset.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/layout.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.fancybox-1.3.4.css">
  <?php
	$responsive='no';
	if (get_option($pego_prefix.'responsivePage') == 'yes') {
		$responsive='yes';
	?>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/media.css">
	<?php
	}	
  ?>	
  	<script type="text/javascript">
		var templateUrl = '<?php echo get_bloginfo("template_url"); ?>';
		var responsiveJS = '<?php echo $responsive; ?>';
	</script>


 
  <!--[if lt IE 9]>
  	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>js/html5.js"></script>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
    
  <![endif]-->
	<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			
		</div>
	<![endif]-->
	
	<!-- Fonts -->
	<?php include("functions/fonts.php"); ?>
	
	<!-- custom CSS -->
	<?php include("functions/customCssAdd.php"); ?>

	<?php wp_head(); ?>
</head>
<body>
<div class="glob">
<div class="page_spinner"></div> 
	<!-- start upper panel -->
	<div id="panel">
		<div class="insidePanel">
				<?php
					$topContent = get_option($pego_prefix.'topContent');
					echo do_shortcode($topContent);
				?>
		</div>
	</div>
	<p class="slideTopPanel"><a href="#" class="btn-slide"></a></p>
	<!-- end upper panel -->
	
<div class="main">
    <div class="center"> 
            <div class="menuHolder">
			<?php
					$page_args1 = array('parent' => 0,'sort_order' => 'ASC', 'sort_column' => 'menu_order');
					$pages1 = get_pages($page_args1); 
					$url_tab1='#!/';
							if (!is_front_page()){
							 $url_tab1 = get_option("siteurl")."#!/";
						   }
					foreach ($pages1 as $single_page1) {
						$pageId1=$single_page1->ID;
						$homePage='';
						$page_template1 =  get_post_meta($pageId1 , 'page_template' , true);
						if ($page_template1 == 'Home')
						{
							$homePage = $single_page1->post_name;
							break;							
						}
					}
					?>
				<h1 style="padding: 0; margin: 0 auto; text-align:center;"><a href="<?php echo $url_tab1; ?>" id="logo"><img src="<?php echo get_option($pego_prefix."headerLogo"); ?>" alt="" /></a></h1>


				<nav class="menu">
                    <ul id="menu">
					<?php
					$page_args = array('parent' => 0,'sort_order' => 'ASC', 'sort_column' => 'menu_order');
					$pages = get_pages($page_args); 
					foreach ($pages as $single_page) {
							$trenutni="";
							//if(($menu_items==1)&&(!is_single())){ $trenutni=" current";}
							
							//$pageTemplate= get_post_meta($single_page->ID , 'page_template' , true);
							//if(($pageTemplate=='Blog')&&(is_single())){ $trenutni="class='current'";}	 
							
						  // $pageInMenu= get_post_meta($single_page->ID, 'show_page_in_menu' , true);
						  // $url_tab = "#"; 
						   //if (!is_front_page()){
							// $url_tab = get_option("siteurl")."#";
						  // }
						  // $menu_items++;
							
							$pageId=$single_page->ID;
							$children = get_pages('child_of='.$pageId.'&sort_column=menu_order');
							
							$external_link =  get_post_meta($pageId , 'external_link' , true);
							$page_template =  get_post_meta($pageId , 'page_template' , true);
						
							$trenutni='';
							//if(($pageTemplate=='Blog')&&(is_single())){ $trenutni="class='current'"; }	 
							$url_tab='#!/';
							if (!is_front_page()){
							 $url_tab = get_option("siteurl")."#!/";
						   }
                        $post_title = $single_page->post_title;
                        $post_titles = explode('||', $post_title);
                        if ( count($post_titles)>1){
                            $post_title = $post_titles[1];
                        }
//                        echo "post_title=$post_title";

							if(count($children) == 0){  
								if ($external_link == '') {
									if ($page_template == 'Home') {
											echo '<li><a href="'.$url_tab.'"><span class="marker1"></span><div class="mText">' . $post_title . '</div></a></li>';
									}
									else {
										echo '<li><a href="'.$url_tab.''.$single_page->post_name .'"><span class="marker1"></span><div class="mText">' . $post_title . '</div></a></li>';
								 }
								}
								else
								if ($external_link == '#') {
									echo '<li><a href="'.$url_tab.'#"><span class="marker1"></span><div class="mText">' . $post_title . '</div></a></li>';
								}
								else
								{
									echo '<li><a href="'.$external_link.'"><span class="marker1"></span><div class="mText">' . $post_title . '</div></a></li>';
								}
						  	}
							if(count($children) != 0){  
								if ($external_link == '') {
									if ($page_template == 'Home') {
										echo '<li class="with_ul"><a href="'.$url_tab.'"><span class="marker1"></span><div class="mText">' . $post_title . '</div></a>';
									}
									else {
										echo '<li class="with_ul"><a href="'.$url_tab.''.$single_page->post_name .'"><span class="marker1"></span><div class="mText">' . $single_page->post_title . '</div></a>';
									}
										
								}
								else 
								if ($external_link == '#') {
									echo '<li class="with_ul"><a href="'.$url_tab.'#"><span class="marker1"></span><div class="mText">' . $post_title . '</div></a>';
								}
								else {
									echo '<li class="with_ul"><a href="'.$external_link.'"><span class="marker1"></span><div class="mText">' . $post_title . '</div></a>';
								}
								echo '<ul class="submenu_1">';
								foreach($children as $child)
								{
									$subPageId=$child->ID;
									$subPage_external_link =  get_post_meta($subPageId , 'external_link' , true);
									if ($subPage_external_link == '') {
										echo  '<li><a href="'.$url_tab.''.$child->post_name.'">'.$child->post_title.'</a></li>';
									}
									else
									{
										echo  '<li><a href="'.$subPage_external_link.'">'.$child->post_title.'</a></li>';
									}
									
						
								}
								echo '</ul>';
								echo '</li>';
							}
						 
					}
					?>

        			</ul> 

			
        		</nav>
					<div class="clear"></div>
			<!--footer -->
            	<footer>
				<?php
					echo get_option($pego_prefix.'headerWidgetArea');
				?>

            	</footer>
            	<!--footer end-->
					
					
                 </div> 
			<!--content -->