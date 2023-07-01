<?php

// This file is part of Moodle - http://moodle.org/

//

// Moodle is free software: you can redistribute it and/or modify

// it under the terms of the GNU General Public License as published by

// the Free Software Foundation, either version 3 of the License, or

// (at your option) any later version.

//

// Moodle is distributed in the hope that it will be useful,

// but WITHOUT ANY WARRANTY; without even the implied warranty of

// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

// GNU General Public License for more details.

//

// You should have received a copy of the GNU General Public License

// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.



/**

 *

 * @package   theme_lambda

 * @copyright 2020 redPIthemes

 *

 */

$lambda_body_attributes = 'has-region-side-pre has-region-side-post';

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);

if ($hassidepre) {$lambda_body_attributes .= ' used-region-side-pre';} else {$lambda_body_attributes .= ' empty-region-side-pre';}

$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);

if ($hassidepost) {$lambda_body_attributes .= ' used-region-side-post';} else {$lambda_body_attributes .= ' empty-region-side-post';}

$blockstyle = theme_lambda_get_setting('block_style');

if ($blockstyle == 0) {$lambda_body_attributes .= ' blockstyle-01';}

if ($blockstyle == 1) {$lambda_body_attributes .= ' blockstyle-02';}

if ($blockstyle == 2) {$lambda_body_attributes .= ' blockstyle-03';}



$hasfrontpageblocks = ($PAGE->blocks->region_has_content('side-pre', $OUTPUT) || $PAGE->blocks->region_has_content('side-post', $OUTPUT));

$carousel_pos = $PAGE->theme->settings->carousel_position;

$pagewidth = $PAGE->theme->settings->pagewidth;

$standardlayout = FALSE;

if ($PAGE->theme->settings->block_layout == 1) {$standardlayout = TRUE;}

$sidebar = FALSE;

if ($PAGE->theme->settings->block_layout == 2) {$sidebar = TRUE;}

if (($sidebar) && ($PAGE->blocks->region_has_content('side-pre', $OUTPUT) == FALSE) && (strpos($OUTPUT->body_attributes(), 'editing') == FALSE)) {$sidebar = FALSE;}

if ($sidebar) {theme_lambda_init_sidebar($PAGE); $sidebar_stat = theme_lambda_get_sidebar_stat(); $lambda_body_attributes .= ' sidebar-enabled '.$sidebar_stat;}



if (right_to_left()) {

  $regionbsid = 'region-bs-main-and-post';

} else {

  $regionbsid = 'region-bs-main-and-pre';

}



echo $OUTPUT->doctype() ?>

<html <?php echo $OUTPUT->htmlattributes(); ?>>

<head>

  <title><?php echo $OUTPUT->page_title(); ?></title>

  <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />

  <?php echo $OUTPUT->standard_head_html() ?>

  <?php if (!isloggedin()){
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/style/lds.css" />  
  <?php } ?>



  

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <noscript>

   <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/style/nojs.css" />

 </noscript>

 <!-- Google web fonts -->

 <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>

</head>



<body <?php echo $OUTPUT->body_attributes("$lambda_body_attributes"); ?>>



  <?php echo $OUTPUT->standard_top_of_body_html(); ?>



  <?php if ($sidebar) { ?>

    <div id="sidebar" class="">

     <?php echo $OUTPUT->blocks('side-pre');?>

     <div id="sidebar-btn"><span></span><span></span><span></span></div>

   </div>

 <?php } ?>

 <?php if (!isloggedin()){
  ?>
  <?php require_once(dirname(__FILE__).'/includes/homepage.php'); ?>
<?php } ?>


