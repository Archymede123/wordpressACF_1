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
								<div class="service-description--content">
									<p class="service-description--subtitle">Le spécialiste de l'anglais</p>
									<h1 class="service-description--title">La traduction professionnelle simplifiée</h1>
									<p class="service-description--text">
										Une traduction 100% humaine, flexible et rapide. 
										Nos Brians sont des traducteurs natifs et certifiés. 
										Echangez directement avec votre Brian via chat. 
										Maîtrisez votre budget et vos délais.
									</p>
									<a class="cta-main cta" href="#">créer un compte</a>
								</div>
								
								<div class="conversation-bubbles">
									<img src="../sass/assets/translation-bubble-bg_left.png" alt="">
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
								</div>
								<img src="#" alt="">
							</div>
						</div>
						<div class="why-brian">
							<h3 class="section-title">
								Pourquoi Mybrian ?
							</h3>
							<div class="why-brian--items">
								<div class="why-brian--item">
									<div class="why-brian--icon">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/icon_relationship.png" alt="" class="why-brian--icon__image">
									</div> 
									<h4 class="why-brian--title">Choisissez votre délai</h4>
									<p class="why-brian--text"> 
										Choisissez votre délai selon votre degré d'urgence.
										Le prix est calculé automatiquement.
									</p>
								</div>
								<div class="why-brian--item">
									<div class="why-brian--icon">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/icon_simplicity.png" alt="" class="why-brian--icon__image">
									</div> 
									<h4 class="why-brian--title">Relation directe client-traducteur</h4>
									<p class="why-brian--text"> 
										Interaction par chat avec le traducteur depuis votre mobile ou votre ordinateur.
									</p>
								</div>
								<div class="why-brian--item">
									<div class="why-brian--icon">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/icon_translation.png" alt="" class="why-brian--icon__image">
									</div> 
									<h4 class="why-brian--title">Simplicité d’utilisation</h4>
									<p class="why-brian--text"> 
										Postez, chattez, c’est traduit. Paiement par CB ou facturation mensuelle depuis un compte entreprise.
									</p>
								</div>
							</div>
							<a href="#" class="cta">voir la FAQ</a>
						</div>
						<div class="clients">
							<h3 class="section-title">
								Ils nous font confiance
							</h3>
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#testimonial1" role="tab" aria-controls="home" aria-selected="true">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/clients_logo/logo_1.png" alt="" class="clients--logo">
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
							<div class="blog-articles">
								<div class="blog-article">
									<img src="https://source.unsplash.com/random" alt="" class='blog-article--image'>
									<h6 class="blog-article--title">Un traducteur en chair et en os</h6>
									<p class="blog-article--text">Le job de traducteur indépendant ne s’improvise pas. Il y a, par exemple, un monde entre donner une vague idée du sens d’une phrase dans une langue et parler d’un sujet avec style et précision. C’est ce à quoi CSA (Common Sense Advisory) fait allusion en évoquant « Can’t read, won’t buy ».</p>
									<a href="#" class='next'>lire la suite ...</a>
								</div>
								<div class="blog-article">
									<img src="https://source.unsplash.com/random" alt="">
									<h6 class="blog-article--title">Un traducteur en chair et en os</h6>
									<p class="blog-article--text">Le job de traducteur indépendant ne s’improvise pas. Il y a, par exemple, un monde entre donner une vague idée du sens d’une phrase dans une langue et parler d’un sujet avec style et précision. C’est ce à quoi CSA (Common Sense Advisory) fait allusion en évoquant « Can’t read, won’t buy ».</p>
									<a href="#" class='next'>lire la suite ...</a>
								</div>
								<div class="blog-article">
									<img src="https://source.unsplash.com/random" alt="">
									<h6 class="blog-article--title">Un traducteur en chair et en os</h6>
									<p class="blog-article--text">Le job de traducteur indépendant ne s’improvise pas. Il y a, par exemple, un monde entre donner une vague idée du sens d’une phrase dans une langue et parler d’un sujet avec style et précision. C’est ce à quoi CSA (Common Sense Advisory) fait allusion en évoquant « Can’t read, won’t buy ».</p>
									<a href="#" class='next'>lire la suite ...</a>
								</div>
							</div>
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
