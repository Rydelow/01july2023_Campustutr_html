<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;
$sitetitle="regi";



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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">
<style type="">
	.forgo_t a {
    color: #0b2f50;
    /* margin-bottom: 13px; */
}
.forgo_t {
    padding-bottom: 16px;
}
.img-fluid.left {
    width: 100%;
    height: 505px;
}
.new_form.form_css {
    padding-top: 19%;
}
.new_form.form_css {
    margin-top: 10%;
   /* border: 1px solid cadetblue;*/
    padding: 49px;
    box-shadow: rgba(4, 33, 60, 0.29) 0px 18px 50px 4px;

}
.clear{
	clear: both;
}

.social{text-align: center;}

.fa_c {
border-radius: 27px;
    background-color: #0c7eaa;
    color: #fff;
    padding: 3px;
    border-radius: 25px;
    width: 30px;
height: 30px;
display: inline-block;
}
.tw_t {
border-radius: 27px;
    background-color: #1DA1F2;
    color: #fff;
 padding: 3px;
    border-radius: 25px;
    width: 30px;
height: 30px;
display: inline-block;
}
.in_g {
border-radius: 27px;
    background-color: #db4a39;
color: #fff;
 padding: 3px;
    border-radius: 25px;
    width: 30px;
height: 30px;
display: inline-block;}
.go_g {
border-radius: 27px;
  background-color: #ff3000;
color: #fff;
 padding: 3px;
    border-radius: 25px;
    width: 30px;
height: 30px;
display: inline-block;
}
.li_n {
border-radius: 27px;
    background-color: #0e76a8;
    color: #fff;
    padding: 3px;
    border-radius: 25px;
    width: 30px;
height: 30px;
display: inline-block;
}
.social a:hover{
color: #fff;
}


.text-center.u_sgn {
    padding: 15px 0;
}
.u_sgn span{
background-color: #fff;
color: #000;
padding: 6px 19px;
border-radius: 28px;
border: 1px solid #0c55a478;
}
.u_hr {
  left: 0;
margin-top: -42px;
position: absolute;
width: 100%;
border: 1px double;
    z-index: -122;

}
.for_m_sign{
	padding-bottom: 66px;
}

.social a:hover{
	transform: scaleY(10px);
}

/*-------socialbtn---------*/

/* Shared */
.social a {
    display: inline-block;
}
.loginBtn {
 box-sizing: border-box;
    position: relative;
    margin: 0.2em;
    padding: 0 11px 0 37px;
    border: none;
    text-align: left;
    line-height: 40px;
    white-space: nowrap;
    border-radius: 0.2em;
    font-size: 14px;
    font-weight: bold;
    color: #FFF;
    width: 47%;
        border-radius: 25px;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
     top: 3px;
    left: 0;
    width: 34px;
    height: 90%;
}
.loginBtn:focus {
  outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
}
.loginBtn--facebook:before {
  border-right: #364e92 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
}
.loginBtn--facebook:hover,
.loginBtn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}


/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}
.c_btn {
    color: #2f6bc3;
}
.c_sign{
	    text-align: center;
    padding-top: 5%;
}
/*-------socialbtn---------*/



@media screen and (min-width: 1260px) {
.social{text-align: center;}

.loginBtn {
    box-sizing: border-box;
    position: relative;
    margin: 0;
    padding: 0 11px 0 37px;
    border: none;
    text-align: left;
    line-height: 40px;
    white-space: nowrap;
    border-radius: 0.2em;
    font-size: 12px;
    font-weight: bold;
    color: #FFF;
    width: 48%;
    border-radius: 25px;
}


}

@media screen and (max-width: 1024px) {
.new_form.form_css{
    padding: 15px;
}
.c_ncel, .subm_it_t{width: 100%;}

.loginBtn{
    width: 60%!important;
}

    .new_form.form_css{
padding: 10px;
    }

    .subm_it_t{
        width: 60%!important;
    }

.cancel-new_account ul .btn.create-btn{
    font-size: 12px!important;
    font-weight: 500!important;
}

.cancel-new_account ul .btn.cancel-btn {
    padding: .8em 0.2em!important;
    color: #ffffff!important;
    text-transform: uppercase!important;
    font-size: 16px!important;
    background: red!important;
}




}



