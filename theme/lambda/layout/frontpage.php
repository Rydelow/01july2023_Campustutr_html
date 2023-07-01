
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
<?php if (isloggedin()){
    ?>
  <?php
   echo $OUTPUT->standard_head_html() ?>

  <?php 
}
  if (!isloggedin()){
    ?>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/style/lds.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
  <script src="https://kit.fontawesome.com/yourcode.js"></script>  
  <?php } ?>



  

 
<?php if (isloggedin()){ ?>
  <noscript>

   <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/style/nojs.css" />

 </noscript>

 <!-- Google web fonts -->

 <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
<?php } ?>
</head>



<body <?php echo $OUTPUT->body_attributes("$lambda_body_attributes"); ?>>



  <?php 

   if (isloggedin()){ echo $OUTPUT->standard_top_of_body_html();  } ?>



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
<?php if (isloggedin()){ ?>
  <?php require_once(dirname(__FILE__).'/includes/header.php'); ?>

  <?php require_once(dirname(__FILE__).'/includes/slideshow.php'); ?>

<?php } ?>

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
                                       <img src='<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/red-dotted-half-circle.png' />
                                   </figure>
                               </div>
                           </div>
                         </div> -->

                         <div class='custom_bg_color mb-5'>
                          <div class='custom_box '>
                           <!-- <figure><img src='<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/8625.png' /></figure> -->
                           <img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/schools.svg">
                           <h4 class="text-center">Schools & Colleges</h4>
                           <div class="campustutr-list">
                            <ul>
                              <li>Zoom Classes</li>
                              <li>Create Lesson Plans</li>
                              <li>Schedule Exams</li>
                            </ul>
                          </div>

                          <div class='btns text-center'>
                          <!--   <a href="<?php echo $CFG->wwwroot;?>/login/signup.php?accounttype=Create Your School Account"> Create your School Account</a> -->
                          <!--  // <br> -->
                            <!-- <a href=''><p>Know More</p></a> -->
                            <a href='<?php echo $CFG->wwwroot;?>/blocks/customhomepage/campustutr_for_schools.php'>More Details</a>

                          </div>
                        </div>
                        <div class="d-done"></div>
                        <div class='custom_box'>
                          <!-- <figure><img src='<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/2399830.png' /></figure> -->
                          <img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/Students.svg">
                          <h4 class="text-center">Students</h4>
                          <div class="campustutr-list">
                            <ul>
                              <li>Your Live Classes</li>
                              <li>Virtual Classes</li>
                              <li>Zoom Classes</li>
                            </ul>
                          </div>

                          <div class='btns text-center'>
                        <!--     <a href="<?php echo $CFG->wwwroot;?>/login/signup.php?accounttype=Create Your Student Account">Create your Student Account</a> -->
                           <!--  <br> -->
                            <!-- <a href=''><p>Know More</p></a> -->
                            <a href='blocks/customhomepage/campustutr_for_students.php'>More Details</a>

                          </div>
                        </div>

                        <div class="d-done"></div>
                        <div class='custom_box'>
                          <!--  <figure><img src='<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/2466249.png' /></figure> -->
                          <img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/Tutors.svg">
                          <h4 class="text-center">Tutors</h4>
                          <div class="campustutr-list">
                            <ul>
                              <li>Zoom Tutoring</li>
                              <li>Assign Test</li>
                              <li>Any Time Tutoring</li>
                            </ul>
                          </div>
                          <div class='btns text-center'>
                          <!--   <a  href="<?php echo $CFG->wwwroot;?>/login/signup.php?accounttype=Create Your Tutor Account">Create your Tutor Account</a> -->
                            <!-- <br> -->
                            <!-- <a href=''><p>Know More</p></a> -->
                            <a href='<?php echo $CFG->wwwroot;?>/blocks/customhomepage/campustutr_for_tutors.php'>More Details</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
        

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
             padding-top: 0px;

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
    margin: 60px 30px 0px 30px;
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
 background-image: url("<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/highlights-bg.png");
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


/*23-1-21 anil css*/
</style>

  <style>
   .courseAvail .owl-prev{position: absolute;top: 0;left: 0;box-shadow: none; background: transparent !important; color: transparent !important; font-size: 20px !important;  padding: 15px !important; height: 100%;}
   .courseAvail .owl-next{position: absolute;top: 0;right: 0;box-shadow: none; background: transparent !important; color: transparent !important; font-size: 20px !important; padding: 15px !important; height: 100%;}
   .setIconWrap{display: flex;justify-content:center;align-items: center;height:100px; }
   .setIcon{width: 100px;}
   .customWrapper{display: flex;justify-content:center;align-items: center;}
   .customContainer{width: 87%;}
   .courseAvail .owl-stage{display: flex; align-items: center;}
  </style>

<div id="frontpage-available-course-list">
    <h2>Our Features</h2>
