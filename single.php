<?php					
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      28/08/2018
 *
 * @package Neve
 */

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-post' );

get_header();
$postType = get_post_type();

$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

$clinic_locationAr	= wp_get_post_terms(get_the_ID(), 'location', array( 'fields' => 'names' ));
$clinic_location = strtolower($clinic_locationAr[0]);
$clinic_location = str_replace(' ', '', $clinic_location);
$isMob = ($isMob) ? 'is_mobile' : 'is_desktop';

$customClass = '';
if($postType == 'miracle_babies'){ 
	$customClass = 'miracle-babies '.$isMob;
}

if($postType == 'doctor'){ 
	$customClass = 'doctor-profile '.$isMob;
}

if($postType == 'clinics'){ 
	$customClass = 'clinic-location '.$clinic_location;
}

?>
	<div class="<?php echo esc_attr( $container_class ); ?> single-post-container">
		<div class="row <?php echo $customClass; ?>">
			<?php 
				$doctor_categoryAr	= wp_get_post_terms(get_the_ID(), 'doctor_categories', array( 'fields' => 'names' ));
				//print_r($doctor_categoryAr);die();
				$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
				//print_r($postType);die('Hereaaaaaaaaaaaaaaaa');
				if($postType == 'doctor' && !in_array('Management', $doctor_categoryAr)) { ?>
					<div class='nv-sidebar-wrap col-xl-12 nv-right blog-sidebar doctors-left-menu'>
						<div class='left-side-bar'>
						<div class='menu-title phy-omttitle'>
							Our team
						</div>
							<?php echo do_shortcode('[addmenu name="Our medical team"]'); ?>
						</div>
					</div> 
			<?php }elseif(in_array('Management',$doctor_categoryAr)) {?>
					<div class='nv-sidebar-wrap col-xl-12 nv-right blog-sidebar doctors-left-menu'>
						<div class='left-side-bar'>
						<div class='menu-title phy-omttitle management-profile-left-menu'>
							Why Bourn Hall
						</div>
							<?php echo do_shortcode('[addmenu name="Why Bourn Hall"]'); ?>
						</div>
					</div>
			<?php }
			if($postType == 'post'){
				do_action( 'neve_do_sidebar', 'single-post', 'right' );
			}	
			
			?>			
			<article id="post-<?php echo esc_attr( get_the_ID() ); ?>"			
					class="<?php echo esc_attr( join( ' ', get_post_class( 'nv-single-post-wrap col' ) ) ); ?>">
					<div class="bradleftimg back_to_previous">
						<?php
							$title = esc_html( get_the_title() );
							/*if(isset($_SERVER['HTTP_REFERER']) and !empty($_SERVER['HTTP_REFERER']) and $isMob ){
								$go_back = htmlspecialchars($_SERVER['HTTP_REFERER']);
								$previous_page = $doctor_categoryAr[0];
								$back_to_previous	= "<a href='$go_back'>back to ".$previous_page."</a>";
							}else{
								$back_to_previous	= do_shortcode( '[breadcrumbs page = "'.$doctor_categoryAr[0].'" separator =   ›   home = Homepage title = "'.$title.'"]' );
							}*/
							
						?>
						<?php
							$previous_page = strtolower($doctor_categoryAr[0]);
							$base = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/';
							if($postType == 'miracle_babies'){
								$back_to_previous = "<a href=\"$base\">back to homepage</a>";
							}else{
								$back_to_previous = "<a href=\"$base$previous_page\">back to ".$previous_page." </a>";
							}
						?>
						<?php if($postType == 'miracle_babies'){ 
								echo do_shortcode( '[breadcrumbs page = "'.$doctor_categoryAr[0].'" separator =   ›   home = Homepage title = "Our miracle stories"]' ); 
								//echo do_shortcode('[wpseo_breadcrumb]'); 
								}?>
						<?php if($postType == 'doctor'){ 
							echo do_shortcode( '[breadcrumbs page = "'.$doctor_categoryAr[0].'" separator =   ›   home = Homepage title = "'.$title.'"]' );
							//echo $back_to_previous;
						} elseif($postType == 'clinics'){
							echo do_shortcode('[wpseo_breadcrumb]');
						}
						
						
						?>
							<script type="text/javascript">							
								jQuery(function($) {
									$(document).ready(function($) {										
										let isMobile = window.matchMedia("only screen and (max-width: 768px)").matches;
										var back_to_previous = '<?php echo $back_to_previous; ?>';
										if(isMobile){
											//$('.doctors-left-menu').hide();
											//$('.doctor-profile .bradleftimg, .miracle-babies .bradleftimg').text('');
											//$('.doctor-profile .bradleftimg, .miracle-babies .bradleftimg').append(back_to_previous);
										}
										
										$('.doctor-profile .left-side-bar').addClass('phy-leftmenu');
										var pageName = '<?php echo $doctor_categoryAr[0];?>';																			
										if(pageName === 'Doctors'){
											$('.doctor-profile .left-side-bar ul li:nth-child(1)').addClass('active');
										}else{
											$('.doctor-profile .left-side-bar ul li:nth-child(2)').addClass('active');
										}
									});
								});
							</script>
					</div>
					<?php
					// Check if the "mobile" word exists in User-Agent 
					//$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
					///if($isMob){ 
						//if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
							//$go_back = htmlspecialchars($_SERVER['HTTP_REFERER']);
							//$go_back = $_SERVER['SERVER_NAME'];?>
							<!--div class="back_to_home">
								<?php //echo "<a href='$go_back'>back to homepage</a>";?>
							</div-->
					<?php //}else{ ?>
						<!-- div class="bradleftimg">
							<?php //echo do_shortcode('[wpseo_breadcrumb]'); ?>
						</div -->
					<?php //}
				/**
				 *  Executes actions before the post content.
				 *
				 * @since 2.3.8
				 */
				if($postType == 'post'){
					do_action( 'neve_before_post_content' );
				}
				
				if ( have_posts() ) {
					$post = get_post();
					
					$specialization = '';
					$location = '';
					$spoken_language = '';
					$doctor_category = '';
					
					
					//$description = $post->post_content;
					$description = apply_filters('the_content', $post->post_content);
					//echo '<pre>'; print_r($post->menu_order);
					
					
					while ( have_posts() ) {
						the_post();					
						
						if($postType == 'doctor'){
						
							$locations 			= wp_get_post_terms($post->ID, 'doctor_location');
							//$spoken_languages	= wp_get_post_terms($post->ID, 'spoken_languages');
							$doctor_categories	= wp_get_post_terms($post->ID, 'doctor_categories');
							
							foreach($locations as $val){
								if(!empty($location)){
									$location .= ','.$val->name;
								}else{
									$location .= $val->name;
								}
								
							}
							/*foreach($spoken_languages as $val){
								if(!empty($spoken_language)){
									$spoken_language .= ','.$val->name;
								}else{
									$spoken_language .= $val->name;
								}
								
							}*/
							foreach($doctor_categories as $val){
								if(!empty($doctor_category)){
									$doctor_category .= ','.$val->name;
								}else{
									$doctor_category .= $val->name;
								}
								
							}
						}elseif($postType == 'post'){
							get_template_part( 'template-parts/content', 'single' );
						}
					}
					if($postType == 'doctor'){
						//Custom fields data
						$phone = get_field('phone');
						$email = get_field('email');
						$education = get_field('education');
						$specialization = get_field('specialization');
						$experience = get_field('experience');
						$certification = get_field('certification');
						$job_role = get_field('job_role');
						$nationality = get_field('nationality');
						$languages_spoken = get_field('languages_spoken');
						$clinic__location = get_field('clinic__location');
                        
						/*if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
							$go_back = htmlspecialchars($_SERVER['HTTP_REFERER']);
							echo "<a href='$go_back'>Back to doctor’s access</a>";
						}*/						
												
						?>  
						<!-- div class="breadcrumb"><?php //get_breadcrumb(); ?></div-->
						
						
				<div class="title"> <h1> <?php the_title(); ?> </h1></div>
						<div class="doctor-information">
	<div class='doctor-image'><?php the_post_thumbnail('large' ); ?></div>
	<div class='doctor-info'>
		<span class="job_role"> 
			<label for="job_role">Job role:</label>
			<p><?php echo $job_role; ?> </p>
		</span>
		<span class="specialisation">
			<?php if(in_array('Management', $doctor_categoryAr)) {?>
				<label for="specialisation">Areas of interest:</label>
			<?php }else{ ?>
				<label for="specialisation">Specialisation:</label>
			<?php } ?>
			<p><?php echo $specialization; ?></p>
		</span>
		<span class="education"> 
			<label for="education">Education:</label>
			<p><?php echo $education; ?></p>
		</span>
		<?php if(in_array('Doctors', $doctor_categoryAr)) {?>
				<span class='doctor-book-your-cons'><a href="/book-your-consultation/">Book your consultation  &nbsp;&nbsp;<img src="../../../wp-content/uploads/2023/04/Vector-2.svg" alt="Right arrow"></a></span>
		<?php } ?>
		
	</div>
</div>
						<div class='doctor-bio'>
						<span><label for="Bio"> Bio: </label></span>
						<?php echo $description; ?>
						</div>
				<?php if($postType == 'doctor' && (in_array('Doctors',$doctor_categoryAr) || in_array('Embryologists',$doctor_categoryAr))) { ?>
				<div class ='three-tabs'>
					<div class='natinality'>
						<span><img src="../../../wp-content/uploads/2023/04/Frame-32086.png" alt="Natinality"></span>
						<span>
							<h3>
								Nationality
							</h3>
							<p>
								<?php echo $nationality; ?>
							</p>
						</span>
					</div>
					<?php if(in_array('Doctors',$doctor_categoryAr)) { ?>
						<div class='clinic-location'>
							<span><img src="../../../wp-content/uploads/2023/04/Frame-32087.png" alt="Clinic Location"></span>
							<span>
								<h3>
								Clinic location
								</h3>
								<p>
								<?php 
									if($clinic__location){
										echo $clinic__location;
									}else{
										echo $location;
									}
								 ?>
								</p>
							</span>						
						</div>
					<?php } ?>
					<div class='languages-spoken'>
						<span><img src="../../../wp-content/uploads/2023/04/Frame-32087-1.png" alt="Languages Spoken"></span>
						<span>
							<h3>
								Languages spoken
							</h3>
							<p>
							<?php echo $languages_spoken; ?>
							</p>
						</span>
					</div>
				</div>
				<?php } ?>
				<div class='other-doctors-title'>
					<?php 
						$doctor_category = explode(',', $doctor_category);
						if(in_array('Doctors', $doctor_category)){
							echo '<h3>Other doctors</h3>';
						}elseif(in_array('Embryologists', $doctor_category)){
							echo '<h3>Other members of the embryology team</h3>';
						}elseif(in_array('Management', $doctor_category)){
							echo '<h3>Other management team members</h3>';
						}
					?>
				</div>
				<?php
					if(in_array('Embryologists', $doctor_category)){ ?>
						<div class='doctors-content'>
							<div class="other-embryologists docone-tab">
								<?php echo do_shortcode( '[otherembryologists postid = '.get_the_ID().']' ); ?>
							</div>
						</div>
					<?php }elseif(in_array('Management', $doctor_category)){ ?>
						<div class='doctors-content'>
							<div class="other-managementteam docone-tab">
								<?php echo do_shortcode( '[othermanagementteam postid = '.get_the_ID().']' ); ?>
							</div>
						</div>
					<?php }
				?>
				
				<?php if(in_array('Doctors', $doctor_category)){ ?>
					<div class="other-doctors-tabs">
						<button class="tablinks all" onclick="openCity(event, 'all')"> <img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow"> All</button>
						<button class="tablinks dubai" onclick="openCity(event, 'dubai')"> <img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow"> Dubai</button>
						<button class="tablinks abudhabi" onclick="openCity(event, 'abudhabi')"><img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow">Abu Dhabi</button>
						<button class="tablinks" onclick="openCity(event, 'alain')"><img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow">Al Ain</button>
					</div>
					<div class='doctors-content'>
						<div id="all" class="tabcontent docone-tab">
						<?php echo do_shortcode( '[alldoctors postid = '.get_the_ID().']' );
						//echo do_shortcode('[xyz-ips snippet="All-Doctors"]'); ?>
						</div>				

						<div id="dubai" class="tabcontent docone-tab">
						<?php echo do_shortcode( '[dubaidoctors postid = '.get_the_ID().']' ); 
						//echo do_shortcode('[xyz-ips snippet="Dubai-Doctors"]'); ?>
						</div>

						<div id="abudhabi" class="tabcontent docone-tab">
						<?php echo do_shortcode( '[abudhabidoctors postid = '.get_the_ID().']' );
						//echo do_shortcode('[xyz-ips snippet="Abu-Dhabi-Doctors"]'); ?> 
						</div>

						<div id="alain" class="tabcontent docone-tab">
						<?php echo do_shortcode( '[alaindoctors postid = '.get_the_ID().']' );
						//echo do_shortcode('[xyz-ips snippet="Al-Ain-Doctors"]'); ?>
						</div>
					</div>

					
					<?php
				}
					}elseif($postType == 'miracle_babies'){
						/*$args = array(
							'post_type'=> 'miracle_babies',
							'post_status' => 'publish',
							'meta_value'  => 'yes',
							'post__not_in' => array( get_the_ID() ),
							'orderby'        => 'menu_order',
							'order'    => 'ASC'
						);
						$result = new WP_Query( $args );*/
						
						$baby_name 		= get_field('baby_name');
						$baby_name_display 		= get_field('baby_name_display');
						//print_r($baby_name_display);die();
						//$post_data 		= $post->post_content;
						$post_data 		= apply_filters('the_content', $post->post_content);
						//$post_data = str_replace(']]>', ']]&gt;', $post_data);

						if ( have_posts() ) { ?>
						    
							<div class="miracle-baby">								
								<div class='title'> <h1> Our miracle stories </h1> </div>
								<div class='sub-title'> <h4><?php the_title(); //echo $baby_name; ?> </h4> </div>
								<div class='baby-description'> 
									<span class="baby-image"><?php echo the_post_thumbnail('large' ); ?></span>
									<span class="baby-desc">
										<div class="baby-content"> <?php echo $post_data; ?> </div> 										
									</span>									
								</div>	
							</div>
				            <div class='related-babies-title'> More miracle stories </div>
							<div class='related-babies'>
				            <?php 
											 $args = array(
												 'post_type'=> 'miracle_babies',
												 'post_status' => 'publish',
												 'post__not_in'   => array( get_the_ID() ),
												 //'posts_per_page' => '3',
												 'orderby'        => 'menu_order',
												 'order'    => 'ASC'
											 );	
											 $result = new WP_Query( $args );
											 $posts = $result->posts;
											 shuffle($posts);
											 if ( $posts ){
												 shuffle($posts);
												 foreach ( $posts as $post ) {
													 $baby_name 		= get_field('baby_name', $post->ID);
													 $thanks_message 	= get_field('thanks_message', $post->ID);
													 ?>
													<a href="<?php echo get_permalink($post->ID); ?>">
														<div class='related-miracle-baby'> 
															<!-- div class='related-baby-image'>
																<?php echo the_post_thumbnail('large' ); ?>
															</div -->
															<div class='related-baby-name'>
																<h3> <?php the_title(); //echo $baby_name; ?> </h3>
															</div>
															<div class='related-baby-desc'>
																<?php
																	$excerpt	= apply_filters('the_content', $post->post_content);
																	$excerpt	= substr( $excerpt, 0, 100 ); // Only display first 260 characters of excerpt
																	$result		= substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
																	echo $result . ' ...';
																	//echo $post->post_content;
																?>
															</div>
														</div>
													</a>
													 <?php
													 
												 }												 
											 }
							?>
				</div>
						<?php }
						

					}elseif($postType == 'clinics'){ ?>
						<div class='title'> <h1> We're here for you, in multiple locations </h1> </div>
						<?php if($clinic_location == 'dubai'){ ?>
							<div class='locaation-data'> <?php echo do_shortcode( '[xyz-ips snippet="Dubai-sublocations"]' ); ?> </div>
						<?php }elseif($clinic_location == 'abudhabi'){ ?>
							<div class='locaation-data'> <?php echo do_shortcode( '[xyz-ips snippet="Abu-Dhabi-sublocations"]' ); ?> </div>
						<?php }elseif($clinic_location == 'alain'){ ?>
							<div class='locaation-data'> <?php echo do_shortcode( '[xyz-ips snippet="Al-Ain-sublocations"]' ); ?> </div>
						<?php } ?>
						
					<?php }
				} else {
					get_template_part( 'template-parts/content', 'none' );
				}

				/**
				 *  Executes actions after the post content.
				 *
				 * @since 2.3.8
				 */
				 if($postType == 'post'){
					do_action( 'neve_after_post_content' );
				 }
				?>
			</article>
			<?php do_action( 'neve_do_sidebar', 'single-post', 'left' ); ?>
		</div>
	</div>
<?php
get_footer();
