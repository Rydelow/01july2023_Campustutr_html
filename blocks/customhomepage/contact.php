<?php require_once("../../config.php");
global $DB,$CFG, $OUTPUT, $PAGE, $USER;

?>
<meta content="width=device-width, initial-scale=1" name="viewport" />
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

@media only screen and (max-width: 768px) {
.student_bg-layer{
    min-height: 499px;
    background-position: 84%;
  }
}


</style>



<section class="bg-layer">
    <!-- Navigation -->


 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&amp;display=swap" rel="stylesheet">

  
<?php global $DB, $OUTPUT, $PAGE, $USER;
          $instancesql = $DB->get_record_sql("SELECT * FROM {config} where `name`='custommenuitems'");
       $a=$instancesql->value;
   include('menu.php');


require_once($CFG->dirroot.'/theme/lambda/layout/includes/custom_header.php'); ?>

  


<div class="container-fluid">
  <div class="row align-items-center">
    <div class="col-md-1"></div>
    <div class="col-md-6">
      <div class="banner-text">
        <span class="online-text">on-line Education</span>
        <p class="lets-text">Lets Grow Your<br>Education Level up with <span class="yello-text">CAMPUSTUTR</span></p>
      </div>
    </div>
    <div class="col-md-4">
    <div class="top-layer">
      <img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/HeroImg.png" class="img-fluid">
    </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
</section>






<div class="container">
  <br>
<div class="row"><h3 class="headeing">Contact Us</h3></div>
  <div class="row">

    <div class="col-md-6">

      <div class="campus_tutur-header">
  <br>
        

        <div class="campus_tutur-content">
    <address><h4><u>Address</u></h4>
        CampusTutr.com<br>
5th Floor IT Hub Khammam<br>
India-507001<br>
        <p>Phone: +91 9701294401 <br>
        Email: Support@Campustutr.com</p>
      </address>
        
      </div>

      </div>

    </div>

    <div class="col-md-6">

      <div class="row">
<div class="">
  <br>
        <h4 class=" text-center "><u>Contact Us</u></h4>
        <div class="form-us mt-4">
        <form method="POST">
          <div class="form-group mb-4">
          <input type="Name" placeholder="Name" class="form-control" name="fullname" required="true">
        </div>
        <div class="form-group mb-4">
          <input type="Email" placeholder="Email" class="form-control" name="email" required="true">
        </div>
        <div class="form-group mb-4">
          <input type="number" placeholder="Phone" class="form-control" name="phone" required="true">
        </div>
        <div class="form-group mb-4">
         <textarea rows="3" cols="70" placeholder="Message"></textarea>

         <!--- <input type="text" placeholder="Message" class="form-control" name="message" required='true'>--->
        </div>
        <div class="form-group mb-4 text-right">
          <input type="submit" value="SEND MESSAGE" name="send_message" class="btn btn-info">
        </div>
        </form>
      </div>
      </div>
    
    </div>

    </div>

  </div>
<br>
</br>
</div>
<?php
require_once($CFG->dirroot.'/theme/lambda/layout/includes/enquiry.php');
require_once($CFG->dirroot.'/theme/lambda/layout/custom_footer.php');
 ?>



 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<style>

       .headeing {

    color: #ffae00;

} 

section#region-main {

    width: 100%!important;

    display: inline-block;

}

section#region-main .row {

    display: inline-flex;

    justify-content: space-between;

}

aside#block-region-side-pre {

    display: none;

}

.campus_tutur-image.first img {

    margin-left: 4em;

}

@media only screen and (max-width: 768px) {

  section#region-main .row {

    display: inline-block;

    justify-content: space-between;

}

.campus_tutur-image.first img {

    margin-left: 0em;

}

}

</style>

  