<div class="customWrapper">
<div class="customContainer">
  <div class="my-3 text-center owl-carousel owl-theme courseAvail">
    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/Personalised Dashboard.png" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">Personalised Dashboard</h5>
            </div>
      </div>
    </div>

    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/Bulk Notifications.png" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">Bulk Notifications</h5>
            </div>
      </div>
    </div>

    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/Code Compiler.png" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">Code Compiler</h5>
            </div>
      </div>
    </div>

    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/All-In-One Calendar.png" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">All-In-One Calendar</h5>
            </div>
      </div>
    </div>

    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/Lesson Plan.png" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">Lesson Plan</h5>
            </div>
      </div>
    </div>

    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/Interactive Sessions.png" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">Interactive Sessions</h5>
            </div>
      </div>
    </div>

    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/Scheduling Exams and Assignments.png" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">Scheduling Exams and Assignments</h5>
            </div>
      </div>
    </div>
    
    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/Track Progress.jpg" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">Track Progress</h5>
            </div>
      </div>
    </div>

    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/Discussion Forum.png" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">Discussion Forum</h5>
            </div>
      </div>
    </div>

    <div class="item">
      <div class="">
        <div class='setIconWrap'>
        <div class="setIcon">
          <img src="/theme/lambda/layout/image/CampusTutr Features/New folder/Certification.png" alt="Card image cap">
        </div>
        </div>
           <div class="card-body">
              <h5 class="card-title">Certification</h5>
            </div>
      </div>
    </div>

  </div>
  </div>
</div>
</div>
  <script type="text/javascript">

