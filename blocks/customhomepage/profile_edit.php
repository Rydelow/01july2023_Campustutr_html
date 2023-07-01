<?php require_once("../../config.php");
include('form_notification.php');
global $DB, $OUTPUT, $PAGE, $USER;

if(!empty($_POST['Update'])){
	$updata=new stdClass();
	$updata->id=$_POST['id'];
	$updata->username=$_POST['username'];
	$updata->email=$_POST['email'];
	$updata->firstname=$_POST['firstname'];
	$updata->lastname=$_POST['lastname'];
	$updata->timemodified=time();
if(!empty($_POST['password'])){
	$updata->password=md5($_POST['password']);
}

$DB->update_record('user', $updata,true);
redirect($CFG->wwwroot."/blocks/customhomepage/csv_file_upload.php?sucessfully='Update'");
}

$id = optional_param('id',0, PARAM_INT);
$userrecord=$DB->get_record('user',array('id'=>$id));
if(empty($USER->id)){
    redirect($CFG->wwwroot);
}
 if(is_siteadmin() || user_has_role_assignment($USER->id,10) || user_has_role_assignment($USER->id,3)){}
else
{redirect($CFG->wwwroot);}


//echo $USER->id;
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title('Profile Update');
$PAGE->set_heading('Profile Update');
$loginsite = 'Custom Home Page';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(('Profile Update'), new moodle_url('/blocks/customhomepage/profile_edit.php?id='.$id));
$PAGE->set_url('/blocks/customhomepage/profile_edit.php?id='.$id);
echo $OUTPUT->header();

?>
<!-- Latest compiled and minified CSS -->



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <?php    

    
  

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
body{
    font: 14px;
}
ul.breadcrumb li a {
    font-size: 18px;
    padding: 11px 4px;
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
    width: 80%;
    margin: auto;
    /*text-align: center;*/
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

.field-icon {
 /* float: right;*/
  margin-left: -25px;
  /*margin-top: -25px;*/
  position: relative;
  z-index: 2;
}


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="u_pload_form">

<div class="f_or_m p-3">
  <form method="POST">
  	<input type="hidden" name="id" value="<?php echo $id; ?>">
   
       <div class="col-md-12"><h2 class="mb-4">Edit Profile</h2></div>
        <div class="row">
          <div class="col-md-6">
    <div class="form-group">
    <label for="exampleFormControlInput1">User Name </label>
    <input type="text" class="form-control" value="<?= $userrecord->username; ?>" name="username" placeholder="User Name">
    <div id="emessage"></div>
  </div>
</div>
 <div class="col-md-6">
    <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="text" class="form-control" name="email"  value="<?= $userrecord->email; ?>"  placeholder="Email address">
  </div>
</div>
</div>
 <div class="row">
  <div class="col-md-6">
    <div class="form-group">
    <label for="exampleFormControlInput1">First Name </label>
    <input type="text" class="form-control" name="firstname" value="<?= $userrecord->firstname; ?>" placeholder="First Name">
  </div>
</div>

    <div class="col-md-6">
    <div class="form-group">
    <label for="exampleFormControlInput1">Last Name </label>
    <input type="text" class="form-control" name="lastname" value="<?= $userrecord->lastname; ?>"    placeholder="Last Name">
  </div>
</div>
</div>

  
    <div class="row">
   
<div class="col-md-6">
    
     <div class="form-group">
            <label class=" control-label">Password</label>
           
             <div class="pass">
                  <input id="password-field" placeholder="*****" type="password" name="password" class="form-control" autocomplete="new-password"  value="" >
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
             </div>
            </div>
          </div>
          </div>

 <div class="row">

<div class="col-md-12">
     <div class="S_bmit text-center">
         <input class="bk_upl_oad" type="submit" name="Update" value="Update">
     </div>

</div>
</div>

   

</form>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>

<script>

setTimeout(function() {
    $('#sucessfully').fadeOut('fast');
}, 6000); // <-- time in milliseconds


</script>
<script type="">
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


    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
    input.attr("placeholder", "");
  } else {
    input.attr("type", "password");
    input.attr("placeholder", "*****");
  }
});

</script>

<?php
echo $OUTPUT->footer();

?>
