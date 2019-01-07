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


		<?php if ( is_page_template( 'page-templates/landing.php' ) ) { ?>

			<?php	$navbar = get_field('navbar');

				if ( $navbar == 'Rose' ) { ?>

					<style>
					.navbar {
						background: linear-gradient(150deg,#fe5a6b,#f6456a);
						width: 100%;
						z-index: 1000;
					}
					</style>

				<?php } elseif ( $navbar == 'Blanc' ) { ?>

					<style>
					.navbar {
						background: #fff !important;
						width: 100%;
						z-index: 1000;
					}
					</style>

				<?php } elseif ( $navbar == 'Transparent' ) { ?>

					<style>
					.navbar {
						background: 0 0;
						width: 100%;
						position: absolute;
						z-index: 1000;
					}
					</style>

				<?php } ?>

			<nav class="navbar navbar-expand-md">

			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>


				<?php	$logo = get_field('logo');

					if ( $logo == 'Rose' ) { ?>

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand custom-logo-link" rel="home" itemprop="url">
							<img width="151" height="94" src="https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_HD.png" class="img-fluid" alt="MyBrian-logo-blanc" itemprop="logo" srcset="https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_HD.png 151w, https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_HD.png 150w" sizes="(max-width: 151px) 100vw, 151px">
						</a>

					<?php } else { ?>

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand custom-logo-link" rel="home" itemprop="url">
							<img width="151" height="94" src="https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_white.png" class="img-fluid" alt="MyBrian-logo-blanc" itemprop="logo" srcset="https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_white.png 151w, https://www.mybrian.fr/wp-content/uploads/2017/12/logo_mybrian_white.png 150w" sizes="(max-width: 151px) 100vw, 151px">
						</a>

					<?php } ?>


					<?php	$items = get_field('couleur_items_menu');

						if ( $items == 'Rose' ) { ?>

							<style>

							.navbar-nav li a {
						    color: #f6456b !important;
						    font-size: 14px;
						    background-color: transparent;
						    border: none;
							}

							.navbar-nav li.bubble-stroke a {
						    color: #f6456b !important;
						    text-decoration: none;
						    font-size: 14px;
						    border: 2px solid #f6456b;
						    background-color: transparent;
						    border-radius: 30px 30px 30px 0;
						    color: #f6456b;
						    -webkit-transition: all .3s ease-in-out;
						    -moz-transition: all .3s ease-in-out;
						    -o-transition: all .3s ease-in-out;
						    transition: all .3s ease-in-out;
							}

							.navbar-nav li.bubble-stroke a:hover {
						    color: #fff !important;
						    background-color: #f6456b;
							}

							.navbar-nav li.bubble a {
						    text-decoration: none;
						    font-size: 14px;
						    padding: 10px 20px;
						    border: 2px solid #f6456b;
						    background-color: #f6456b;
						    color: #fff !important;
						    border-radius: 30px 30px 30px 0;
							}

							</style>

						<?php } elseif ( $items == 'Blanc' ) { ?>

							<style>

							.navbar-nav li a {
						    color: #fff !important;
						    font-size: 14px;
						    background-color: transparent;
						    border: none;
							}

							.navbar-nav li.bubble-stroke a {
						    color: #fff !important;
						    text-decoration: none;
						    font-size: 14px;
						    border: 2px solid #fff;
						    background-color: transparent;
						    border-radius: 30px 30px 30px 0;
						    color: #fff;
						    -webkit-transition: all .3s ease-in-out;
						    -moz-transition: all .3s ease-in-out;
						    -o-transition: all .3s ease-in-out;
						    transition: all .3s ease-in-out;
							}

							.navbar-nav li.bubble-stroke a:hover {
						    color: #f6456b !important;
						    background-color: #fff;
							}

							.navbar-nav li.bubble a {
						    text-decoration: none;
						    font-size: 14px;
						    padding: 10px 20px;
						    border: 2px solid #fff;
						    background-color: #fff;
						    color: #f6456b !important;
						    border-radius: 30px 30px 30px 0;
							}

							</style>

						<?php } ?>


					<!-- The WordPress Menu goes here -->

					<?php wp_nav_menu(
						array(
							'theme_location'  => 'landing',
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

		<?php } else { ?>

			<nav class="navbar navbar-expand-md">

			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>


						<!-- Your site title as branding in the menu -->
						<?php if ( ! has_custom_logo() ) { ?>

							<?php if ( is_front_page() && is_home() ) : ?>

								<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

							<?php else : ?>

								<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

							<?php endif; ?>


						<?php } else {
							the_custom_logo();
						} ?><!-- end custom logo -->

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

		<?php } ?>


	</div><!-- .wrapper-navbar end -->


	<!-- Return to Top -->
	<a href="javascript:" id="top"><div id="return-top"><span id="return-title">Top</span><!--<i class="icon-chevron-up"></i>--></div></a>