$('.courseAvail').owlCarousel(
{
loop:true,
autoplay:true,
autoplayTimeout:5000,
nav: true,
 navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
dots: false,
autoWidth:false,
items:4,
margin: 30,
padding: 50,
responsive:{
        0:{
            items:1,
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});

</script>

<!-------------------------------->
<section class="highlights-bg">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-4">
        <div class="highlight-img">
         <img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/girl_showing_highlights.svg" class="fluid-img">
       </div>
     </div>
     <div class="col-md-8">
      <div class="row align-items-center">
        <div class="col-md-4">
          <div class="counter-img"><a href=""><img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/enrolled_students_icon.svg"></a>
            <div class="counter-text">
             <h1><span class="counter">2,523</span></h1>
             <span>Enrolled Students</span>
           </div>
         </div>
       </div>

       <div class="col-md-4">
        <div class="counter-img">
          <a href=""><img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/Education_Awards.svg"></a>
          <div class="counter-text">
           <h1><span class="counter">63,075</span></h1>
           <span>Education Awards</span>
         </div>
       </div>
     </div>
     <div class="col-md-4">
      <div class="counter-img">
        <a href=""><img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/Courses_avail_icon.svg"></a>
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

<!-- Our Client -->

<section class="p-5"> 
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="heading">
          <h2 class="text-center">Our Clients</h2>
        </div>
      </div>
    </div>
  <div class="row owl-carousel owl-theme brands_slider">
    <div class="crosel mt-3 owl-item">
      <div class="p-3">
        <div class="fix-img">
          <img src="theme/lambda/layout/image/relance.png" alt="client-1" width="100%" height="100%" class="card-top-img" />
        </div>
          
      </div>
    </div>
    <div class="crosel mt-3 owl-item">
      <div class="p-3">
        <div class="fix-img">
          <img src="theme/lambda/layout/image/SVM.png" alt="client-1" width="100%" height="100%" class="card-top-img" />
        </div>
          
      </div>
    </div>
    
        <div class="crosel 6 mt-3 owl-item">
      <div class="p-3">
        <div class="fix-img">
          <img src="theme/lambda/layout/image/L_37865.gif" alt="client-1" width="100%" height="100%" class="card-top-img" />
        </div>
          
      </div>
    </div>

    <div class="crosel mt-3 owl-item">
      <div class="p-3">
        <div class="fix-img">
          <img src="theme/lambda/layout/image/sarvagnya.png" alt="client-1" width="100%" height="100%" class="card-top-img" />
        </div>
         
      </div>
    </div>


     <div class="crosel mt-3 owl-item">
      <div class="p-3">
        <div class="fix-img">
          <img src="https://www.campustutr.com/theme/lambda/layout/image/11.PNG" alt="client-1" width="100%" height="100%" class="card-top-img" />
        </div>
         
      </div>
    </div>






    

  </div>
  <!--   <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
 -->
  </div>
</section>


<style type="text/css">

  .fix-img{
    height: 150px;
  }
  .fix-img img{
    object-fit: contain;
  }
</style>





<section class="testimonial pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading">
          <h2 class="text-center">Testimonials</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="testimonial-card">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="bgTitle"></div>
         
           <?php $notification = $DB->get_records('home_testimonial'); 
$i=1;
foreach ($notification as $value) {
if("1"==$i++){
?>
          <div class="carousel-item active">
            <div class="row align-items-center ">
              <div class="col-lg-6 d-flex justify-content-center align-items-center title">
                <div class="left-content" style="width: 100%;">
                  <p>
                    <b><?= $value->name ?></b><br>
                   <?= $value->address ?>

                  </p>
                </div>
              </div>
              <div class="col-lg-6 content">
          <?php      $sug=array(unserialize($value->testimonial_content));
      foreach ($sug as $val){ $descpt= $val['text'];}

echo $descpt;

       ?>
              </div>
            </div>
          </div>

<?php }else{ ?>
          <div class="carousel-item">
            <div class="row align-items-center ">
              <div class="col-lg-6 d-flex justify-content-center align-items-center title ">
               <div class="left-content" style="width: 100%;">
                  <p>     <b><?= $value->name ?></b><br>
                   <?= $value->address ?>
                  </p>
                </div>
              </div>
              <div class="col-lg-6">
                <?php      $sug=array(unserialize($value->testimonial_content));
      foreach ($sug as $val){ $descpt= $val['text'];}

echo $descpt;

       ?>
              </div>
            </div>
          </div>
<?php } } ?>


         
        </div>
      </div>
    </div>

  </div>

<script type="text/javascript">
  $(document).ready(function(){

if($('.brands_slider').length)
{
var brandsSlider = $('.brands_slider');

brandsSlider.owlCarousel(
{
loop:true,
autoplay:true,
autoplayTimeout:5000,
nav:false,
dots:false,
autoWidth:false,
items:4,
margin:3,
responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});

if($('.brands_prev').length)
{
var prev = $('.brands_prev');
prev.on('click', function()
{
brandsSlider.trigger('prev.owl.carousel');
});
}

if($('.brands_next').length)
{
var next = $('.brands_next');
next.on('click', function()
{
brandsSlider.trigger('next.owl.carousel');
});
}
}


});

</script>



  <style>
    .form-group textarea::placeholder {
  font-weight: 500;
  padding-left: 5px;
  color: #000;
}
  .form-group textarea {
    background-color: transparent;
    border: navajowhite;
    border:1px solid #ccc;
    outline: none;
    box-shadow: unset;
    width: 100%;
}
  input.btn.btn-info {
    font-weight: 600;
    color: #fff;
    border-radius: 20px;
    padding: 10px;
    background-color: #138496;
    border-color: #138496;
}
   .carousel, .carousel-inner, .carousel-item{
      height: 100%
    }
    .heading h2 {
      font-size: 2.46rem;
      line-height: 3.08rem;
      margin: 30px 0 40px 0;
    }


    .carousel-item{
      z-index: 2;
      /*padding: 50px 25px;*/
    }
    .title{
      color: #fff;
      text-align: center;
    }
    .bgTitle{
      position: absolute;
      z-index: 1;
    }

    .title p{
      text-shadow: 0px 3px 3px rgba(0,0,0,0.2);
      color: #000;
    }
.left-content {
    box-shadow: 0 14px 28px rgb(0 0 0 / 25%), 0 10px 10px rgb(0 0 0 / 22%);
    padding: 2em;
    border-radius: 25px;
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
    right: -15px!important;
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
    border:3px solid  #BDBDBD;
    transition: all ease 0.6s;
  }
  .carousel-indicators li.active{
    background: #2066b9;
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
</style>

</section>
<?php include('custom_footer.php'); ?>
<?php  
} ?>
<?php
if (isloggedin()){ 
 if(user_has_role_assignment($USER->id,12)){
require_once($CFG->dirroot.'/blocks/searchdashboard/frontpage.php'); 
}
echo $OUTPUT->course_content_header();

if ($carousel_pos=='0') require_once(dirname(__FILE__).'/includes/carousel.php');

echo $OUTPUT->main_content();

echo $OUTPUT->course_content_footer();

if ($carousel_pos=='1') require_once(dirname(__FILE__).'/includes/carousel.php');

?>

</section>
<?php } ?>



<?php

if ($hasfrontpageblocks==1) { 

  if ($standardlayout) {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-left');}

  else if (!$sidebar) {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-right');}

} ?>

<?php echo $OUTPUT->blocks('side-post', 'span3'); ?>

</div>



<?php  if (is_siteadmin()) { ?>

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


<?php
if (!isloggedin()){
}else{
echo $OUTPUT->lambda_footer_scripts(); ?>

<?php if ($hasslideshow) {echo $OUTPUT->lambda_fp_slideshow();} ?>

<?php if ($hascarousel) {echo $OUTPUT->lambda_fp_carousel();} ?>

<?php echo $OUTPUT->standard_end_of_body_html();

}
?>



<script>

</script>

</body>

</html>