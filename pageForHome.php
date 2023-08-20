<?php
//die('frontpage');
/**
 * Template Name: Custom template for home
 */

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-page' );
  
get_header();

$context = class_exists( 'WooCommerce', false ) && ( is_cart() || is_checkout() || is_account_page() ) ? 'woo-page' : 'single-page';
?>
<style>
	import Glide, { Breakpoints } from '@glidejs/glide/dist/glide.modular.esm'
 .glide {
  position: relative;
  width: 100%;
  box-sizing: border-box; }
  .glide * {
    box-sizing: inherit; }
  .glide__track {
    overflow: hidden; }
  .glide__slides {
    position: relative;
    width: 100%;
    list-style: none;
    backface-visibility: hidden;
    transform-style: preserve-3d;
    touch-action: pan-Y;
    overflow: hidden;
    padding: 0;
    white-space: nowrap;
    display: flex;
    flex-wrap: nowrap;
    will-change: transform; }
    .glide__slides--dragging {
      user-select: none; }
  .glide__slide {
    width: 100%;
    height: 100%;
    flex-shrink: 0;
    white-space: initial;
    user-select: none;
    -webkit-touch-callout: none;
    -webkit-tap-highlight-color: transparent; }
    .glide__slide a {
      user-select: none;
      -webkit-user-drag: none;
      -moz-user-select: none;
      -ms-user-select: none; }
  .glide__arrows {
    -webkit-touch-callout: none;
    user-select: none; }
  .glide__bullets {
    -webkit-touch-callout: none;
    user-select: none; }
  .glide--rtl {
    direction: rtl; }
	
	.glide__arrow {
  position: absolute;
  display: block;
  top: 50%;
  z-index: 2;
  color: white;
  text-transform: uppercase;
  padding: 9px 12px;
  background-color: transparent;
  border: 2px solid rgba(255, 255, 255, 0.5);
  border-radius: 4px;
  box-shadow: 0 0.25em 0.5em 0 rgba(0, 0, 0, 0.1);
  text-shadow: 0 0.25em 0.5em rgba(0, 0, 0, 0.1);
  opacity: 1;
  cursor: pointer;
  transition: opacity 150ms ease, border 300ms ease-in-out;
  transform: translateY(-50%);
  line-height: 1; }
  .glide__arrow:focus {
    outline: none; }
  .glide__arrow:hover {
    border-color: white; }
  .glide__arrow--left {
    left: 2em; }
  .glide__arrow--right {
    right: 2em; }
  .glide__arrow--disabled {
    opacity: 0.33; }

.glide__bullets {
  position: absolute;
  z-index: 2;
  bottom: 2em;
  left: 50%;
  display: inline-flex;
  list-style: none;
  transform: translateX(-50%); }

.glide__bullet {
  background-color: rgba(255, 255, 255, 0.5);
  width: 9px;
  height: 9px;
  padding: 0;
  border-radius: 50%;
  border: 2px solid transparent;
  transition: all 300ms ease-in-out;
  cursor: pointer;
  line-height: 0;
  box-shadow: 0 0.25em 0.5em 0 rgba(0, 0, 0, 0.1);
  margin: 0 0.25em; }
  .glide__bullet:focus {
    outline: none; }
  .glide__bullet:hover, .glide__bullet:focus {
    border: 2px solid white;
    background-color: rgba(255, 255, 255, 0.5); }
  .glide__bullet--active {
    background-color: white; }

.glide--swipeable {
  cursor: grab;
  cursor: -moz-grab;
  cursor: -webkit-grab; }

.glide--dragging {
  cursor: grabbing;
  cursor: -moz-grabbing;
  cursor: -webkit-grabbing; }
  
   .testmonialwrap,.miracle-slider{
			width: -webkit-fill-available;
            margin: 0 auto;
        }

        .glide__slide {
            line-height: 100px;
            margin: 0;
            text-align: center;
        }
        .glide__bullet {
            background-color: grey;
            width: 20px;
            height: 20px;
        }
        .glide__bullet--active {
            background-color: black;
        }
