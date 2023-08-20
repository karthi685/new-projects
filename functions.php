<?php
/**
 * Neve functions.php file
 *
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      17/08/2018
 *
 * @package Neve
 */
add_filter('https_ssl_verify', '__return_false'); 

define( 'NEVE_VERSION', '3.5.2' );
define( 'NEVE_INC_DIR', trailingslashit( get_template_directory() ) . 'inc/' );
define( 'NEVE_ASSETS_URL', trailingslashit( get_template_directory_uri() ) . 'assets/' );
define( 'NEVE_MAIN_DIR', get_template_directory() . '/' );
define( 'NEVE_BASENAME', basename( NEVE_MAIN_DIR ) );
define( 'NEVE_PLUGINS_DIR', plugin_dir_path( dirname( __DIR__ ) ) . 'plugins/' );

if ( ! defined( 'NEVE_DEBUG' ) ) {
	define( 'NEVE_DEBUG', false );
}
define( 'NEVE_NEW_DYNAMIC_STYLE', true );
/**
 * Buffer which holds errors during theme inititalization.
 *
 * @var WP_Error $_neve_bootstrap_errors
 */
global $_neve_bootstrap_errors;

$_neve_bootstrap_errors = new WP_Error();

if ( version_compare( PHP_VERSION, '7.0' ) < 0 ) {
	$_neve_bootstrap_errors->add(
		'minimum_php_version',
		sprintf(
		/* translators: %s message to upgrade PHP to the latest version */
			__( "Hey, we've noticed that you're running an outdated version of PHP which is no longer supported. Make sure your site is fast and secure, by %1\$s. Neve's minimal requirement is PHP%2\$s.", 'neve' ),
			sprintf(
			/* translators: %s message to upgrade PHP to the latest version */
				'<a href="https://wordpress.org/support/upgrade-php/">%s</a>',
				__( 'upgrading PHP to the latest version', 'neve' )
			),
			'7.0'
		)
	);
}
/**
 * A list of files to check for existance before bootstraping.
 *
 * @var array Files to check for existance.
 */

$_files_to_check = defined( 'NEVE_IGNORE_SOURCE_CHECK' ) ? [] : [
	NEVE_MAIN_DIR . 'vendor/autoload.php',
	NEVE_MAIN_DIR . 'style-main-new.css',
	NEVE_MAIN_DIR . 'assets/js/build/modern/frontend.js',
	NEVE_MAIN_DIR . 'assets/apps/dashboard/build/dashboard.js',
	NEVE_MAIN_DIR . 'assets/apps/customizer-controls/build/controls.js',
];
foreach ( $_files_to_check as $_file_to_check ) {
	if ( ! is_file( $_file_to_check ) ) {
		$_neve_bootstrap_errors->add(
			'build_missing',
			sprintf(
			/* translators: %s: commands to run the theme */
				__( 'You appear to be running the Neve theme from source code. Please finish installation by running %s.', 'neve' ), // phpcs:ignore WordPress.Security.EscapeOutput
				'<code>composer install --no-dev &amp;&amp; yarn install --frozen-lockfile &amp;&amp; yarn run build</code>'
			)
		);
		break;
	}
}

//this goes in functions.php near the top
function my_scripts_method() {
    // register your script location, dependencies and version
    // wp_register_style( 'custom_css', get_template_directory_uri() . '/custom_css/new-style.css', array());
    wp_register_style('custom_css',
    get_template_directory_uri() . '/custom_css/new-style.css', array(), rand(111,9999), 'all' );
	
	wp_register_style('assets/css',
    get_template_directory_uri() . '/assets/css/custom-style.css', array(), rand(100,9999), 'all' );

    wp_register_script('custom_script',
    get_template_directory_uri() . '/custom_js/jquery_test.js',
       array('jquery'), rand(100,9999), 'all' );
      
     // enqueue the script
     wp_enqueue_style('custom_css');
    wp_enqueue_script('custom_script');
      
      }
    add_action('wp_enqueue_scripts', 'my_scripts_method');

	function add_theme_scripts() {
		//wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), rand(111,9999), 'all' );
		wp_enqueue_style( 'style', '//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css', array(), rand(111,9999), 'all' );
		wp_enqueue_style ( 'assets/css', get_template_directory_uri () . '/assets/css/custom-style.css', array( 'style' ), rand(111,9999), 'all' );
		wp_enqueue_script( 'jquery-v-1', '//code.jquery.com/jquery-1.12.4.js', false );
		wp_enqueue_script( 'jquery-v-2', '//code.jquery.com/ui/1.12.1/jquery-ui.js', false );
	}
	add_action ( 'wp_enqueue_scripts', 'add_theme_scripts' );
