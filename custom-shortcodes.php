<?php


/**
 * Generate breadcrumbs
 * @author Prasad
 */
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#8250;&nbsp;&nbsp;";
        the_category(' &bull; ');
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
}

add_shortcode('breadcrumb', 'get_breadcrumb');

function diwp_menu_shortcode($attr){
 
    $args = shortcode_atts(array(
 
                'name'  => '',
                'class' => ''
 
                ), $attr);
 
    return wp_nav_menu( array(
                'menu'             => $args['name'],
                'menu_class'    => $args['class']
            ));
}
add_shortcode('addmenu', 'diwp_menu_shortcode');

function get_dubai_doctors($attr){	
	$args = array(
    'post_type'=> 'doctor',
    'post_status' => 'publish',
	'post__not_in ' => array ( $attr['postid'] ),
	'doctor_categories' => 'doctor',
    'doctor_location' => 'dubai',
	'nopaging' => true,
	'orderby'        => 'menu_order',
    'order'    => 'ASC'
);              
$result = new WP_Query( $args );
	$doctorsList = '';
	if ( $result-> have_posts() ) { 
	
		$posts   = $result->posts;		
		$matches = array();
		
		foreach($posts as $valObj){
			if($valObj->ID != $attr['postid']){
				$matches[]=$valObj;
			}
		}

		$doctorsList .= "<div class='doctors-list'>";

		foreach ( $matches as $val ) { 
			$result->the_post();

			$post = $val;
			
			$job_role = get_field('job_role');
			$field 		= get_field_object('job_role', $post->ID);
			$job_role 	= $field['value'];
			$featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
			$doctorsList .= '<a href="'.get_permalink($post->ID).'">
							<div class="doctor">
							<div class="doctor-image"> <img src="'.esc_url($featured_img_url).'" alt="Doctor" > </div>
							<h3 class="doctor-name"> '.$post->post_title.' </h3>
							<p class="doctor-job-role">'.$job_role.'</p>
							</div>
							</a>';
		}
		$doctorsList .= '</div>';
		echo $doctorsList;
	}else{
		echo 'Doctors not avaialble.';
	} wp_reset_postdata();
	
}
add_shortcode('dubaidoctors', 'get_dubai_doctors');

function get_abu_dhabi_doctors($attr){	
	$args = array(
    'post_type'=> 'doctor',
    'post_status' => 'publish',
	'post__not_in ' => array ( $attr['postid'] ),
	'doctor_categories' => 'doctor',
	'nopaging' => true,
    'doctor_location' => 'abu-dhabi',
	'orderby'        => 'menu_order',
    'order'    => 'ASC'
);              
$result = new WP_Query( $args );
	$doctorsList = '';
	if ( $result-> have_posts() ) { 
	
		$posts   = $result->posts;		
		$matches = array();
		
		foreach($posts as $valObj){
			if($valObj->ID != $attr['postid']){
				$matches[]=$valObj;
			}
		}

		$doctorsList .= "<div class='doctors-list'>";

		foreach ( $matches as $val ) { 
			$result->the_post();

			$post = $val;
			
			$job_role = get_field('job_role');
			$field 		= get_field_object('job_role', $post->ID);
			$job_role 	= $field['value'];
			$featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
			$doctorsList .= '<a href="'.get_permalink($post->ID).'">
							<div class="doctor">
							<div class="doctor-image"> <img src="'.esc_url($featured_img_url).'" alt="Doctor" > </div>
							<h3 class="doctor-name"> '.$post->post_title.' </h3>
							<p class="doctor-job-role">'.$job_role.'</p>
							</div>
							</a>';
		}
		$doctorsList .= '</div>';
		echo $doctorsList;
	}else{
		echo 'Doctors not avaialble.';
	} wp_reset_postdata();
	
}
add_shortcode('abudhabidoctors', 'get_abu_dhabi_doctors');

function get_al_ain_doctors($attr){	
	$args = array(
    'post_type'=> 'doctor',
    'post_status' => 'publish',
	'post__not_in ' => array ( $attr['postid'] ),
	'doctor_categories' => 'doctor',
	'nopaging' => true,
    'doctor_location' => 'al-ain',
	'orderby'        => 'menu_order',
    'order'    => 'ASC'
);              
$result = new WP_Query( $args );
	$doctorsList = '';
	if ( $result-> have_posts() ) { 
	
		$posts   = $result->posts;		
		$matches = array();
		
		foreach($posts as $valObj){
			if($valObj->ID != $attr['postid']){
				$matches[]=$valObj;
			}
		}

		$doctorsList .= "<div class='doctors-list'>";

		foreach ( $matches as $val ) { 
			$result->the_post();

			$post = $val;
			
			$job_role = get_field('job_role');
			$field 		= get_field_object('job_role', $post->ID);
			$job_role 	= $field['value'];
			$featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
			$doctorsList .= '<a href="'.get_permalink($post->ID).'">
							<div class="doctor">
							<div class="doctor-image"> <img src="'.esc_url($featured_img_url).'" alt="Doctor" > </div>
							<h3 class="doctor-name"> '.$post->post_title.' </h3>
							<p class="doctor-job-role">'.$job_role.'</p>
							</div>
							</a>';
		}
		$doctorsList .= '</div>';
		echo $doctorsList;
	}else{
		echo 'Doctors not avaialble.';
	} wp_reset_postdata();
	
}
add_shortcode('alaindoctors', 'get_al_ain_doctors');

