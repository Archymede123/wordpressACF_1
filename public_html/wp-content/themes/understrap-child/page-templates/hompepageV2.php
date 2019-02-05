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
										<?php 
											$link = get_field('menu_mobile_link_1');
											if( $link ): ?>
												<a class="navigation__link" href="<?php echo $link; ?>"><?php the_field('menu_mobile_label_1');?></a>
										<?php endif; ?>
									</li>
									<li class="navigation__item">
										<?php 
											$link = get_field('menu_mobile_link_2');
											if( $link ): ?>
												<a class="navigation__link" href="<?php echo $link; ?>"><?php the_field('menu_mobile_label_2');?></a>
										<?php endif; ?>
									</li>
									<li class="navigation__item">
										<?php 
											$link = get_field('menu_mobile_link_3');
											if( $link ): ?>
												<a class="navigation__link" href="<?php echo $link; ?>"><?php the_field('menu_mobile_label_3');?></a>
										<?php endif; ?>
									</li>
									<li class="navigation__item">
										<?php 
											$link = get_field('menu_mobile_link_4');
											if( $link ): ?>
												<a class="navigation__link" href="<?php echo $link; ?>"><?php the_field('menu_mobile_label_4');?></a>
										<?php endif; ?>
									</li>
									<li class="navigation__item">
										<?php 
											$link = get_field('menu_mobile_link_5');
											if( $link ): ?>
												<a class="navigation__link" href="<?php echo $link; ?>"><?php the_field('menu_mobile_label_5');?></a>
										<?php endif; ?>
									</li>
									
								</ul>
							</nav>
						</div>
			
						<div class="landing-page">
							<div class="mobile-alert">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/logo_mybrian_pink_small.png" alt="" class="mobile-alert-logo">
								<div class="mobile-alert-content">
									<p class="mobile-alert-title"><?php the_field('mobile_promotion_header_title');?></p>
								<p class="mobile-alert-text" ><?php the_field('mobile_promotion_content');?></p>
								</div>
								<a href="#" class="mobile-alert-btn" id="mobile-alert-link"><p><?php the_field('mobile_promotion_header_cta_label');?></p></a>
							</div>
							
							<div class="service-description">
								<?php 
									$link = get_field('homepage_myaccount_button_link');
									if( $link ): ?>							
										<a class="cta-header mobile" href="<?php echo $link; ?>"><?php the_field('homepage_myaccount_button_label');?></a>
								<?php endif; ?>
								<?php 
									$image = get_field('quote_1_image');
									if( !empty($image) ): ?>
									<img src="<?php echo $image['url']; ?>" class="logo" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
								<?php 
									$image = get_field('quote_1_image');
									$imageID = $image['ID'];
									echo wp_get_attachment_image( $imageID, 'full', false, array( 'class' => 'lazyload logo', 'data-sizes' => 'auto' ) );
								?>
								
								<div class="service-description--content">
									
									<span class="service-description--subtitle"><?php the_field('homepage_surtitre');?></span>
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
								<?php 
									$link = get_field('homepage_myaccount_button_link');
									if( $link ): ?>							
										<a class="cta-header" href="<?php echo $link; ?>"><?php the_field('homepage_myaccount_button_label');?></a>
								<?php endif; ?>
								
								<div class="quick-quotation--tool">
									<div id="root">
										<!-- <div class="App_App__2lytX"><div class="App_Header__3jkzR" style="
    											text-align: center;"><h3>Obtenez un devis en quelques secondes</h3></div><div class="App_Step__19vbB"><div class="Step_Container__wHBft"><div class="Step_Title__3GiJu"><p class="Step_Number__1QvLN">1</p><p class="Step_TitleText__1_fYQ">Chargez votre fichier</p></div><p class="Step_Content__3IwdX">Formats acceptés :  .xlsx  .pptx .docx</p></div><div class="App_Action__1NgpF"><div class="App_FileInfo__3Rw_5" aria-disabled="false" style="position: relative;"><div class="UploadField_DragPrompt__1aH3X"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAQCAYAAAAS7Y8mAAAAAXNSR0IArs4c6QAAAjxJREFUOBGVVF1IFFEUPufO6K41tbqIkruYUqyR0g9BBBpYT+G21sv20kuvkbb6ENLbKgT5ELGGzz3082IvIexDP5BBpEaEEP1sGYRuD63gT0Q1OzOney/ONJOzg56Hued+5/u+mXNm7iiwyWhPZ7VQ+2Fl7d20sRkJBpFazg60lHVjAAjOEdAuQLS44DMhPNJYaLgweWOpkr6icVOyrxcsuseFmp8YEVcYsAsL+bGHvnU/sDmV6TJMcwqImF/dxrj5LwTlxGI+N2Nj9qraiVh567V6uXzKMI3rvH2P6Z5Yg6TOF787EiKqATTvcCDhgOuJM4pYsv8ib/0mn2Xof5IwnRjNSDg9lAO3uQCZyroXJ29NuXWK2MSTl4aIm/LU04Go2aaN0QhoNWHo6ToET2bewvKPn6IsgwiO7dx7NFqfOP515dPLVQGy3am+VrIgKxk+l1hDFB48/TdCkQvME0T7eKcjOv2ei5++3CNqzDQxRQBhD9G1ef7mAzx7/d5BRC4wv+A+EbLMu629mUbVAjrgR3Jjf3QDiqVlCYk8KPhY6nTDOC9mWgoidh5MgKoocCV3X9K0bWEQ2Iu5QoAMO1SG+Mrit6kU9ZEdUF3lfad6OfipkXABu7NZtTC7NM0Pw5FK5lvECRXolN9x85n+/aZOj/mbbdqiyUY6wti3/HhGfserH2dLdW0nbxPotfxHI45YZKMiEOH/JZhnDK8W8+PXBNM5eW5ZPD0YtXTc7saC8nB11dqXiVF5MGzeX6Mow//21QIRAAAAAElFTkSuQmCC" alt="fichier"><p>Déposez votre<br> fichier à traduire <br>ici</p></div><p class="UploadField_Grow__2q3Sc">ou</p><div class="UploadField_Button__2iO5W"><p>ajouter un fichier</p></div><input accept="application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,text/plain,text/richtext" type="file" multiple="" autocomplete="off" style="position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; opacity: 1e-05; pointer-events: none;"></div><div class="FileInfo_Holder__3KO98"><dl><dt>Votre fichier :</dt><dd>monfichierdetraduction.docx</dd><dt>Nombre de mot :</dt><dd><span>200 mots</span></dd></dl></div></div></div><div class="App_Step__19vbB"><div class="Step_Container__wHBft"><div class="Step_Title__3GiJu"><p class="Step_Number__1QvLN">2</p><p class="Step_TitleText__1_fYQ">Choisissez le prix</p></div><p class="Step_Content__3IwdX">Faites glisser le curseur pour ajuster votre ratio temps / prix idéal</p></div><div class="App_Action__1NgpF"><div class="App_PriceTime__2hGCi"><dl class="PriceDisplay_Container__35VZx"><dt><span>Prix</span></dt><dd>31,50 &lrm;€</dd></dl><dl class="TimeDisplay_Container__3rdoo"><dt>Livraison</dt><dd>mardi à 09:30</dd></dl></div><div class="TimePickerField_Container__dUDYA"><div class="section-slider__slider"><div class="rc-slider rc-slider-with-marks"><div class="rc-slider-rail" style="background-color: rgb(26, 73, 107);"></div><div class="rc-slider-track" style="background-color: rgb(246, 68, 107); left: 0%; width: 50%;"></div><div class="rc-slider-step"><span class="rc-slider-dot rc-slider-dot-active" style="left: 0%;"></span><span class="rc-slider-dot" style="left: 100%;"></span></div><div tabindex="0" class="rc-slider-handle" role="slider" aria-valuemin="0" aria-valuemax="80" aria-valuenow="40" aria-disabled="false" style="left: 50%;"></div><div class="rc-slider-mark"></div></div></div><div class="TimePickerField_Tips__gb-AY"><span class="TimePickerField_Fast__3mRXF">Rapide</span><span>Faites glisser le curseur</span><span class="TimePickerField_Cheap__2SOOi">Economique</span></div></div></div></div><div class="App_Step__19vbB"><div class="Step_Container__wHBft"><div class="Step_Title__3GiJu"><p class="Step_Number__1QvLN">3</p><p class="Step_TitleText__1_fYQ">Validez votre commande</p></div><p class="Step_Content__3IwdX">Créez un compte et confirmez votre commande</p></div><div class="App_Action__1NgpF App_Continue__3oQ2B"><div class="Button_Outline__69mNc">Commander ma traduction</div></div></div></div> -->
									</div>
									
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/brian-icon-large.png" alt="" class="brian-icon-large">
								</div>
								<img src="#" alt="">
							</div>
						</div>
						<div class="why-brian">
							<h2 class="section-title">
								<?php the_field('whybrian_title');?>
							</h2>
							<div class="why-brian--items">
								<div class="why-brian--item">
									<div class="why-brian--icon">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/icon_translation.png" alt="" class="why-brian--icon__image">
									</div>
									<h3 class="why-brian--title"><?php the_field('whybrian_item_1_title');?></h3>
									<p class="why-brian--text"> 
										<?php the_field('whybrian_item_1_content');?>
									</p>
								</div>
								<div class="why-brian--item">
									<div class="why-brian--icon">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/icon_relationship.png" alt="" class="why-brian--icon__image">
									</div> 
									<h3 class="why-brian--title"><?php the_field('whybrian_item_2_title');?></h3>
									<p class="why-brian--text"> 
										<?php the_field('whybrian_item_2_content');?>
									</p>
								</div>
								<div class="why-brian--item">
									<div class="why-brian--icon">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/icon_simplicity.png" alt="" class="why-brian--icon__image">
									</div> 
									<h3 class="why-brian--title"><?php the_field('whybrian_item_3_title');?></h3>
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
							<h2 class="section-title">
								<?php the_field('quote_section_title');?>
							</h2>
							<ul class="nav nav-tabs desktop-only" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#testimonial1" role="tab" aria-controls="home"
										aria-selected="true">
										<?php 
											$image = get_field('quote_1_image');
											if( !empty($image) ): ?>
											<img src="<?php echo $image['url']; ?>" class="clients--logo" alt="<?php echo $image['alt']; ?>" />
										<?php endif; ?>
										<?php 
											$image = get_field('quote_1_image');
											$imageID = $image['ID'];
											echo wp_get_attachment_image( $imageID, 'full', false, array( 'class' => 'lazyload clients--logo', 'data-sizes' => 'auto' ) );
										 ?>
										 <!-- <img src="<?php echo $image['url']; ?>" class="clients--logo" alt="<?php echo $image['alt']; ?>" /> -->
										<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/clients_logo/logo_1.png" alt="" class="clients--logo"> -->
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#testimonial2" role="tab" aria-controls="profile"
										aria-selected="false">
										<?php 
											$image = get_field('quote_2_image');
											if( !empty($image) ): ?>
											<img src="<?php echo $image['url']; ?>" class="clients--logo" alt="<?php echo $image['alt']; ?>" />
										<?php endif; ?>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#testimonial3" role="tab" aria-controls="contact"
										aria-selected="false">
										<?php 
											$image = get_field('quote_3_image');
											if( !empty($image) ): ?>
											<img src="<?php echo $image['url']; ?>" class="clients--logo" alt="<?php echo $image['alt']; ?>" />
										<?php endif; ?>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#testimonial4" role="tab" aria-controls="contact"
										aria-selected="false">
										<?php 
											$image = get_field('quote_4_image');
											if( !empty($image) ): ?>
											<img src="<?php echo $image['url']; ?>" class="clients--logo" alt="<?php echo $image['alt']; ?>" />
										<?php endif; ?>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#testimonial5" role="tab" aria-controls="contact"
										aria-selected="false">
										<?php 
											$image = get_field('quote_5_image');
											if( !empty($image) ): ?>
											<img src="<?php echo $image['url']; ?>" class="clients--logo" alt="<?php echo $image['alt']; ?>" />
										<?php endif; ?>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#testimonial6" role="tab" aria-controls="contact"
										aria-selected="false">
										<?php 
											$image = get_field('quote_6_image');
											if( !empty($image) ): ?>
											<img src="<?php echo $image['url']; ?>" class="clients--logo" alt="<?php echo $image['alt']; ?>" />
										<?php endif; ?>
									</a>
								</li>
							</ul>
							<div class="tab-content desktop-only" id="myTabContent">
								<div class="tab-pane fade show active" id="testimonial1" role="tabpanel" aria-labelledby="home-tab">
									<p class="clients--quote"><?php the_field('quote_1_content');?></p>
									<p class="clients--name"><?php the_field('quote_1_name');?></p>
									<p class="clients--role"><?php the_field('quote_1_titre');?> 
										<?php 
											$link = get_field('quote_1_link');
											if( $link ): ?>
												<a href="<?php echo $link; ?>">chez <?php the_field('quote_1_company');?></a>
										<?php endif; ?>
									</p>
								</div>
								<div class="tab-pane fade" id="testimonial2" role="tabpanel" aria-labelledby="profile-tab">
									<p class="clients--quote"><?php the_field('quote_2_content');?></p>
									<p class="clients--name"><?php the_field('quote_2_name');?></p>
									<p class="clients--role"><?php the_field('quote_2_titre');?>
										<?php 
											$link = get_field('quote_2_link');
											if( $link ): ?>
												<a href="<?php echo $link; ?>">chez <?php the_field('quote_2_company');?></a>
										<?php endif; ?>
									</p>
								</div>
								<div class="tab-pane fade" id="testimonial3" role="tabpanel" aria-labelledby="contact-tab">
									<p class="clients--quote"><?php the_field('quote_3_content');?></p>
									<p class="clients--name"><?php the_field('quote_3_name');?></p>
									<p class="clients--role"><?php the_field('quote_3_titre');?>
										<?php 
											$link = get_field('quote_3_link');
											if( $link ): ?>
												<a href="<?php echo $link; ?>">chez <?php the_field('quote_3_company');?></a>
										<?php endif; ?>
									</p>
								</div>
								<div class="tab-pane fade" id="testimonial4" role="tabpanel" aria-labelledby="contact-tab">
									<p class="clients--quote"><?php the_field('quote_4_content');?></p>
									<p class="clients--name"><?php the_field('quote_4_name');?></p>
									<p class="clients--role"><?php the_field('quote_4_titre');?>
										<?php 
											$link = get_field('quote_4_link');
											if( $link ): ?>
												<a href="<?php echo $link; ?>">chez <?php the_field('quote_4_company');?></a>
										<?php endif; ?>
									</p>
								</div>
								<div class="tab-pane fade" id="testimonial5" role="tabpanel" aria-labelledby="contact-tab">
									<p class="clients--quote"><?php the_field('quote_5_content');?></p>
									<p class="clients--name"><?php the_field('quote_5_name');?></p>
									<p class="clients--role"><?php the_field('quote_5_titre');?>
										<?php 
											$link = get_field('quote_5_link');
											if( $link ): ?>
												<a href="<?php echo $link; ?>">chez <?php the_field('quote_5_company');?></a>
										<?php endif; ?>
									</p>
								</div>
								<div class="tab-pane fade" id="testimonial6" role="tabpanel" aria-labelledby="contact-tab">
									<p class="clients--quote"><?php the_field('quote_6_content');?></p>
									<p class="clients--name"><?php the_field('quote_6_name');?></p>
									<p class="clients--role"><?php the_field('quote_6_titre');?>
										<?php 
											$link = get_field('quote_6_link');
											if( $link ): ?>
												<a href="<?php echo $link; ?>">chez <?php the_field('quote_6_company');?></a>
										<?php endif; ?>
									</p>
								</div>
							</div>
							<div class="mobile-only tab-pane fade show active" id="testimonial1" role="tabpanel" aria-labelledby="home-tab">
								<p class="clients--quote">"<?php the_field('client_quote');?>"</p>
								<p class="clients--name"><?php the_field('client_name');?></p>
								<p class="clients--role"><?php the_field('client_role');?></p>
								<?php 
									$image = get_field('client_logo');
									$link = get_field('client_logo_link');
									if( !empty($image) ): ?>
									<a href="<?php echo $link; ?>">
										<img src="<?php echo $image['url']; ?>" class="clients--logo" alt="<?php echo $image['alt']; ?>" />
									</a>
								<?php endif; ?>
							</div>
						</div>
						<div class="partners">
							<h2 class="section-title">
								<?php the_field('partner_section_title');?>
							</h2>
							<div class="partners--logos">
								<?php 
									$image = get_field('partner_1_image');
									$link = get_field('partner_1_link');
									if( !empty($image) ): ?>
									<div class="partner--logo__container">
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="partner--logo" alt="<?php echo $image['alt']; ?>" />
										</a>	
									</div>
								<?php endif; ?>
								<?php 
									$image = get_field('partner_2_image');
									$link = get_field('partner_2_link');	
									if( !empty($image) ): ?>
									<div class="partner--logo__container">
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="partner--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
									</div>
								<?php endif; ?>
								<?php 
									$image = get_field('partner_3_image');
									$link = get_field('partner_3_link');		
									if( !empty($image) ): ?>
									<div class="partner--logo__container">
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="partner--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
									</div>
								<?php endif; ?>
								<?php 
									$image = get_field('partner_4_image');
									$link = get_field('partner_4_link');	
									if( !empty($image) ): ?>
									<div class="partner--logo__container">
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="partner--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
									</div>
								<?php endif; ?>
								<?php 
									$image = get_field('partner_5_image');
									$link = get_field('partner_5_link');	
									if( !empty($image) ): ?>
									<div class="partner--logo__container">
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="partner--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
									</div>
								<?php endif; ?>
							</div>
								<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_EACM.png" alt="" class="partner--logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_Big_Booster.png" alt="" class="partner--logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_bpi.png" alt="" class="partner--logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/partners_logo/logo_french_tech.png" alt="" class="partner--logo"> -->
						</div>
						
						<div class="blog-preview">
							<h2 class="section-title">
								<?php the_field('blog-preview_section_title');?>
							</h2>
							<?php dynamic_sidebar( 'recent-posts-homepage' ); ?>
							<?php 
								$link = get_field('blog-preview_cta_link');
								if( $link ): ?>			
								<a class="cta" href="<?php echo $link; ?>"><?php the_field('blog-preview_cta_label');?></a>
							<?php endif; ?>
						</div>
						<div class="app-download">
							<h2 class="section-title">
								<?php the_field('mobile-app_section_title');?>
							</h2>
							<p class='app-download--text'><?php the_field('mobile-app_description');?></p>
							<div class="stores--logos">
								<?php 
									$image = get_field('apple_store_icon');
									$link = get_field('apple_store_app_link');	
									if( !empty($image) ): ?>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="stores--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
								<?php endif; ?>
								<?php 
									$image = get_field('android_store_icon');
									$link = get_field('android_store_app_link');	
									if( !empty($image) ): ?>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="stores--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
								<?php endif; ?>
								
							</div>
						</div>
						<div class="press-articles">
							<h2 class="section-title">
								<?php the_field('press_section_title');?>
							</h2>
							<div class="press--logos">
								
								<?php 
									$image = get_field('press_1_image');
									$link = get_field('press_1_link');
									if( !empty($image) ): ?>
									<div class="press--logo__container">
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="press--logo" alt="<?php echo $image['alt']; ?>" />
										</a>	
									</div>
								<?php endif; ?>
								
								<?php 
									$image = get_field('press_2_image');
									$link = get_field('press_2_link');	
									if( !empty($image) ): ?>
									<div class="press--logo__container">
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="press--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
									</div>
								<?php endif; ?>
								
								<?php 
									$image = get_field('press_3_image');
									$link = get_field('press_3_link');		
									if( !empty($image) ): ?>
									<div class="press--logo__container">
										<a href="<?php echo $link; ?>">											
											<img src="<?php echo $image['url']; ?>" class="press--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
									</div>
								<?php endif; ?>
								
								<?php 
									$image = get_field('press_4_image');
									$link = get_field('press_4_link');	
									if( !empty($image) ): ?>
									<div class="press--logo__container">
										<a href="<?php echo $link; ?>">											
											<img src="<?php echo $image['url']; ?>" class="press--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
									</div>
								<?php endif; ?>
								
								<?php 
									$image = get_field('press_5_image');
									$link = get_field('press_5_link');	
									if( !empty($image) ): ?>
									<div class="press--logo__container">
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $image['url']; ?>" class="press--logo" alt="<?php echo $image['alt']; ?>" />
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
                        

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->



