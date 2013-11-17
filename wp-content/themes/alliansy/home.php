<?php get_header(); ?> 
				<!--content -->
			<article id="content">
				<ul>
				
				
				
	<?php
					$args=array(
						'post_type' => 'page',
						'order' => 'ASC',
						'orderby' => 'menu_order',
						'posts_per_page' => '-1'
					  );
					$main_query = new WP_Query($args); 
					$page_number=0;
					/*if( have_posts() ) : */
						while ($main_query->have_posts()) : $main_query->the_post();
						


						global $post;
						
						global $portf_count;
						$portf_count=0;

						$post_name = $post->post_name;
						
						$title = $post->post_title;
						
						$post_id = get_the_ID();
						
						$content = get_the_content();
						
						$pageTemplate=  get_post_meta($post_id , 'page_template' , true);
						$text_page_title=  get_post_meta($post_id , 'text_page_title' , true);


		if ($pageTemplate == 'Portfolio')
		{
	    $portf_count++;
		global $portf_cat, $one_cat_only;
		$portf_cat = get_post_meta($post->ID, 'include_category' , true);
		$show_filter = get_post_meta($post->ID, 'show_filter' , true);
		$one_cat_only = false;
		if($portf_cat != '') {
			$one_cat_only = true;
		}

	?>
		<li id="<?php echo $post_name; ?>">
					   <div class="box">
                            <div class="containerContent">								
								<h1 class="head1"><?php echo $title; ?><?php if ($text_page_title != '') { echo '<strong>'.$text_page_title.'</strong>';} ?></h1>
                                 <?php
							$args = array('post_type'=> 'portfolio', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
							$posts = get_posts($args);
							$idd=0;
							if($posts) {		
												//filter 
												if($show_filter == 'Yes') {
													echo '<ul class="filterOptions portfolio-filter">';
													echo '<li class="activeF"><a href="#" data-name="all" class="all"><span></span>All</a></li>';
													$terms = get_terms("portfolio_categories");
														 $count = count($terms);
														 if ( $count > 0 ){ 
															 foreach ( $terms as $term ) {
																 echo '<li style="vertical-align: middle; text-align: center; margin-top: 1px;">/</li><li><a href="#" data-name="'.$term->slug.'" class="'.$term->slug.'"><span></span>'.$term->name.'</a></li>';
																
															 }
													}
													echo '</ul>';
													echo '<div style="clear:both;"></div>';
												}
										?>
                                
								<ul class="imgList3 gallery ourHolder">
								<?php
													
								foreach($posts as $post)
								{ 
														setup_postdata($post); 	
														$idd++;
														$termss = get_the_term_list( $post->ID,'portfolio_categories', '', ', ');
														$terms =  get_the_terms( $post->ID, 'portfolio_categories' );
														$portf_slug = $post->post_name;
														$term_list = '';
														$portf_title=get_the_title($post->ID);
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
														$portfolioType = get_post_meta($post->ID, 'portfolio_type_selected' , true);
														$ustreza=false;
														if( is_array($terms) ) {
																	foreach( $terms as $term ) {
																		$term_list .= $term->slug;
																		$term_list .= ' ';
																		
																		
																		//checking categories
																		$allCat = explode("::", $portf_cat);
																		foreach($allCat as $singleCat)
																		{
																			if ( $singleCat == $term->slug) 
																			{
																				$ustreza=true;
																				break;
																			}
																		}
																		/*
																		if ( $portf_cat == $term->slug) 
																		{									                        	 
																				$ustreza=true;									                        	 
																		}
																		*/
																	}
															}
																								
														if($one_cat_only  == false ) {
																$ustreza=true;	
														}
															
														if($ustreza == true) {
														?>
                                    <li data-id="id-<?php echo $idd; ?>"  data-type="<?php echo $term_list; ?>">
										<div class="columnBox">
											<div>
											<?php
											if($portfolioType == 'Image') {
											?>
												<a class="portfPic" href="<?php echo $image[0]; ?>"><span></span><?php echo get_the_post_thumbnail($post->ID,'PortfImg', array('alt' => '', 'title' => $portf_title)); ?>
													<span class="overlay"><img src="<?php bloginfo('template_url'); ?>/images/icon-image.png" alt="zoom picture"></span>
												</a>
											<?php
											}
											
											if($portfolioType == 'Slideshow') {
											?>
												<a class="portfPic" href="<?php echo $image[0]; ?>"><span></span><?php echo get_the_post_thumbnail($post->ID,'PortfImg', array('alt' => '', 'title' => $portf_title)); ?>
													<span class="overlay"><img src="<?php bloginfo('template_url'); ?>/images/icon-slideshow.png" alt="zoom slideshow"></span>
												</a>
											<?php
											}
											if($portfolioType == 'Video') {
												$video_url_gal= get_post_meta($post->ID, 'portfolio_video_url_gal' , true); 
											?>
												<a class="iframe" href="<?php echo $video_url_gal; ?>"><span></span><?php echo get_the_post_thumbnail($post->ID,'PortfImg', array('alt' => '', 'title' => $portf_title)); ?>
													<span class="overlay"><img src="<?php bloginfo('template_url'); ?>/images/icon-video.png" alt="zoom video"></span>
												</a>
											<?php
											}
											?>
											
												<h3><a href="#!/<?php echo $portf_slug; ?>" title=""><?php the_title(); ?></a></h3>
											</div>
										</div>
                                    </li>
									 <?php
														}
													}
								     ?>
								</ul>
								<?php
								}
								?>
								<div style="clear:both;"></div>
                            </div>
							</div>
							<div style="clear:both;"></div>
					</li>
		
		<?php
		}   //end if pageTemplate == portfolio
		else
		if ($pageTemplate == 'Blog')
		{
		?>
		<li id="<?php echo $post_name; ?>">
					   <div class="box">
                            <div class="containerContent">								
								<h1 class="head1"><?php echo $title; ?><?php if ($text_page_title != '') { echo '<strong>'.$text_page_title.'</strong>';} ?></h1>
                                 <?php
										$args = array('post_type'=> 'post', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
										$posts = get_posts($args);
										$idd=0;
											if($posts) {		
									?>	
									<div class="blog">
									
									  <?php
													foreach($posts as $post)
													{ 
														$post_type = get_post_meta($post->ID, 'post_type_selected' , true);
														$post_summary = get_post_meta($post->ID, 'post_summary' , true);
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
														if (strlen($post_summary) > 303)
														{
															$post_summary = substr($post_summary,0,300).'...';
														}														
								     ?>
														<!-- start post -->
														<div class="col305">
															<h2><span></span><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h2>									
															<div class="columnBox-blog">
																<div>
																	<div class="blogTemplateImg">	
																		<a href="<?php the_permalink(); ?>"><span></span><?php echo get_the_post_thumbnail($post->ID,'BlogImg', array('alt' => '', 'title' => '' ));  ?>
																		<?php
																		if($post_type == 'Image') {
																		?>
																			<span class="overlay"><img src="<?php bloginfo('template_url'); ?>/images/icon-image.png" alt=""></span>
																		<?php
																		}																		
																		if($post_type == 'Video') {
																		?>
																			<span class="overlay"><img src="<?php bloginfo('template_url'); ?>/images/icon-video.png" alt=""></span>
																		<?php
																		}
																		if($post_type == 'Slideshow') {
																		?>
																			<span class="overlay"><img src="<?php bloginfo('template_url'); ?>/images/icon-slideshow.png" alt=""></span>
																		<?php
																		}
																		?>
																		</a>
																	</div>
																</div>
															</div>
															<div class="under-date">
																<h2 class="date-time"><span></span><?php the_time('F j, Y') ?></h2>
															</div>
															<div class="circle1 circle">
																<a href="<?php the_permalink(); ?>">read</a>
															</div>
														</div>
														<!-- end post -->
								   <?php
										}
									?>	
									</div>
								<?php
													}
								?>
								<div style="clear:both;"></div>
							</div>	
                            </div>
					</li>
		<?php
		}
		else 
		if ($pageTemplate == 'Contact')
		{
		?>
		<li id="<?php echo $post_name; ?>">
					   <div class="box">
                            <div class="containerContent">								
								<h1 class="head1"><?php echo $title; ?><?php if ($text_page_title != '') { echo '<strong>'.$text_page_title.'</strong>';} ?></h1>
                               	<h2><span></span><?php echo get_option($pego_prefix.'map_title'); ?></h2>
								<div class="google_maps">
								<?php
										$mapLat = get_option($pego_prefix.'mapLat');
										$mapLng = get_option($pego_prefix.'mapLng');				
								?>
										<p><iframe src="https://maps.google.com/maps?q=loc:<?php echo $mapLat; ?>,<?php echo $mapLng; ?>&amp;num=1&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed&amp;iwloc=near&amp;addr" width="100%" height="170"></iframe></p>
								</div>
								
								<div style="margin-left: -30px; margin-top: 20px;">
									<div class="col250">
										<h2><span></span><?php echo get_option($pego_prefix.'content_title'); ?></h2>
										<div class="address">
											<?php the_content(); ?>
										</div>
									</div>
									<div class="col360">
										<h2><span></span><?php echo get_option($pego_prefix.'contact_form_title'); ?></h2>	
										
										<form id="ContactForm">
											<div class="success">
												Thank You for contacting us!<br>
												<strong>We will be in touch soon.</strong> 
											</div>
											<div style="clear:both;"></div>
											<fieldset>
												<label class="name">
													<input type="text" value="Name:">
													<span class="error">*This field is required.</span> <span class="empty">*This field is required.</span> </label>
												<br>
												<label class="email">
													<input type="email" value="Email:">
													<span class="error">*This is not a valid email address.</span> <span class="empty">*This field is required.</span> </label>
												<br>
												<label class="phone">
													<input type="tel" value="Phone:">
													<span class="error">*This is not a valid phone number</span> <span class="empty">*This field is required.</span> </label>
												<br>												
												<label class="message">
													<textarea>Message:</textarea>
													<span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span> </label>
												<br>
												<div class="btns right">
													<a href="#" class="link a_button mainCol" data-type="reset"><?php echo get_option($pego_prefix.'clearButton'); ?></a><a href="#" class="link a_button mainCol" data-type="submit"><?php echo get_option($pego_prefix.'sendButton'); ?></a>								
												</div>
											</fieldset>											
										</form>
										
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>	
                            </div>
							
		</li>
		<?php
		}
		else {
		?>
			   <li id="<?php echo $post_name; ?>">
				<div class="box">
					<div class="containerContent">								
						<h1 class="head1"><?php echo $title; ?><?php if ($text_page_title != '') { echo '<strong>'.$text_page_title.'</strong>';} ?></h1>
						<div class="clear"></div>
						<?php echo remove_wpautop($content); ?>
					</div>
				</div>
			</li>
		<?php
		}
		?>		
					
		<?php
			
			endwhile;
		 /*   endif; */
		?>
		
		
		<?php
			//single portfolios
			$args = array('post_type'=> 'portfolio', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
			$posts = get_posts($args);
			$idd=0;
											if($posts) {	
													
													//portofolio meta
													 $portf_desc_name1 = get_option($pego_prefix.'portfDesc1');
													 $portf_desc_name2 = get_option($pego_prefix.'portfDesc2');
													 $portf_desc_name3 = get_option($pego_prefix.'portfDesc3');
													 $portf_desc_name4 = get_option($pego_prefix.'portfDesc4');
													 $portf_desc_name5 = get_option($pego_prefix.'portfDesc5');
													 
													 $portf_desc_Link1 = get_option($pego_prefix.'portfDesc1Link');
													 $portf_desc_Link2 = get_option($pego_prefix.'portfDesc2Link');
													 $portf_desc_Link3 = get_option($pego_prefix.'portfDesc3Link');
													 $portf_desc_Link4 = get_option($pego_prefix.'portfDesc4Link');
													 $portf_desc_Link5 = get_option($pego_prefix.'portfDesc5Link');	

													foreach($posts as $post)
													{ 
														setup_postdata($post); 	
														$idd++;
														$portfolioType = get_post_meta($post->ID, 'portfolio_type_selected' , true); 
														//portf desc
														$portfolio_desc1 = get_post_meta($post->ID, 'portfolio_desc1' , true); 
														$portfolio_desc2 = get_post_meta($post->ID, 'portfolio_desc2' , true); 
														$portfolio_desc3 = get_post_meta($post->ID, 'portfolio_desc3' , true); 
														$portfolio_desc4 = get_post_meta($post->ID, 'portfolio_desc4' , true); 
													    $portfolio_desc5 = get_post_meta($post->ID, 'portfolio_desc5' , true);
														
														$termss = get_the_term_list( $post->ID,'portfolio_categories', '', ', ');
														$terms =  get_the_terms( $post->ID, 'portfolio_categories' );
														$portf_slug = $post->post_name;
														$term_list = '';
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
														$ustreza=false;
															if( is_array($terms) ) {
																foreach( $terms as $term ) {
																	$term_list .= $term->slug;
																	$term_list .= ' ';
																	if ( $portf_cat == $term->slug) 
																	{									                        	 
																		 	$ustreza=true;									                        	 
																	}
																}
															}
									
														
												?>
												   <li id="<?php echo $portf_slug; ?>">
												   <div class="box">
														<div class="containerContent">								
															<h1 class="head1"><?php echo get_option($pego_prefix.'singlePortfTitle'); ?><strong><?php echo get_option($pego_prefix.'singlePortfTitleText'); ?></strong></h1>
															
															<h2><span></span><?php the_title(); ?></h2><a href="javascript:history.go(-1)"><span class="btn-back">back</span></a>
															<div class="singleFolioItem">
															<?php
																if($portfolioType == 'Slideshow') 			 
																 {
																				$attachments = get_children(array('post_parent' => $post->ID,
																				'post_status' => 'inherit',
																				'post_type' => 'attachment',
																				'post_mime_type' => 'image',
																				'order' => 'ASC',
																				'orderby' => 'menu_order ID'));
																
																		echo '<div class="slides">';
																			echo '<div class="slides_container">';
																			foreach($attachments as $att_id => $attachment) {
																				$full_img_url = wp_get_attachment_url($attachment->ID);
																				echo '<div class="slide">';
																				?>
																				<a href="#"><img src="<?php echo $full_img_url; ?>" alt="" title="" /></a>
																				<?php
																				echo '</div>';
																		} //end foreach
																		echo '</div>';
																		echo '</div>';
																		echo '<div class="clear"></div>';
																 }
																if($portfolioType == 'Image') 		
																{
																		 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
																		
																		 ?>
																			<img class="singlePortfImg" src="<?php echo $image[0]; ?>" alt="" />
																		 <?php
																
																}// end if image
																 
													
																 if($portfolioType == 'Video') 			
																 {
																	$video_url= get_post_meta($post->ID, 'portfolio_video_url' , true);   
																	if(!empty($video_url)) 
																	{
																		echo '<div class="portfVideo"><div class="video-wrapper"><div class="video-container">'.$video_url.'</div></div></div>';
																	}						
																 }// end if video		
																 ?>
						
															</div>
												
															<div class="singlePortfLeftCol">
																<h3 class="portfolioSingle"><span></span><?php echo get_option($pego_prefix.'col1Title'); ?></h3>
																<?php
																	if(($portf_desc_name1 != '')&&($portfolio_desc1 != '')) {
																		$status1=' closed';
																		if($portf_desc_Link1 == 'yes') { $status1=' opened';}
																			echo '<div class="shortcode-toggle '.$status1.'"><h4 class="toggle-trigger"><a href="#">'.$portf_desc_name1.'</a></h4><div class="toggle-content">'.do_shortcode($portfolio_desc1).'</div></div>';								
																	}
																
																?>
																<?php
																	if(($portf_desc_name2 != '')&&($portfolio_desc2 != '')) {
																		$status2=' closed';
																		if($portf_desc_Link2 == 'yes') { $status2=' opened';}
																			echo '<div class="shortcode-toggle '.$status2.'"><h4 class="toggle-trigger"><a href="#">'.$portf_desc_name2.'</a></h4><div class="toggle-content">'.do_shortcode($portfolio_desc2).'</div></div>';								
																	}
																
																?>	
																<?php
																	if(($portf_desc_name3 != '')&&($portfolio_desc3 != '')) {
																		$status3=' closed';
																		if($portf_desc_Link3 == 'yes') { $status3=' opened';}
																			echo '<div class="shortcode-toggle '.$status3.'"><h4 class="toggle-trigger"><a href="#">'.$portf_desc_name3.'</a></h4><div class="toggle-content">'.do_shortcode($portfolio_desc3).'</div></div>';								
																	}
																
																?>
																<?php
																	if(($portf_desc_name4 != '')&&($portfolio_desc4 != '')) {
																		$status4=' closed';
																		if($portf_desc_Link4 == 'yes') { $status4=' opened';}
																			echo '<div class="shortcode-toggle '.$status4.'"><h4 class="toggle-trigger"><a href="#">'.$portf_desc_name4.'</a></h4><div class="toggle-content">'.do_shortcode($portfolio_desc4).'</div></div>';								
																	}
																
																?>
																<?php
																	if(($portf_desc_name5 != '')&&($portfolio_desc5 != '')) {
																		$status5=' closed';
																		if($portf_desc_Link5 == 'yes') { $status5=' opened';}
																			echo '<div class="shortcode-toggle '.$status5.'"><h4 class="toggle-trigger"><a href="#">'.$portf_desc_name5.'</a></h4><div class="toggle-content">'.do_shortcode($portfolio_desc5).'</div></div>';								
																	}
																
																?>
															</div>
															<div class="singlePortfRightCol">
																<h3 class="portfolioSingle"><span></span><?php echo get_option($pego_prefix.'col2Title'); ?></h3>
																<?php the_content(); ?>
															</div>
														<div style="clear:both;"></div>	
														</div>
														<div style="clear:both;"></div>
														</div>
												</li>
										 <?php
													}
										   ?>
									
								<?php
								}
								?>	
		
				</ul>
			</article>
			<!--content end-->
			<div id="homepage">
			<div style="width:240px; height:660px; min-height:10px; position:relative; float:left;"></div>
			<div class="boxGall">
					   	<?php
								$args = array('post_type'=> 'slider', 'posts_per_page' => -1, 'order'=> 'ASC', 'orderby' => 'post_date'  );
								$posts = get_posts($args);
								$idd=0;
								if($posts) {	
						?>
                            <div class="sliderHolder">
                                <div id="_slider">
						<?php
												$slideNum=0;
											
												foreach($posts as $post)
												{ 
														$slideNum++;
														setup_postdata($post); 	
														
														$portf_slug = $post->post_name;
														$term_list = '';
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
														$slider_content = get_the_content($post->ID);
														
														?>														
															<div class="_item"><?php echo get_the_post_thumbnail($post->ID,'SliderBig', array('alt' => ''));  ?></div>	
														<?php	
												}
						
						?>
                                </div>  
                            </div>

                            <div class="gallScroll">
                             <div class="viewport">
                                    <ul class="_list1 overview">
									
						<?php		
												$slideNum=0;
											
												foreach($posts as $post)
												{ 
														$slideNum++;
														setup_postdata($post); 	
														
														$portf_slug = $post->post_name;
														$term_list = '';
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
														$slider_content = get_the_content($post->ID);														
						?>
														<li><div class="_over"></div><?php echo get_the_post_thumbnail($post->ID,'SliderSmall', array('alt' => ''));  ?></li>
						<?php
												}
						
						?>
                                         <li class="noMar"></li>
                                    </ul>
                                </div>
                                <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                             </div> 

						<?php
						} //end if posts
						
						?>							 
                       </div>	
			</div>
			
			
			
            </div>
		</div>
         
</div>
<?php get_footer(); ?> 