/* 		.glide__slide img{
		width:392px;
		height:395px;
		} */
		.testmonialwrap .glide__bullets{
		position: relative;
		top: 0em;
		margin-bottom: 32px;
         }
        .testdummy {
            width: 100%;
            text-align: center;
            height: auto;
            display: block;
        }
	   .carousel3 {
            width: 90%;
            margin: 0px auto;
        }
	.testdummy .slick-dots li{
    width: 23px;
    height: 18px;
    background-image:url('/wp-content/uploads/2023/03/Vector-18.png');
    background-color: #EDECE7!important;
    background-repeat: no-repeat;
    border: none !important;
/* 	 margin-top:34px; */
     }
   .testdummy .slick-dots .slick-active {
     background-image:url('/wp-content/uploads/2023/03/Vector-17.png');
/* 	 margin-top:34px; */
     background-repeat: no-repeat;
	 width: 23px;
     height: 18px;
     }
	.testdummy  .slick-dots li button:before{
		color:#EDECE7;
	}
	.miracle-slider p{
		display:none;
	}
	.testdummy .miracle-slider h3{
	font-family: 'Raleway';
	font-style: normal;
	font-weight: 800;
	font-size: 24px;
	line-height: 30px;
	color: #721943;
    text-align:left;
	margin-left:22px;
	margin-top:15px;
	}
	.testdummy .miracle-slider .slick-slide .slick-active{
		width:344px !important;
		height:378px;
	}
/* 	.testdummy .miracle-slider img{
		width: 400px;
		height: 322px;
		margin: -72px 0 -7px -32px;
		overflow: hidden;
		background-size: cover;
	} */
	.testdummy .miracle-slider .slick-slide{
		height:auto;
	}
	.testdummy .miracle-slider .slick-dots{
		bottom:0px;
	}
	.miracle-title{
		font-family: 'Raleway';
		font-style: normal;
		font-weight: 700;
		font-size: 48px;
		line-height: 56px;
		text-align: center;
		color: #721943;
	}
