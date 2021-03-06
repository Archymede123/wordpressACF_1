<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">




			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

					<?php understrap_post_nav(); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->



</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
