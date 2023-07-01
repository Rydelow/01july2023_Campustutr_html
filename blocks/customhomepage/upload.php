<?php require_once("../../config.php");
include('form_notification.php');
global $DB, $OUTPUT, $PAGE, $USER;

$id = optional_param('id',0, PARAM_INT);


if(empty($USER->id)){
    redirect($CFG->wwwroot);
}
 if(is_siteadmin() || user_has_role_assignment($USER->id,10) || user_has_role_assignment($USER->id,3) || user_has_role_assignment($USER->id,12) && user_has_role_assignment($USER->id,13)){}
else
{redirect($CFG->wwwroot);}


//echo $USER->id;
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Csv Upload');
$PAGE->set_heading('Csv Upload');
$loginsite = 'Custom Home Page';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(('Csv Upload'), new moodle_url('/blocks/customhomepage/upload.php'));
$PAGE->set_url('/blocks/customhomepage/upload.php');
echo $OUTPUT->header();

?>
<!-- Latest compiled and minified CSS -->



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <?php    

    if(!empty($_POST['uploadcsv'])){
$csv = array();

    if($_FILES['csv']['error'] == 0){
    $name = $_FILES['csv']['name'];
    $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
    $type = $_FILES['csv']['type'];
    $tmpName = $_FILES['csv']['tmp_name'];
        if($ext === 'csv'){
            if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);
            $row = 0;
                while(($data = fgetcsv($handle, 10000, ',')) !== FALSE) {
                // number of fields in the csv
                $col_count = count($data);
                $row++;
                    if($row!=1){
                       $first_name=ucwords(strtolower($data[0]));
                       if(!empty($data[1])){
                        $last_name=ucwords(strtolower($data[1]));
                        $password=md5(strtolower(str_replace(" ","",strtolower(preg_replace("/\([^)]+\)/","",$data[1])))));
                       }else{
                        $last_name="";
                         $password=md5(strtolower(str_replace(" ","",strtolower(preg_replace("/\([^)]+\)/","",$data[0])))));
                       }

                      $usname=strtolower(str_replace(" ","",$first_name.$last_name));
                      $u=preg_replace("/\([^)]+\)/","",str_replace(" ","",$usname));
                       $user_name=$u;
                       $dataavl=$DB->get_record('user',array('username'=>$user_name));
                       if(!empty($dataavl))
                       {
                        $d=strtolower(str_replace(" ","",$first_name.$last_name));
                        $ud=preg_replace("/\([^)]+\)/","",str_replace(" ","",$d));
                        $user_name=strtolower(str_replace(" ","",$ud))."".rand(10,100);
                       }



        $userinsert  = new stdClass();
        $userinsert->username = $user_name;
        $userinsert->password=$password;
        $userinsert->firstname= $first_name;
        $userinsert->lastname= $last_name;
        $userinsert->email= "9553718511";
        $userinsert->timecreated= time();
        $userinsert->middlename= " ";
        $userinsert->confirmed= 1;
        $userinsert->mnethostid= 1;
        $userinsert->auth="manual";
       

      $insertRecords=$DB->insert_record('user', $userinsert);

 if(user_has_role_assignment($USER->id,12) || user_has_role_assignment($USER->id,13)){
      
      $datacheck=$DB->get_record('searchda_user_enrolledmanger',array('manger_id'=>$USER->id,'user_id'=>$insertRecords));
    if(empty($datacheck)){
    $data_role=new stdClass();
    $data_role->user_id=$insertRecords;
    $data_role->manger_id=$USER->id; 
    $data_role->createdtime=time();
    $DB->insert_record('searchda_user_enrolledmanger',$data_role);
    }



    }




    
                    }
                }
             }
         } 
    }  
    redirect($CFG->wwwroot.'/blocks/customhomepage/upload.php?sucessfully=sucessfully');
}    

  

?>





<?php if(!empty($_GET['sucessfully'])){ ?>
<div class="isa_success" id="sucessfully">Upload Sucessfully</div>
<?php } ?>

<br/>



<div id="Mysucee1" style="display: none;" class="alert alert-success fade in alert-dismissible hohop" >
                                	</div>



<style>
select.custom-select {
    width: 67%;
}
input#form_autocomplete_input-1621509311254 {
    width: 100%;
}
.or_diao {
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
                #fgroup_id_radioar label.fitem {
    margin-right: 20px;
    font-weight: 600;
    font-size: 18px;
    font-family: 'Open Sans';
}
         .dactive {
    display: block !important;
}      
.form-autocomplete-downarrow {
    color: #999;
    left: calc(100% - 1em) !important;
} 
.d-md-inline-block input {
    width: 101% !important;
}
#fgroup_id_radioard label.fitem {
    margin-right: 20px;
    font-weight: 600;
    font-family: 'Open Sans';
}
.newor_diao{
  display:none;
}
.f_or_m {
    width: 50%;
    margin: auto;
    text-align: center;
    padding: 66px 15px;
    box-shadow: 0 0 11px 1px #00000038;
}
.f_or_m input {
    width: 83%;
    height: 37px;
    border-radius: 5px;
    margin-top: 11px;
}
button.bk_upl_oad {
    padding: 10px 38px;
    font-size: 25px;
    /* margin-top: 47px; */
    display: inline-block;
}



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</style>


<div class="u_pload_form">
<div class="f_or_m">
    <form method="post" enctype="multipart/form-data">
    <input type="file" name="csv" placeholder="Upload">

    <input class="bk_upl_oad" type="submit" name="uploadcsv" value="Submit">




    
</form>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>

<script>

setTimeout(function() {
    $('#sucessfully').fadeOut('fast');
}, 6000); // <-- time in milliseconds


</script>


<?php
echo $OUTPUT->footer();

?>
