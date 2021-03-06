<?
/**
 * Template name: Testimonials
 *
 * @package FreshLondon
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?
			while ( have_posts() ) : the_post();

				get_template_part( 'components/page/content', 'page-testimonials' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main>
	</div>
<?
get_sidebar();
get_footer();