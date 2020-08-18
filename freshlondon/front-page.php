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


            <?
            /**
             * Setup query to show the ‘services’ post type with ‘8’ posts.
             * Output the title with an excerpt.
             */
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'orderby' => 'title',
                'order' => 'ASC',
            );

            $loop = new WP_Query( $args ); ?>
            <div class="FP-post-box-container">
                <div class="FP-post-box-cat-header">
                    <h4>
                        Recent snippets
                    </h4>
                </div>
                <div id="infinite-scroll" class="archive-post-block-outer">
                    <? while ( $loop->have_posts() ) :
                        $loop->the_post(); ?>


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

                    <? endwhile;
                    wp_reset_postdata(); ?>
                    <a href="<?= get_home_url(); ?>/blog/">More snippets</a>
                </div>
            </div>


            <div class="FP-post-box-container">
                <div class="FP-post-box-cat-header">
                    <h4>
                        Recent projects
                    </h4>
                </div>
                <div class="FP-post-box-inner homepage-slider">
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
                                <div class="FP-post-box-image">
                                    <img class="item" src="<? echo $imageClean['sizes']['large']; ?>" width="<? echo $imageClean['sizes']['large-width']; ?>"
                                         height="<? echo $imageClean['sizes']['large-height']; ?>" alt="<? echo $images[0]['alt']; ?>"/>
                                </div>
                            <? endif; ?>
                        </div>
                    <? endwhile; ?>
                </div>
            </div>
            <!-- end first category post box -->
            <script>
							$(document).ready(function () {
								$('.homepage-slider').slick({
									arrows: true,
									centerMode: true,
									centerPadding: '60px',
									slidesToShow: 5,
									slidesToScroll: 1,
									// variableWidth: true,
									autoplay: true,
									autoplaySpeed: 1500,
									responsive: [
										{
											breakpoint: 768,
											settings: {
												arrows: false,
												centerMode: true,
												centerPadding: '40px',
												slidesToShow: 3
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



