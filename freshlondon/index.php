<?
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FreshLondon
 */
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?
            if (have_posts()) :

                if (is_home() && !is_front_page() && is_singular()) :

                    ?>
                    <header>
                        <h1 class="page-title"><? single_post_title(); ?></h1>
                    </header>
                <?
                else:
                    ?>
                    <header>
                        <h1 class="page-title"><? single_post_title(); ?></h1>
                    </header>
                <?
                endif;
                ?>
                <div id="infinite-scroll" class="archive-post-block-outer">
                    <?
                    /* Start the Loop */
                    while (have_posts()) : the_post();
                        #debug(get_field('fa_icon'));
                        ?>
                        <div class="archive-post-block" onclick="window.location.href='<? the_permalink(); ?>'">
                            <div class='archive-post-block-icons'>
                                <?
                                $faicons = get_field('fa_icon');
                                if ($faicons):
                                    ?>
                                    <? # echo $faicon['label'];
                                    ?>
                                    <? foreach ($faicons as $faicon): ?>
                                    <i class="<? echo $faicon['value']; ?> fa-fw"></i>
                                <? endforeach; ?>
                                <? endif;
                                ?>
                            </div>
                            <div class='archive-post-block-title'>
                                <? the_title(); ?>
                            </div>
                        </div>
                    <? endwhile; ?>
                </div>


                <?
                the_posts_navigation();

            else :

                get_template_part('components/post/content', 'none');

            endif;
            ?>

        </main>
    </div>
<?
get_footer();