@media screen and (max-width: 768px) {

.container{
    width: 100%;
}
.c_ncel {
width: 100%!important;
}


.subm_it_t {
    width: 100%!important;
    margin-left: 0!important;
}
.loginBtn{
    width: 100%!important;
}

    .new_form.form_css{
padding: 10px;
    }
.loginBtn {
    width: 91%!important;
}


}


@media screen and (max-width:568px) {
.container{
    width: 100%;
}

.loginBtn{
    width: 100%;
}

    .new_form.form_css{
padding: 10px;
    }
.u_hr {
    left: 2%;
    margin-top: -42px;
    position: absolute;
    width: 95%;
    border: 1px double;
    z-index: -122;
}
.social a {
    display: block;
    width: 100%;
    margin-bottom: 13px;
}



}
/*---------media-query-End-----------*/

.c_ncel {
    display: inline;
    width: 30%;
    float: left;
    }


  .subm_it_t
  {
        display: inline-block;
    width: 59%;
    margin-left: 5%;
    float: left;
  }
.forgo_t a{
    font-weight: 700;
}
.cancel-new_account ul .btn.create-btn{
    font-weight: bold !important;
    font-size: 18px !important;
}
.c_sign{
    font-weight: 700;
}
.forgo_t{
    text-align: right;
    padding-right: 15px;
}
.subm_it_t{
    margin-right: 35px;
    margin-left: 0px !important;
}
</style>

</head>
<body>


	<section class="new-bg-layer">
		<!-- Navigation -->
		<?php global $DB, $OUTPUT, $PAGE, $USER;
		$instancesql = $DB->get_record_sql("SELECT * FROM {config} where `name`='custommenuitems'");
		$a=$instancesql->value;
		include('menu.php');

		require_once($CFG->dirroot.'/theme/lambda/layout/includes/custom_header.php'); ?>
<div class="banner-text text-center">
        <p class="lets-text">CampusTutr <span class="yello-text">Login</span></p>
      </div>
	</section>
	<section class="curve-img"> </section>
	<section class="for_m_sign">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="form-img">
						<img src="<?= $CFG->wwwroot; ?>/theme/lambda/layout/image/Register_Illustration.svg" class="img-fluid left">
					</div>
				</div>
				<div class="col-md-4">
					<div class="new_form form_css">
						<form method="post" action="<?= $CFG->wwwroot; ?>/login/index.php">
							<div class="form-group">
                                <label>Username*</label>
                                <input type="text" name="username" class="form-control" required="">
                                <div id="emailmessage"></div>
                            </div>
							<div class="form-group">
								<label>Password*</label>
								<input type="password" name="password" class="form-control" required="">
							</div>
							
							<div class="row">
							<div class="col-md-12">
								<div class="forgo_t">
									<a href="<?= $CFG->wwwroot; ?>/login/forgot_password.php">Forgot Password</a>
								</div>
							</div>
							</div>
							<div class="Fo_rm_btn">

                                <div class="subm_it_t">
                                    <div class="form-group">
                                <div class="cancel-new_account">
                                    <ul class="ul-btns">
                        <input type="submit" id="submitdata" name="submitdata" class="btn create-btn" value="Login">
                                </ul>
                                </div>
                            </div>
                                </div>


                                <div class="c_ncel">
									<div class="form-group">
								<div class="cancel-new_account">
									<ul class="ul-btns">
									<a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/login.php" class="btn cancel-btn btn-danger text-white border-0">Cancel</a>
								</ul>
								</div>
							</div>
							<div class="clear"></div>
								</div>


								



								  <div class="clear"></div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<p class="text-center u_sgn"><span>or Sign Up Using</span></p>
								<hr class="u_hr">
									<div class="social">
										
										
								      <!--    <a class="fa_c" href="https://www.campustutr.com/auth/oauth2/login.php?id=2&wantsurl=%2F&sesskey=<?php //echo sesskey();?>"> <i class="fab fa-facebook-f"></i></a> -->
								       
								        <!--  <a class="tw_t" href=""> <i class="fab fa-twitter"></i></a>
								         <a class="in_g" href=""> <i class="fab fa-instagram"></i></a> -->
								        <!--  <a class="go_g" href="https://www.campustutr.com/auth/oauth2/login.php?id=1&wantsurl=%2F&sesskey=<?php //echo sesskey();?>"> <i class="fab fa-google-plus-g"></i></a> -->
								        <!--  <a class="li_n" href=""> <i class="fab fa-linkedin-in"></i></a> -->
								        <a href="https://www.campustutr.com/auth/oauth2/login.php?id=2&wantsurl=%2F&sesskey=<?php echo sesskey();?> " class="loginBtn loginBtn--facebook">
										  Login with Facebook
										</a>

										<a  href="https://www.campustutr.com/auth/oauth2/login.php?id=1&wantsurl=%2F&sesskey=<?php echo sesskey();?>" class="loginBtn loginBtn--google">
										  Login with Google
										</a>
								          <div class="clear"></div>
								       
									</div>
									<p class="c_sign">Don't have an Account? <a href="https://www.campustutr.com/blocks/customhomepage/sign_up.php" class="c_btn"> Create an Account</a></p>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>




