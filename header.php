<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the page header div.
 *
 * @package Neve
 * @since   1.0.0
 */
?><!DOCTYPE html>
<?php

/**
 * Filters the header classes.
 *
 * @param string $header_classes Header classes.
 *
 * @since 2.3.7
 */
$header_classes = apply_filters( 'nv_header_classes', 'header' );

/**
 * Fires before the page is rendered.
 */
do_action( 'neve_html_start_before' );

?>
<html <?php language_attributes(); ?>>

<head>
	<?php
	/**
	 * Executes actions after the head tag is opened.
	 *
	 * @since 2.11
	 */
	do_action( 'neve_head_start_after' );
	?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

	<?php
	/**
	 * Executes actions before the head tag is closed.
	 *
	 * @since 2.11
	 */
	do_action( 'neve_head_end_before' );
	?>	
	<script type="text/javascript">
	
	function getDoctorLocationTimings(evt, location){
		
		tablinks = document.getElementsByClassName("doctorAnchor");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		evt.currentTarget.className += " active";
		
		/*jQuery.ajax({
			type: "post",
			url: "/wp-admin/admin-ajax.php", //this is wordpress ajax file which is already avaiable in wordpress
			data: {
				action:'get_location_timings', //this value is first parameter of add_action
				location: location
			},
			success: function(data){
				var div = document.getElementById('doctorLocationTimings');
				div.innerHTML = '';
				
				div.innerHTML = data;

				var i;
				var tabcontent = document.getElementsByClassName("citycontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}				

			}
		});*/
	}
	
	function getLocationDoctors(evt, cityName){
		var div = document.getElementById('doctorLocationTimings');
		div.innerHTML = '';
		
		var i, doctorsContent, tablinks;
		doctorsContent = document.getElementsByClassName("doctorsContent");
		for (i = 0; i < doctorsContent.length; i++) {
			doctorsContent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}
	
		jQuery(function($) {			
			$(document).ready(function($) {
					//$('.contact-us-form div p label').append('*');
					var width = $("body").width();
					//console.log(width);

			if (window.innerWidth > 900) {
					var jobRole = '';
					$(".doctors-access-doctors .doctors-list a").hover(function(){
						jobRole = $(this).find('.doctor-job-role').text();
						var a_href = $(this).attr('href');
						$(this).find('.doctor-job-role').text('').append('<a class="submit-a-referral" href="/patient-referral-form">Submit a referral</a><br><a class="know-more">Know more</a>');
						$(this).find('.know-more').attr("href", a_href);
					}, function(){
						$(this).find('.doctor-job-role').text(jobRole);
					});
			}
				var i = 0;
				$(".tabcontent").each(function(){
					if(i != 0){
						$(this).hide();
					}else{
						$(this).show();
					}
					i++;
  				});
				
				var j = 0;
				$(".tablinks").each(function(){
					if(j == 0){
						$(this).addClass('active');
						//not('.locationallbutton')
					}
					j++;
  				});
				
				var k = 0;
				$(".doctorsContent").each(function(){
					if(k != 0){
						$(this).hide();
					}else{
						$(this).show();
					}
					k++;
  				});
			});
		});
		
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function locationTimings(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("citycontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("doctorTimingsTablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

</script>
</head>

<body  <?php body_class(); ?> <?php neve_body_attrs(); ?> >
<?php
/**
 * Executes actions after the body tag is opened.
 *
 * @since 2.11
 */
do_action( 'neve_body_start_after' );
?>
<?php wp_body_open(); ?>
<div class="wrapper">
	<?php
	/**
	 * Executes actions before the header tag is opened.
	 *
	 * @since 2.7.2
	 */
	do_action( 'neve_before_header_wrapper_hook' );
	?>

	<header class="<?php echo esc_attr( $header_classes ); ?>" <?php echo ( neve_is_amp() ) ? 'next-page-hide' : ''; ?> >
		<a class="neve-skip-link show-on-focus" href="#content" >
			<?php echo __( 'Skip to content', 'neve' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</a>
		<?php

		/**
		 * Executes actions before the header ( navigation ) area.
		 *
		 * @since 1.0.0
		 */
		do_action( 'neve_before_header_hook' );

		if ( apply_filters( 'neve_filter_toggle_content_parts', true, 'header' ) === true ) {
			do_action( 'neve_do_header' );
		}

		/**
		 * Executes actions after the header ( navigation ) area.
		 *
		 * @since 1.0.0
		 */
		do_action( 'neve_after_header_hook' );
		?>
	</header>

	<?php
	/**
	 * Executes actions after the header tag is closed.
	 *
	 * @since 2.7.2
	 */
	do_action( 'neve_after_header_wrapper_hook' );
	?>


	<?php
	/**
	 * Executes actions before main tag is opened.
	 *
	 * @since 1.0.4
	 */
	do_action( 'neve_before_primary' );
	?>

	<main id="content" class="neve-main">

<?php
/**
 * Executes actions after main tag is opened.
 *
 * @since 1.0.4
 */
do_action( 'neve_after_primary_start' );