function get_all_doctors($attr){	
	$args = array(
    'post_type'=> 'doctor',
    'post_status' => 'publish',
	'post__not_in ' => array ( $attr['postid'] ),
	'doctor_categories' => 'doctor',
	'nopaging' => true,
    //'doctor_location' => 'al-ain',
	'orderby'        => 'menu_order',
    'order'    => 'ASC'
);              
$result = new WP_Query( $args );
	$doctorsList = '';
	if ( $result-> have_posts() ) { 
	
		$posts   = $result->posts;		
		$matches = array();
		
		foreach($posts as $valObj){
			if($valObj->ID != $attr['postid']){
				$matches[]=$valObj;
			}
		}

		$doctorsList .= "<div class='doctors-list'>";

		foreach ( $matches as $val ) { 
			$result->the_post();

			$post = $val;
			
			$job_role 	= get_field('job_role');
			$field 		= get_field_object('job_role', $post->ID);
			$job_role 	= $field['value'];
			$featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
			$doctorsList .= '<a href="'.get_permalink($post->ID).'">
							<div class="doctor">
							<div class="doctor-image"> <img src="'.esc_url($featured_img_url).'" alt="Doctor" > </div>
							<h3 class="doctor-name"> '.$post->post_title.' </h3>
							<p class="doctor-job-role">'.$job_role.'</p>
							</div>
							</a>';
		}
		$doctorsList .= '</div>';
		echo $doctorsList;
	}else{
		echo 'Doctors not avaialble.';
	} wp_reset_postdata();
	
}
add_shortcode('alldoctors', 'get_all_doctors');

// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function custom_PHP_breadcrumbs($attr) {
	//print_r($attr);
	$separator	= $attr['separator'];
	$home 		= $attr['home'];
	$last_title = $attr['title'];
	$page_name 	= $attr['page'];
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = Array("<a href=\"$base\">$home</a>");

    // Find out the index for the last value in our path array
    $last = end(array_keys($path));

    // Build the rest of the breadcrumbs
    foreach ($path AS $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

        // If we are not on the last index, then display an <a> tag
        if ($x != $last && !empty($page_name))
			if($page_name == $title){
				$breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
			}elseif($page_name != 'Management'){
				$crumb = strtolower($page_name);
				$breadcrumbs[] = "<a href=\"$base$crumb\">$page_name</a>";
			}else{
				$crumb = strtolower($page_name);
				$breadcrumbs[] = "<a href=\"$base$crumb\">Our management team</a>";
			}
        // Otherwise, just display the title (minus)
        else
            $breadcrumbs[] = $last_title;
		
		
		
		if(empty($page_name)){
			break;
		}
    }
    // Build our temporary array (pieces of bread) into one big string :)
    echo implode(' '.$separator .' ' , $breadcrumbs);
}

add_shortcode('breadcrumbs', 'custom_PHP_breadcrumbs');

function get_other_management_team($attr){	
	$args = array(
    'post_type'=> 'doctor',
    'post_status' => 'publish',
	'post__not_in ' => array ( $attr['postid'] ),
	'doctor_categories' => 'management',
	'orderby'        => 'menu_order',
    'order'    => 'ASC'
);              
$result = new WP_Query( $args );
	$doctorsList = '';
	if ( $result-> have_posts() ) { 
	
		$posts   = $result->posts;		
		$matches = array();
		
		foreach($posts as $valObj){
			if($valObj->ID != $attr['postid']){
				$matches[]=$valObj;
			}
		}

		$doctorsList .= "<div class='doctors-list'>";

		foreach ( $matches as $val ) { 
			$result->the_post();

			$post = $val;
			
			$job_role 	= get_field('job_role');
			$field 		= get_field_object('job_role', $post->ID);
			$job_role 	= $field['value'];
			$featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
			$doctorsList .= '<a href="'.get_permalink($post->ID).'">
							<div class="doctor">
							<div class="doctor-image"> <img src="'.esc_url($featured_img_url).'" alt="Doctor" > </div>
							<h3 class="doctor-name"> '.$post->post_title.' </h3>
							<p class="doctor-job-role">'.$job_role.'</p>
							</div>
							</a>';
		}
		$doctorsList .= '</div>';
		echo $doctorsList;
	}else{
		echo 'Doctors not avaialble.';
	} wp_reset_postdata();
	
}
add_shortcode('othermanagementteam', 'get_other_management_team');

function get_other_embryologists($attr){	
	$args = array(
    'post_type'=> 'doctor',
    'post_status' => 'publish',
	'post__not_in ' => array ( $attr['postid'] ),
	'doctor_categories' => 'embryologist',
	'orderby'        => 'menu_order',
    'order'    => 'ASC'
);              
$result = new WP_Query( $args );
	$doctorsList = '';
	if ( $result-> have_posts() ) { 
	
		$posts   = $result->posts;		
		$matches = array();
		
		foreach($posts as $valObj){
			if($valObj->ID != $attr['postid']){
				$matches[]=$valObj;
			}
		}

		$doctorsList .= "<div class='doctors-list'>";

		foreach ( $matches as $val ) { 
			$result->the_post();

			$post = $val;
			
			$job_role = get_field('job_role');
			$field 		= get_field_object('job_role', $post->ID);
			$job_role 	= $field['value'];
			$featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
			$doctorsList .= '<a href="'.get_permalink($post->ID).'">
							<div class="doctor">
							<div class="doctor-image"> <img src="'.esc_url($featured_img_url).'" alt="Doctor" > </div>
							<h3 class="doctor-name"> '.$post->post_title.' </h3>
							<p class="doctor-job-role">'.$job_role.'</p>
							</div>
							</a>';
		}
		$doctorsList .= '</div>';
		echo $doctorsList;
	}else{
		echo 'Doctors not avaialble.';
	} wp_reset_postdata();
	
}
add_shortcode('otherembryologists', 'get_other_embryologists');
?>