/*	.testdummy .miracle-slider #mp1{
		padding:0 8%;
transform: rotate(3deg);
	}
	.testdummy .miracle-slider #mp2{

transform: rotate(-1.8deg);
		padding:0 8%;
	}
	.testdummy .miracle-slider #mp3{

transform: rotate(1.5deg);
		padding:0 8%;
	}
		.testdummy .miracle-slider #mp4{
border-radius: 12px;
transform: rotate(3deg);
		padding:0 8%;
	}
	.testdummy .miracle-slider #mp5{
transform: rotate(-1.8deg);
		padding:0 8%;
	}
	.miracle-slider .carousel3 .slick-slide #mp6{
	max-width: 345px !important;
  max-height: 312px !important;
	transform: rotate(3deg);
} 
	.testdummy .miracle-slider #mp7{
		transform: rotate(3deg);
		padding:0 8%;
	}
	.testdummy .miracle-slider #mp8{
		padding:0 8%;
		transform: rotate(-1.8deg);
	}
	.testdummy .miracle-slider #mp9{
		padding:0 8%;
		transform: rotate(1.5deg);
	} */
		
	.miracle-slider .carousel3 .slick-track a:nth-of-type(3n+1) img {
    transform: rotate(3deg);
    padding: 0 8% ;
	}
	.miracle-slider .carousel3 .slick-track a:nth-of-type(3n+2) img {
		transform: rotate(-1.8deg) ;
		padding: 0 8% ;
	}
	.miracle-slider .carousel3 .slick-track a:nth-of-type(3n+0) img {
		transform: rotate(1.5deg) ;
		padding: 0 8% ;
	}
		
	.mirac-lefticon{
		position: absolute;
		margin-top: 28%;
		left: -36px;
		opacity: 0.3;
	}
	.mirac-righticon{
		position:absolute;
		margin-top:34%;
		right: 0px;
	}
	.clinicalexpertwrapper {
         width: 100%;
         text-align: center;
         height: auto;
         display: block;
    }
	 .carousel4 {
            width: 80%;
            margin: 0px auto;
     }
	.clinicalexpertwrapper .doctors-slider img{
	width: 150px;
    height: 150px;
    object-fit: cover;
    object-position: top;
     border-radius: 50%;
    text-align: center;
	margin:7px 0px 0px 96px;
	}
	.clinical-title{
	font-family: 'Raleway';
	font-style: normal;
	font-weight: 700;
	font-size: 48px;
	line-height: 56px;
	color: #721943;
	text-align:center;
	margin-top:48px;	
	margin-bottom:16px;	
	}
	.clinical-subtitle{
	font-family: 'Nunito';
	font-style: normal;
	font-weight: 400;
	font-size: 24px;
	line-height: 30px;
	color: #721943;
	text-align:center;
	margin-bottom:20px;
	}
	.doctors-slider h3{
	margin: 32px 0 12px 0px;
	font-family: 'Raleway';
	font-style: normal;
	font-weight: 800;
	font-size: 24px;
	line-height: 30px;
	text-align: center;
	color: #721943;
	}
	.doctors-slider .carousel4 p,.doctors-slider .carousel4 span,
	.doctors-slider .carousel4 ul li{
	font-family: 'Nunito';
	font-style: normal;
	font-weight: 400;
	font-size: 18px;
	line-height: 22px;
	text-align: center;
	color: #721943;
	}
	.doctors-slider .slick-dots li{
    width: 23px;
    height: 18px;
    background-image:url('/wp-content/uploads/2023/03/Vector-18.png');
    background-color: #EDECE7!important;
    background-repeat: no-repeat;
    border: none !important;
     }
  .doctors-slider .slick-dots .slick-active {
     background-image:url('/wp-content/uploads/2023/03/Vector-17.png');
     background-repeat: no-repeat;
     width: 23px;
     height: 18px;
     }
  .doctors-slider .carousel4 .slick-prev{  
	display:block !important;
	background-image: url(/wp-content/uploads/2023/04/Vector-4-1.svg) !important;
    background-repeat: no-repeat;
    background-position: center right 15px;
    background-size: 29px 19px;
    z-index: 0;
    margin: 0px 0px 0px -41px;
	width:40px;
	padding: 0px 27px 0px 20px;
    left: -38px;
	}
	.doctors-slider .carousel4 .slick-next{  
	display:block !important;
	background-image: url(/wp-content/uploads/2023/04/Vector-6.svg) !important;
    background-repeat: no-repeat;
    background-position: center right 15px;
    background-size: 29px 19px;
    z-index: 0;
    margin: 0px -27px 0px 0px;
	width:40px;
	padding: 0px 28px 0px 23px;
    right: -38px;
	}
	.doctors-slider .slick-prev:before,.doctors-slider .slick-next:before{
		display:none !important;
	}
  .doctors-slider .slick-slide{
  	height:376px !important;  
	}
	.doctors-slider .slick-dots{
		bottom:0px;
	}
	.doctors-slider .slick-dots li button:before{
		color:#EDECE7;
	}
/* 	.expertsbutton{
		width: 392px;
		height: 56px;
		background: #721943;
		border-radius: 78px;
		margin-bottom:48px;
		background-image: url(/wp-content/uploads/2023/05/whiteright-arrow-svg.svg);
		background-repeat: no-repeat;
		background-position: center right 15px;
		background-size: 31px 30px;
	} */
	.expertsbutton:hover{
/* 		width: 392px;
		height: 56px;		
		border-radius: 78px;
		color: #721943 !important;
		border:1px solid #721943;
		margin-bottom:48px;
		background-image:url('https://90i.873.myftpupload.com/wp-content/uploads/2023/05/brownright-arrow-svg.svg');
		background-repeat:no-repeat;
		background-color: #af2c66;
		background-position: center right 15px;
		background-size: 31px 30px; */
		opacity:0.7;
	}
	.doctors-slider .btn:hover{
		background-color: #F8EFF3;
		color: #721943 !important;
	}
