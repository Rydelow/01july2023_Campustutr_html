<?php 
require_once("$CFG->libdir/formslib.php");
 
class notificationform extends moodleform {
    //Add elements to form
    public function definition() {
       global $CFG, $DB, $PAGE, $USER; 
           $mform = $this->_form;


           $radioarray=array();
$radioarray[] = $mform->createElement('radio', 'yesno', '', 'All User','alluser', $attributes);
if(is_siteadmin() || user_has_role_assignment($USER->id,1) || user_has_role_assignment($USER->id,12)){
$radioarray[] = $mform->createElement('radio', 'yesno', '','New User','newuser', $attributes);
}
$radioarray[] = $mform->createElement('radio', 'yesno', '','Enrole Course Users','enrolecourse', $attributes);
$mform->setDefault('yesno','alluser');
$mform->addGroup($radioarray, 'radioar', '', array(' '), false);
 $mform->addElement('html', '<div class="or_diao dactive" id="alluserdata">');


           $radiodata=array();
$radiodata[] = $mform->createElement('radio', 'selectuser', '', 'Select User','selectuser', $attributes);
$radiodata[] = $mform->createElement('radio', 'selectuser', '','All User','alluser', $attributes);
$mform->setDefault('selectuser','selectuser');
$mform->addGroup($radiodata, 'radioard', '', array(' '), false);

$mform->addElement('html', '<div class="newor_diao dactive" id="selectuserdata">');

			$instancesql=$DB->get_records('user');

			foreach ($instancesql as $instanceuser){ 
if(is_siteadmin() || user_has_role_assignment($USER->id,1) || user_has_role_assignment($USER->id,12)){
			$dataarray[$instanceuser->id] = $instanceuser->firstname." ".$instanceuser->lastname." (".$instanceuser->email.")" ;
}
if(user_has_role_assignment($USER->id,10) || user_has_role_assignment($USER->id,3)){
$datafound=$DB->get_record('tutor_users',array('userid'=>$USER->id,'student_userid'=>$instanceuser->id));

    if(!empty($datafound)){
          $dataarray[$instanceuser->id] = $instanceuser->firstname." ".$instanceuser->lastname." (".$instanceuser->email.")" ;
    }
}


			} 
			$options = array(                                                                                                           
			'multiple' => true,                                                  
			                                
			); 

			$mform->addElement('autocomplete', 'users','Select users' , $dataarray, $options);
			 $mform->addElement('html', '</div>');
 $mform->addElement('html', '</div><div class="or_diao" id="newuserdata">');

 $mform->addElement('text', 'email_id', 'Email Id');

  $mform->addElement('html', '</div><div class="or_diao" id="enrolecoursedata">');
if(is_siteadmin() || user_has_role_assignment($USER->id,1) || user_has_role_assignment($USER->id,12)){
$coursedata = $DB->get_records("course", array("visible"=>1));
foreach ($coursedata as $datavalue) {
		$selecttype[$datavalue->id]=$datavalue->fullname;
}
}elseif (user_has_role_assignment($USER->id,10) || user_has_role_assignment($USER->id,3)) {


  $coursedata = $DB->get_records("course", array("visible"=>1));
  foreach ($coursedata as $datavalue) {

  $myparentcategoriesdata=[];
$mycoursedata=$DB->get_records_sql("SELECT ct.instanceid,u.id,u.username,u.firstname,u.lastname,u.email FROM {user} u INNER JOIN {role_assignments} ra ON ra.userid = u.id INNER JOIN {context} ct ON ct.id = ra.contextid WHERE ra.roleid in(3,10) AND ra.userid ='".$USER->id."' AND ct.instanceid='".$datavalue->id."'");

foreach ($mycoursedata as $value) {
 $myparentcategoriesdata[]=$value->instanceid;
}
 if (in_array($datavalue->id, $myparentcategoriesdata)){
$course_details = $DB->get_record("course", array("id"=>$datavalue->id));
      $selecttype[$course_details->id]=$course_details->fullname;
    }
  }





  }
$select = $mform->addElement('select', 'courseid','Assign role',$selecttype);      
  $mform->addElement('html', '</div>'); 

  $mform->addElement('text', 'subject', 'Subject');

  $mform->addElement('editor', 'notification', 'Notification Content');
  $mform->addHelpButton('notification', 'notification', 'Symbol Help @f=First Name ,@l=Last Name,@u=User Name,@e=Email');
     $mform->setType('fieldname', PARAM_RAW);  

			$buttonarray[] = &$mform->createElement('submit', 'submitbutton', 'Send'); 
       
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
   }
 }