<br>
<br>


<?php

// echo $CFG->dirroot . '/auth/googleoauth2/lib.php';

//  require_once($CFG->dirroot . '/auth/googleoauth2/lib.php'); 
// auth_googleoauth2_display_buttons(); ?>













		<style>
			nav.navbar.navbar-expand-lg.navbar-light.bg-transparent.pt-3.pb-3{
				position: relative;
				z-index: 9;
			}

			.new-bg-layer{
		     background: transparent linear-gradient(270deg, #0093D8 0%, #0259BA 100%) 0% 0% no-repeat padding-box;
             opacity: 1;
             min-height: 273px;
			}
			.new-bg-layer .banner-text {
    font: normal normal bold 62px/192px Poppins;
}
.new_form input, .new_form select {
    border: 1px solid #ccc;
    min-height: 45px;
    border-radius: 50px!important;
    padding: 0 30px;
}
.new_form label {
    font-weight: 500;
}
.cancel-new_account ul{
	padding: 0;
	margin: 0;
}
.cancel-new_account ul a {
    border: 1px solid #ccc;
    border-radius: 50px;
    font-weight: 500;
    font-size: 13px;
    width: 100%;
}
.cancel-new_account ul  .btn.cancel-btn {
    padding: .6em 1.2em;
    color: #ccc;
    font-size: 16px;
}
.cancel-new_account ul  .btn.create-btn {
    padding: .5em 1.5em;
    background: transparent linear-gradient( 0deg
 , #0093D8 0%, #0259BA 100%) 0% 0% no-repeat padding-box;
    border-radius: 49px;
    display: inline-block;
    color: #fff;
    padding: 0.1em .5em; 
    font-weight: 500;
    font-size: 13px;
    width: 100%;
    text-align: center;
        border: solid 1px #0259BA;
}
@media only screen and (max-width: 768px) {
	.new_form input, .new_form select {
    padding: 1.4em;
}
.new-bg-layer .banner-text {
    font: normal normal bold 30px/192px Poppins;
}
.cancel-new_account ul a{
	font-size: 17px;
}
.cancel-new_account ul .btn.create-btn{
	font-size: 15px;
}
}
   
</style>

	<?php
	require_once($CFG->dirroot.'/theme/lambda/layout/custom_footer.php');
	?>
<script>


</script>

	<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>


	<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->



</body>
</html>