/* 	.expertsbutton a{
		font-family: 'Raleway';
		font-style: normal;
		font-weight: 700;
		font-size: 20px;
		line-height: 24px;
		color: #FFFFFF;
		padding-right:17px;
	} */
	.expertslearnmore,.expertslearnmore:hover{
		width: 392px;
		height: 56px;
		background: #721943;
		border-radius: 78px;
		margin-bottom:48px;
		background-image: url(/wp-content/uploads/2023/05/whiteright-arrow-svg.svg);
		background-repeat: no-repeat;
		background-position: center right 15px;
		background-size: 31px 30px;
	}
	.expertslearnmore:hover{
/*  		width: 392px;
		height: 56px;		
		border-radius: 78px;
		color: #721943 !important;
		border:1px solid #721943;
		margin-bottom:48px; */
/* 		background-repeat:no-repeat; 
 		background-color: #89154c !important;
		background-image:url('https://90i.873.myftpupload.com/wp-content/uploads/2023/05/brownright-arrow-svg.svg') !important;
		background-position: center right 15px;
		background-size: 31px 30px; */  
		opacity:0.9; 
	}
	.expertslearnmore a{
		font-family: 'Raleway';
		font-style: normal;
		font-weight: 700;
		font-size: 20px;
		line-height: 24px;
		color: #FFFFFF;
		padding-right:17px;
	}
/* 	.expertsbutton a:hover{
		color: #721943 !important;
	} */
	.gryborder{
		border: 1px solid #C0C0C0 !important;
	}
	.communitytitle{
		font-family: 'Raleway';
		font-style: normal;
		font-weight: 700;
		font-size: 48px;
		line-height: 56px;
		text-align: center;
		color: #721943;
	}
	.community-subtitle{
		font-family: 'Nunito';
		font-style: normal;
		font-weight: 400;
		font-size: 24px;
		line-height: 30px;
		color: #721943;
		text-align: center;
	}
	.exploremorebutton,.exploremorebutton:hover{
		width: 292px;
		height: 56px;
		background: #721943;
		border-radius: 78px;
		margin-bottom:48px;
		background-image: url(/wp-content/uploads/2023/05/whiteright-arrow-svg.svg);
		background-repeat: no-repeat;
		background-position: center right 28px;
		background-size: 27px 22px;
		padding-left:6px;
	}
	.exploremorebutton:hover{
/* 		width: 231px;
		height: 56px;		
		border-radius: 78px;
		color: #721943 !important;
		border:1px solid #721943;
		margin-bottom:48px;
		background-image:url('https://90i.873.myftpupload.com/wp-content/uploads/2023/05/brownright-arrow-svg.svg');
		background-repeat:no-repeat;
		background-color: #af2c66;
		background-position: center right 15px;
		background-size: 31px 30px; */
		opacity:0.9;
	}
	.exploremorebutton a,.exploremorebutton a:hover{
		font-family: 'Raleway';
		font-style: normal;
		font-weight: 700;
		font-size: 20px;
		line-height: 24px;
		color: #FFFFFF;
		padding-right:17px;
	}
/* 	.exploremorebutton a:hover{
		color: #721943 !important;
	} */
	.explorebg{
		position:absolute;
		left:0px;
		margin-top:-11%;
	}
	@media screen and (max-width: 990px) and (min-width: 901px){
		.ticss-5fb60eae, .ticss-f0b01235, .ticss-e8ceeeeb, .ticss-f5c5d5a3{
		width: 100% !important;
			right: 58% !important;
			position: relative;
			top: 116px !important;
		}
		.ss-ivficon img{
		margin:0 6% !important;
		}
		.ticss-6cf81cb1 {
			margin: 3px 30px 109px 30px !important;
		}
		.shortyourstory{
		left:40% !important;
		position:relative !important;
		}
		.shortstory-title{
		left: 9% !important;
			position: relative !important;
		}
	}
	@media screen and (max-width: 991px) and (min-width: 820px){
		#myTable td {
			top: -268px !important;
		}
		.mindubaiZoom.dubaiZoom {
			top: 14% !important;
			right: 10% !important;
		}
	}
	@media screen and (max-width: 819px) and (min-width: 768px){
		.ainDubaiMap>.ainDubaiZoom.dubaiZoom{
			left: 300px !important;
		}
		#myTable td {
			top: -269px !important;
		}
	}
