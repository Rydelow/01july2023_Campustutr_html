<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;

$id = optional_param('id',0, PARAM_INT);


if(empty($USER->id)){
	redirect($CFG->wwwroot);
}
if(user_has_role_assignment($USER->id,12) && user_has_role_assignment($USER->id,13))
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
$PAGE->navbar->add(('Registration User'), new moodle_url('/blocks/customhomepage/category_manger_all_user.php'));
$PAGE->set_url('/blocks/customhomepage/category_manger_all_user.php');
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
                .re_gister_user{
                  width: 100%;
                  overflow-x: scroll;
                  overflow-y: hidden;
                }
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
.Add_us_er {
    background-color: #3381cf;
    padding: 9px 23px;
    color: #fff!important;
}

/*----vedpal




---*/

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
    width: 66%;
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
    width: 67%;
    z-index: 999;
    bottom: 0;
    left: 5%;

}
</style>


<div class=" res_atbel">
  <div class="bulf_btn ">
     <a class="Add_us_er" href="<?php echo $CFG->wwwroot . '/blocks/customhomepage/add_new_user.php'; ?>"> <i class="fa fa-user" aria-hidden="true"></i> Add User</a>
    <a class="Bulk_upload" href="<?php echo $CFG->wwwroot . '/blocks/customhomepage/upload.php'; ?>"> <i class="fa fa-plus" aria-hidden="true"></i> Bulk upload</a>
<a href="<?php echo $CFG->wwwroot . '/blocks/customhomepage/manger_download.php'; ?>">
    <div class="U_pload">
      <label for="fname">
        Download
  <input type="text" id="fname" name="fname" class="up_load">
  <i class="fa fa-cloud-download" aria-hidden="true"></i>
  </label>
    </div></a>
    
  

  </div>
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
  $adata=$DB->get_records_sql("SELECT c.instanceid,cc.name FROM {role_assignments} as rs INNER JOIN {context} as c ON rs.contextid=c.id INNER JOIN {course_categories} as cc on c.instanceid=cc.id WHERE rs.userid='".$USER->id."' and c.contextlevel='40' and rs.roleid=12");
foreach ($adata as $data) {
  $checkcategoriesparent=$DB->get_records('course_categories',array('parent'=>$data->instanceid));
          if(!empty($checkcategoriesparent)){
              foreach ($checkcategoriesparent as $value) {
                $coursedata=$DB->get_records('course',array('category'=>$value->id));

                if(!empty($coursedata)){
                 
                      foreach ($coursedata as $coursevalue) {
                          $datarole=$DB->get_records_sql("SELECT rs.userid FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id WHERE (rs.roleid='5' OR rs.roleid='3') and c.instanceid='".$coursevalue->id."'");
                            if(!empty($datarole)){
                               $users1=array();
                              foreach ($datarole as $datavalue) { 

                               $users1[]=$datavalue->userid;
                              
                              }
                            }
             
                    }

                }
              }
  
          }


$checkcategoriesparent=$DB->get_records('course_categories',array('parent'=>$data->instanceid));
      if(!empty($checkcategoriesparent)){
              foreach ($checkcategoriesparent as $value) {            
                  $datasecond_categorydata=$DB->get_records('course_categories',array('parent'=>$value->id));

                  if(!empty($datasecond_categorydata)){
                       foreach ($datasecond_categorydata as $secvalue) {
                               $coursedata=$DB->get_records('course',array('category'=>$secvalue->id));

                                        if(!empty($coursedata)){
                                       
                                              foreach ($coursedata as $coursevalue) {


                                $datarolew=$DB->get_records_sql("SELECT rs.userid FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id WHERE (rs.roleid='5' OR rs.roleid='3')  and c.instanceid='".$coursevalue->id."'");
                                                    if(!empty($datarolew)){
                                                         $users3=array();
                                                      foreach ($datarolew as $datavalue) { 
                                                       $users3[]=$datavalue->userid;
                                                      
                                                      }
                                                    }
                                     
                                            }

                                        }

                       }
                  }

              }
  
       }






          $checkcaparent_zero=$DB->get_record('course_categories',array('id'=>$data->instanceid,'parent'=>0));
            $coursedatazero=$DB->get_records('course',array('category'=>$checkcaparent_zero->id));
                if(!empty($coursedatazero)){
                  $users2=array();
                      foreach ($coursedatazero as $coursevalue) {
                        $datarolee=$DB->get_records_sql("SELECT rs.userid FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id WHERE (rs.roleid='5' OR rs.roleid='3') and c.instanceid='".$coursevalue->id."'");
                            if(!empty($datarolee)){
                              foreach ($datarolee as $datavalue) { 
                               $users2[]=$datavalue->userid;
                            
                              }
                            }
                   
                    }
                  }



}

$user4=array();
$userdatacheck=$DB->get_records('searchda_user_enrolledmanger',array('manger_id'=>$USER->id));
foreach ($userdatacheck as $valued) {
$user4[]=$valued->user_id;
}



$arrs = array();
$arrs[] = array_unique($users1);
$arrs[] = array_unique($users2);
$arrs[] = array_unique($users3);
$arrs[] = $user4;




$list = array();

foreach($arrs as $arr) {
    if(is_array($arr)) {
        $list = array_merge($list, $arr);
    }
}

$coursedata=array_unique($list);


$i=1;
foreach ($coursedata as $datavaluee) {
  $datavalue = $DB->get_record_sql("select * from {user} where id='".$datavaluee."'");

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


                <td><a href="<?php echo $CFG->wwwroot . '/blocks/customhomepage/add_new_user.php?id='.$datavalue->id; ?>">
                  <i class="fa fa-pencil-square-o e_d" aria-hidden="true"></i> 
                  </a>  </td>
          </tr>

<?php } ?>


    
      </tbody>
       
    </table>
</div>
</div>
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




// scrollbar-

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
