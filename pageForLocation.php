<?php
/**
 * Template Name: Custom template for location
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
			//do_action( 'neve_before_page_header' );

			/**
			 * Executes the rendering function for the page header.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			//do_action( 'neve_page_header', $context );

			/**
			 * Executes actions before the page content.
			 *
			 * @param string $context The displaying location context.
			 *
			 * @since 1.0.7
			 */
			//do_action( 'neve_before_content', $context );
?>
			
<div class="mrgn-top-location">
<!--  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Location')" id="defaultOpen">Location</button>
  <button class="tablinks" onclick="openCity(event, 'Consultationmotive')">Consultation motive</button>
  <button class="tablinks" onclick="openCity(event, 'Doctorspreference')">Doctor’s preference</button>
   <button class="tablinks" id="personalInfo" onclick="openCity(event, 'Personalinfosubmit')">Personal info & submit</button>
</div> -->

<div id="tabs">
        <ul>
            <li><a href="#Location"><span>Location</span></a></li>
            <li><a href="#Consultationmotive"><span>Consultation motive</span></a></li>
            <li><a href="#Doctorspreference"><span>Doctor’s preference</span></a></li>
			 <li><a href="#Personalinfosubmit"  id="personalInfo"><span>Personal info & submit</span></a></li>
        </ul>
	
<div id="Location" class="tabcontent">

   <p>I’m located in...</p>
   <div>
    <div class="cityLocations">
  <input type="radio" id="Dubai" name="locName" value="Dubai">
  <label for="Dubai">Dubai</label><br>
  <input type="radio" id="AbuDhabi" name="locName" value="Abu Dhabi">
  <label for="AbuDhabi">Abu Dhabi</label><br>  
  <input type="radio" id="AlAin" name="locName" value="Al Ain">
  <label for="AlAin">Al Ain</label><br><br>

</div>

<div class="otherOptions">
    <p>Other options</p>
     <input type="radio" id="VirtualConsultation" name="locName" value="Virtual consultation">
  <label for="VirtualConsultation">Virtual consultation</label><br>
  <input type="radio" id="InternationalPatients" name="locName" value="International patients">
  <label for="InternationalPatients">International patients</label><br>
</div>

	
	   <div class="nextCls">
	    <button type="button" class="skip">Skip</button>
	   <button type="button" id="next" disabled="disabled">Next</button>   
	   </div>	
	   <div class="clearfix"></div>
</div>
</div> 

<div id="Consultationmotive" class="tabcontent">
    <h3>I’m interested in...</h3>
    <div>
  <input type="radio" id="IVF" name="IVF" value="In-vitro fertilisation(IVF)">
  <label for="IVF">In-vitro fertilisation 
(IVF)</label><br>
  <input type="radio" id="FR" name="FR" value="Fertility preservation options">
  <label for="FR">Fertility preservation options</label><br>  
  <input type="radio" id="FBGT" name="FBGT" value="Family balancing & genetic testing">
  <label for="FBGT">Family balancing & genetic testing</label><br>
    <input type="radio" id="FH" name="FH" value="Learning more about fertility health">
  <label for="FH">Learning more about fertility health</label><br><br>

</div>
	<div>
<h3>I have other reasons to book a consultation</h3>
<input type="radio" id="sopinion" name="reason" value="Second opinion">
<label for="sopinion">Second opinion</label><br>
<input type="radio" id="consultEnquiry" name="reason" value="Consultation / enquiry">
<label for="consultEnquiry">Consultation / enquiry</label><br>
<input type="radio" id="fpreservation" name="reason" value="Oncofertility / preservation">
<label for="fpreservation">Oncofertility / preservation</label><br>
<input type="radio" id="reasonNotListed" name="reason" value="Reason not listed">
<label for="reasonNotListed">Reason not listed</label>
</div>
	   <div class="prevCls">
		   <button type="button" class="previous">Previous</button>
	   </div>
	   <div class="nextCls">
	  <button type="button" class="skip">Skip</button>
	  <button type="button" id="consultationNext" disabled="disabled">Next</button>
	</div>
	  <div class="clearfix"></div>
</div>

<div id="Doctorspreference" class="tabcontent">
	
	<div class="locationShow">
   <h3>I would like to consult with...</h3>
  <!-- <div>
      <p>Show me staff from:</p>
      <div>
       <input type="radio" id="All" name="staffCity" value="All">
  <label for="All">All</label><br>  
  <input type="radio" id="Abudhabi" name="staffCity" value="Abu Dhabi">
  <label for="Abudhabi">Abu Dhabi</label><br>  
     <input type="radio" id="dubai" name="staffCity" value="Dubai">
  <label for="dubai">Dubai</label><br>
  <input type="radio" id="Alain" name="staffCity" value="Al Ain">
  <label for="Alain">Al Ain</label><br><br>
  </div>
