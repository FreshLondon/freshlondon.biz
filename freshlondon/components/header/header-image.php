<?
		// You can upload a custom header and it'll output in a smaller logo size.
		$header_image = get_header_image();

		if ( ! empty( $header_image ) ) { ?>
			<div id="header-image" class="custom-header">
				<div class="header-wrapper">
					<div class="site-branding">
						<h1 class="site-title"><a href="<? echo esc_url( home_url( '/' ) ); ?>" rel="home"><? bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><? bloginfo( 'description' ); ?></h2>
					</div><!-- .site-branding -->
				</div><!-- .header-wrapper -->
				<img src="<? header_image(); ?>" width="<? echo get_custom_header()->width; ?>" height="<? echo get_custom_header()->height; ?>" alt="">
			</div><!-- #header-image .custom-header -->
		<? } else { ?>
			<div class="site-branding">
				<h1 class="site-title"><a href="<? echo esc_url( home_url( '/' ) ); ?>" rel="home"><? bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><? bloginfo( 'description' ); ?></h2>
			</div><!-- .site-branding -->
		<? } ?>