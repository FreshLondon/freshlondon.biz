<?
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FreshLondon
 */
?>

<article id="post-<? the_ID(); ?>" <? post_class(); ?>>





    <? get_template_part('components/post/content', 'cats'); ?>
    <? if ('' != get_the_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<? the_permalink(); ?>">
                <? the_post_thumbnail('freshlondon-featured-image'); ?>
            </a>
        </div>
    <? endif; ?>
    <div class="post-text">
        <header class="entry-header">
            <?
            if (is_single()) {
                the_title('<h1 class="entry-title">', '</h1>');
            } else {
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            }

            if ('post' === get_post_type()) :
                ?>
                <? get_template_part('components/post/content', 'meta'); ?>
            <? endif;
            ?>
        </header>
        <div class="entry-content">
            <?
            the_content(sprintf(
                            /* translators: %s: Name of current post. */
                            wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'freshlondon'), array('span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false)
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'freshlondon'),
                'after' => '</div>',
            ));
            ?>
        </div>

    </div>

</article><!-- #post-## -->