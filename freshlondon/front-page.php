<?
/**
 * The static front page template
 *
 * @package FreshLondon
 */
if ( 'posts' == get_option( 'show_on_front' ) ) :

    get_template_part( 'index' );

else :

    get_header();
    ?>


    <div id="primary" class="content-area front-page">
        <main id="main" class="site-main" role="main">
            <? if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            else: ?>
                <p>Sorry, nothing here.</p>
            <? endif; ?>

            <!-- start first category post box -->
            <div class="FP-post-box-container">
                <div class="FP-post-box-cat-header"><h4>RECENT PROJECTS</h4></div>
                <div class="FP-post-box-inner">
                    <?
                    $args = array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => 6
                    );
                    $posts = new WP_Query( $args );
                    while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <div class="FP-post-box">
                            <div class="FP-post-box-post-title-wrap">
                            <span class="FP-post-box-post-title">
                            <? the_title(); ?>
                            </span>
                            </div>
                            <? $images = get_field( 'image' );
                            if ( $images ):
                                $imageClean = $images[0]; ?>
                                <div class="FP-post-box-image" style="background-image: url('<? echo $imageClean['sizes']['medium']; ?>')">
                                    <img class="item" src="<? echo $imageClean['sizes']['medium-large']; ?>" width="<? echo $imageClean['sizes']['medium-large-width']; ?>"
                                         height="<? echo $imageClean['sizes']['medium-large-height']; ?>" alt="<? echo $image['alt']; ?>"/>
                                </div>
                            <? endif; ?>
                        </div>
                    <? endwhile; ?>
                </div>
            </div>
            <!-- end first category post box -->
            <script>
							$(document).ready(function () {
								$('.FP-post-box-inner').slick({
									arrows: true,
									centerMode: true,
									centerPadding: '60px',
									slidesToShow: 3,
									responsive: [
										{
											breakpoint: 768,
											settings: {
												arrows: false,
												centerMode: true,
												centerPadding: '40px',
												slidesToShow: 2
											}
										},
										{
											breakpoint: 480,
											settings: {
												arrows: false,
												centerMode: true,
												centerPadding: '40px',
												slidesToShow: 1
											}
										}
									]
								});
							});
            </script>

        </main>
    </div>
    <? get_footer(); ?>

<? endif; ?>