</div>
	  <div>
      <p>Clinical experts from Abu Dhabi</p>
      <p>Doctors</p>
      <div>
       <input type="radio" id="Nahla" name="drName" value="Dr.Nahla">
  <label for="Nahla">Dr. Nahla</label><br>  
  <input type="radio" id="Arianna" name="drName" value="Dr.Arianna">
  <label for="Arianna">Dr. Arianna</label><br>  
     <input type="radio" id="Larissa" name="drName" value="Dr.Larissa">
  <label for="Larissa">Dr. Larissa</label><br>
  <input type="radio" id="Majeed" name="drName" value="Dr.Majeed">
  <label for="Majeed">Dr. Majeed</label><br><br>
  </div>
</div>
	
	  <div>
      <p>Please select the clinic you would like to visit</p>
      <div>
       <input type="radio" id="mainBranch" name="branchVisit" value="Dubai main branch">
  <label for="DubaiMainBranch">Dubai main branch</label><br>  
  <input type="radio" id="Jumeriah" name="branchVisit" value="Jumeriah">
  <label for="Jumeriah">Jumeriah</label><br>  
  <input type="radio" id="productionCity" name="branchVisit" value="Production city">
  <label for="productionCity">Production city</label><br>
       <input type="radio" id="internetCity" name="branchVisit" value="Internet City">
  <label for="internetCity">Internet city</label>
  </div>
</div> -->
		
		
<div class="other-doctors-tabs">
<button class="tablinks all" onclick="getLocationDoctors('all')"><input class="cityName" type="radio" id="All" name="staffCity" value="All" > <img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow"> 
All</input></button>
<button class="tablinks dubai" onclick="getLocationDoctors('dubai')"><input class="cityName" type="radio" id="Abudhabi" name="staffCity" value="Abu Dhabi"><img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow"> 
Dubai</input></button>
<button class="tablinks abudhabi" onclick="getLocationDoctors('abu-dhabi')"><input class="cityName" type="radio" id="dubai" name="staffCity" value="Dubai"><img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow">
Abu Dhabi</input></button>
<button class="tablinks" onclick="getLocationDoctors('al-ain')"> <input class="cityName" type="radio" id="Alain" name="staffCity" value="Al Ain"><img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow">
Al Ain</input></button>
</div>

<div id = 'doctorsData' class="doctorsData docone-tab">

</div>

 

<div id = 'doctorLocationTimings' class="doctorLocationData">

</div>
</div>		
	<div class="VirtualConsultation">
		<h2>
			Do you have any meeting preferences?
		</h2>
	<label for="timeZone">Which time zone are you situated in?</label>
  <input type="text" id="timeZone" name="timeZone"><br><br>
		<label for="preferTimeSlot">Preferred time slot</label>
  <input type="text" id="preferTimeSlot" name="preferTimeSlot"><br><br>
		<p>Please make sure to install Zoom desktop app in your device for a seamless meeting experience.</p>
	</div>
	<div class="InternationalPatients">
		<h2>Where are you travelling from?</h2>
	  <label for="country">Please specify your country</label>
  <select name="country" id="selectCountry" >
    <!-- <option value="Dubai">Dubai</option>
    <option value="AbuDhabi">AbuDhabi</option>
    <option value="AlAin">AlAin</option> -->
  </select>	
	    <div>
			<p>How soon are you travelling to our clinic?</p>
  <input type="radio" id="VC" name="travelDetails" value="I'd like to start with a virtual consultation">
  <label for="VC">I'd like to start with a virtual consultation</label><br>
   <input type="radio" id="travelAsPossible" name="travelDetails" value="I'd like to travel as soon as possible">
  <label for="travelAsPossible">I'd like to travel as soon as possible</label><br>
 <input type="radio" id="travelPlans" name="travelDetails" value="I'm still thinking about my travel plans">
  <label for="travelPlans">I'm still thinking about my travel plans</label><br>
 <input type="radio" id="travelDates" name="travelDetails" value="I'm still thinking about my travel plans">
  <label for="travelDates">I have particular dates in mind</label><br>
</div>
<label for="travelDate">Please let us know your travel date to our clinic</label>
  <input type="text" id="travelDate" name="travelDate"><br><br>
		<p>
			Learn more about our International Patient Program
		</p>
	</div>
	
	<div class="prevCls">
	<button type="button" class="previous">Previous</button>
	   </div>
	   <div class="nextCls">
	  <button type="button" class="skip">Skip</button>
	  <button type="button" id="consultWith" disabled="disabled">Next</button>
	</div>
	  <div class="clearfix"></div>
</div>
	
<div id="Personalinfosubmit" class="tabcontent">
 
  <h3>Doctor’s preference</h3>
	<div>
		<?php $contact='[contact-form-7 id="15445" title="Location_Form"]'?>
       <?php echo do_shortcode($contact);?>
	</div>
	<div class="prevCls">
	<button type="button" class="previous">Previous</button>
	   </div>
  <div class="clearfix"></div>
</div>

</div>

<div class="responseThanku">
<h1>Thank You</h1>
</div>
	</div>	
<?php
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
		<?php 
		do_action( 'neve_do_sidebar', $context, 'right' );
		 ?>
	</div>
</div>
<?php get_footer(); ?>

