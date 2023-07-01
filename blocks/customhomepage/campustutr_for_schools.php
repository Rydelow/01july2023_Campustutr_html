<?php require_once("../../config.php");
global $DB,$CFG, $OUTPUT, $PAGE, $USER;
$sitetitle="forschool";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/style/lds.css" />

 <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/blocks/customhomepage/css/custom.css">

 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

<section class="school_bg-layer">

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

        <p class="lets-text"> <span>SCHOOL</span></p>

      </div>

		</div>

	</div>

</div>



</section>
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

          <?php $notification = $DB->get_records('student_collage_testimonial'); 
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


<?php
require_once($CFG->dirroot.'/theme/lambda/layout/custom_footer.php');
 ?>


<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->


 
</body>
</html>
