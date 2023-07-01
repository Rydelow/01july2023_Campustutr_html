<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
/**
 * Plugin function  are defined here.

 /**
 * This file is classes/observer.php event hook.
 *

 *
 * @package     local_viva
 * @category    Assignement event class file
 * @copyright   2023 Andrew Robinson
 * @license     fullversion Viva
 */

	
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.'); // It must be included from a Moodle page.
}

class local_viva_observer {
	/**
     * this event Handle the course_module_created event to create viva question.
     * @param \core\event\course_module_created $event
     */
	function assignment_modulecreate(\core\event\course_module_created $event){
    	global $DB;
    	$eventdata = $event->get_data();  	
    	if($eventdata['action']=='created' && $eventdata['other']['modulename']=="assign"){		
    		 $assignid=$eventdata['other']['instanceid'];
    		 if($_REQUEST['turn_on_viva']=='1'){
    		 			$fqdata=new stdClass();
    		 			$fqdata->assignmentid=$assignid;
    		 			$fqdata->question_name=$_REQUEST['question_1'];
    		 			$fqdata->createddate=time();
    		 			$DB->insert_record('viva_qst_data',$fqdata); 
    		 	foreach ($_REQUEST['question_other'] as $value) {
    		 		if(!empty($value)){
    		 			$data=new stdClass();
    		 			$data->assignmentid=$assignid;
    		 			$data->question_name=$value;
    		 			$data->createddate=time();
    		 			$DB->insert_record('viva_qst_data',$data);  
    		 		}
    		 	}
    		 }

    	}
    }
	/**
     * this event Handle the course_module_update event to update viva question.
     * @param \core\event\course_module_updated $event
     */
	function assignment_moduleupdated(\core\event\course_module_updated $event){
    	global $DB,$CFG;
    require_once($CFG->dirroot.'/local/viva/lib.php');
    	$eventdata = $event->get_data();
        $assignid=$eventdata['other']['instanceid'];
        if($eventdata['action']=='updated' && $eventdata['other']['modulename']=="assign"){ 
            if($_REQUEST['turn_on_viva']=='1'){
                //check new inserted data 
                if(!empty($_REQUEST['question_1_value'])){
                    vivaNewquestioninsert($_REQUEST['question_1'],$assignid,$_REQUEST['question_1_value']);
                }else{
                    vivaNewquestioninsert($_REQUEST['question_1'],$assignid);
                }
                // if(!empty($_REQUEST['question_other'])){
                    vivaQuestionInsertedcheck(json_decode($_REQUEST['question_old_value']),$_REQUEST['question_other'],$assignid);      
                // }
            }else{
                //this module all question are deleted beacause turn off viva
                turnoffVivaquestion($assignid);

            }
        }
    }	
    
 }  
   
