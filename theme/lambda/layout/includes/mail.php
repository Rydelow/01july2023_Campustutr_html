<?php require_once(__DIR__ . '/../../../../config.php');

global $DB, $OUTPUT, $PAGE, $USER,$CFG;
 //$to = "campustutr@gmail.com,ksandeep840@gmail.com";
//$to="userdemo367@gmail.com";
 if(!empty($_POST['send_message'])){
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$messages=$_POST['message'];
 
 //$to = "campustutr@gmail.com,ksandeep840@gmail.com";
//$to="userdemo367@gmail.com";


$messagehtml = "
<html>
<head>
<title></title>
</head>
<body>
<p>Contact Enquiry Form </p>
<table>
<tr>
<th>Fullname</th>
<th>".$fullname."</th>
</tr>
<tr>
<td>Email </td>
<td>".$email."</td>
</tr>

<tr>
<td>Phone Number </td>
<td>".$phone."</td>
</tr>

<tr>
<td>Message </td>
<td>".$messages."</td>
</tr>

</table>
</body>
</html>
";



$fromUser = "enquiry@campustutr.com";
$subject = "Contact Us Enquiry";
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
email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);
$emailuser->email = 'ksandeep840@gmail.com';
email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);
$urltogo= $CFG->wwwroot."?mail='sucess'";

echo $urltogo;
redirect($urltogo);



   }




 
  