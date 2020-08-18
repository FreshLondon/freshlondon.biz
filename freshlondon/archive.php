<?
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FreshLondon
 */
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <? if ( have_posts() ) : ?>

                <header class="page-header">
                    <? the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                </header>
                archive
                <div id="infinite-scroll" class="archive-post-block-outer">
                    <?
                    /* Start the Loop */
                    while ( have_posts() ) : the_post(); ?>
                        <div class="archive-post-block" onclick="window.location.href='<? the_permalink(); ?>'">
                            <div class='archive-post-block-icons'>
                                <? $faicons = get_field( 'fa_icon' );
                                if ( $faicons ):
                                    foreach ( $faicons as $faicon ): ?>
                                        <i class="<? echo $faicon['value']; ?> fa-fw"></i>
                                    <? endforeach;
                                endif; ?>
                            </div>
                            <div class='archive-post-block-title'>
                                <? the_title(); ?>
                            </div>
                        </div>
                    <? endwhile; ?>
                </div>


                <? the_posts_navigation();
            endif; ?>

        </main>
    </div>
<?
get_sidebar();
get_footer();
