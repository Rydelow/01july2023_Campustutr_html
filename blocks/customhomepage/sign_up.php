<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$CFG;
// session_start();
$_SESSION['visitpage']="signup";
$sitetitle="regi";
$countries = get_string_manager()->get_list_of_countries();
require_once($CFG->dirroot . '/user/editlib.php');

require_once($CFG->libdir . '/authlib.php');

// require_once('lib.php');



if(!empty($_POST['submitdata'])){

//   echo "ccccccc".$_SESSION['visitpage'];
// die();

  
if($_POST['sesskey']!=sesskey()){
 redirect(new moodle_url($CFG->wwwroot."/blocks/customhomepage/sign_up.php"),'Invalid User', null, \core\output\notification::NOTIFY_SUCCESS);
      exit();
}



if(empty($_SESSION['visitpage'])){
   redirect(new moodle_url($CFG->wwwroot)); 
exit();
}
$userrecorddata=$DB->get_record_sql("SELECT * FROM {user} where username='".$_POST['username']."' or `email`='".$_POST['username']."' or username='".$_POST['emailid']."' or `email`='".$_POST['emailid']."'");
if(!empty($userrecorddata)){
     redirect(new moodle_url($CFG->wwwroot."/blocks/customhomepage/sign_up.php"),'User Name Allready Exits', null, \core\output\notification::NOTIFY_SUCCESS);
      exit();
}








    $userinsert  = new stdClass();
    $userinsert->auth="email";
    $userinsert->username = $_POST['username'];
    $userinsert->password=md5($_POST['password']);
    $userinsert->firstname= $_POST['first_name'];
    $userinsert->lastname= $_POST['last_name'];
    $userinsert->email= $_POST['emailid'];
    $userinsert->email2= $_POST['emailid'];

    $userinsert->city= $_POST['city'];
    $userinsert->country= $_POST['country'];
    // $userinsert->timecreated= time();
    // $userinsert->timemodified= time();
    // $userinsert->middlename= " ";
    $userinsert->confirmed= 0;
    $userinsert->mnethostid= 1;
     //print_r($userinsert);
    //die;

    $userinsert->submitbutton = "Create my new account";
    $newuserdata= signup_setup_new_user($userinsert);
    $userinsert->secret=$newuserdata->secret;
if(empty($userrecorddata)){
    $insertRecords=$DB->insert_record('user', $userinsert);
}
    $userdata = $DB->get_record("user", array("id"=>$insertRecords));

    if(!empty($userdata)){
 $to = $userdata->email;

$messagehtml = "
<html>
<head>
<title></title>
</head>
<body>
<p>Hi ".$userdata->firstname." ".$userdata->lastname." ,</p>
<p>A new account has been requested at 'CampusTutr'
using your email address.</p>

<p>To confirm your new account, please go to this web address:</p>

<p><a href='".$CFG->wwwroot."/login/confirm.php?data=".$userdata->secret."/".$userdata->username."'>".$CFG->wwwroot.'/login/confirm.php?data='.$userdata->secret.'/'.$userdata->username."</a></p><br>

<p>In most mail programs, this should appear as a blue link
which you can just click on. If that doesn't work,
then cut and paste the address into the address
line at the top of your web browser window.<p>
<p>
If you need help, please contact the site administrator,<p>
<br>

CampusTutr
</body>
</html>
";

// Always set content-type when sending HTML email


$fromUser = "notification@campustutr.com";
      $subject = "CampusTutr: account confirmation";
          $emailuser = new stdClass();
          $emailuser->email = $userdata->email;
         $emailuser->maildisplay = true;
       $emailuser->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
       $emailuser->id = 1;
       $emailuser->firstnamephonetic = false;
       $emailuser->lastnamephonetic = false;
       $emailuser->middlename = false;
       $emailuser->username = false;
       $emailuser->alternatename = false;
  $dataemail=email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);

  // //print_r($mail);die;
  //     if($dataemail){
  //         echo 'mail send';
  //     }else{
  //         echo 'failed';
  //     }
  //     die();
$edata="Message send Sucessfully";





if(!empty($_POST['user_type'])){

if($_POST['user_type']=="3"){
    $role="Teacher";
}elseif ($_POST['user_type']=="4") {
    $role="Tutor";
}
if($_POST['user_type']=="3" || $_POST['user_type']=="4"){
 
$usertypdataavl=$DB->get_record('registration_usertype', array('user_id'=>$insertRecords));
if(empty($usertypdataavl)){

    $usertypedata=new stdClass();
    $usertypedata->user_id=$insertRecords;
    $usertypedata->user_type=$_POST['user_type'];
    $usertypedata->createdtime=time();
 $insertRecords=$DB->insert_record('registration_usertype', $usertypedata);

$mastermessagehtml = "
<html>
<head>
<title></title>
</head>
<body>
<p>Hi,</p>
<p>A new account has been registered in 'CampusTutr'
for <b>".$role."</b> Role.</p>
<p>User Details :<br>
<b>Full Name</b>: ".$userdata->firstname." ".$userdata->lastname." <br>
<b>Email-Id</b>: ".$userdata->email." <br>
<b>User Name </b>: ".$_POST['username']." <br>
<b>User Type </b>: ".$role." <br> <br>

Ragrads,
CampusTutr
</body>
</html>
";

// Always set content-type when sending HTML email


$fromUser = "notification@campustutr.com";
      $subject = "CampusTutr: user registration";
          $emailuser = new stdClass();
          $emailuser->email = 'campustutr@gmail.com';
         $emailuser->maildisplay = true;
       $emailuser->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
       $emailuser->id = 1;
       $emailuser->firstnamephonetic = false;
       $emailuser->lastnamephonetic = false;
       $emailuser->middlename = false;
       $emailuser->username = false;
       $emailuser->alternatename = false;
  $dataemail=email_to_user($emailuser,$fromUser, $subject, $message = '', $mastermessagehtml);
$emailuser->email = '@gmail.com';
// email_to_user($emailuser,$fromUser, $subject, $message = '', $mastermessagehtml);
}

}

    


}



   
    //redirect(new moodle_url($CFG->wwwroot.'confirm.php?data='$userdata->secret.'/'.$userdata->username));




}
    // if(!empty($userdata)){
    //  complete_user_login($userdata);
    //     \core\session\manager::apply_concurrent_login_limit($userdata->id, session_id());
    //  redirect(new moodle_url($CFG->wwwroot.'/my/index.php'));
    // }

}


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/style/lds.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>  

