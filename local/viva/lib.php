<?php
// This file is part of Assignement module
//
// this file lib file using in this local plugin
/**
 * Plugin function  are defined here.
 *
 * @package     local_viva
 * @category    Assignement lib file
 * @copyright   2023 Andrew Robinson
 * @license     fullversion Viva
 */

/**
 * @param moodleform $formwrapper The moodle quickforms wrapper object.
 * @param MoodleQuickForm $mform The actual form object (required to modify the form).
 * https://docs.moodle.org/dev/Callbacks
 * This function name depends on which plugin is implementing it. So if you were
 * This function would be called wordsquare_coursemodule_standard_elements
 * (the mod is assumed for course activities)
 */
function local_viva_coursemodule_standard_elements($formwrapper, $mform) {
    // For example $existing = get_existing($coursemodule);
    // You have to write get_existing.
     global $DB, $PAGE;
    $modulename = $formwrapper->get_current()->modulename;
    if ($modulename == 'assign') {
         if($formwrapper->get_current()->id){

              $vquestion=viva_question($formwrapper->get_current()->id);
              if(!empty($vquestion)){
                $formwrapper->get_current()->turn_on_viva='1';
              }
              $i=0;
              $vivaquestionfield="";
              $question_old_value=array();
              foreach ($vquestion as $value) {
                $i++;
                if($i==1){
                  $formwrapper->get_current()->question_1=$value->question_name;
                  $mform->addElement('hidden', 'question_1_value',$value->id);
                }else{
                  $question_old_value[$value->id]=$value->id;
                  $vivaquestionfield.='<div id="questionfitem'.$i.'00" class="form-group row fitem questionfitem'.$i.'">
  <div class="col-md-3 col-form-label d-flex pb-0 pr-md-0">
    <label id="id_examplefield_label" class="d-inline word-break " for="id_examplefield">Question </label>
    <div class="form-label-addon d-flex align-items-center align-self-start"></div>
  </div>
  <div class="col-md-9 form-inline align-items-start felement" data-fieldtype="text">
    <input type="text" class="form-control " name="question_other['.$value->id.']" id="examplefield" value="'.$value->question_name.'">
    <button type="button" class="btn btn-danger m-10" vivaqstrm remove-id="'.$i.'00">Remove</button>
    <div class="form-control-feedback invalid-feedback" id="id_error_examplefield"></div>
  </div>
</div>';
                }              
              }
            $mform->addElement('hidden', 'question_old_value',json_encode($question_old_value));  
          }
  


    	$mform->addElement('html','<style>.assigne_turn_on_viva input#id_turn_on_viva[type="checkbox"] {
    position: relative;
    width: 40px;
    height: 20px;
    -webkit-appearance: none;
    background: #c6c6c6;
    outline: none;
    border-radius: 20px;
    box-shadow: inset 0 0 5px rgba(255, 0, 0, 0.2);
    transition: 0.7s;
}
.assigne_turn_on_viva input#id_turn_on_viva:checked[type="checkbox"] {
  background: #03a9f4;
}
.assigne_turn_on_viva input#id_turn_on_viva[type="checkbox"]:before {
  content: "";
  position: absolute;
  width: 18px;
  height: 16px;
  border-radius: 20px;
  top: 50%;
  left: 3px;
  background: #ffffff;
  transform: translateY(-50%);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  transition: .5s;
}

.assigne_turn_on_viva input#id_turn_on_viva:checked[type="checkbox"]:before {
  left: 19px;
}

.assigne_turn_on_viva .form-check {
	align-items:end;
	column-gap: 0.5rem;
}
.assigne_turn_on_viva label{
	margin-bottom:0px;
}
button.btn.btn-danger.m-10 {
    margin-left: 4px;
}

</style>');
      $mform->addElement('header', 'vivaheader', get_string('assignment_header', 'local_viva'));
      if(!empty($vquestion)){
                $mform->setExpanded('vivaheader');
       }         
      $mform->addElement('html','<span viva>');
      $mform->addElement('checkbox', 'turn_on_viva', get_string('turn_on_viva', 'local_viva'),' ',array('class'=>"assigne_turn_on_viva"));
      $mform->addElement('html','<span class="vivafelement" style="display: none;">');
      $viva_qs = array();      
      $viva_qs[] =& $mform->createElement('text', 'question_1', get_string('question', 'local_viva'));
      $viva_qs[] =& $mform->createElement('static', '', '', '<span class="btn btn-primary" vivamoreqst>Add More</span>');
      $mform->addGroup($viva_qs, 'vivaquestion', get_string('question', 'local_viva'), array(' '), false);
      // $mform->addRule('vivaquestion', 'Please Fill Your Question', 'required', 'question_1');
      $mform->addElement('html',$vivaquestionfield);
      $mform->addElement('html','</span>');
      $mform->addElement('html','</span>');
      $PAGE->requires->js(new moodle_url('/local/viva/js/vivascript.js'));
 		  $PAGE->requires->jquery();
      $PAGE->requires->jquery_plugin('ui');
      // $PAGE->requires->js_call_amd('local_viva/registration', 'init');
        //$mform->addElement('text', 'examplefield', get_string('examplefieldlabel', 'local_callbacks'));
        //$mform->setType('examplefield', PARAM_RAW);
        // Populate with $mform->setdefault('examplefield', $existing['examplefield']);.
    }

}
/**
 * @param  $id The module id.
 * @return get all viva question
 * https://docs.moodle.org/dev/Callbacks
 * This function name depends on which plugin is implementing it. So if you were
 * This function would be called wordsquare_coursemodule_standard_elements
 * (the mod is assumed for course activities)
 */
