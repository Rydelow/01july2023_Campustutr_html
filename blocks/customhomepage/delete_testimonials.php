<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;
 
if(empty($USER->id)){
	redirect($CFG->wwwroot);
}
if(is_siteadmin() || user_has_role_assignment($USER->id,9))
{
    
    
}
else
{redirect($CFG->wwwroot);}

if($_GET['id'])
{    
$eeeid=$_GET['id'];
$DB->delete_records('home_testimonial',array('id'=>$eeeid));
redirect($CFG->wwwroot."/blocks/customhomepage/home_testimonials.php?sucessfully=delete");
}
