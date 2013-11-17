<?php get_header(); ?>


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				
					<div class="subpage-title">					
						<div class="heading-wrapper">
							<h1 class="heading"><?php the_title(); ?></h1>
						</div>					
					</div>
					<div  class="entry">
					
								<?php echo "index page!"; ?>
							
						
					</div> <!-- entry end-->
					<div class="clearfix"></div>


				</div>

			<?php endwhile; ?>



			<?php else : ?>

				<h1><span><?php _e("Not Found", "pego_tr"); ?></span></h1>
			
			<?php endif; ?>	

<?php get_footer(); ?>