/**
 * Adds notice bootstraping errors.
 *
 * @internal
 * @global WP_Error $_neve_bootstrap_errors
 */
 


function _neve_bootstrap_errors() {
	global $_neve_bootstrap_errors;
	printf( '<div class="notice notice-error"><p>%1$s</p></div>', $_neve_bootstrap_errors->get_error_message() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

if ( $_neve_bootstrap_errors->has_errors() ) {
	/**
	 * Add notice for PHP upgrade.
	 */
	add_filter( 'template_include', '__return_null', 99 );
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	add_action( 'admin_notices', '_neve_bootstrap_errors' );

	return;
}

/**
 * Themeisle SDK filter.
 *
 * @param array $products products array.
 *
 * @return array
 */
function neve_filter_sdk( $products ) {
	$products[] = get_template_directory() . '/style.css';

	return $products;
}

add_filter( 'themeisle_sdk_products', 'neve_filter_sdk' );
add_filter(
	'themeisle_sdk_compatibilities/' . NEVE_BASENAME,
	function ( $compatibilities ) {

		$compatibilities['NevePro'] = [
			'basefile'  => defined( 'NEVE_PRO_BASEFILE' ) ? NEVE_PRO_BASEFILE : '',
			'required'  => '2.1',
			'tested_up' => '2.5',
		];

		return $compatibilities;
	}
);
require_once 'globals/migrations.php';
require_once 'globals/utilities.php';
require_once 'globals/hooks.php';
require_once 'globals/sanitize-functions.php';
require_once get_template_directory() . '/start.php';

/**
 * If the new widget editor is available,
 * we re-assign the widgets to hfg_footer
 */
if ( neve_is_new_widget_editor() ) {
	/**
	 * Re-assign the widgets to hfg_footer
	 *
	 * @param array  $section_args The section arguments.
	 * @param string $section_id The section ID.
	 * @param string $sidebar_id The sidebar ID.
	 *
	 * @return mixed
	 */
	function neve_customizer_custom_widget_areas( $section_args, $section_id, $sidebar_id ) {
		if ( strpos( $section_id, 'widgets-footer' ) ) {
			$section_args['panel'] = 'hfg_footer';
		}

		return $section_args;
	}

	add_filter( 'customizer_widgets_section_args', 'neve_customizer_custom_widget_areas', 10, 3 );
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}
function get_location_timings() {
	$location = $_REQUEST['location'];
	$clinic_location = strtolower($location);
	$clinic_location = str_replace(' ', '-', $clinic_location);
	
	$args = array(
	'post_type'=> 'clinics',
	'post_status' => 'publish',
	'no_found_rows' => true,
	'nopaging' => true,
	'location' => $clinic_location,
	'orderby'  => 'menu_order',
	'order'    => 'ASC'
	);
              
	$result = new WP_Query( $args );

	if ( $result-> have_posts() ) {
		//$title = esc_html( get_the_title() );
		//$sub_location_tabs = '<div class="location-info">';
		//echo $sub_location_title;die();
		$sub_location_tabs = '<div><h1 class="visit-hours-title"> Please select the clinic you would like to visit</h1></div>
							<div class="sub-locations-tabs">';
		$sub_locations_html = '<div class="sub-locations-content">';

		$k = 0;
		while ( $result->have_posts() ) {

			$result->the_post();

			$post	= get_post();


			$address		= get_field_object('address');
			$toll_free		= get_field_object('toll_free');
			$fax 			= get_field_object('fax');
			$email 			= get_field_object('email');
			$openTimeMonFri = get_field_object('open_time_-_mon_to_fri');
			$openTimeSat 	= get_field_object('open_time_-_saturday');
			$openTimeSun 	= get_field_object('open_time_-_sunday');

			$location 			= wp_get_post_terms($post->ID, 'sub_location');

			 			
				$sub_location_name 		= ($k == 0) ? get_the_title($post->ID) . ' Facility' : get_the_title($post->ID);
			
				
				$sub_location 	= strtolower($sub_location_name);
				$sub_location 	= str_replace(' ', '', $sub_location);
						
	$sub_location_tabs .= "<button class='doctorTimingsTablinks' onclick = 'locationTimings(event, \"$sub_location\")'>$sub_location_name</button>";

				$sub_locations_html .= '
										<div id="'.$sub_location.'" class="citycontent">
												<input class="locName" type="radio" name="branchVisit" value="'.$sub_location_name.'"></input>
												<!-- div class="location-address"><div><label>'. $address['label'] .': </label><p>'. $address['value'] .'</p></div>
												<div><label>'. $toll_free['label'] .': </label><p>'. $toll_free['value'] .'</p></div>
												<div><label>'. $fax['label'] .': </label><p>'. $fax['value'] .'</p></div>
												<div><label>'. $email['label'] .': </label><p><a href="mailto:'. $email['value'] .'">'. $email['value'] .'</a></p></div></div-->
												<div class="location-opening-hours">
													<!-- div class="clinic-opening-hours">Clinic opening hours:</div-->
													<div class="mon-fri-timings"><label> Monday - Friday </label><p>'. $openTimeMonFri['value'] .'</p></div>
													<div class="satureday-timings"><label> Saturday </label><p>'. $openTimeSat['value'] .'</p></div>
													<div class="sunday-timings"><label> Sunday </label><p>'. $openTimeSun['value'] .'</p></div>
												</div>
										</div>';
			
			$k++;
		} 
		echo $sub_location_tabs . '</div>' . $sub_locations_html . '</div>'; die();
	}
	wp_reset_postdata();	
}
add_action( 'wp_ajax_nopriv_get_location_timings', 'get_location_timings' );
add_action( 'wp_ajax_get_location_timings', 'get_location_timings' );

function get_data() {
	$city = $_REQUEST['city'];
	
	$args = array(
    'post_type'=> 'doctor',
    'post_status' => 'publish',
	'doctor_categories' => 'doctor',
	'no_found_rows' => true,
	'nopaging' => true,
	'orderby'        => 'menu_order',
    'order'    => 'ASC'
);              
	
	if($city != 'all'){
		$args['doctor_location'] = $city;
	}
	
	//print_r($args);die();
$result = new WP_Query( $args );
	$doctorsList = '';
	//$doctorsList .= "<button class='tablinks' onclick='openCity(event, \"Dubai\")'>Test</button>";
	if ( $result-> have_posts() ) { 
	
		$posts   = $result->posts;		
		//$city = str_replace("-", " ", $city);
		//$city = ucwords($city);
		//<div class='location-doctors-title'><h1>Clinical experts from ".$city."</h1></div>
		$doctorsList .= "<div class='doctors-title'><h1>Doctors</h1></div>
						<div class='doctors-list'>";

		foreach ( $posts as $val ) { 
			$result->the_post();

			$post = $val;
			
			$job_role = get_field('job_role');
			$featured_img_url	= get_the_post_thumbnail_url($post->ID,'full');
			$doctor_location	= wp_get_post_terms($post->ID, 'doctor_location', array( 'fields' => 'names' ));
			$doctor_location	= $doctor_location[0];
			//get_permalink($post->ID)
			$doctorsList .= "<a class = 'doctorAnchor' onclick='getDoctorLocationTimings(event, \"$doctor_location\")'>
							<input class='doctorName' type='radio' name='drName' value='".$post->post_title."'></input>
							<div class='doctor'>
							<div class='doctor-image'> <img src='".esc_url($featured_img_url)."' alt='Doctor' > </div>
							<h3 class='doctor-name'> ".$post->post_title." </h3>
							<p class='doctor-job-role'>".$job_role."</p>
							</div>
							</a>";
		}
		$doctorsList .= '</div>';
		echo $doctorsList;
	}else{
		echo 'Doctors not avaialble.';
	} wp_reset_postdata();
	
    //wp_die();  
	die();
}

add_action( 'wp_ajax_nopriv_get_data', 'get_data' );
add_action( 'wp_ajax_get_data', 'get_data' );

/*
CHANGE SLUGS OF CUSTOM POST TYPES
*/
/*
function change_post_types_slug( $args, $post_type ) {
   
   if ( 'doctors' === $post_type ) {
      $args['rewrite']['slug'] = 'doctor';
   }

   return $args;
}
add_filter( 'register_post_type_args', 'change_post_types_slug', 10, 2 );
*/
/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
/* function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        //echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        //the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&#8250;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
} */
include('custom-shortcodes.php');
require_once get_template_directory() . '/header-footer-grid/loader.php';
