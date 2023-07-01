<?php require_once("../../config.php");
global $DB,$CFG, $OUTPUT, $PAGE, $USER;
$sitetitle="fortutors";
?>
<meta content="width=device-width, initial-scale=1" name="viewport" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/style/lds.css" />

 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

<style type="text/css">



body{

  padding-top: 0;

}



nav.navbar.navbar-expand-lg.navbar-light.bg-transparent {

    background-color: transparent;

}

  header#page-header {

    display: none;

}






header.navbar ,img.lambda-shadow , div#page-navbar {

    display: none;

}



/*div#wrapper {

    display: none;

}*/

#wrapper{

  border-top: unset;

      width: 100%;

}



body#page-blocks-customhomepage-campustutr_for_students {

    background-image: unset;

}

.student_bg-layer{

  background-image: url("<?php echo $CFG->wwwroot;?>/blocks/customhomepage/image/CampusTutr_tutor-banner.png");

  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  min-height: 675px;



}

input.btn.btn-info {

    font-weight: 600;

    color: #fff;

    border-radius: 20px;

    padding: 10px;

    background-color: #138496;

    border-color: #138496;

}

textarea {

    overflow: hidden;

    resize: vertical;

    width: 100%;

}

div#page {

    padding: 0;

}

#page-header-nav {

    min-height: 0;

}

ul.nav.justify-content {

    justify-content: space-evenly;

}

section#region-main .row{

  display: flex;

}


.carousel, .carousel-inner, .carousel-item {
     height: auto !important ;
}

</style>

<section class="student_bg-layer">

    <!-- Navigation -->


<?php global $DB, $OUTPUT, $PAGE, $USER;
          $instancesql = $DB->get_record_sql("SELECT * FROM {config} where `name`='custommenuitems'");
       $a=$instancesql->value;
   include('menu.php');


require_once($CFG->dirroot.'/theme/lambda/layout/includes/custom_header.php'); ?>

<div class="container">

  <div class="row align-items-center pt-5">

    <div class="col-md-12">

      <div class="banner-text">

        <span class="online-text">on-line Education</span>

        <p class="lets-text"> <span>TUTOR</span></p>
      </div>
    </div>
  </div>
</div>
</section>
<!-- teachin -->
<div class="teachin-g">
<div class="container">
  <div class="row" style="text-align: center;">
    <div>  <p   style="font-size: 16px;font-weight: 900;text-decoration-thickness: 5px !important; text-decoration-color: blue!important;
    text-decoration: underline;">Why Campustutr</p>
      <p class="en_verment"    >We give you better teaching environment</p> </div></div>
  </div>
    
    <div class="container sec1">
  <div class="row" style="text-align: center;">

    <div class="col-md-4">
  <div class="a12"style=" background-color:blue;">
   


  <div class="a2">
   
    <div class="a3">
      <img src="image/Access_your_Student.svg" style="text-align:center;height: 40px;width: 40px; align-items: center;">
      <p class="acces_s"> Access your students</p>
  </div>
  </div>
</div></div>

<div class="col-md-4">
<div class="a12">
<img src="image/Overlay2.svg" style="text-align:center;height: 230px;width: 280px; align-items: center;margin-left: 20px;">
<div class="a2">

  <div class="a3">
    <img src="image/Interactive_Classes.svg" style="text-align:center;height: 40px;width: 40px; align-items: center;">
    <p > 100% live <br> interactive classes</p>
</div>
</div>
</div></div>

<div class="col-md-4">
<div class="a12">
<img src="image/Overlay3.svg" style="text-align:center;height: 230px;width: 320px; align-items: center;">
<div class="a2">

  <div class="a3">
    <img src="image/Home_Tutoring.svg" style="text-align:center;height: 40px;width: 40px; align-items: center;">
    <p  >Work like home <br>tutoring</p>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<!--  teachin-->

<div class="container sec1">
    <div class="row">
    <div class="col-md-4">
    <div class="a12">
<img src="image/Overlay3.svg" style="text-align:center;height: 230px;width: 320px; align-items: center;">

  <div class="a2">
   
    <div class="a3">
      <img src="image/Teach_in_Ur_Lang.svg" style="text-align:center;height: 40px;width: 40px; align-items: center;">
     <p>Teach in
your language</p>
  </div>
  </div>
</div></div>
<div class="col-md-4">
<div class="a12">
<img src="image/Overlay2.svg" style="text-align:center;height: 230px;width: 280px; align-items: center;margin-left: 20px;">
<div class="a2">

  <div class="a3">
    <img src="image/Personlized_Teaching.svg" style="text-align:center;height: 40px;width: 40px; align-items: center;">
    <p >Personalized teaching</p>
</div>
</div>
</div></div>
<div class="col-md-4">
<div class="a12">

<div class="a2">
 
  <div class="a3">
<img src="image/All_in_Teaching_app.svg" style="text-align:center;height: 40px;width: 40px; align-items: center;">
<p >All in one teaching app</p>
</div>
</div>
</div>
</div>
</div>
</div>




<section class="ima_age img1234">
<div class="container">
<div class="row ">
  <div class="col-md-12">
<img src="image/Life_Circle.svg" class="Life_Circle_img">
</div>
</div>

  </div>

</section>
<div class="container-fluid">
<div class="row img123">
  <div><p class="tures100">100+ tutors<br>
    <span class="a_teaching"><b>are teaching on Campustutr</b></span></p>
     </div>
<img src="image/100+Tutors.svg" class="bg_hight">
</div>
  </div>


<section class="testimonial pb-5">
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


           <?php $notification = $DB->get_records('student_testimonial'); 
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

</section>
<?php
require_once($CFG->dirroot.'/theme/lambda/layout/includes/enquiry.php');
require_once($CFG->dirroot.'/theme/lambda/layout/custom_footer.php');
 ?>


 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


  

