	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'pego_tr' ); ?></p>
	</div><!-- #comments -->
	<?php
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?><div style="">
		<div style="">
			<h3 style="margin-bottom: 10px; margin-top: 10px; padding: 0;"><span></span><?php _e("COMMENTS", "pego_tr"); ?></h3>
		</div>	
		<h3 style="color: #3A3939; margin-bottom: 30px; font-size: 12px; letter-spacing: 0px; padding-bottom: 0px; margin-top: -20px; margin-bottom: -35px;">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'pego_tr' ),
					number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
			?>
		</h3>


		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'callback' => 'alliansy_comment' ) );
			?>
		</ol>

</div>
	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'pego_tr' ); ?></p>
	<?php endif; ?>

	
	
	
	
		<?php if ('open' == $post->comment_status) : ?>

			<div id="respond" style="">

			
			
			<div class="clearfix"></div><!-- cleaning out the closet -->
		
						
			<div style="margin-top: 30px;">				
				<h3 style="margin-bottom: 10px; padding: 0;"><span></span><?php comment_form_title( 'LEAVE A REPLY', 'LEAVE A REPLY TO %s' ); ?></h3>
			</div>	
			
			
			<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
			</div>

			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

				<?php if ( $user_ID ) : ?>

				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

				<?php else : ?>

				<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
				<label for="author"><small style="font-size: 11px;">Name <?php if ($req) echo "*"; ?></small></label></p>

				<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
				<label for="email"><small style="font-size: 11px;">Mail <?php if ($req) echo "*"; ?></small></label></p>

				<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
				<label for="url"><small style="font-size: 11px;">Website</small></label></p>

				<?php endif; ?>

				<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

				<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
				<p id="blog-post-form-allow">					
					<span class="required">* indicates a required field</span><br /><span class="dashed">You may use this <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:</span><br />
					 <?php echo allowed_tags(); ?>
				</p>

				<p class="comment-it"><input name="submit" type="submit" id="submit-comment" tabindex="5" value="Comment" />
				<?php comment_id_fields(); ?>
				</p>
				<?php do_action('comment_form', $post->ID); ?>

			</form>

<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>

<div class="clear"></div>

</div><!-- #comments -->