<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rideo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
<div class="about-author comments">	
	<div class="row">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$rideo_comment_count = get_comments_number();
			if ( '1' === $rideo_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'Comments on &ldquo;%1$s&rdquo;', 'rideo' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comments &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', $rideo_comment_count, 'comments title', 'rideo' ) ),
					number_format_i18n( $rideo_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<div class="about-author">
			<?php
			wp_list_comments( array(
				'style'      => 'li',
				'short_ping' => false,
			) );
			?>
		</div><!-- .comment-list -->

		<?php
		the_comments_navigation();

		/* printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); */

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'rideo' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$comments_args = array(
  'id_form'           => 'commentform',
  'class_form'      => 'comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit-text',  
  'name_submit'       => 'submit',
  'title_reply'       => __( 'Leave a Reply' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( 'Cancel Reply' ),
  'label_submit'      => __( 'SUBMIT COMMENTS' ),
  'format'            => 'xhtml',
 // redefine your own textarea (the comment body)
        'comment_field' => '<div class="col-xs-12"><div class="input-text"><textarea id="comment" rows="4" cols="40" name="comment" placeholder="Your Comment* " aria-required="true"></textarea></div></div>',
        'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<div class="col-xs-12 col-sm-6"><div class="input-text">'  .
      '<input id="author" class="blog-form-input" placeholder="Your Name* " name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30" /></div></div>',

    'email' =>
      '<div class="col-xs-12 col-sm-6"><div class="input-text">'.
      '<input id="email" class="blog-form-input" placeholder="Your Email Address* " name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30" /></div></div>'
   
    )
  ),

  
);
	comment_form($comments_args);
	?>
</div>
	</div>
</div><!-- #comments -->