</style>

<?php
echo do_shortcode('[smartslider3 slider="6"]');
?>


 <div class="breadcrumb"><?php //get_breadcrumb(); ?></div>  
<div class="<?php echo esc_attr( $container_class ); ?> single-page-container">
	<div class="row">
		<?php //do_action( 'neve_do_sidebar', $context, 'left' ); ?>
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

			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', 'page' );
		?>   <div class="testmonialwrap">
			<img src="/wp-content/uploads/2023/05/testmonial-left-bg.png" class="test-lefticon">
			<img src="/wp-content/uploads/2023/05/testimonial-right-bg.png" class="test-righticon">
        <div class="glide multi1">
			 <div class="glide__track" data-glide-el="track">
			 <?php echo do_shortcode('[xyz-ips snippet="Testimonial-Slider"]'); ?>	
				 
            </div>
            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1"></button>
                <button class="glide__bullet" data-glide-dir="=2"></button>
            </div>
        </div>
			 
    </div>
	 
	     
	<?php
		?> 		
	    <div class="testdummy">
			<h2 class="miracle-title">Discover some of our miracle stories</h2>
			<img src="/wp-content/uploads/2023/05/miracle-angle.png" class="mirac-lefticon">
			<img src="/wp-content/uploads/2023/05/miracle-father-baby.png" class="mirac-righticon">
		<?php echo do_shortcode('[xyz-ips snippet="Miracle-Babies-Slider"]'); ?>		
			</div> 
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js"></script>
	
	
	<!-- <div class="testdummy">
	<?php // echo do_shortcode('[xyz-ips snippet="Miracle-Babies-Slider"]'); ?>
</div> -->

    <script>
        $(document).ready(function () {
		/* 	var slider = $(".testdummy");

		  slider.slick({
			arrows: true,
			autoplay: true,
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3,
			dots: true,
		  }); */
			
			
            $('.carousel3').slick({
                slidesToShow: 3,
                slidesToScroll: 3,
		pauseOnHover: false,
                dots: true,
                // centerMode: true,
                autoplay: true,
				autoplaySpeed: 3000,
				useTransform: false,
				easing: 'swing', 
				responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
                // arrows: false
			});
			
        });
		
		
	/* 	 $('.carousel3').slick.on( 'beforeChange', function( event, slick, currentSlide, nextSlide ) {
	if ( nextSlide == 0 ) {
		var cls = 'slick-current slick-active' + ( opt.centerMode ? ' slick-center' : '' );

		setTimeout(function() {
			$( '[data-slick-index="' + slick.$slides.length + '"]' ).addClass( cls ).siblings().removeClass( cls );
			for (var i = slick.options.slidesToShow - 1; i >= 0; i--) {
				$( '[data-slick-index="' + i + '"]' ).addClass( cls );
			}
		}, 10 );
	}
}); */
		
		 $(document).ready(function () {
            $('.carousel4').slick({
                slidesToShow: 3,
                slidesToScroll: 3,
		pauseOnHover: false,
                dots: true,
                // centerMode: true,
                autoplay: true,
				autoplaySpeed: 3000,
				responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
                // arrows: false

			});
        });
		
    </script>

		<?php
		?> 	
<div class="outerimage">
<img class="absIconR" src="../../wp-content/uploads/2023/06/Group-11552.png">
<img  class="absIconL" src="../../wp-content/uploads/2023/06/Heart-and-circle-1.svg">
<h1 class="locations">We are here for you in multiple locations</h1>
<div>
<div class="posZoom">
<img class="imageZoom" src="../../wp-content/uploads/2023/03/map.png" />
<div class="mindubaiZoom dubaiZoom">
<div id="hoverImg"><img src="../../wp-content/uploads/2023/03/dot-1.png" /></div>
<div class="dubaiMap">
<div class="dubaiClass dubaiDiv">
<p class="dubaiContent">Dubai</p>

