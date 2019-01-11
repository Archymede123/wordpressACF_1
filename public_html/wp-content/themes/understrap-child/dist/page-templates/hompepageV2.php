<?php
/**
 * Template Name: HomepageV2
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="landing-wrapper">

	<!-- <div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary"> -->

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<!-- <?php the_content();?> -->
						
						<div class="navigation">
							<div class="navigation--icon" id="nav-icon-mobile">
								<span class="navigation--icon__stripes" >
									&nbsp;
								</span>
							</div>
							
							<nav class="navigation__nav closed">
								<ul class="navigation__list">
									<li class="navigation__item">
										<a href="#" class="navigation__link"> About Natours</a></li>
									<li class="navigation__item">
										<a href="#" class="navigation__link"> Your benefits</a>
									</li>
									<li class="navigation__item">
										<a href="#" class="navigation__link"> Popular tours</a>
									</li>
									<li class="navigation__item">
										<a href="#" class="navigation__link"> Stories</a>
									</li>
									<li class="navigation__item">
										<a href="#" class="navigation__link"> Book now</a>
									</li>
								</ul>
							</nav>
						</div>
				
						<div class="landing-page">
							<div class="mobile-alert">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/logo_mybrian_pink_small.png" alt="" class="mobile-alert-logo">
								<div class="mobile-alert-content">
									<p class="mobile-alert-title">L'appli MyBrian</p>
									<p class="mobile-alert-text">Mon traducteur pro toujours avec moi</p>
								</div>
								<a href="#" class="mobile-alert-btn"><p>Installer</p></a>
							</div>
							
							<div class="service-description">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/logo_mybrian_white.png" alt="" class="logo">
								<div class="service-description--content">
									
									<p class="service-description--subtitle"><?php the_field('homepage_surtitre');?></p>
									<h1 class="service-description--title"><?php the_field('homepage_title');?></h1>
									<p class="service-description--text">
										<?php the_field('homepage_service_description');?>
									</p>
									<?php 
										$link = get_field('homepage_cta_link');

										if( $link ): ?>
											
											<a class="cta-main cta" href="<?php echo $link; ?>"><?php the_field('homepage_cta_label');?></a>

									<?php endif; ?>
									
								</div>
								
								<div class="conversation-bubbles">
									<div class="conversation-bubbles--bubble__first conversation-bubbles--bubble">
										<span class='conversation-bubbles--text'><?php the_field('homepage_bulle1');?></span>
									</div>
									<div class="conversation-bubbles--bubble__second conversation-bubbles--bubble">
										<span class='conversation-bubbles--text'><?php the_field('homepage_bulle2');?></span>
									</div>
									
								</div>
							</div>
							<div class="quick-quotation">
								<div class="quick-quotation--tool">
									<div id="root"></div>
									
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/brian-icon-large.png" alt="" class="brian-icon-large">
								</div>
								<img src="#" alt="">
							</div>
						</div>
						<div class="why-brian">
							<h3 class="section-title">
								<?php the_field('whybrian_title');?>
							</h3>
							<div class="why-brian--items">
								<div class="why-brian--item">
									<div class="why-brian--icon">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/icon_relationship.png" alt="" class="why-brian--icon__image">
									</div> 
									<h4 class="why-brian--title"><?php the_field('whybrian_item_1_title');?></h4>
									<p class="why-brian--text"> 
										<?php the_field('whybrian_item_1_content');?>
									</p>
								</div>
								<div class="why-brian--item">
									<div class="why-brian--icon">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/icon_simplicity.png" alt="" class="why-brian--icon__image">
									</div> 
									<h4 class="why-brian--title"><?php the_field('whybrian_item_2_title');?></h4>
									<p class="why-brian--text"> 
										<?php the_field('whybrian_item_2_content');?>
									</p>
								</div>
								<div class="why-brian--item">
									<div class="why-brian--icon">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/icon_translation.png" alt="" class="why-brian--icon__image">
									</div> 
									<h4 class="why-brian--title"><?php the_field('whybrian_item_3_title');?></h4>
									<p class="why-brian--text"> 
										<?php the_field('whybrian_item_3_content');?>
									</p>
								</div>
							</div>
							<?php 

								$link = get_field('whybrian_cta_link');

								if( $link ): ?>
									
									<a class="cta" href="<?php echo $link; ?>"><?php the_field('whybrian_cta_label');?></a>
									
								<?php endif; ?>
							
						</div>
						<div class="clients">
							<h3 class="section-title">
								Ils nous font confiance
							</h3>
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#testimonial1" role="tab" aria-controls="home" aria-selected="true">
										<?php 
											$image = get_field('quote_1_image');
											
											if( !empty($image) ): ?>

												<img src="<?php echo $image['url']; ?>" class="clients--logo" alt="<?php echo $image['alt']; ?>" />
										<?php endif; ?>
										<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/clients_logo/logo_1.png" alt="" class="clients--logo"> -->
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#testimonial2" role="tab" aria-controls="profile" aria-selected="false">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/clients_logo/logo_2.png" alt="" class="clients--logo">
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#testimonial3" role="tab" aria-controls="contact" aria-selected="false">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/clients_logo/logo_3.png" alt="" class="clients--logo">
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#testimonial4" role="tab" aria-controls="contact" aria-selected="false">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/clients_logo/logo_4.png" alt="" class="clients--logo">
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#testimonial5" role="tab" aria-controls="contact" aria-selected="false">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/clients_logo/logo_5.png" alt="" class="clients--logo">
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#testimonial6" role="tab" aria-controls="contact" aria-selected="false">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/clients_logo/logo_6.png" alt="" class="clients--logo">
									</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="testimonial1" role="tabpanel" aria-labelledby="home-tab">
									<p class="clients--quote">"Outil très pratique et réactif, rapide et facile à utiliser. On limite l’administratif."</p>
									<p class="clients--name">Julie Dupont</p>
									<p class="clients--role">Resonsable communication chez TBWA</p>
								</div>
								<div class="tab-pane fade" id="testimonial2" role="tabpanel" aria-labelledby="profile-tab">
									<p class="clients--quote">"Outil très pratique et réactif, rapide et facile à utiliser. On limite l’administratif."</p>
									<p class="clients--name">Julie Dupont</p>
									<p class="clients--role">Resonsable communication chez TBWA</p>
								</div>
								<div class="tab-pane fade" id="testimonial3" role="tabpanel" aria-labelledby="contact-tab">
									<p class="clients--quote">"Outil très pratique et réactif, rapide et facile à utiliser. On limite l’administratif."</p>
									<p class="clients--name">Julie Dupont</p>
									<p class="clients--role">Resonsable communication chez TBWA</p>
								</div>
								<div class="tab-pane fade" id="testimonial4" role="tabpanel" aria-labelledby="contact-tab">
									<p class="clients--quote">"Outil très pratique et réactif, rapide et facile à utiliser. On limite l’administratif."</p>
									<p class="clients--name">Julie Dupont</p>
									<p class="clients--role">Resonsable communication chez TBWA</p>
								</div>
								<div class="tab-pane fade" id="testimonial5" role="tabpanel" aria-labelledby="contact-tab">
									<p class="clients--quote">"Outil très pratique et réactif, rapide et facile à utiliser. On limite l’administratif."</p>
									<p class="clients--name">Julie Dupont</p>
									<p class="clients--role">Resonsable communication chez TBWA</p>
								</div>
								<div class="tab-pane fade" id="testimonial6" role="tabpanel" aria-labelledby="contact-tab">
									<p class="clients--quote">"Outil très pratique et réactif, rapide et facile à utiliser. On limite l’administratif."</p>
									<p class="clients--name">Julie Dupont</p>
									<p class="clients--role">Resonsable communication chez TBWA</p>
								</div>
							</div>
						</div>
						<div class="partners">
							<h3 class="section-title">
								<?php the_field('partner_section_title');?>
							</h3>
							<div class="partners--logos">
								<?php 
									$image = get_field('partner_1_image');		
									if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" class="partner--logo" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>

								<?php 
									$image = get_field('partner_2_image');		
									if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" class="partner--logo" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>

								<?php 
									$image = get_field('partner_3_image');		
									if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" class="partner--logo" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>

								<?php 
									$image = get_field('partner_4_image');		
									if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" class="partner--logo" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>

								<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_EACM.png" alt="" class="partner--logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_Big_Booster.png" alt="" class="partner--logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_bpi.png" alt="" class="partner--logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_french_tech.png" alt="" class="partner--logo"> -->
							</div>
						</div>
						
						<div class="blog-preview">
							<h3 class="section-title">
								<?php the_field('blog-preview_section_title');?>
							</h3>
							<?php dynamic_sidebar( 'recent-posts-homepage' ); ?>
							<?php 
								$link = get_field('blog-preview_cta_link');
								if( $link ): ?>			
								<a class="cta" href="<?php echo $link; ?>"><?php the_field('blog-preview_cta_label');?></a>
							<?php endif; ?>
						</div>
						<div class="app-download">
							<h3 class="section-title">
								<?php the_field('mobile-app_section_title');?>
							</h3>
							<p class='app-download--text'><?php the_field('mobile-app_description');?></p>
							<div class="stores--logos">
								<?php 
									$link = get_field('apple_store_app_link');
									if( $link ): ?>			
									<a href="<?php echo $link; ?>">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/downloadApp_logo/dispo_apple.png" alt="" class="stores--logo">
									</a>
								<?php endif; ?>
								<?php 
									$link = get_field('android_store_app_link');
									if( $link ): ?>			
									<a href="<?php echo $link; ?>">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/downloadApp_logo/dispo_android.png" alt="" class="stores--logo">
									</a>
								<?php endif; ?>
								<!-- <a href="#">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/downloadApp_logo/dispo_android.png" alt="" class="stores--logo">
								</a>
								<a href="#">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/downloadApp_logo/dispo_apple.png" alt="" class="stores--logo">
								</a> -->
							</div>
						</div>
                        

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			<!-- </div>#primary

		</div>.row end

	</div>Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root"></div>
<script>
	!function(l){function e(e){for(var r,t,n=e[0],o=e[1],u=e[2],f=0,i=[];f<n.length;f++)t=n[f],p[t]&&i.push(p[t][0]),p[t]=0;for(r in o)Object.prototype.hasOwnProperty.call(o,r)&&(l[r]=o[r]);for(s&&s(e);i.length;)i.shift()();return c.push.apply(c,u||[]),a()}function a(){for(var e,r=0;r<c.length;r++){for(var t=c[r],n=!0,o=1;o<t.length;o++){var u=t[o];0!==p[u]&&(n=!1)}n&&(c.splice(r--,1),e=f(f.s=t[0]))}return e}var t={},p={2:0},c=[];function f(e){if(t[e])return t[e].exports;var r=t[e]={i:e,l:!1,exports:{}};return l[e].call(r.exports,r,r.exports,f),r.l=!0,r.exports}f.m=l,f.c=t,f.d=function(e,r,t){f.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},f.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},f.t=function(r,e){if(1&e&&(r=f(r)),8&e)return r;if(4&e&&"object"==typeof r&&r&&r.__esModule)return r;var t=Object.create(null);if(f.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:r}),2&e&&"string"!=typeof r)for(var n in r)f.d(t,n,function(e){return r[e]}.bind(null,n));return t},f.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return f.d(r,"a",r),r},f.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},f.p="/";var r=window.webpackJsonp=window.webpackJsonp||[],n=r.push.bind(r);r.push=e,r=r.slice();for(var o=0;o<r.length;o++)e(r[o]);var s=n;a()}([])
</script>
<script src="/static/js/1.3fe8f92f.chunk.js"></script>
<script src="/static/js/main.e8315a12.chunk.js"></script>

<script>
	const nav = document.querySelector(".navbar");
	

	function displayNav() {
		if(window.scrollY > 200) {
			document.body.classList.add("fixed-nav");
		} else {
			document.body.classList.remove("fixed-nav");
		}
	}

	window.addEventListener("scroll", displayNav);

	const whyBrianHeight = document.querySelector(".why-brian").offsetHeight
	document.querySelector(".clients").style.marginTop = whyBrianHeight + "px"

	const navIcon = document.getElementById("nav-icon-mobile");
	const topOfNavIcon = navIcon.offsetTop;
	
	function fixNavIcon() {
		if(window.scrollY >= topOfNavIcon) {
			document.querySelector(".navigation").classList.add('fixed-nav-icon');
		} else {
			document.querySelector(".navigation").classList.remove('fixed-nav-icon');
		}
	}

	window.addEventListener("scroll", fixNavIcon);

	function displayMobileMenu() {
		document.querySelector(".navigation").classList.toggle("open");
	}
	
	navIcon.addEventListener("click", displayMobileMenu);

	!function(l){function e(e){for(var r,t,n=e[0],o=e[1],u=e[2],f=0,i=[];f<n.length;f++)t=n[f],p[t]&&i.push(p[t][0]),p[t]=0;for(r in o)Object.prototype.hasOwnProperty.call(o,r)&&(l[r]=o[r]);for(s&&s(e);i.length;)i.shift()();return c.push.apply(c,u||[]),a()}function a(){for(var e,r=0;r<c.length;r++){for(var t=c[r],n=!0,o=1;o<t.length;o++){var u=t[o];0!==p[u]&&(n=!1)}n&&(c.splice(r--,1),e=f(f.s=t[0]))}return e}var t={},p={2:0},c=[];function f(e){if(t[e])return t[e].exports;var r=t[e]={i:e,l:!1,exports:{}};return l[e].call(r.exports,r,r.exports,f),r.l=!0,r.exports}f.m=l,f.c=t,f.d=function(e,r,t){f.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},f.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},f.t=function(r,e){if(1&e&&(r=f(r)),8&e)return r;if(4&e&&"object"==typeof r&&r&&r.__esModule)return r;var t=Object.create(null);if(f.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:r}),2&e&&"string"!=typeof r)for(var n in r)f.d(t,n,function(e){return r[e]}.bind(null,n));return t},f.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return f.d(r,"a",r),r},f.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},f.p="/";var r=window.webpackJsonp=window.webpackJsonp||[],n=r.push.bind(r);r.push=e,r=r.slice();for(var o=0;o<r.length;o++)e(r[o]);var s=n;a()}([])</script><script src="/static/js/1.3fe8f92f.chunk.js">

</script>
