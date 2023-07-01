<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;

$id = optional_param('id',0, PARAM_INT);



function unenroluser_fromcourse($courseid, $userid)
    {
        global $DB, $CFG, $USER;
        
        $instances = $DB->get_records('enrol', array('courseid' => $courseid));
        foreach ($instances as $instance) {
            $plugin = enrol_get_plugin($instance->enrol);
            $plugin->unenrol_user($instance, $userid);
        }
        return true;
    } 


function enrolCourse($courseid, $userid, $roleid,$endtime,$startime) {
    global $DB, $CFG;
    $query = 'SELECT * FROM {enrol} WHERE enrol = "manual" AND courseid = '.$courseid;
    $enrollmentID = $DB->get_record_sql($query);
    if(!empty($enrollmentID->id)) {
        if (!$DB->record_exists('user_enrolments', array('enrolid'=>$enrollmentID->id, 'userid'=>$userid))) {
            $userenrol = new stdClass();
            $userenrol->status = 0;
            $userenrol->userid = $userid;
            $userenrol->enrolid = $enrollmentID->id;
            $userenrol->timestart  = $startime;
            $userenrol->timeend = $endtime;
            $userenrol->modifierid  = 2;
            $userenrol->timecreated  = time();
            $userenrol->timemodified  = time();
            //print_r($userenrol);die;
            $enrol_manual = enrol_get_plugin('manual');
            $enrol_manual->enrol_user($enrollmentID, $userid, $roleid, $userenrol->timestart, $userenrol->timeend);
            // add_to_log($courseid, 'course', 'enrol', '../enrol/users.php?id='.$courseid, $courseid, $userid);
             //there should be userid somewhere!
            //redirect('http://lln.axisinstitute.edu.au/my');
        } else {
            $oldenroll = $DB->get_record('user_enrolments', array('enrolid'=>$enrollmentID->id, 'userid'=>$userid));
            $oldenroll->timestart = $startime;
            $oldenroll->timeend = $endtime;
            if($oldenroll){
                $insertRecords=$DB->update_record('user_enrolments', $oldenroll);
            }
        }
    }
}



if(empty($USER->id)){
	redirect($CFG->wwwroot);
}
if(is_siteadmin())
{
    
    
}
else
{redirect($CFG->wwwroot);}




//echo $USER->id;
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title($role.'Enrole Courses');
$PAGE->set_heading($role.'Teacher Enrole Courses');
$loginsite = 'Custom Home Page';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(($role.' Enrole Courses'), new moodle_url('/blocks/customhomepage/registration_all_user.php'));
$PAGE->set_url('/blocks/customhomepage/registration_all_user.php');
echo $OUTPUT->header();

?>
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
if(!empty($_POST['value_data']))
{
	$lastcoursedata="";

  $arra=array();
  $dataff=$DB->get_records_sql("SELECT ct.instanceid,u.id,u.username,u.firstname,u.lastname,u.email FROM {user} u INNER JOIN {role_assignments} ra ON ra.userid = u.id INNER JOIN {context} ct ON ct.id = ra.contextid WHERE ra.roleid ='".$_POST['role_id']."' AND ra.userid ='".$_POST['userid']."'");

  foreach ($dataff as $values) {
  $arra[]=$values->instanceid;

  }

$newarray=array();
 foreach ($_POST['course_id'] as $key) 
    {
if(!empty($key)){
    $newarray[]=$key;


                                 $start=time();
                                $end=strtotime("+1 year");
                 enrolCourse($key,$_POST['userid'],$_POST['role_id'],$end,$start);
                 $statusdata=new stdClass();
                 $statusdata->id=$_POST['statusid'];
                $statusdata->status=0;
                $statusdata->modifiedtime=time();
                $DB->update_record('registration_usertype', $statusdata);


$courseData=$DB->get_record("course", array("visible"=>1,'id'=>$key));
$lastcoursedata.=$courseData->fullname.",";
}
    }


    $results=array_diff($arra,$newarray);
    if(!empty($results)){
      foreach ($results as $valuedelete) {
        unenroluser_fromcourse($valuedelete,$_POST['userid']);
      }
    }
   
 $allcoursedata=rtrim($lastcoursedata,",");

if($_POST['role_id']=="3"){
  $myrole="teacher";
}elseif ($_POST['role_id']=="10") {
  $myrole="Tutor";
}

if(!empty($_POST['course_id'] )){
  $userdata = $DB->get_record("user", array("id"=>$_POST['userid']));

    if(!empty($userdata)){
 $to = $userdata->email;

$messagehtml = "
<html>
<head>
<title></title>
</head>
<body>
<p>Hi ".$userdata->firstname." ".$userdata->lastname." ,</p>
<p>You have sucessfully enroled in <b>".$allcoursedata."</b> courses for ".$myrole." </p>


<br>


CampusTutr
</body>
</html>
";

// Always set content-type when sending HTML email


$fromUser = "notification@campustutr.com";
      $subject = "CampusTutr: enrolled confirmation";
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
}
}
	redirect($CFG->wwwroot."/blocks/customhomepage/user_enroll_data.php?id=".$id."&sucessfully=update");	
}



?>


