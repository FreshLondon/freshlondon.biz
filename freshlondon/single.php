<?
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FreshLondon
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?
        while (have_posts()) : the_post();

            get_template_part('components/post/content', get_post_format());


            /**
             * POST NAVIGATION 
             */
            the_post_navigation(array(
                'prev_text' => __('&laquo; %title'),
                'next_text' => __('%title &raquo;'),
                'screen_reader_text' => __('Continue Reading'),
            ));

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </main>
</div>
<?
get_footer();