</div><!-- Wrapper end -->

<?php get_footer(); ?>
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root"></div>
<script>
	!function(l){function e(e){for(var r,t,n=e[0],o=e[1],u=e[2],f=0,i=[];f<n.length;f++)t=n[f],p[t]&&i.push(p[t][0]),p[t]=0;for(r in o)Object.prototype.hasOwnProperty.call(o,r)&&(l[r]=o[r]);for(s&&s(e);i.length;)i.shift()();return c.push.apply(c,u||[]),a()}function a(){for(var e,r=0;r<c.length;r++){for(var t=c[r],n=!0,o=1;o<t.length;o++){var u=t[o];0!==p[u]&&(n=!1)}n&&(c.splice(r--,1),e=f(f.s=t[0]))}return e}var t={},p={2:0},c=[];function f(e){if(t[e])return t[e].exports;var r=t[e]={i:e,l:!1,exports:{}};return l[e].call(r.exports,r,r.exports,f),r.l=!0,r.exports}f.m=l,f.c=t,f.d=function(e,r,t){f.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},f.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},f.t=function(r,e){if(1&e&&(r=f(r)),8&e)return r;if(4&e&&"object"==typeof r&&r&&r.__esModule)return r;var t=Object.create(null);if(f.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:r}),2&e&&"string"!=typeof r)for(var n in r)f.d(t,n,function(e){return r[e]}.bind(null,n));return t},f.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return f.d(r,"a",r),r},f.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},f.p="/";var r=window.webpackJsonp=window.webpackJsonp||[],n=r.push.bind(r);r.push=e,r=r.slice();for(var o=0;o<r.length;o++)e(r[o]);var s=n;a()}([])