<?php if(!empty($_GET['sucessfully'])){ 

if($_GET['sucessfully']=="delete"){
  ?>

<div class="isa_success" id="sucessfully">Deleted Sucessfully</div>
<?php }else{ ?>
 <div class="isa_success" id="sucessfully">Updated Sucessfully</div> 
<?php
} 
}?>

<br/>



<div id="Mysucee1" style="display: none;" class="alert alert-success fade in alert-dismissible hohop" >
                                	</div>



<style>
div#lessiontable_filter {
    display: none;
}
.isa_success:before {
   font-family: "Font Awesome 5 Free";
   content: "\f00c";
   display: inline-block;
   padding-right: 3px;
   vertical-align: middle;
   font-weight: 900;
   padding-right: 9px;
}

.isa_success {
   position: fixed;
    right: 17px;
    z-index: 99999;
     color: white;
    background-color: #6faf04;
    bottom: 37px;
    width: 200px;
    padding-left: 5px;
    line-height: 29px;
    border-radius: 4px;
}



	.col-md-7d {
    width: 87%;
}
	.rowd{
		display: flex;
    align-items: center;
	}
.col-md-3d {
    width: 13%;
}

	a.btn-info.infon i {
    color: #fff;
}
	.form-control.devi {
    height: 40px;
    width: 340px;
}
.hide_moodle
{
	    padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    background-color: #d9534f !important;

}
.showmoodle
{
  padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    background-color: #4cae4c !important;
}
.infon{
 padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    background-color:#5bc0de !important;
}
.showmoodle i {
    color: #fff;
}
  .hohop
		{
		z-index: 999999;

position: fixed;

width: 17%;

background: #29b52ccc !important;

bottom: 1px;

color: white;

right: 14px;

padding: 10px;
border-radius: 6px;
margin-left: 12%;

font-weight: 600;	
		}
                .delete_modle
                {
                padding: 6px 10px;
    background-color: #f5902b;
    border-radius: 4px;
    cursor: pointer;   
    color:white;
                }
                .ul_drop
                {
                    list-style-type: none;
                }
                .ul_drop li 
                {
                   display: inline-block; 
                }
                .no_padding_class{
                  padding:0 !important;
                }
                
</style>
<?php $usertypdataavl=$DB->get_record('registration_usertype', array('user_id'=>$id));
$datauser=$DB->get_record('user',array('id'=>$usertypdataavl->user_id));
if($usertypdataavl->user_type=="3"){
    $role="Teacher";
    $role_id="3";
}elseif ($usertypdataavl->user_type=="4") {
    $role="Tutor";
     $role_id="10";

}
?>

<h4><b><?php echo $datauser->firstname." ".$datauser->lastname; ?></b> / <small><?php echo $datauser->email; ?></small> User For "<?php echo $role; ?>"  Role Courses <?php if($usertypdataavl->status=="1"){?> Approve <?php }else{ ?> Approve Update <?php } ?></h4>

<form method="post">
  <input type="hidden" name="statusid" value="<?php echo $usertypdataavl->id; ?>">
 <input type="hidden" name="userid" value="<?php echo $datauser->id; ?>"> 
<input type="hidden" name="role_id" value="<?php echo $role_id; ?>">
<table id="lessiontable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th >S.l</th>
                <th>Course Name</th>
            
            
                <th>Un Enrol/Enrol -Select All <input type="checkbox"  class="checkboxx" id="select-all"> </th>
               
                
            </tr>
        </thead>
        <tbody>



<?php 
$coursedata = $DB->get_records("course", array("visible"=>1));
$i=1;
foreach ($coursedata as $datavalue) {
  $dataf=$DB->get_record_sql("SELECT u.id,u.username,u.firstname,u.lastname,u.email,ct.instanceid FROM {user} u INNER JOIN {role_assignments} ra ON ra.userid = u.id INNER JOIN {context} ct ON ct.id = ra.contextid WHERE ra.roleid ='".$role_id."' AND ra.userid ='".$datauser->id."' AND ct.instanceid='".$datavalue->id."'");
 ?>


          <tr>
            <td><?php echo  $i++; ?></td>
            <td><?php echo $datavalue->fullname; ?></td>
           <td> 
                    <ul class="ul_drop">
               
<li> <input type="checkbox" <?php 
if(!empty($dataf)){
if($dataf->instanceid==$datavalue->id){ echo "checked='true'"; }  }


  ?>  value="<?php echo $datavalue->id; ?>" name="course_id[]" class="checkboxx">  </li>


  
                    </ul> 
                    

                    </td>
          </tr>

<?php } ?>


    
      </tbody>
       
    </table>
<input type="submit" value="submit" name="value_data">
</form>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>



<script>
    


$('#select-all').click(function(event) {
  if (this.checked) {
    $(':checkbox').prop('checked', true);
  } else {
    $(':checkbox').prop('checked', false);
  }
});


  $('#lessiontable').DataTable({
        "aLengthMenu": [ [500, 1000, 1500,1500, -1], [500, 1000, 1500, "All"] ],
        "sPaginationType": "full_numbers",
        "pageLength": 500
      });



setTimeout(function() {
    $('#sucessfully').fadeOut('fast');
}, 6000); // <-- time in milliseconds


</script>


<?php
echo $OUTPUT->footer();

?>
