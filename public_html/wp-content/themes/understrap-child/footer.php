<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

							<div id="footer" class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
							<?php endif; ?>
							</div>

							<div id="footer" class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
							<?php endif; ?>
							</div>

							<div id="footer" class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : ?>
							<?php endif; ?>
							</div>

							<div style="clear-both"></div>

							<?php get_sidebar( 'footerfull' ); ?>


		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
