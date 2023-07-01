<?php 
function userenroll(\core\event\role_assigned $event){
global $DB, $USER;
if($event->objecttable=="role" && $event->objectid=="12" && $event->contextlevel=="40"){
		$checkcategoriesparent=$DB->get_records('course_categories',array('parent'=>$event->contextinstanceid));
					if(!empty($checkcategoriesparent)){
							foreach ($checkcategoriesparent as $value) {
								

								$coursedata=$DB->get_records('course',array('category'=>$value->id));

								if(!empty($coursedata)){
											foreach ($coursedata as $coursevalue) {
								enrolCourse($coursevalue->id,$event->relateduserid, '12','',time());
										}

								}
							}
  
					}
//onlly categories parent avl
$checkcategoriesparentavl=$DB->get_records('course_categories',array('parent'=>$event->contextinstanceid));
					if(!empty($checkcategoriesparentavl)){
							foreach ($checkcategoriesparentavl as $value) {
								
									$datasecond_categorydata=$DB->get_records('course_categories',array('parent'=>$value->id));

                  if(!empty($datasecond_categorydata)){
                       foreach ($datasecond_categorydata as $secvalue) {		
								$coursedataa=$DB->get_records('course',array('category'=>$secvalue->id));

								if(!empty($coursedataa)){
											foreach ($coursedataa as $coursevalue) {
								enrolCourse($coursevalue->id,$event->relateduserid, '12','',time());
										}

								}
                       }
                   }




							}
  
					}



					//onlly categories parent 0
					$checkcaparent_zero=$DB->get_record('course_categories',array('id'=>$event->contextinstanceid,'parent'=>0));
						$coursedatazero=$DB->get_records('course',array('category'=>$checkcaparent_zero->id));
								if(!empty($coursedatazero)){
											foreach ($coursedatazero as $coursevalue) {
										enrolCourse($coursevalue->id,$event->relateduserid, '12','',time());
										}
									}



}


if(user_has_role_assignment($USER->id,10) || user_has_role_assignment($USER->id,3)){
	$datacheck=$DB->get_record('tutor_users',array('student_userid'=>$event->relateduserid,'userid'=>$event->userid));
		if(empty($datacheck)){
		$data_role=new stdClass();
		$data_role->userid=$event->userid;
		$data_role->student_userid=$event->relateduserid;	
		$data_role->createdtime=time();
		$DB->insert_record('tutor_users',$data_role);
		}
}
if($event->objecttable=="role" && $event->objectid=="10"){
	$dataavl=$DB->get_record('role_assignments',array('roleid'=>'10','userid'=>$event->relateduserid));
	if(!empty($dataavl)){
			$datm=$DB->get_record('role_assignments',array('roleid'=>'2','contextid'=>'1','userid'=>$event->relateduserid));
					if(empty($datm)){
					$dataee=new stdClass();
					$dataee->roleid=2;
					$dataee->contextid=1;
					$dataee->userid=$event->relateduserid;
					$DB->insert_record('role_assignments',$dataee);
				}
	}

}

}

function userunenroll(\core\event\role_unassigned $event){
global $DB, $USER;
if($event->objecttable=="role" && $event->objectid=="10"){
	$dataavl=$DB->get_record('role_assignments',array('roleid'=>'10','userid'=>$event->relateduserid));
	if(empty($dataavl)){
	$datm=$DB->get_record('role_assignments',array('roleid'=>'2','contextid'=>'1','userid'=>$event->relateduserid));
		if(!empty($datm)){
			$DB->delete_records('role_assignments',array('id'=>$datm->id));
		}
	}
}


		if($event->objecttable=="role" && $event->objectid=="12" && $event->contextlevel=="40"){

				$checkcategoriesparent=$DB->get_records('course_categories',array('parent'=>$event->contextinstanceid));
					if(!empty($checkcategoriesparent)){
							foreach ($checkcategoriesparent as $value) {

							$datasecond_categorydata=$DB->get_records('course_categories',array('parent'=>$value->id));

                  if(!empty($datasecond_categorydata)){
                       foreach ($datasecond_categorydata as $secvalue) {

								$coursedata=$DB->get_records('course',array('category'=>$secvalue->id));

								if(!empty($coursedata)){
											foreach ($coursedata as $coursevalue) {
												unenroluser_fromcourse($coursevalue->id, $event->relateduserid);
							
										}

								}

                       }

                   }




							}
  
					}








		$checkcategoriesparent=$DB->get_records('course_categories',array('parent'=>$event->contextinstanceid));
					if(!empty($checkcategoriesparent)){
							foreach ($checkcategoriesparent as $value) {
								$coursedata=$DB->get_records('course',array('category'=>$value->id));

								if(!empty($coursedata)){
											foreach ($coursedata as $coursevalue) {
												unenroluser_fromcourse($coursevalue->id, $event->relateduserid);
							
										}

								}
							}
  
					}
					//onlly categories parent 0
					$checkcaparent_zero=$DB->get_record('course_categories',array('id'=>$event->contextinstanceid,'parent'=>0));
						$coursedatazero=$DB->get_records('course',array('category'=>$checkcaparent_zero->id));
								if(!empty($coursedatazero)){
											foreach ($coursedatazero as $coursevalue) {
												unenroluser_fromcourse($coursevalue->id, $event->relateduserid);
										
										}
									}

	}


}

function coursecreateenrolledmanger(\core\event\enrol_instance_created $event){
	global $DB, $USER;
$coursedata=$DB->get_record('course',array('id'=>$event->courseid));
	$checkcaparent_zero=$DB->get_record('course_categories',array('id'=>$coursedata->category,'parent'=>0));
	if(!empty($checkcaparent_zero)){
		// echo "SELECT rs.userid FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id WHERE rs.roleid='12' and c.contextlevel='40' and c.instanceid='".$checkcaparent_zero->id."'";
			$datarole=$DB->get_records_sql("SELECT rs.userid FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id WHERE rs.roleid='12' and c.contextlevel='40' and c.instanceid='".$coursedata->category."'");
			if(!empty($datarole)){
				foreach ($datarole as $datavalue) {	
					enrolCourse($event->courseid,$datavalue->userid,'12','',time());
				
				}
			}

	}else{

		$checkcaparent=$DB->get_record('course_categories',array('id'=>$coursedata->category));
	if(!empty($checkcaparent)){


					$datasecond_categorydata=$DB->get_record('course_categories',array('id'=>$checkcaparent->parent));

                  if(!empty($datasecond_categorydata)){
                 $datarolee=$DB->get_records_sql("SELECT rs.userid FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id WHERE rs.roleid='12' and c.contextlevel='40' and c.instanceid='".$datasecond_categorydata->parent."'");
			if(!empty($datarolee)){
				foreach ($datarolee as $datavalue) {	
					enrolCourse($event->courseid,$datavalue->userid,'12','',time());
				
				}
			}


                       }

		// echo "SELECT rs.userid FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id WHERE rs.roleid='12' and c.contextlevel='40' and c.instanceid='".$checkcaparent_zero->id."'";
			$datarole=$DB->get_records_sql("SELECT rs.userid FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id WHERE rs.roleid='12' and c.contextlevel='40' and c.instanceid='".$checkcaparent->parent."'");
			if(!empty($datarole)){
				foreach ($datarole as $datavalue) {	
					enrolCourse($event->courseid,$datavalue->userid,'12','',time());
				
				}
			}








	}




	}



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
           // add_to_log($courseid, 'course', 'enrol', '../enrol/users.php?id='.$courseid, $courseid, $userid); //there should be userid somewhere!
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

