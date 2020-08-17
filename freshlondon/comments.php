<?
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FreshLondon
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

	<?
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'freshlondon' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<? if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><? esc_html_e( 'Comment navigation', 'freshlondon' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><? previous_comments_link( esc_html__( 'Older Comments', 'freshlondon' ) ); ?></div>
				<div class="nav-next"><? next_comments_link( esc_html__( 'Newer Comments', 'freshlondon' ) ); ?></div>

			</div>
		</nav>
		<? endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol>
		<? if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><? esc_html_e( 'Comment navigation', 'freshlondon' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><? previous_comments_link( esc_html__( 'Older Comments', 'freshlondon' ) ); ?></div>
				<div class="nav-next"><? next_comments_link( esc_html__( 'Newer Comments', 'freshlondon' ) ); ?> </div>

			</div>
		</nav>
		<?
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><? esc_html_e( 'Comments are closed.', 'freshlondon' ); ?></p>
	<?
	endif;

	comment_form();
	?>

</div><!-- #comments -->