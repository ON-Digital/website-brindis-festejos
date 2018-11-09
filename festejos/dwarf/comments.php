<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both
 * current comments and the comment form
 *
 * @package Dwarf Theme
 * @since Dwarf Theme 1.0
 */

/**
 * If the current post is protected by a password and
 * the visitor has not entered the password yet we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<aside id="comments" class="comments-area">
	<?php if ( have_comments() ) :
          ?>
      		<h2 class="comments-title">
      			<?php
      				$comments_number = get_comments_number();

							echo esc_html( $comments_number ) . __( ' comments', 'dwarf-theme' );
      			?>
      		</h2>
          <hr>

      		<ul class="comment-list list-unstyled">
      			<?php
	      				wp_list_comments( array(
	      					'style'       => 'ul',
	                'per_page' => '15',
	                'max_depth' => '6',
	                'callback' => 'dwf_comments_cb',
	      				) );
	 					?>
					</ul><!-- comment-list -->
	<?php

	the_comments_navigation();
  endif; // Check for have_comments().

			// If comments are closed and there are comments, let's leave a little note
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<h3 class="no-comments text-center">
				<?php _e( 'Comments are closed.', 'dwarf-theme' ); ?>
			</h3>

		<?php
			endif;

			// comment form
			comment_form( array(
				'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
				'title_reply_after'  => '</h2>',
	      'logged_in_as' => '',
	      'class_submit'      => 'btn-primary btn-primary--customize btn-lg btn-block ml-auto mr-auto',
	      'comment_field' =>  '<p class="comment-form">
	                              <label for="comment"></label>
	                              <textarea class="ml-auto mr-auto w-100" id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
	                              '</textarea>
	                          </p>',

		) );
	?>
</aside><!-- comments-area -->
