<?php
class block_searchdashboard extends block_list {
    public function init() {
        $this->title = get_string('pluginname', 'block_searchdashboard');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    function get_content () {
    //  global $CFG;
    //  $this->content         = new stdClass;
    //  $this->content->items  = array();
    //  $this->content->icons  = array();
    //  $this->content->footer = '';

        // $this->content->items[] = html_writer::tag('a', "My Module", array('href' => "$all_lesson_planner"), $CFG->wwwroot."/my/");
        
    global $CFG, $OUTPUT, $DB, $USER;
        if ($this->content !== null) {
            return $this->content;
        }   
        $this->content = new stdClass;
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';
        $spacer = array('height' => 1, 'width' => 4);
        $subtopic = array('height' => 1, 'width' => 15);

if(is_siteadmin() || user_has_role_assignment($USER->id,10) || user_has_role_assignment($USER->id,3) || user_has_role_assignment($USER->id,1) || user_has_role_assignment($USER->id,12)){



  // $this->content->items[]="<br><h5 id='instance-92-header' style='padding-right: 19px !important;' class='card-title d-inline'> Notification</h5><br>";

  $data_uu = $CFG->wwwroot . '/blocks/customhomepage/notification_user.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Notification', array('href' => $data_uu));
}
if(is_siteadmin()){

$this->content->items[]="<br><h5 id='instance-92-header' style='padding-right: 19px !important;' class='card-title d-inline'>User Role Approve</h5><br>";

  $data_enrolleddata = $CFG->wwwroot . '/blocks/customhomepage/registration_all_user.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Registartion User', array('href' => $data_enrolleddata));


  $this->content->items[]="<br><h5 id='instance-92-header' style='padding-right: 19px !important;' class='card-title d-inline'>User bulk upload</h5><br>";

  $csv_file_upload = $CFG->wwwroot . '/blocks/customhomepage/csv_file_upload.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Bulk upload file', array('href' => $csv_file_upload));

// $this->content->items[]="<br><h5 id='instance-92-header' style='padding-right: 19px !important;' class='card-title d-inline'> User Type En Course</h5><br>";

//   $data_enrolleddata = $CFG->wwwroot . '/blocks/customhomepage/teacher_role_courses.php';
//   $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Teacher Enrolled Course', array('href' => $data_enrolleddata));

// $tutors_role = $CFG->wwwroot . '/blocks/customhomepage/tutors_role_course.php';
//   $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Tutors Enrole Courses', array('href' => $tutors_role));




    }
        
       
       
        
       
            return $this->content;
    }
}