</div>
<div class="mob-dubai-Img dubaiImg"><img src="../../wp-content/uploads/2023/04/Frame-11624.png" /></div>
<div class="mob-dubai-content dubaiClassContent dubaiHoverContent">
<p class="city"><img class="superImg" src="../../wp-content/uploads/2023/05/dubaimap-300x204.jpg" /></p>

<div class="superAll">
<p class="contentTxt">Dubai</p>
<p class="openingHrs">Opening hours:</p>
<p class="openingHrs">8:00 AM - 5:00 PM</p>

</div>
<button class="viewDetails" type="text"><span class="viewDetailsText">
<a class="link" href="/clinics/dubai/" target="_self" rel="noopener">
Explore Dubai</a></span><a class="link" href="/clinics/dubai/"><img src="../../wp-content/uploads/2023/03/Vector-1.png" /></a></button>

</div>
</div>
</div>
<div class="ainDubaiMap">
<div class="ainDubaiZoom dubaiZoom">
<div id="ainHoverImgTag"><img src="../../wp-content/uploads/2023/03/dot-1.png" /></div>
<div class="ainMap">
<div class="ainDubai dubaiDiv">
<p class="dubaiContent">AI Ain</p>

</div>
<div class="mob-ain"><img src="../../wp-content/uploads/2023/04/Frame-11625.png" /></div>
<div class="mob-ain-content ainDubaiContent dubaiHoverContent">
<p class="city"><img class="superImg" src="../../wp-content/uploads/2023/05/alainmap-300x200.jpg" /></p>

<div class="superAll">
<p class="contentTxt">Al Ain</p>
<p class="openingHrs">Opening hours:</p>
<p class="openingHrs">8:00 AM - 5:00 PM</p>

</div>
<button class="viewDetails" type="text"><span class="viewDetailsText">
<a class="link" href="/clinics/al-ain/" target="_self" rel="noopener">
Explore Al Ain</a></span><a class="link" href="/clinics/al-ain/"><img src="../../wp-content/uploads/2023/03/Vector-1.png" /></a></button>

</div>
</div>
</div>
</div>
<div class="abuDubaiZ dubaiZoom">
<div id="abuDubaihoverImg"><img src="../../wp-content/uploads/2023/03/dot-1.png" /></div>
<div class="abuDubaiMap">
<div class="abuDubaiDivv dubaiDiv">
<p class="dubaiContent">Abu Dhabi</p>

</div>
<div class="mob-abudhabi"><img src="../../wp-content/uploads/2023/04/Dubai.png" /></div>
<div class="abuDubaiCls dubaiHoverContent">
<p class="city"><img class="superImg" src="../../wp-content/uploads/2023/05/abudhabimap-300x200.jpg" /></p>

<div class="superAll">
<p class="contentTxt">Abu Dhabi</p>
<p class="openingHrs">Opening hours:</p>
<p class="openingHrs">8:00 AM - 6:00 PM</p>

</div>
<button class="abuDubaiDetails viewDetails" type="text">
<a class="link" href="/clinics/abu-dhabi/" target="_self" rel="noopener">
<span class="viewDetailsText">
Explore Abu Dhabi</span><img src="../../wp-content/uploads/2023/03/Vector-1.png" /></a></button>

</div>
</div>
</div>
<div class="consultBtn">
				<button class="consult" type="text">
				  <a class="link" href="/book-your-consultation/" target="_self" rel="noopener">Book your consultation <img src="/wp-content/uploads/2023/03/Vector-1.png" />
				  </a>
				</button>
			  </div>

</div>
<div class="mob-dubai">
<div class="mob-dubai-class dubaiClassContent dubaiHoverContent">
<p class="city"><img class="superImg" src="../../wp-content/uploads/2023/05/dubaimap-300x204.jpg" /></p>

<div class="superAll">
<p class="contentTxt">Dubai</p>
<p class="openingHrs">Opening hours:</p>
<p class="openingHrs">8:00 AM – 5:00 PM</p>