function viva_question($id){
    global $DB;
  $vdata = $DB->get_records_sql("SELECT * FROM {viva_qst_data} where `assignmentid`=?", array($id)); 
  return $vdata;
}
/**
 * @param  $oldquestion previous question id.
 * @param  $question_other viva all question field question.
 * @param  $question_other viva all question assignement id.
 * @return get all viva question
 * This function name check old question, all question and assign id update , insert and delete 
 */
function vivaQuestionInsertedcheck($oldquestion,$question_other,$assignid){
  if(empty($oldquestion)){
    //inserted question
    foreach ($question_other as $questionValue) {
      if(!empty($questionValue)){
        vivaNewquestioninsert($questionValue,$assignid);
      }
    }
  }else{
    //check which one new
    $viva_old_question=json_decode(json_encode($oldquestion), true);
    $newvivaquestion=array_diff(array_keys($question_other),array_keys($viva_old_question));
      if(!empty($newvivaquestion)){
          foreach ($newvivaquestion as $key => $value) {
            if(!empty($question_other[$value])){
                vivaNewquestioninsert($question_other[$value],$assignid);
            }
          }
      }
      //delete viva question
      if(empty(array_keys($question_other))){
        $question_othervalue=array();
      }else{
        $question_othervalue=array_keys($question_other);
      }
     $deletevivaquestion=array_diff(array_keys($viva_old_question),$question_othervalue);
     if(!empty($deletevivaquestion)){
          foreach ($deletevivaquestion as $key => $value) {
           vivaquestiondeleted($value,$assignid);
          }
      }
      //updated viva question
      $updatevivaquestion=array_intersect(array_keys($question_other),array_keys($viva_old_question));
      if(!empty($updatevivaquestion)){
          foreach ($updatevivaquestion as $key => $value) {
            vivaquestionupdate($question_other[$value],$value);
          }
      }
 
  }
}
/**
 * @param $question The viva qustion name.
 * @param $id The viva qustion table id.
 * @return this function viva question update after return true
 * This function name depends on viva question update
 */
function vivaquestionupdate($question,$id){
  global $DB;
  if(!empty($id)){
     if($DB->record_exists('viva_qst_data',array('id'=>$id))){
      $data=new stdClass();
      $data->id=$id;
      $data->question_name=$question;
      $data->modifieddate=time();
      $DB->update_record('viva_qst_data',$data);  
      return true;
     }
  }
}
/**
 * @param $value Inserted viva qustion table id.
 * @param $assignid The viva qustion instance id.
 * @return this function viva question delete after return true
 * This function name depends on viva question delete
 */
function vivaquestiondeleted($value,$assignid=null){
    global $DB;
     $DB->delete_records("viva_qst_data", array("id"=>$value)); 
     return true;
}
/**
 * @param $question The viva question name.
 * @param $assignid The viva qustion instance id.
 * @param $vquestionid  $vquestionid Inserted viva qustion table id.
 * @return this function  $vquestionid according Inserted , updated  and return true.
 * This function name $vquestionid depends on insert  and update ,if $vquestionid is avalabile to data update and $vquestionid is not avalabile to data inserted.
 */
function vivaNewquestioninsert($question,$assignid,$vquestionid = null){
  global $DB;
  if(!is_null($vquestionid)){
        $data=new stdClass();
        $data->id=$vquestionid;
        $data->question_name=$question;
        $data->modifieddate=time();
        $DB->update_record('viva_qst_data',$data);  
        return true;
  }else{
      if(!empty($question)){
        $data=new stdClass();
        $data->assignmentid=$assignid;
        $data->question_name=$question;
        $data->createddate=time();
        $DB->insert_record('viva_qst_data',$data);  
        return true;
      }
  }
}
/**
 * @param $assignid The viva qustion instance id.
 * @return this function viva trun off button  to all delete current $assignid question and turn true
 * This function name viva trun off to all delete current $assignid question .
 */
function turnoffVivaquestion($assignid){
  global $DB;
  $vdata = $DB->get_records('viva_qst_data',array('assignmentid'=>$assignid)); 
    if(!empty($vdata)){
        foreach ($vdata as $value) {
          vivaquestiondeleted($value->id);
        }
    }
    return true;
}

