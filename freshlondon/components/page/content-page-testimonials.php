<?
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FreshLondon
 */

?>

<article id="post-<? the_ID(); ?>" <? post_class(); ?>>
	<header class="entry-header">
	  <? the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header>
	<div class="entry-content">
	  <? the_content();

	  $testimonials = get_field('testimonial');

	  if ($testimonials):
		  foreach ($testimonials as $testimonial): ?>
						<div class="testimonial-block">
							<div class="quote"><?= $testimonial['testimonial_content']; ?>
								<div class="quote-by">


					<? if ($testimonial['testimonial_name']) { ?>
											<span class="quote-by-name"><?= $testimonial['testimonial_name']; ?></span><br>
					<? } ?>


					<? if (!$testimonial['testimonial_url'] && !$testimonial['testimonial_name']) { ?>
											<span class="quote-by-name"><?= $testimonial['testimonial_company']; ?></span>
					<? } elseif ($testimonial['testimonial_company']) { ?>
											<a href="<?= $testimonial['testimonial_url']; ?>"
												 target="_blank"><?= $testimonial['testimonial_company']; ?></a>
					<? } ?>


								</div>
							</div>
						</div>
		  <?
		  endforeach;
	  endif;
	  ?>
	</div>
	<footer class="entry-footer">
	  <?
	  edit_post_link(
		  sprintf(
		  /* translators: %s: Name of current post */
			  esc_html__('Edit %s', 'freshlondon'),
			  the_title('<span class="screen-reader-text">"', '"</span>', false)
		  ),
		  '<span class="edit-link">',
		  '</span>'
	  );
	  ?>
	</footer>
</article><!-- #post-## -->