</div>
<button class="viewDetails" type="text"><span class="viewDetailsText">
<a class="link" href="/clinics/dubai/" target="_self" rel="noopener">
Explore Dubai</a></span><a class="link" href="/clinics/dubai/"><img src="../../wp-content/uploads/2023/03/Vector-1.png" /></a></button>

</div>
<div class=" mob-dubai-class abuDubaiCls dubaiHoverContent">
<p class="city"><img class="superImg" src="../../wp-content/uploads/2023/05/abudhabimap-300x200.jpg" /></p>

<div class="superAll">
<p class="contentTxt">Abu Dubai</p>
<p class="openingHrs">Opening hours:</p>
<p class="openingHrs">8:00 AM – 6:00 PM</p>

</div>
<button class="abuDubaiDetails viewDetails" type="text"><span class="viewDetailsText">
<a class="link" href="/clinics/abu-dhabi/" target="_self" rel="noopener">
Explore Abu Dhabi</a></span><a class="link" href="/clinics/abu-dhabi/"><img src="../../wp-content/uploads/2023/03/Vector-1.png" /></a></button>

</div>
<div class="mob-dubai-class ainDubaiContent dubaiHoverContent ">
<p class="city"><img class="superImg" src="../../wp-content/uploads/2023/05/alainmap-300x200.jpg" /></p>

<div class="superAll">
<p class="contentTxt">AI Ain</p>
<p class="openingHrs">Opening hours:</p>
<p class="openingHrs">8:00 AM – 5:00 PM</p>

</div>
<button class="abuDubaiDetails viewDetails" type="text"><span class="viewDetailsText">
<a class="link" href="/clinics/al-ain/" target="_self" rel="noopener">
Explore AI Ain</a></span><a class="link" href="/clinics/al-ain/"><img src="../../wp-content/uploads/2023/03/Vector-1.png" /></a></button>

</div>
</div>
</div>
			  <div class="virtualConsult">
				<p class="preferText">If you would prefer a virtual consultation, click below</p>
				<p class="virtualOne">
				  <button class="virtualCons bookSliderConult visitPage">
					<a class="vConsultLink" href="/book-your-consultation/" target="_self" rel="noopener">Book your virtual consultation <img src="../../wp-content/uploads/2023/03/white.png" />
					</a>
				  </button>
				</p>
				<p class="internationalPatient">
				  <a class="link" href="/international-patients/" target="_self" rel="noopener">I am an International Patient</a>
				</p>
			  </div>
			  <img class="motherImg" src="../../wp-content/uploads/2023/06/Vector-6.png" />
</div>
	
			</div>
		  </div>
		</div>
	    <?php
		?> 
		<div class="clinicalexpertwrapper">
			<h2 class="clinical-title">Meet our clinical experts</h2>
			<h6 class="clinical-subtitle">At Bourn Hall, you're in safe hands</h6>
         <?php echo do_shortcode('[xyz-ips snippet="Clinical-experts-slider"]'); ?>	
			<button  class="expertslearnmore"><a href="/doctors/" target="_self">Learn more about our experts</a> </button> 
			
			<hr class="gryborder">
			<h1 class="communitytitle">Our Bourn Hall community</h1>
			<h6 class="community-subtitle">Together, we’re stronger</h6>
			<button  class="exploremorebutton"><a href="/miracle_babies/triumph-after-a-long-arduous-fertility-journey/" target="_self">Our miracle stories</a> </button> 
			<img src="/wp-content/uploads/2023/03/Group-11548-1.png" class="explorebg">
        </div>
			
		<?php
					
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
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script> 
    <script>
        var glideMulti1 = new Glide('.multi1', {
            type: 'carousel',
			hoverpause: false,
            autoplay: 3000,
            perView: 3,
			
			breakpoints:{
		  600: { perView: 2 },
		  480: { perView: 1 }
		}
	
        })
        glideMulti1.mount(); 
   </script>      

	
<?php get_footer(); ?>
