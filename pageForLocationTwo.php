<?php
/**
 * Template Name: Custom template for locationTwo
 */
$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-page' );

get_header();

$context = class_exists( 'WooCommerce', false ) && ( is_cart() || is_checkout() || is_account_page() ) ? 'woo-page' : 'single-page';
?>
<style>
#doctorsData {
	margin-top:24px;
	-webkit-tap-highlight-color: transparent;
}
</style>
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
           <!--  <li><a href="#Doctorspreference"><span>Doctor’s preference</span></a></li>  -->
		   <li><a href="#Doctorspreference"><span>Additional information</span></a></li>
			 <li><a href="#Personalinfosubmit"  id="personalInfo"><span>Personal info & submit</span></a></li>
        </ul>
	
<div id="Location" class="tabcontent">

   <p class="placeof">I’m located in...</p>
   <img src="/wp-content/uploads/2023/05/mobile-siderbar.png" class="firsttabbg-mb1">
   <p class="mobiletab-title"> Next: Consultation motive</p> 
   <div class="boxed">
    <div class="cityLocations">
	<span class="dubaititle">
	<img src="/wp-content/uploads/2023/05/dubaimap-300x204.jpg" class="dubaiicon" width="64" height="64">
  <input type="radio" id="Dubai" name="locName" value="Dubai">  
  <label for="Dubai">Dubai</label></span><br>
  <span class="abudhabititle">
  <img src="/wp-content/uploads/2023/05/abudhabimap-300x200.jpg" class="abudubaiicon" width="64" height="64">
  <input type="radio" id="AbuDhabi" name="locName" value="Abu Dhabi">
  <label for="AbuDhabi">Abu Dhabi</label></span><br> 
<span class="alaintitle">  
<img src="/wp-content/uploads/2023/05/alainmap-300x200.jpg" class="al-ainicon" width="64" height="64">
  <input type="radio" id="AlAin" name="locName" value="Al Ain">
  <label for="AlAin">Al Ain</label></span><br><br>

</div>

<div class="otherOptions">
    <p class="newoption-title">Other options</p>
	<span class="virtualtitle">  
	<img src="/wp-content/uploads/2023/05/virtualconsultation-300x200.jpeg" class="virtualicon" width="64" height="64">
     <input type="radio" id="VirtualConsultation" name="locName" value="Virtual consultation">
  <label for="VirtualConsultation">Virtual consultation</label></span><br>
  <span class="intpatientstitle">  
  <img src="/wp-content/uploads/2023/05/lead-mgmt-international-patients-image-300x200.jpeg" class="virtualicon" width="64" height="64">
  <input type="radio" id="InternationalPatients" name="locName" value="International patients">
  <label for="InternationalPatients">International patients</label></span><br>
</div>
 <div><img src="/wp-content/uploads/2023/05/Mask-group-4.png" class="firsttabbg-image"></div>
     <a href="/" class="backtohome">Back to home</a>
	   <div class="nextCls">
	    <!-- <button type="button" class="skip">Skip</button> -->
	   <button type="button" id="next" disabled="disabled">Next step</button>   
	   </div>	
	   <div class="clearfix"></div>
</div>
</div> 

<div id="Consultationmotive" class="tabcontent">
    <h3 class="consultfirtsttitle">I’m interested in...</h3>
	<img src="/wp-content/uploads/2023/05/mobile-siderbar.png" class="firsttabbg-mb2">
	 <p class="mobilesecondtab-title"> Next: Additional information</p>
	  <p class="feelfree-subheading"> Feel free to select multiple</p>
    <div class="boxed2">
		<div class="section-one">
		<span class="virtrotitle">  
		
  <input type="radio" class="interestIn" id="IVF" name="IVF" value="In-vitro fertilisation(IVF)">
  <label for="IVF">In-vitro fertilisation<br>(IVF)<img src="/wp-content/uploads/2023/05/ways1stslide-300x200.jpg"></label></span>
