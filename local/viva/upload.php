<?php require_once(dirname(__FILE__) . '/../../config.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
header("HTTP/1.0 200 Successfull operation");
$getpatameter=$_POST;
if(empty($_FILES)){
$getpatameterfiles="";
}else{
$getpatameterfiles=$_FILES;	
}
$functionname = null;
$args = null;
$functionname = $getpatameter['action'];
class APIManager {
	public $status = 0; 
    public $message = "Error";
    public $data = null;
    public $code = 404;
    public $error = array(
        "code"=> 404,
        "title"=> "Server Error.",
        "message"=> "Server under maintenance"
    );
    function __construct() {
        $this->code = 404;
        $this->error = array(
            "code"=> 404,
            "title"=> "Server Error..",
            "message"=> "Missing functionality"
        );
    }
    /**
	* @param  $data api send response this function.
	* @return get all send all reponse
	*/
    private function sendResponse($data) {
        $this->status = 1;
        $this->message = "Success";
        $this->data = $data;
        $this->code = 200;
        $this->error = null;
    }
	/**
	* @param  $args The sesskey.
	* @return get all viva question
	* https://moodledev.io/general/development/policies/security/crosssite-request-forgery
	* The most important protection is the concept of a sesskey, short for session key
	*/
    public function validatetoken($args){
        global $CFG;
        $this->token = sesskey();
        if($args->token == sesskey()){
            return true;
        } else {
            $this->sendError("error","request not authenticated");
            return false;
        }
    }
    /**
 * @param  $assquestion The module id.
 * @return get all viva question
 */
   function assignmentquestion($assquestion){
   	global $DB,$CFG;
    	$dataquery=$DB->get_records('viva_qst_data',array('assignmentid'=>$assquestion['vassignmentid']));
        $r='';
        $i=1;
        foreach ($dataquery as $value) {
        	$r.="<p>Question ".$i++.": ".$value->question_name."</p>";
        }
       $this->sendResponse($r);  
   } 
   /**
	* @param  $postdata all login user id get and assignement id.
	* @param  $file assignement submission record file.
	* @return true
	* https://docs.moodle.org/dev/File_API
	* The function recording managing all the files stored by Moodle.
	*/
  function assignmentrecording($postdata,$file){
  	global $DB, $OUTPUT,$CFG;
	$fs = get_file_storage();
	$returndata=array();	
	$fileinfodata=$DB->get_record_sql("SELECT * FROM {files} WHERE itemid='".$postdata['vassignmentid']."' and contextid='".$postdata['vassigneid']."' and filename!='.' and userid='".$postdata['userid']."'");
	if(empty($fileinfodata)){
		$filename = $postdata['userid'].'_'.time().'.webm';
		$filesrc = $file["blobFile"]["tmp_name"];
		$fileinfo = array(
		'contextid' => $postdata['vassigneid'],
		'component' => 'viva_assignsubmission_video',
		'filearea' => 'overviewfiles',
		'itemid' => $postdata['vassignmentid'],
		'userid'=>$postdata['userid'],
		'filepath' => '/',
		'filename' => $filename
		);
		$newfile = $fs->create_file_from_pathname($fileinfo, $filesrc);
		$returndata['viva_action']='viva file created';
		$returndata['viva_status']='sucessfully';

	}else{
		$fileinfo = array(
		'contextid' => $postdata['vassigneid'],
		'component' => 'viva_assignsubmission_video',
		'filearea' => 'overviewfiles',
		'itemid' => $postdata['vassignmentid'],
		'filepath' => '/',
		'filename' => $fileinfodata->filename
		);
		$filedata = $fs->get_file($fileinfo['contextid'], $fileinfo['component'], $fileinfo['filearea'],$fileinfo['itemid'], $fileinfo['filepath'], $fileinfo['filename']);
		// Delete it if it exists
		if ($filedata) {
		    $filedata->delete();
		}

		$filenameNEW = $postdata['userid'].'_'.time().'.webm';
		$filesrcDATA = $file["blobFile"]["tmp_name"];
		$fileinfodata = array(
		'contextid' => $postdata['vassigneid'],
		'component' => 'viva_assignsubmission_video',
		'filearea' => 'overviewfiles',
		'itemid' => $postdata['vassignmentid'],
		'userid'=>$postdata['userid'],
		'filepath' => '/',
		'filename' => $filenameNEW
		);
		$newfile = $fs->create_file_from_pathname($fileinfodata, $filesrcDATA);
		$returndata['viva_action']='viva file deleted and created';
		$returndata['viva_status']='sucessfully';	
	}
	$this->sendResponse($returndata);	
  }  

}

$baseobject = new APIManager();
if (method_exists($baseobject, $functionname)) {
    $args = new stdClass();
     $args->token =$getpatameter['sesskey'] ;
        if($baseobject->validatetoken($args)){
            $baseobject->$functionname($getpatameter,$getpatameterfiles);
        }
}
echo json_encode($baseobject);