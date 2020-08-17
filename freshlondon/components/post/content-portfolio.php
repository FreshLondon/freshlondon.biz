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

    <? get_template_part('components/post/content', 'footer'); ?>
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
            the_content();
            ?>



            <?
            $images = get_field('image');
            #debug($images);
            if ($images):
                ?>
                <div class="featured-image-slider">
                    <div class="owl-carousel">
                        <? foreach ($images as $image): ?>
                            <img class="item" src="<? echo $image['sizes']['large']; ?>" alt="<? echo $image['alt']; ?>" />
                        <? endforeach; ?>
                    </div>
                </div>
            <? endif; ?>

        </div>

    </div>

</article><!-- #post-## -->