<span class="ferperservtitle"> 
  <input type="radio" class="interestIn" id="FR" name="FR" value="Fertility preservation options">
  <label for="FR">Fertility preservation<br>options<img src="/wp-content/uploads/2023/05/fertility-preservation-banner-1-300x200.jpeg"></label></span>  
  <span class="fabalctitle"> 
  <input type="radio" class="interestIn" id="FBGT" name="FBGT" value="Family balancing & genetic testing">
  <label for="FBGT">Family balancing &<br>genetic testing<img src="/wp-content/uploads/2023/05/ways4thslide-300x200.jpg"></label></span>
  <span class="more-ferhealthtitle"> 
    <input type="radio" class="interestIn" id="FH" name="FH" value="Learning more about fertility health">
  <label for="FH">Learning more about<br>fertility health<img src="/wp-content/uploads/2023/05/lead-mgmt-learnmore-330x230.jpeg"></label></span><br><br>

	</div>
	<div>
	<h3 class="otheroptionheading">I have other reasons to book a consultation</h3>
	<div class="section-next"> 
	<span class="consultenq-title"> 
	<input type="radio" id="consultEnquiry" name="reason" value="Consultation / enquiry">
	<label for="consultEnquiry">Consultation / enquiry</label></span><br>
	<span class="secoptiontitle"> 
	<input type="radio" id="sopinion" name="reason" value="Second opinion">
	<label for="sopinion">Second opinion</label></span><br>
	<span class="oncofertitle"> 
	<input type="radio" id="fpreservation" name="reason" value="Oncofertility / preservation">
	<label for="fpreservation">Oncofertility / preservation</label></span><br>
	<span class="resonnotlist-title"> 
	<input type="radio" id="reasonNotListed" name="reason" value="Reason not listed">
	<label for="reasonNotListed">Reason not listed</label></span>
	</div>
		</div>
	</div>
	<div><img src="/wp-content/uploads/2023/05/Mask-group-4.png" class="firsttabbg-image"></div>
	   <div class="prevCls">
		   <button type="button" class="previous backfirsttab">Edit previous response</button>
	   </div>
	   <div class="nextCls secondtabskip">
	  <button type="button" class="skip">Skip</button>
	  <button type="button" id="consultationNext" disabled="disabled">Next step</button>
	</div>
	  <div class="clearfix"></div>
</div>

<div id="Doctorspreference" class="tabcontent">
	
	<div class="locationShow">
   <h3 class="locationtopheading">I would like to consult with...</h3>
   <p class="mobilethirdtab-title1">Next: Personal info & submit</p>
		<p class="stafffromplace">Show me doctors from:</p>
<div class="other-doctors-tabs">
<label class="test tablinks all locationallbutton" onclick="getLocationDoctors(event, 'all')"><input class="cityName" type="radio" id="All" name="staffCity" value="All" > <img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow"> All</label>
<label class="tablinks dubai loca-dubaibutton" onclick="getLocationDoctors(event, 'dubai_location')"><input class="cityName" type="radio" id="Abudhabi" name="staffCity" value="Abu Dhabi"> <img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow"> Dubai</label>
<label class="tablinks abudhabi loca-abudubaibutton" onclick="getLocationDoctors(event,'abudhabi')"><input class="cityName" type="radio" id="dubai" name="staffCity" value="Dubai"><img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow">Abu Dhabi</label>
<label class="tablinks loca-alainbutton" onclick="getLocationDoctors(event, 'alain')"><input class="cityName" type="radio" id="Alain" name="staffCity" value="Al Ain"><img width='15' height='22' src="../../../wp-content/uploads/2023/04/location-map.svg" alt="Right arrow">Al Ain</label>
</div>

<div id = 'doctorsData' class="doctorsData docone-tab">
		<div class='doctors-title'><h1>Doctors</h1></div>
		<div id="all" class="doctorsContent">
		<?php echo do_shortcode('[xyz-ips snippet="BYC-All-Doctors"]'); ?>
		</div>				

		<div id="dubai_location" class="doctorsContent">
		<?php echo do_shortcode('[xyz-ips snippet="BYC-Dubai-Doctors"]'); ?>
		</div>

		<div id="abudhabi" class="doctorsContent">
		<?php echo do_shortcode('[xyz-ips snippet="BYC-Abu-Dhabi-Doctors"]'); ?> 
		</div>

		<div id="alain" class="doctorsContent">
		<?php echo do_shortcode('[xyz-ips snippet="BYC-Al-Ain-Doctors"]'); ?>
		</div>
</div>

 

<div id = 'doctorLocationTimings' class="doctorLocationData">

