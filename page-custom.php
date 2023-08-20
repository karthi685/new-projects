<?php
/**
 * Template Name: Custom template for PHP
 */
$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-page' );

get_header();

$context = class_exists( 'WooCommerce', false ) && ( is_cart() || is_checkout() || is_account_page() ) ? 'woo-page' : 'single-page';
?>

<div class="<?php echo esc_attr( $container_class ); ?> single-page-container">
	<div class="row">
		<?php do_action( 'neve_do_sidebar', $context, 'left' ); ?>
		<div class="nv-single-page-wrap col">
			<?php
			/**
			 * Executes actions before the page header.
			 *
			 * @since 2.4.0
			 */
			do_action( 'neve_before_page_header' );

			/**
			 * Executes the rendering function for the page header.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			do_action( 'neve_page_header', $context );

			/**
			 * Executes actions before the page content.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			do_action( 'neve_before_content', $context );

			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					//get_template_part( 'template-parts/content', 'page' );
					?>
					
					
					
					<div class="other-doctors-tabs">
						<button class="tablinks all locationallbutton" onclick="getLocationDoctors(event, 'all')"> <img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow"> All</button>
						<button class="tablinks dubai" onclick="getLocationDoctors(event, 'dubai')"> <img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow"> Dubai</button>
						<button class="tablinks abudhabi" onclick="getLocationDoctors(event, 'abu-dhabi')"><img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow">Abu Dhabi</button>
						<button class="tablinks" onclick="getLocationDoctors(event, 'al-ain')"><img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow">Al Ain</button>
					</div>
					
					<div id = 'doctorsData' class="doctorsData docone-tab">
						
						</div>

<div id = 'doctorLocationTimings' class="doctorLocationData">
						
						</div>						
					
					
					
					
					
					
					
					<?php
					die();
				}
			} else {
				get_template_part( 'template-parts/content', 'none' );
			}

			/**
			 * Executes actions after the page content.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			do_action( 'neve_after_content', $context );
			?>
		</div>
		<?php do_action( 'neve_do_sidebar', $context, 'right' ); ?>
	</div>
</div>
<?php get_footer(); ?>
