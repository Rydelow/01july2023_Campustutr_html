<?php 
global $DB, $OUTPUT, $PAGE, $USER;
         
   
   
 
 $to = "saroj@lds-international.in";
$subject = "CampusTutr: account confirmation";

$message = "
<html>
<head>
<title></title>
</head>
<body>
<p>Hi ".$userdata->firstname." ".$userdata->lastname." ,</p>
<p>A new account has been requested at 'CampusTutr'
using your email address.</p>

<p>To confirm your new account, please go to this web address:</p>

<p><a href='".$CFG->wwwroot.'confirm.php?data='$userdata->secret.'/'.$userdata->username."'>".$CFG->wwwroot.'confirm.php?data='$userdata->secret.'/'.$userdata->username."</a></p><br>

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
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <enquiry@campustutr.com>' . "\r\n";

mail($to,$subject,$message,$headers);
$edata="Message send Sucessfully";

   
               ?>