<div id="wrapper">

  <?php require_once(dirname(__FILE__).'/includes/header.php'); ?>

  <?php require_once(dirname(__FILE__).'/includes/slideshow.php'); ?>



  <div id="page" class="container-fluid">

   <div id ="page-header-nav" class="clearfix"> </div>

   <div id="page-content" class="row-fluid">

     <?php if ($hasfrontpageblocks==1) { ?>

      <div id="<?php echo $regionbsid ?>" class="">

        <div class="row-fluid">

         <?php if ($standardlayout) { ?>

          <section id="region-main" class="span8 pull-right">

          <?php } else { ?>

            <section id="region-main" class="span8">

            <?php } ?>

          <?php } else { ?>

           <div id="<?php echo $regionbsid ?>">

            <div class="row-fluid">

             <section id="region-main" class="span12">

             <?php } ?>
             <?php global $DB, $OUTPUT, $PAGE, $USER;

             if(empty($USER->id) || isguestuser()){
               ?>
               <div>
                             <!--      <div class="bg_custom_color">
                                    <div class="custom_row">
                                      <div class="custom_col">
                                        <ul>
                                          <li><span> <i class="fas fa-check"></i></span> CampusTutr is for Students for virtual leaning classes</li>
                                          <li><span> <i class="fas fa-check"></i></span> CampusTutr is for schools / Colleges for their live teaching needs.</li>
                                          <li><span><i class="fas fa-check"></i></span> CampusTutr is for Tutors / Coaching centers for their students exams</li>
                                      </ul>
                                  </div>
                                  <div class="custom_col2">
                                    <figure>
                                       <img src='https://www.campustutr.com/theme/lambda/layout/image/red-dotted-half-circle.png' />
                                   </figure>
                               </div>
                           </div>
                         </div> -->

                         <div class='custom_bg_color'>
                          <div class='custom_box '>
                           <!-- <figure><img src='https://www.campustutr.com/theme/lambda/layout/image/8625.png' /></figure> -->
                           <img src="https://www.campustutr.com/theme/lambda/layout/image/schools.svg">
                           <h4 class="text-center">CampusTutr for schools </h4>
                           <div class="campustutr-list">
                            <ul>
                              <li>Zoom Classes</li>
                              <li>Create Lesson Plans</li>
                              <li>Schedule Exams</li>
                            </ul>
                          </div>

                          <div class='btns text-center'>
                            <a href="https://www.campustutr.com/login/signup.php?accounttype=Create Your School Account"> Create your School Account</a>
                            <br>
                            <!-- <a href=''><p>Know More</p></a> -->
                            <a href='https://www.campustutr.com/blocks/customhomepage/campustutr_for_schools.php'>More Details</a>

                          </div>
                        </div>
                        <div class="d-done"></div>
                        <div class='custom_box'>
                          <!-- <figure><img src='https://www.campustutr.com/theme/lambda/layout/image/2399830.png' /></figure> -->
                          <img src="https://www.campustutr.com/theme/lambda/layout/image/Students.svg">
                          <h4 class="text-center">CampusTutr for Students </h4>
                          <div class="campustutr-list">
                            <ul>
                              <li>Your Live Classes</li>
                              <li>Virtual Classes</li>
                              <li>Zoom Classes</li>
                            </ul>
                          </div>

                          <div class='btns text-center'>
                            <a href="https://www.campustutr.com/login/signup.php?accounttype=Create Your Student Account">Create your Student Account</a>
                            <br>
                            <!-- <a href=''><p>Know More</p></a> -->
                            <a href='blocks/customhomepage/campustutr_for_students.php'>More Details</a>

                          </div>
                        </div>

                        <div class="d-done"></div>
                        <div class='custom_box'>
                          <!--  <figure><img src='https://www.campustutr.com/theme/lambda/layout/image/2466249.png' /></figure> -->
                          <img src="https://www.campustutr.com/theme/lambda/layout/image/Tutors.svg">
                          <h4 class="text-center">CampusTutr for Tutors</h4>
                          <div class="campustutr-list">
                            <ul>
                              <li>Zoom Tutoring</li>
                              <li>Assign Test</li>
                              <li>Any Time Tutoring</li>
                            </ul>
                          </div>
                          <div class='btns text-center'><a  href="https://www.campustutr.com/login/signup.php?accounttype=Create Your Tutor Account">Create your Tutor Account</a>
                            <br>
                            <!-- <a href=''><p>Know More</p></a> -->
                            <a href='https://www.campustutr.com/blocks/customhomepage/campustutr_for_tutors.php'>More Details</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
              </div>
             <!-- <section class="avaliable-bgimg mt-5">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="heading">
                        <h1 class="text-center">Available Courses</h1>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="tab-scetion">
                          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#primary" role="tab" aria-controls="pills-home" aria-selected="true">I-V</a>
                              <span>Primary School</span>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#middle" role="tab" aria-controls="pills-profile" aria-selected="false">VI-VIII </a>
                              <span>Middle School</span>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#secondary" role="tab" aria-controls="pills-contact" aria-selected="false">IX-X </a>
                              <span>Secondary School</span>
                            </li> 
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#higher" role="tab" aria-controls="pills-contact" aria-selected="false">XI-XII </a>
                              <span>Higher Secondary</span>
                            </li>
                          </ul>
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane show active" id="primary" role="tabpanel" aria-labelledby="pills-home-tab">
                              <div class="primary-courses">
                               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <h3>LKG</h3>
                                  <span>Primary School</span>
                                </li>
                                <li class="nav-item" role="presentation">
                                 <h3>LKG</h3>
                                 <span>Primary School</span>
                               </li>
                               <li class="nav-item" role="presentation">
                                <h3>LKG</h3>
                                <span>Primary School</span>
                              </li> 
                              <li class="nav-item" role="presentation">
                               <h3>LKG</h3>
                               <span>Primary School</span>
                             </li>
                           </ul>
                         </div>
                       </div>
                       <div class="tab-pane fade" id="middle" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
                       <div class="tab-pane fade" id="secondary" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
                       <div class="tab-pane fade" id="higher" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </section>-->


           



<?php  
}
echo $OUTPUT->course_content_header();
if ($carousel_pos=='0') require_once(dirname(__FILE__).'/includes/carousel.php');
echo $OUTPUT->main_content();
echo $OUTPUT->course_content_footer();
if ($carousel_pos=='1') require_once(dirname(__FILE__).'/includes/carousel.php');
?>
</section>
<?php
if ($hasfrontpageblocks==1) { 

  if ($standardlayout) {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-left');}
  else if (!$sidebar) {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-right');}
} ?>

</div>
</div>
<!--   // custom body-->
<section class="highlights-bg">
	<div class="container-fluid">
	  <div class="row align-items-center">
		<div class="col-md-4">
		  <div class="highlight-img">
		   <img src="https://www.campustutr.com/theme/lambda/layout/image/girl_showing_highlights.svg" class="fluid-img">
		 </div>
	   </div>
	   <div class="col-md-8">
		<div class="row align-items-center">
		  <div class="col-md-4">
			<div class="counter-img"><a href=""><img src="https://www.campustutr.com/theme/lambda/layout/image/enrolled_students_icon.svg"></a>
			  <div class="counter-text">
			   <h1><span class="counter">2,523</span></h1>
			   <span>Enrolled Students</span>
			 </div>
		   </div>
		 </div>
		 
		 <div class="col-md-4">
		  <div class="counter-img">
			<a href=""><img src="https://www.campustutr.com/theme/lambda/layout/image/Education_Awards.svg"></a>
			<div class="counter-text">
			 <h1><span class="counter">63,075</span></h1>
			 <span>Education Awards</span>
		   </div>
		 </div>
	   </div>
	   <div class="col-md-4">
		<div class="counter-img">
		  <a href=""><img src="https://www.campustutr.com/theme/lambda/layout/image/Courses_avail_icon.svg"></a>
		  <div class="counter-text">
			<h1><span class="counter">12,218</span></h1>
			<span>Courses Available</span>
		  </div>
		</div>
		
	  </div>
	</div>
  </div>
</div>
</div>
</section>	

<!--------------------------------------------------------------->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"  rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat"  rel="stylesheet">
<section class="highlights-b">
	<div class="container-fluid">
	  <div class="row">
                    <div class="col-md-12">
                      <div class="heading">
                        <h1 class="text-center">Testimonials</h1>
                      </div>
                    </div>
                  </div>
<div class="container">
    <div class="card">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="bgTitle"></div>
                <div class="carousel-item active">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-6 d-flex justify-content-center align-items-center title">
                            <p>
                             “Really, I’m so proud to complete few course from here, I support
and appreciate their learning system. All instructor was very
fantastic. All online class and schedule was also well. I personally
recommend their system.”
                            </p>
                        </div>
                        <div class="col-lg-6 content">
                        <div class="test_img">

                            <img src="theme/lambda/layout/image/bb.png" class="rounded-circle" alt="Cinque Terre" width="160" height="150"> 
							<span class="test_tl">rhoncus velit </span><br>
							<span class="test_tx"> </span>
        
                        </div>
                        </div>
                    </div>
                </div>
        <div class="carousel-item">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-6 d-flex justify-content-center align-items-center title">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sodales, metu
                            </p>
                        </div>
                        <div class="col-lg-6">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sodales, metus ac
                            fringilla suscipit, nulla massa mollis leo, ut maximus odio ex sit amet elit. Nullam varius
                            ante orci, quis rhoncus velit tempor sit amet. Nulla lacinia, sem sed euismod dignissim,
                            ante nibh iaculis

                        </div>
                    </div>
                    <!--<button class="btn btn-next">Next</button>-->
                </div>
                    <div class="carousel-item">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-6 d-flex justify-content-center align-items-center title">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sodales, metu
                            </p>
                        </div>
                        <div class="col-lg-6">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sodales, metus ac
                            fringilla suscipit, nulla massa mollis leo, ut maximus odio ex sit amet elit. Nullam varius
                            ante orci, quis rhoncus velit tempor sit amet. Nulla lacinia, sem sed euismod dignissim,
                            ante nibh iaculis
   
                        </div>
                    </div>
                    <!--<button class="btn btn-next">Next</button>-->
                </div>
            </div>
        </div>
                          
    </div>

</div>
</div>
</section>

<!--------------------------------------------------------------->
<?php echo $OUTPUT->blocks('side-post', 'span3'); ?>
</div>
<?php if (is_siteadmin()) { ?>
<div class="hidden-blocks">
   <div class="row-fluid">
     <h4><?php echo get_string('visibleadminonly', 'theme_lambda') ?></h4>
     <?php
     echo $OUTPUT->blocks('hidden-dock');
     ?>
   </div>
 </div>
<?php } ?>
<a href="#top" class="back-to-top"><i class="fa fa-chevron-circle-up fa-3x"></i><span class="lambda-sr-only"><?php echo get_string('back'); ?></span></a>
</div>
<?php if ($CFG->version >= 2018120300) {echo $OUTPUT->standard_after_main_region_html();} ?>
<footer id="page-footer" class="container-fluid">
  <?php require_once(dirname(__FILE__).'/includes/footer.php'); echo $OUTPUT->login_info();?>
</footer>
</div>
</div>
</div>
<?php echo $OUTPUT->lambda_footer_scripts(); ?>
<?php if ($hasslideshow) {echo $OUTPUT->lambda_fp_slideshow();} ?>
<?php if ($hascarousel) {echo $OUTPUT->lambda_fp_carousel();} ?>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
<!--script src="https://kit.fontawesome.com/yourcode.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
$('.carousel').carousel({
  interval: 0
});
$('.btn-next').click(function(){
  $('.carousel').carousel('next');
});
</script>

    <script type="text/javascript">
      $('.counter').counterUp({
        delay: 10,
        time: 2000
      });
      $('.counter').addClass('animated fadeInDownBig');
      $('h3').addClass('animated fadeIn');
    </script>





<style>
.custom_box h4 {
	color: #000;
	font-size: 26px;
	margin-bottom: 0;
	padding-bottom: 17px;
	margin-top: .5em;
	font-weight: 900!important;
}
.btns {
  padding-top: 14px;
}
.custom_box p.fw {
	color: #000;
	font-weight: 700;
	margin-bottom: 0;
	width: 53%;
	margin-right: auto;
	text-align: left;
	padding-left: 62px;
	padding-bottom: 20px;
}
.custom_bg_color {
	margin: 0 auto;
	padding-top: 3em;
	justify-content: space-around;
	display: flex;
	flex-wrap: wrap;
}
.column.c1 {
	width: 100%;
	max-width: 100%;
	display: flex;
}
.custom_box {
	display: inline-block;
	background-color: #fff;
	width: 365px;
	position: relative;
	box-shadow: 0 0 10px rgba(0,0,0,.15);
	transition: all .3s ease-out 0s;
	padding-top: 4em;
	padding-bottom: 2rem;
	border-radius: 10px;
}
.custom_box img {
	display: inline-block;
	width: 50%;
	margin: 0 auto;
}
.footer_content {
	background-color: #8A23FA;
	color: #fff;
	line-height: 2;
	text-align: center;
	padding: 4px;
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px;
}
.bg-color {
	background-color: #6f2978;
	height: 342px;
	margin-bottom: 16em;
	max-height: 400px;
	border-top-left-radius: 37px;
	border-top-right-radius: 37px;
}
.footer_content p {
	margin: 0;
}
.bg_custom_color {
	background-color: #4472c4;
	border-top-left-radius: 37px;
	border-top-right-radius: 37px;
}
.bg_custom_color ul li {
	list-style: none;
	color: #000;
	font-weight: 700;
	font-size: 18px;
}
.bg_custom_color ul li i {
	border: 2px solid #ffae00;
	padding: 5px;
	margin: 5px;
	border-radius: 100%;
	background-color: #fff;
	color: #ffae00;
}
.bg_custom_color {
	background-color: #fcf4cf;
	border-radius: 37px;
	padding: 2em;
	position: relative;
	z-index: 2
}
.custom_box img {
	position: absolute;
	top: -25px;
	left: 0;
	right: 0;
	z-index: 1;
	transform: translate(0%, -10%);
}
span.one_1 {
	background-color: #ffc000;
	border-radius: 100%;
	width: 40px;
	height: 40px;
	display: inline-block;
	line-height: 40px;
	text-align: center;
	margin-left: 13em;
	border: 1px solid #999;
	color: #fff;
	font-weight: bold;
}
.campus_tutr {
	justify-content: space-around;
	display: flex;
	flex-wrap: wrap;
}
.campus_tutr_box {
	padding-left: 15px;
	padding-right: 15px;
	background-color: #4472c4;
	margin: 0 10px 67px 10px;
	color: #fff;
	padding-bottom: 2em;
}
.campus_tutr_box h5 {
 color: #fff;
}
.campus_tutr .btn {
	margin-top: 7em;
	font-weight: bold;
}
.d-done {
 display: none;
}
.custom_row {
 display: flex;
 position: relative;
}
.custom_col2 {
	position: absolute;
	right: 0;
	bottom: -45px;
}
/* ul.nav li:nth-child(3) {
display: none;
}*/

p.fw.ct_ml-62 {
  padding-left: 68px!important;
}
p.fw.pl-73px {
  padding-left: 73px!important;
}

.coursebox .content .summary{
  height: auto;

}
.coursebox .content {
  clear: both;
  padding: 20px 0px;
}
.coursebox .content .courseimage {
  background-position: center center;
  background-size: cover;
}
.coursebox .content .courseimage {
  width: 57%!important;
  margin: 0 auto!important;
  background-size: cover;
  background-repeat: no-repeat;
}
@media only screen and (max-width: 768px) {
  .bg-color{
	height: auto;
	max-height:initial;
	margin-bottom: 3em;
  }
  .custom_box {

	margin-top: 43px;

  }
  .bg_custom_color {
   padding-top: 10px;
   padding-right: 10px;
   padding-bottom: 10px;
 }
 .bg_custom_color ul {
  margin-left: -18px;
}
.custom_bg_color{
  padding-top: 0;
  padding-bottom: 2em;
}
.d-done {
  border-bottom:10px solid #fff;
  position: relative;
  z-index: 9999999;
  height: 17px;
  width: 100%;
  display: block;
}
#camera_wrap {
  display: none!important;
}
.bg_custom_color ul li {
  display: inline-flex;
  line-height: 30px;
  }.custom_col2 {
	bottom: -26px;
  }
}


/*20-1-21 anil css*/
.custom_box img {
  width: 100px;
}
.btns a {
  color: #008dd5;
  font-size: 20px;
  font-weight: 700;
  text-decoration: underline;
}
.campustutr-list ul li {
  line-height: 2.5;
  font-weight: 600;
}
.campustutr-list ul {
  padding-left: 2em;
}
/*20-1-21 anil css*/


/*23-1-21 anil css*/
.heading h1{
  color: #000;
  position: relative;
}
.heading h1:after {
  content: "";
  position: absolute;
  width: 34%;
  left: 33%;
  top: 100%;
  height: 3px;
  background-color: #008ad3;
}
.nav.nav-pills {
  justify-content: center;
}
.nav.nav-pills li.nav-item {
  border: 1px solid #ddd;
  margin: 1em;
  text-align: -webkit-center;
  width: 200px;
}
.nav.nav-pills li.nav-item .nav-link {
  border-radius: 100%;
  width: 100px;
  height: 100px;
  line-height: 4;
  font-size: 20px;
  font-weight: 800;
  text-align: center;
}
.nav-pills .nav-link, .nav-pills .show>.nav-link{
  background: rgb(1,107,195);
  background: linear-gradient(180deg, rgba(1,107,195,1) 32%, rgba(62,156,207,1) 101%);

}
li.nav-item span {
  font-weight: 800;
  color:#008dd5;
  font-size: 20px;
}
img.fluid-img {
  max-width: 100%;
  height: auto;
}
.highlights-bg{
  background-image: url("https://www.campustutr.com/theme/lambda/layout/image/highlights-bg.png");
}
#page{
  padding: 0;
}
#wrapper {
  width: 100%;
}
.multi-img ul.d-flex {
  justify-content: space-around;
  align-items: center;
  padding: 0;
  margin: 0;
  list-style: none;
}
.multi-img ul.d-flex li a{
  line-height: 12;
}
ul.d-flex span {
  display: block;
  color: #fff;
  padding-top: 0;
}
/*
ul.nav-pills .nav-link.active, .nav-pills .show>.nav-link{
color: #0d6efd;
background: #fff;
}*/