</div>
</div>		
	<div class="VirtualConsultation">
		<h2 class="virtualcoun-title">
			Do you have any meeting preferences?
		</h2>
		<p class="mobilethirdtab-title">Next: Personal info & submit</p>
		<div class="perferslots">
			<div class="timesituatedlocation">
				<label for="timeZone">Which time zone are you situated in?</label> 
			 <p><input type="text" id="timeZone" name="timeZone"> </p> 
			</div>
			<div class="slotperiod">
				<label for="preferTimeSlot">Preferred time slot</label> 
			 <p> <input type="text" id="preferTimeSlot" name="preferTimeSlot"> </p> 
			</div>
			
					
		</div>
	
		<p class="timeslot-para">Please make sure to install Zoom desktop app in your device for a seamless meeting experience.</p>
	</div>
	<div class="InternationalPatients">
		<h2 class="travellingfrom">Where are you travelling from?</h2>
		<h2 class="travelplan">Travel plans in mind?</h2>
		 <p class="travelinfo-title-mobile">Next: Personal info & submit</p>
	  <label for="country" class="specificationcountry">Please specify your country</label>
  <select name="country" id="selectCountry"><span class="arrowselection down"></span>
	  <option value="countryname">Select Country</option>
    <!-- <option value="Dubai">Dubai</option>
    <option value="AbuDhabi">AbuDhabi</option>
    <option value="AlAin">AlAin</option> -->
  </select>	
	    <div class="travelspecfic">
			<p class="soon-travelling">How soon are you travelling to our clinic?</p>
			<span class="startwithvirtual vc-first">
  <input type="radio" id="VC" name="travelDetails" value="I'd like to start with a virtual consultation">
  <label for="VC">I'd like to start with a virtual consultation</label></span><br>
  <span class="startwithvirtual vc-second">
   <input type="radio" id="travelAsPossible" name="travelDetails" value="I'd like to travel as soon as possible">
  <label for="travelAsPossible">I'd like to travel as soon as possible</label></span><br>
  <span class="startwithvirtual vc-third">
 <input type="radio" id="travelPlans" name="travelDetails" value="I'm still thinking about my travel plans">
  <label for="travelPlans">I'm still thinking about my travel plans</label></span><br>
  <span class="startwithvirtual vc-four">
 <input type="radio" id="travelDates" name="travelDetails" value="I'm still thinking about my travel plans">
  <label for="travelDates">I have particular dates in mind</label></span><br>
</div>
<label for="travelDate" class="knowyourtravel">Please let us know your travel date to our clinic</label>
  <input type="text" id="travelDate" name="travelDate"><br><br>
		<p class="intlprogram">
			Learn more about our <span><a href="/international-patients/" target="_self">International Patient Program</a></span>
		</p>
	</div>
	
	<div class="prevCls">
	<button type="button" class="previous backfirsttab1">Edit previous response</button>
	   </div>
	   <div class="nextCls thirdtabskip">
	  <!-- <button type="button" class="thirdSkip skip">Skip</button> -->
	  <button type="button" class="skip">Skip</button>
	  <button type="button" id="consultWith" disabled="disabled">Next step</button>
	</div>
	<div>
		 <img src="/wp-content/uploads/2023/05/perference-left-icon.png" class="per-hearticon">
		<img src="/wp-content/uploads/2023/05/travel-detail-bg.png" class="travelbag">
	</div>
	  <div class="clearfix"></div>
</div>
	
<div id="Personalinfosubmit" class="tabcontent">
 
  <h3 class="personalinfo-title">Personal information</h3>
   <p class="personalinfo-title-mobile">Personal info & submit</p>
   <p class="mobilefourthtab-title">Almost done</p>
	<div>
		<?php $contact='[contact-form-7 id="15445" title="Location_Form"]'?>
       <?php echo do_shortcode($contact);?>
	</div>
	<div class="prevCls laststepsubmission">
	<button type="button" class="previous backfirsttab2">Edit previous response</button>
	   </div>
	<img src="/wp-content/uploads/2023/05/perference-left-icon.png" class="per-hearticon">
		<img src="/wp-content/uploads/2023/05/perference-right-icon.png" class="per-symbolicon">
	
  <div class="clearfix"></div>
</div>

</div>
		<div class="responseThanku">
			<img src="/wp-content/uploads/2023/05/thank-u-lefticon.png" class="responseleftbg">
			<img src="/wp-content/uploads/2023/05/thank-u-righticon.png" class="responserightbg">
			<img src="/wp-content/uploads/2023/05/Green-tick.png" class="greentickmark">
		<h1>Thank You</h1>
			<p class="responsecontent">Your request for consultation has been submitted.
We will reach out to you soon.</p>
			<a href="/" class="backto-index">Go to homepage</a>
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
