<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;

$id = optional_param('id',0, PARAM_INT);


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
$PAGE->set_title('Registration User');
$PAGE->set_heading('Registration User');
$loginsite = 'Registration User';
//$PAGE->navbar->add($loginsite);
$PAGE->navbar->add(('Registration User'), new moodle_url('/blocks/customhomepage/csv_file_upload.php'));
$PAGE->set_url('/blocks/customhomepage/csv_file_upload.php');
echo $OUTPUT->header();

?>
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php


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
                /*
                .re_gister_user{
                  width: 100%;
                  overflow-x: scroll;
                  overflow-y: hidden;
                }*/
                .bulf_btn{
                  text-align: right;
                }
                .Bulk_upload {
                  background-color: green;
                  padding: 9px 23px;
                  color: #fff!important;
              }
              .bulf_btn {
                  text-align: right;
                  margin-bottom: 3%;
              }
                   .re_gister_user{
                  width: 100%;
                  overflow-x: scroll;
                  overflow-y: hidden;
                }
                  .res_atbel {
                  margin-top: -16px;
              }  
              .U_pload{
                position: relative;
              }  

.up_load{
visibility: hidden;
position: absolute;
}


.U_pload {
    display: inline-block;
    background-color: red;
    color: #fff;
    padding: 9px 17px;
    margin-top: -25px;
}

.U_pload label{
  margin-bottom: 0px;
      font-size: 16px;
    font-weight: 700;
}

/*aditya*/

.wrapper1, .wrapper2 {
      overflow-x: hidden;
    overflow-y: hidden;
}

.wrapper1 {height: 20px; }
.wrapper2 {height: 100%; }

.div1 {
width: 1320px;
  height: 20px;
}

.div2 {

  height: 100%;
}
div#lessiontable_paginate {
       border: 1px solid #eee;
    bottom: 15px;
    position: fixed;
    z-index: 9999;
    background: white;
    padding: 5px 7px 21px 8px;
    /* width: 40%; */
    width: 43%;
    /* line-height: 3; */
    text-align: center;
    left: 5%;

}
.wrapper1 {
      height: 20px;
    /* position: absolute; */
    border: 70%;
    overflow: scroll;
    position: fixed;
    /* margin: 99px; */
    /* z-index: 9999; */
    margin-left: 0%;
    width: 44%;
    z-index: 999;
    bottom: 0;
    left: 5%;

}
.Bulk_uploads{
	background-color: #00807a;
    padding: 9px 23px;
    color: #fff!important;
}
.U_ploads {
    display: inline-block;
    background-color: #13f74f;
    color: #fff;
    padding: 9px 17px;
    margin-top: -25px;
}
.col-sm-6n{
float: left;
    width: 50%;
}
</style>

<div class="row">
<div class="col-sm-6n">
	 <div class="bulf_btn ">
    <a class="Bulk_uploads" href="<?php echo $CFG->wwwroot . '/blocks/customhomepage/uploadnew.php'; ?>"> <i class="fa fa-plus" aria-hidden="true"></i> Bulk upload</a>
<a href="<?php echo $CFG->wwwroot . '/blocks/customhomepage/Sample_Template.csv'; ?>">
    <div class="U_ploads">
      <label for="fname">
        Example Csv Download
  <input type="text" id="fname" name="fname" class="up_load">
  <i class="fa fa-cloud-download" aria-hidden="true"></i>
  </label>
    </div></a>
    
  

  </div>
</div>

<div class="col-sm-6n">

  <div class="bulf_btn ">
    <a class="Bulk_upload" href="<?php echo $CFG->wwwroot . '/blocks/customhomepage/upload.php'; ?>"> <i class="fa fa-plus" aria-hidden="true"></i> Bulk upload</a>
<a href="<?php echo $CFG->wwwroot . '/blocks/customhomepage/download.php'; ?>">
    <div class="U_pload">
      <label for="fname">
        Download
  <input type="text" id="fname" name="fname" class="up_load">
  <i class="fa fa-cloud-download" aria-hidden="true"></i>
  </label>
    </div></a>
    
  

  </div>
</div>


</div>
<div class=" res_atbel">

	


<form method="post" class="re_gister_user">

<div class="wrapper1">
    <div class="div1"></div>
</div>
<div class="wrapper2">
    <div class="div2">
<table id="lessiontable" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th >S.l</th>
                <th>User Name</th>
                <th>First Name</th>
                 <th>Last  Name</th>

                <th> Email-id</th>
               
                 <th>Created Time</th>
                 <th>Modified Time</th>
                 <th><i class="fa fa-pencil-square-o e_d" aria-hidden="true"></i> Edit</th>
                
            </tr>
        </thead>
        <tbody>



<?php 
$coursedata = $DB->get_records_sql("select * from {user} order by id desc");
$i=1;
foreach ($coursedata as $datavalue) {
 date_default_timezone_set('Asia/Kolkata');
  
 ?>


          <tr>
            <td><?php echo  $i++; ?></td>
            <td><?php echo $datavalue->username; ?>  </td>
            <td><?php echo $datavalue->firstname; ?>  </td>
            <td><?php echo $datavalue->lastname; ?>  </td>
           <td><?php echo $datavalue->email; ?></td>
           
        
             <td><?php echo date("h:i:sa, d M y ", $datavalue->timecreated); ?></td>

               <td>
            <?php if(!empty($datavalue->timemodified)){ ?>

                <?php echo date("h:i:sa, d M y ", $datavalue->timemodified); ?>
              <?php } ?>    


                </td>


                <td><a href="<?php echo $CFG->wwwroot . '/blocks/customhomepage/profile_edit.php?id='.$datavalue->id; ?>">
                  <i class="fa fa-pencil-square-o e_d" aria-hidden="true"></i> 
                  </a>  </td>
          </tr>

<?php } ?>


    
      </tbody>
       
    </table>



</form>
</div>


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

$(function(){
  $(".wrapper1").scroll(function(){
    $(".wrapper2").scrollLeft($(".wrapper1").scrollLeft());
  });
  $(".wrapper2").scroll(function(){
    $(".wrapper1").scrollLeft($(".wrapper2").scrollLeft());
  });
});
</script>


<?php
echo $OUTPUT->footer();

?>