</script>
<script src="/static/js/1.3fe8f92f.chunk.js"></script>
<script src="/static/js/main.949c7fdb.chunk.js"></script>


<script>
	// const nav = document.querySelector(".navbar");
	

	// function displayNav() {
	// 	if(window.scrollY > 200) {
	// 		document.body.classList.add("fixed-nav");
	// 	} else {
	// 		document.body.classList.remove("fixed-nav");
	// 	}
	// }

	// window.addEventListener("scroll", displayNav);

	// const whyBrianHeight = document.querySelector(".why-brian").offsetHeight + 32
	// if (screen.width > 641) {
	// 	document.querySelector(".clients").style.marginTop = whyBrianHeight + "px"
	// }
	

	// const navIcon = document.getElementById("nav-icon-mobile");
	// const topOfNavIcon = navIcon.offsetTop;
	
	// function fixNavIcon() {
	// 	if(window.scrollY >= topOfNavIcon) {
	// 		document.querySelector(".navigation").classList.add("fixed-nav-icon");		
	// 	} else {
	// 		document.querySelector(".navigation").classList.remove("fixed-nav-icon");
	// 	} 
	// }
		
	// window.addEventListener("scroll", fixNavIcon);

	// function displayMobileMenu() {
	// 	document.querySelector(".navigation").classList.toggle("open");
	// }
	
	// navIcon.addEventListener("click", displayMobileMenu);

	// function getMobileOperatingSystem() {
	// 	console.log("yo")
	// 	var userAgent = navigator.userAgent || navigator.vendor || window.opera;
	// 	var link = document.getElementById("mobile-alert-link");

	// 	if (/android/i.test(userAgent)) {
	// 		link.setAttribute('href', "https://play.google.com/store/apps/details?id=fr.mybrian.MyBrian&hl=fr");
	// 	}

	// 	// iOS detection from: http://stackoverflow.com/a/9039885/177710
	// 	if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
	// 		link.setAttribute('href', "https://itunes.apple.com/us/app/mybrian/id1291722929?mt=8");
	// 	}
	// 	else {
	// 		link.setAttribute('href', "https://itunes.apple.com/us/app/mybrian/id1291722929?mt=8");
	// 	}
	// }

	// window.addEventListener("load", getMobileOperatingSystem);

	// !function(l){function e(e){for(var r,t,n=e[0],o=e[1],u=e[2],f=0,i=[];f<n.length;f++)t=n[f],p[t]&&i.push(p[t][0]),p[t]=0;for(r in o)Object.prototype.hasOwnProperty.call(o,r)&&(l[r]=o[r]);for(s&&s(e);i.length;)i.shift()();return c.push.apply(c,u||[]),a()}function a(){for(var e,r=0;r<c.length;r++){for(var t=c[r],n=!0,o=1;o<t.length;o++){var u=t[o];0!==p[u]&&(n=!1)}n&&(c.splice(r--,1),e=f(f.s=t[0]))}return e}var t={},p={2:0},c=[];function f(e){if(t[e])return t[e].exports;var r=t[e]={i:e,l:!1,exports:{}};return l[e].call(r.exports,r,r.exports,f),r.l=!0,r.exports}f.m=l,f.c=t,f.d=function(e,r,t){f.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},f.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},f.t=function(r,e){if(1&e&&(r=f(r)),8&e)return r;if(4&e&&"object"==typeof r&&r&&r.__esModule)return r;var t=Object.create(null);if(f.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:r}),2&e&&"string"!=typeof r)for(var n in r)f.d(t,n,function(e){return r[e]}.bind(null,n));return t},f.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return f.d(r,"a",r),r},f.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},f.p="/";var r=window.webpackJsonp=window.webpackJsonp||[],n=r.push.bind(r);r.push=e,r=r.slice();for(var o=0;o<r.length;o++)e(r[o]);var s=n;a()}([])
</script><script src="/static/js/1.3fe8f92f.chunk.js">


	

</script>
