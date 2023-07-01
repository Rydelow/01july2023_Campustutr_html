<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;

 function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
// Excel file name for download 

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


$scoursedata=array_unique(array_merge(array_unique($users1),array_unique($users2),array_unique($users3)));



$i=1;

 $fileName = "Campustutr - All Userdata - " . date('d-m-Y') . ".xls"; 
    $fields = array('S.L','User Name','First Name','Last Name','Email-ID'); 


        $excelData = implode("\t", array_values($fields)) . "\n"; 
foreach ($scoursedata as $ndata) {

     $datavalue = $DB->get_record_sql("select * from {user} where id='".$ndata."'");
 date_default_timezone_set('Asia/Kolkata');
    $rowData = array($i++,$datavalue->username,$datavalue->firstname,$datavalue->lastname,$datavalue->email);
    array_walk($rowData, 'filterData'); 
    $excelData .= implode("\t", array_values($rowData)) . "\n"; 
       }

	
header("Content-Disposition: attachment; filename=".$fileName); 
header("Content-Type: application/vnd.ms-excel"); 
// Render excel data 
echo $excelData; 
exit();
print('<script>window.location.href="https://www.campustutr.com/blocks/customhomepage/category_manger_all_user.php"</script>');