<style type="">
    .new_form.form_css {
    margin-top: 10%;
    /* border: 1px solid cadetblue; */
    padding: 49px;
    box-shadow: rgb(4 33 60 / 29%) 0px 18px 50px 4px;
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
.loginBtn--facebook:hover{
color: #fff;
    background-color: #517aea;
    background-image: linear-gradient(#2144a7, #618bff);
}

.loginBtn--facebook:focus {
    color: #fff;
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


  .subm_it_t{
        display: inline-block;
    width: 59%;
    margin-left: 5%;
        float: left;
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
        <p class="lets-text"><?php if(empty($edata)){ ?>   
            CREATE  <span class="yello-text">NEW ACCOUNT</span>
<?php }else{ ?>
 CONFIRM  <span class="yello-text">YOUR ACCOUNT</span>
<?php } ?>

        </p>
      </div>
    </section>
    <section class="curve-img"> </section>
    <section>
        
<?php if(empty($edata)){ ?> 
                <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12 col-sm-6">
                    <div class="form-img">
                        <img src="<?= $CFG->wwwroot; ?>/theme/lambda/layout/image/Register_Illustration.svg" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4 col-12 col-sm-6">
                    <div class="new_form form_css">
                        <form method="post" action="" autocomplete="no-fill">
                            <div class="form-group">
                                <label>Username*</label>
                                <input type="text" name="username" class="form-control" required="" autocomplete="off">
                                <div id="emessage"></div>
                            </div>
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" name="password" class="form-control" required="" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label>Email address*</label>
                                <input type="emai" name="emailid" class="form-control" required="" autocomplete="off">
                                <div id="emailmessage"></div>
                            </div>
                            <!-- <div class="form-group">
                                <label>Email(again)*</label>
                                <input type="email" name="email_again" class="form-control" required="">
                                <div id="email_againmessage"></div>
                            </div> -->
                            <div class="form-group">
                                <label>First name*</label>
                                <input type="text" name="first_name" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Surname*</label>
                                <input type="text" name="last_name" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>City/town</label>
                                <input type="text" name="city" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control"  name="country">
                                    <option value="">Select Country</option>    
                                    <?php foreach ($countries as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo  $value; ?></option> 
                                    <?php } ?>                              
                                </select>
                            </div>
<input type="hidden" name="sesskey" value="<?php echo sesskey(); ?>">
                                <div class="form-group">
                                <label>User Type*</label>
                                <select class="form-control"  name="user_type" required="">
                                    <option value="">Select User Type</option>    
                                    <option value="1">Student</option>    
                                    <option value="3">Teacher</option>
                                    <option value="4">Tutor</option>                         
                                </select>
                            </div>


                            <div class="Fo_rm_btn">
                                <div class="subm_it_t">
                                    <div class="form-group">
<div class="cancel-new_account">
                                    <ul class="ul-btns">
                        <input type="submit" id="submitdata" name="submitdata" class="btn create-btn" value="CREATE ACCOUNT">
                                </ul>
                                </div>


                               
                            </div>
                            <div class="clear"></div>
                                </div>


                                <div class="c_ncel">

                                    <div class="form-group">

                                 <div class="cancel-new_account">
                                    <ul class="ul-btns">
                                    <a href="<?= $CFG->wwwroot; ?>/blocks/customhomepage/sign_up.php" class="btn cancel-btn">Cancel</a>
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
                                        
                                        
                                      <!--    <a class="fa_c" href="https://www.campustutr.com/auth/oauth2/login.php?id=2&wantsurl=%2F&sesskey="> <i class="fab fa-facebook-f"></i></a> -->
                                       
                                        <!--  <a class="tw_t" href=""> <i class="fab fa-twitter"></i></a>
                                         <a class="in_g" href=""> <i class="fab fa-instagram"></i></a> -->
                                        <!--  <a class="go_g" href="https://www.campustutr.com/auth/oauth2/login.php?id=1&wantsurl=%2F&sesskey="> <i class="fab fa-google-plus-g"></i></a> -->
                                        <!--  <a class="li_n" href=""> <i class="fab fa-linkedin-in"></i></a> -->
                                        <a href="https://www.campustutr.com/auth/oauth2/login.php?id=2&wantsurl=%2F&sesskey=<?php echo sesskey();?>" class="loginBtn loginBtn--facebook">
                                          Login with Facebook
                                        </a>

                                        <a href="https://www.campustutr.com/auth/oauth2/login.php?id=1&wantsurl=%2F&sesskey=<?php echo sesskey();?>" class="loginBtn loginBtn--google">
                                          Login with Google
                                        </a>
                                          <div class="clear"></div>
                                       
                                    </div>
                                    <p class="c_sign">Do you have an Account? <a href="https://www.campustutr.com/blocks/customhomepage/login.php" class="c_btn"> Login</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
</div>
        </div>
<?php }else{ ?>
<div class="container">
    <div class="row">
<p>An email should have been sent to your address at <b><?php echo $userdata->email; ?></b><br>

It contains easy instructions to complete your registration.<br>

If you continue to have difficulty, contact the site administrator.<br></p>

    </div>
</div>
    
    
    
<?php } ?>
            
    </section>




<br>
<br>













        <style>

nav.navbar.navbar-expand-lg.navbar-light.bg-transparent.pt-3.pb-3 {
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
 padding: .8em 1.2em;
    color: #ccc;
    text-transform: uppercase;
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
    font-size: 16px;
    width: 100%;
    text-align: center;
    border: solid 1px #0259BA;
    text-transform: uppercase;
}
@media only screen and (max-width: 768px) {
    .new_form input, .new_form select {
    
}
.new-bg-layer .banner-text {
    font: normal normal bold 30px/192px Poppins;
}
.cancel-new_account ul a{
    font-size: 17px;
}
}
   #submitdata{
    font-size: 16px;
}
</style>

    <?php
    require_once($CFG->dirroot.'/theme/lambda/layout/custom_footer.php');
    ?>
<script>
    $('#submitdata').on('click', function () {
        var username=$('[name="username"]').val();
    

    });

        var username=$('[name="username"]').val();
        if(username.length>0){
            jQuery.ajax({
            type: "POST",
            url: '<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/jquery.php',
            data: {
            action: 'usernamevalid',
            username: username 
            },
            success: function (data) {  
                if(data=="notavl"){
                    jQuery('#emessage').html('Username  already registered').css('color', 'red'); 
                    jQuery(":submit").attr("disabled", true);
                }else{
                    jQuery('#emessage').html(''); 
                    //jQuery('#emessage').html('Valid Email').css('color', 'green');  
                    jQuery(":submit").removeAttr("disabled");
                    return (true);
                }
           
            }
            });
        }
    $('[name="username"]').on('keyup', function () {
        var username=$(this).val();
        if(username.length>0){
            jQuery.ajax({
            type: "POST",
            url: '<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/jquery.php',
            data: {
            action: 'usernamevalid',
            username: username 
            },
            success: function (data) {  
                if(data=="notavl"){
                    jQuery('#emessage').html('Username  already registered').css('color', 'red'); 
                    jQuery(":submit").attr("disabled", true);
                }else{
                    jQuery('#emessage').html(''); 
                    //jQuery('#emessage').html('Valid Email').css('color', 'green');  
                    jQuery(":submit").removeAttr("disabled");
                    return (true);
                }
           
            }
            });
        }

    });



    
 $('[name="emailid"]').on('keyup', function () {
        var email=jQuery(this).val();
    if(email.length>0){
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)){
            jQuery.ajax({
            type: "POST",
             url: '<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/jquery.php',
            data: {
            action: 'usernamevalid',
            username: email 
            },
            success: function (data) {  
              
                if(data=="notavl"){
                    $('#emailmessage').html('Email address already registered').css('color', 'red'); 
                    $(":submit").attr("disabled", true);
                }else{
                    $('#emailmessage').html(''); 
                    //jQuery('#emessage').html('Valid Email').css('color', 'green');  
                    $(":submit").removeAttr("disabled");
                    return (true);
                }
           
            }
            });
            }else{
        $('#emailmessage').html('Please Enter valid Email address').css('color', 'red');  
            $(":submit").attr("disabled", true);
            return (false);
            }
        }
    });


$('[name="email_again"]').on('keyup', function () {
        var email=jQuery(this).val();
    if(email.length>0){
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)){
            jQuery.ajax({
            type: "POST",
             url: '<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/jquery.php',
            data: {
            action: 'usernamevalid',
            username: email 
            },
            success: function (data) {  
              
                if(data=="notavl"){
                    $('#email_againmessage').html('Email address already registered').css('color', 'red'); 
                    $(":submit").attr("disabled", true);
                }else{
                    $('#email_againmessage').html(''); 
                    //jQuery('#emessage').html('Valid Email').css('color', 'green');  
                    $(":submit").removeAttr("disabled");
                    return (true);
                }
           
            }
            });
            }else{
        $('#email_againmessage').html('Please Enter valid Email address').css('color', 'red');  
            $(":submit").attr("disabled", true);
            return (false);
            }
        }
    });

</script>

    <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->



</body>
</html>
