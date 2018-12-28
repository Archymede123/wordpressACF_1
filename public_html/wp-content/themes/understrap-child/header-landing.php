<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>


	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TBPVSMR');</script>
	<!-- End Google Tag Manager -->


<!-- Global site tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-825511837"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-825511837');
</script>





<!-- Event snippet for Referral to WebApp (client.mybrian.fr) conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<!-- <script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-825511837/UbMsCLGio3oQnZ_RiQM',
      'event_callback': callback
  });
  return false;
}
</script>-->






	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<?php wp_head(); ?>
	<meta property="og:image" content="https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_partage.jpg" />
</head>

<body <?php body_class(); ?>>


	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TBPVSMR"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->



<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>



			<nav class="navbar navbar-expand-md test">

			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>


						<?php

							$logo = get_field('logo');

							if ( $logo == 'rose' ) { ?>

								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand custom-logo-link" rel="home" itemprop="url">
									<img width="151" height="94" src="https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_HD.png" class="img-fluid" alt="MyBrian-logo-blanc" itemprop="logo" srcset="https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_HD.png 151w, https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_HD.png 150w" sizes="(max-width: 151px) 100vw, 151px">
								</a>

							<?php } else { ?>

								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand custom-logo-link" rel="home" itemprop="url">
									<img width="151" height="94" src="https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_white.png" class="img-fluid" alt="MyBrian-logo-blanc" itemprop="logo" srcset="https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_white.png 151w, https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_white.png 150w" sizes="(max-width: 151px) 100vw, 151px">
								</a>

							<?php } ?>

					<!-- The WordPress Menu goes here -->

					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>

			</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->


	<!-- Return to Top -->
	<a href="javascript:" id="top"><div id="return-top"><span id="return-title">Top</span><!--<i class="icon-chevron-up"></i>--></div></a>
