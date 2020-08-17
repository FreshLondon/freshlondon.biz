<?
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FreshLondon
 */

?>

<article id="post-<? the_ID(); ?>" <? post_class(); ?>>
	<header class="entry-header">
		<? the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<? if ( 'post' === get_post_type() ) : ?>
			<? get_template_part( 'components/post/content', 'meta' ); ?>
		<? endif; ?>
	</header>
	<div class="entry-summary">
		<? the_excerpt(); ?>
	</div>
	<? get_template_part( 'components/post/content', 'footer' ); ?>
</article>
