<?php
require('../../config.php');
$user_name= "Admin";
$email="sharvan@ldsengineers.com";
$pwd="P@ssw0rd";

 //Mail Function
 $messagehtml =   "<p><b>Hello $user_name</b></p>
 <p>We're excited to be with you through your Learning journey!</p>
 <p > Here's your user ID and password of your Learning account:</p>
 <p><b>User ID:</b> $email</p>
 <p><b>Password:</b> $pwd</p>
 <table style='background-color: rgb(218,31,61);' cellpadding='15'>
 <tr><td>
 <p>Click below to access your Learning Account!</p>
 <a  href='http://learning.tcglobal.com/index.php' style=' padding: 10px 50px;
 background-color: rgb(177, 24, 48);
 display: inline-block;
 border-radius: 4px;
 border: 2px solid white;
 color: #fff;
 text-decoration: none;
 font-weight: bold;'> MY LEARNING ACCOUNT</a>
</td><td>
<img src='".$CFG->wwwroot."/blocks/myprofile/img-events-fount.png' style='width:150px; height:150px; margin-left:30px;'/>
</td> 
</tr>
</table>
 <p>Step into the new wave of Global Learning-more informed and confident with TC Global!</p>
 <p>Welcome to the Movement!</p>
 <p>Speak Soon,</p>
 <p><b><i>TC Global</i></b></p>
 <p>011-61401000</p>
 <p> © 2019 TCGlobal India Pvt Ltd - All rights reserved.</p>";
     // $fromUser = $USER->email;
     $fromUser ='suneet@ldsengineers.com';
     $subject = 'Welcome to TCGlobal Learning!';
     $emailuser = new stdClass();
     $emailuser->email = 'saroj@ldsengineers.com';
     $emailuser->maildisplay = true;
     $emailuser->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
     $emailuser->id = 1;
     $emailuser->firstnamephonetic = false;
     $emailuser->lastnamephonetic = false;
     $emailuser->middlename = false;
     $emailuser->username = false;
     $emailuser->alternatename = false;
      //print_r($messagehtml);die;
      $mail = email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);
      //print_r($mail);die;
      if($mail){
          echo 'mail send';
      }else{
          echo 'failed';
      }
?>