/*30-1-21 suneet css*/
#frontpage-available-course-list>h2::after {
    background: none !important;
}
#frontpage-available-course-list>h2 {
	text-align: center;
}
#frontpage-available-course-list>h2 {
    background: none;
}
aside#block-region-side-post {
    display: none;
}

/*----testinomial css*/
html, body, .container, .carousel, .carousel-inner, .carousel-item{
  height: 100%
}

.container{
  display: flex;
  justify-content: center;
  align-items: center;
}
h1{
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  width: 100%;
  text-align: center;
  color: #fff;
}

.card{
  border-radius: 20px;
  height: 500px;
  width: 90%;
  /* box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22); */
  border: none;
}

.carousel-item{
  z-index: 2;
  /*padding: 10px 25px;*/
}
.carousel-item > .row{
  margin: 0;
}

 .title {
    color: #1c1b1b;
    text-align: center;
    box-shadow: 0 14px 28px rgb(0 0 0 / 41%), 0 10px 10px rgb(0 0 0 / 65%);
    height: 203px;
    border-radius: 5px;
}

.bgTitle{
    /* background-color: #316e99; */
    position: absolute;
    z-index: 1;
}

.title h3{
  /* text-shadow: 0px 3px 3px rgba(0,0,0,0.2); */
}

.btn-next{
  position: absolute;
  bottom: 15px;
  right: 15px;
  width: 100px;
  border-radius: 20px;
  background-color: #316e99;
  color: #fff;
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  z-index: 3;
}

