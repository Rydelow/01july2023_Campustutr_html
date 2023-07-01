<?php require_once("../../config.php");
include('form_notification.php');
global $DB, $OUTPUT, $PAGE, $USER;

$id = optional_param('id',0, PARAM_INT);
$userrecord=$DB->get_record('user',array('id'=>$id));
if(empty($USER->id)){
    redirect($CFG->wwwroot);
}
 if(is_siteadmin() || user_has_role_assignment($USER->id,12) || user_has_role_assignment($USER->id,13)){}
else
{redirect($CFG->wwwroot);}


//echo $USER->id;
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Add New User');
$PAGE->set_heading('Add New User');
$loginsite = 'Custom Home Page';
//$PAGE->navbar->add($loginsite);

 if(!empty($id)){ $d="Profile Edit "; }else{ $d="Add New User";  }



$PAGE->navbar->add(($d), new moodle_url('/blocks/customhomepage/add_new_user.php'));
$PAGE->set_url('/blocks/customhomepage/add_new_user.php');
echo $OUTPUT->header();

?>
<!-- Latest compiled and minified CSS -->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <?php    

    if(!empty($_POST['uploadcsv'])){


 $updata=new stdClass();
  $updata->username=$_POST['username'];
  $updata->email=$_POST['email'];
  $updata->firstname=$_POST['firstname'];
  $updata->lastname=$_POST['lastname'];
  
if(!empty($_POST['password'])){
  $updata->password=md5($_POST['password']);
}
if(!empty($_POST['id'])){
  $updata->id=$_POST['id'];
  $updata->timemodified=time();
  $DB->update_record('user', $updata,true);
}else{
  $updata->timecreated=time();
  $insertRecords=$DB->insert_record('user', $updata,true);
  $datacheck=$DB->get_record('searchda_user_enrolledmanger',array('manger_id'=>$USER->id,'user_id'=>$insertRecords));
    if(empty($datacheck)){
    $data_role=new stdClass();
    $data_role->user_id=$insertRecords;
    $data_role->manger_id=$USER->id; 
    $data_role->createdtime=time();
    $DB->insert_record('searchda_user_enrolledmanger',$data_role);
    }

}

  
    redirect($CFG->wwwroot.'/blocks/customhomepage/category_manger_all_user.php?sucessfully=sucessfully');
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
.breadcrumb {
    font-size: 16px;
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
.navbar{
    border: 0px;
    margin-bottom:0px ;
}
.navbar .brand{
        margin-left: -15px;
}
.f_or_m {
      width: 65%;
    margin: auto;
    /* text-align: center; */
    padding: 25px 38px;

    box-shadow: 0 0 11px 1px #00000038;
}
input.bk_upl_oad.f_r_om {
    width: 50%;
}
label {
    margin-bottom: 0px;
}

.f_or_m input {
    /*width: 83%;*/
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

.block{
    display: block;
}
.input-group-btn>.btn.eye {
    position: relative;
    margin-top: 10px;
    padding: 7px 5px;
    height: 37px;
    border-left: none;
}
button.btn.btn-default.reveal:hover{background: transparent!important;color: #000!important;}
button.btn.btn-default.reveal:focus{    background: transparent!important;outline: none;
    color: #000!important;
}


button.btn.btn-default.reveal {
    margin-top: 10px;
    height: 37px;
     border-left: none;
}

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</style>


<div class="u_pload_form">
<div class="f_or_m">
    <form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <h2 class="m-0 pb-3"><?php if(!empty($id)){ echo "Profile Edit ";}else{ ?>Add New User <?php } ?></h2>
         <div class="form-group">
    <label class="block" >User Name</label>
    <input type="text" class="form-control"  value="<?= $userrecord->username; ?>" name="username" placeholder="User Name">
    <input type="hidden" class="form-control"  value="<?= $id ?>" name="id">
    <div id="emessage"></div>
  </div>
</div>
    </div>
     <div class="row">
        <div class="col-md-6">
         <div class="form-group">
    <label >First Name</label>
    <input type="text" class="form-control"  placeholder="First Name" name="firstname" value="<?= $userrecord->firstname; ?>">
  </div>
</div>
   <div class="col-md-6">
         <div class="form-group">
    <label >Last Name</label>
    <input type="text" class="form-control"  placeholder="Last Name"  name="lastname" value="<?= $userrecord->lastname; ?>">
  </div>
</div>
    </div>
      <div class="row">
        <div class="col-md-6">
         <div class="form-group">
    <label >Enter Email </label>
    <input type="text" class="form-control"  placeholder="Enter Email"  name="email"  value="<?= $userrecord->email; ?>">
  </div>
</div>
   <div class="col-md-6">
         <div class="form-group">
    <label >Enter Password</label>
    <div class="input-group">
          <input type="password" class="form-control pwd"  placeholder="" name="password" autocomplete="off">
          <span class="input-group-btn eye">
            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
          </span>          
        </div>
  </div>
</div>
    </div>
<div class="row">
        <div class="col-md-12">
         <div class="form-group text-center mt-3">

   <input class="bk_upl_oad f_r_om" type="submit" name="uploadcsv" value="Submit">
  </div>
</div>
    </div>
   




    
</form>


</div>

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>


<?php if(empty($id)){
  ?>

  <script type="text/javascript">
     $('[name="username"]').on('keyup', function () {
        var username=$(this).val();
        if(username.length>0){
            jQuery.ajax({
            type: "POST",
            url: '<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/jquery.php',
            data: {
            action: 'usernamevalid',
            username: username
            
            },
            success: function (data) {  
                if(data=="notavl"){
                    jQuery('#emessage').html('Username  allready registered').css('color', 'red'); 
                    jQuery(":submit").attr("disabled", true);
                }else{
                    jQuery('#emessage').html(''); 
                    //jQuery('#emessage').html('Valid Email').css('color', 'green');  
                    jQuery(":submit").removeAttr("disabled");
                    return (true);
                }
           
            }
            });
        }

    });
  </script>
  <?php
}else{

  ?>

<script type="text/javascript">
  $('[name="username"]').on('keyup', function () {
        var username=$(this).val();
        if(username.length>0){
            jQuery.ajax({
            type: "POST",
            url: '<?php echo $CFG->wwwroot; ?>/blocks/customhomepage/jquery.php',
            data: {
            action: 'editusernamevalid',
            username: username, 
            profileid:'<?php echo $id; ?>'
            },
            success: function (data) {  
                if(data=="notavl"){
                    jQuery('#emessage').html('Username  allready registered').css('color', 'red'); 
                    jQuery(":submit").attr("disabled", true);
                }else{
                    jQuery('#emessage').html(''); 
                    //jQuery('#emessage').html('Valid Email').css('color', 'green');  
                    jQuery(":submit").removeAttr("disabled");
                    return (true);
                }
           
            }
            });
        }

    });
</script>


<?php } ?>
<script>

setTimeout(function() {
    $('#sucessfully').fadeOut('fast');
}, 6000); // <-- time in milliseconds

$(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});





</script>


<?php
echo $OUTPUT->footer();

?>
