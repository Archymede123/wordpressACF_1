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
						<!-- <?php the_field('home_page_title');?> -->
                        <div class="landing-page">
							
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
										<span class='conversation-bubbles--text'>J'ai besoin de Brian</span>
									</div>
									<div class="conversation-bubbles--bubble__second conversation-bubbles--bubble">
										<span class='conversation-bubbles--text'>Oui, dès maintenant</span>
									</div>
									
								</div>
							</div>
							<div class="quick-quotation">
								<div class="quick-quotation--tool">
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
								nos partenaires
							</h3>
							<div class="partners--logos">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_EACM.png" alt="" class="partner--logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_Big_Booster.png" alt="" class="partner--logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_bpi.png" alt="" class="partner--logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_french_tech.png" alt="" class="partner--logo">
							</div>
						</div>
						
						<div class="blog-preview">
							<h3 class="section-title">
								nos actualités
							</h3>
							<?php dynamic_sidebar( 'recent-posts-homepage' ); ?>
							<a href="#" class="cta">voir les autres articles</a>
						</div>
						<div class="app-download">
							<h3 class="section-title">
								Constamment en déplacement ? 
							</h3>
							<p class='app-download--text'>Téléchargez l’application MyBrian</p>
							<div class="stores--logos">
								<a href="#">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/downloadApp_logo/dispo_android.png" alt="" class="stores--logo">
								</a>
								<a href="#">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/downloadApp_logo/dispo_apple.png" alt="" class="stores--logo">
								</a>
							</div>
						</div>
                        

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			<!-- </div>#primary

		</div>.row end

	</div>Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

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
</script>