input{
  background-color: transparent !important;
}

/*-- vertical bootstrap slider --*/
.carousel .carousel-item-next.carousel-item-left,
.carousel .carousel-item-prev.carousel-item-right {
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.carousel .carousel-item-next,
.carousel .active.carousel-item-right {
    -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100% 0);
}

.carousel .carousel-item-prev,
.carousel .active.carousel-item-left {
-webkit-transform: translate3d(0,-100%, 0);
        transform: translate3d(0,-100%, 0);
}

/*-- vertical carousel indicators --*/
.carousel-indicators{
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    height: 40px;
    right: 0px;
    left: auto;
    width :auto;
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    transform: rotate(90deg);
}
.carousel-indicators li{
    display: block;
    margin-bottom: 0px;
    border-radius: 50%;
    width: 10px;
    height: 10px;
    background: #BDBDBD;
    transition: all ease 0.6s;
}
.carousel-indicators li.active{
    background: #000;
    width: 20px;
    border-radius: 25px;
}
/* Media Querys */
/* Small devices (landscape phones, 576px and up)*/ 
@media (min-width: 576px) {
  .bgTitle{
    height: 30%;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    width: 100%;
    top: 0;
  }
  .content{
    padding: 15px;
  }
}

/* Medium devices (tablets, 768px and up)*/
@media (min-width: 768px) {

}

/* Large devices (desktops, 992px and up)*/
@media (min-width: 992px) {
  .bgTitle{
    height: 100%;
    width: 50%;
    border-bottom-left-radius: 15px;
    border-top-right-radius: 0px;
  }
}

/* Extra large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) {

}
.test_img{
    margin: 95px;
    color: #111;
}
.test_tl{
	font-size:18px;
	font-weight:500;
	color: #111;
}
.test_tx{
	font-size:14px;
	color: #111;
}
</style>

</body>
</html>