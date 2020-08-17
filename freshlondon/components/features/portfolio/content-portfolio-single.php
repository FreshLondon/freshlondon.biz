<?
/**
 * @package FreshLondon
 */

// Access global variable directly to adjust the content width for portfolio single page
if ( isset( $GLOBALS['content_width'] ) ) {
	$GLOBALS['content_width'] = 1100;
}
?>

<article id="post-<? the_ID(); ?>" <? post_class(); ?>>
	<header class="entry-header">
		<? the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<? echo get_the_term_list( $post->ID, 'jetpack-portfolio-type', '<span class="portfolio-entry-meta">', esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'freshlondon' ), '</span>' ); ?>
	</header>
	<div class="entry-content">
		<? the_content(); ?>
		<?
			wp_link_pages( array(
				'before'   => '<div class="page-links clear">',
				'after'    => '</div>',
				'pagelink' => '<span class="page-link">%</span>',
			) );
		?>
	</div>
	<footer class="entry-meta">
		<?
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '', esc_html__( ', ', 'freshlondon' ) );
			if ( $tags_list ) :
		?>
			<span class="tags-links"><? printf( esc_html__( 'Tagged %1$s', 'freshlondon' ), $tags_list ); ?></span>
		<? endif; ?>

		<? if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><? comments_popup_link( esc_html__( 'Leave a comment', 'freshlondon' ), esc_html__( '1 Comment', 'freshlondon' ), esc_html__( '% Comments', 'freshlondon' ) ); ?></span>
		<? endif; ?>

		<? edit_post_link( esc_html__( 'Edit', 'freshlondon' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article><!-- #post-## -->