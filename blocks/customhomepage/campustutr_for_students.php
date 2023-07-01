<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;
$sitetitle="forstudent";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/style/lds.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/yourcode.js"></script>  



</head>
<body>


	<section class="student-bg-layer">
		<!-- Navigation -->
		<?php global $DB, $OUTPUT, $PAGE, $USER;
		$instancesql = $DB->get_record_sql("SELECT * FROM {config} where `name`='custommenuitems'");
		$a=$instancesql->value;
		include('menu.php');


		require_once($CFG->dirroot.'/theme/lambda/layout/includes/custom_header.php'); ?>



		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<div class="banner-text">
						<span class="online-text">on-line Education</span>
						<p class="lets-text">Get good grades<br> with <span class="yello-text">CAMPUSTUTR</span></p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="top-layer">
						<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/student.png" class="img-fluid">
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</section>
	<br>
	<section class="student-curve-img"> </section>
	<section class="learning">
		<div class="container">
			<div class="row shadow_style">
				<div class="col-md-7">
					<div class="learning-heading">
						<h2>India’s Best Learning Portal for Students</h2>
						<p>You can learn any time you want</p>
					</div>
					<div class="learning-sub-heading">
						<p>Learn from anywhere and anytime through specially designed modules with multi formatted options such as Our eLearning platform consists of courses, training, assessments, quizzes, discussion forums, query corners.</p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="learning-img">
						<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/1.svg" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<section class="learning">
		<div class="container">
			<div class="row shadow_style">
				<div class="col-md-5">
					<div class="learning-img">
						<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/2.svg" class="img-fluid">
					</div>
				</div>
				<div class="col-md-7">
					<div class="learning-heading">
						<h2>Improves your Grades</h2>
						<p>Learn the lessons where you need help</p>
					</div>
					<div class="learning-sub-heading">
						<p>Identify the weak areas of students through Student Profile Test(SPT) and can prepare the plan for those weak areas.Personalizes the learning preferences of students through a genre of content that matches everyone’s choice, gamification and alerts, self-paced and instructor-led methods, and other personalized tools.
</p>
					</div>
				</div>

			</div>
		</div>
	</section>
	<br>
	<section class="learning">
		<div class="container">
			<div class="row shadow_style">
				<div class="col-md-7">
					<div class="learning-heading">
						<h2>Prepares you to take Exams</h2>
						<p>You can learn any time you want</p>
					</div>
					<div class="learning-sub-heading">
						<p>Prepare for the exams in a better way with Top quality questions,Pesonalised and detailed analysis,live tests for real exam experience,community of learning and also in multilanguages.
</p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="learning-img">
						<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/3.svg" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<section class="learning">
		<div class="container">
			<div class="row shadow_style">
				<div class="col-md-5">
					<div class="learning-img">
						<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/4.svg" class="img-fluid">
					</div>
				</div>
				<div class="col-md-7">
					<div class="learning-heading">
						<h2>Earn Money while you learn</h2>
						<p>You can upload your study material if you see potential to other students may pay for the content</p>
					</div>
					<div class="learning-sub-heading">
						<p>You can earn money by uploading your study material and other students may pay you for content.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="Join_btn_top-img text-center">
						<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/Join_btn_top.svg" class="img-fluid">
						<div class="Join_btn">
							<a><button class="btn btn-default">Join for free and check</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<section class="highlights-bg">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-4">
					<div class="student-highlight-img">
						<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/middle_counts_banner.png" class="fluid-img">
					</div>
				</div>
				<div class="col-md-8">
					<div class="row align-items-center">
						<div class="col-md-4">
							<div class="counter-img"><a href=""><img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/enrolled_students_icon.svg"></a>
								<div class="counter-text">
									<h1><span class="counter animated fadeInDownBig">2,523</span></h1>
									<span>Enrolled Students</span>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="counter-img">
								<a href=""><img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/Education_Awards.svg"></a>
								<div class="counter-text">
									<h1><span class="counter animated fadeInDownBig">63,075</span></h1>
									<span>Education Awards</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="counter-img">
								<a href=""><img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/Courses_avail_icon.svg"></a>
								<div class="counter-text">
									<h1><span class="counter animated fadeInDownBig">12,218</span></h1>
									<span>Courses Available</span>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
         


            <?php $notification = $DB->get_records('student_student_testimonial'); 
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
	require_once($CFG->dirroot.'/theme/lambda/layout/custom_footer.php');
	?>


	<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>


	<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->



</body>
</html>
