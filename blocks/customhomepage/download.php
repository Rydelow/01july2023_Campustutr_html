<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER;

 function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
// Excel file name for download 
 $coursedata = $DB->get_records_sql("select * from {user} order by id desc");
$i=1;

 $fileName = "Campustutr - All Userdata - " . date('d-m-Y') . ".xls"; 
    $fields = array('S.L','User Name','First Name','Last Name','Email-ID'); 


        $excelData = implode("\t", array_values($fields)) . "\n"; 
foreach ($coursedata as $datavalue) {
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
print('<script>window.location.href="https://www.campustutr.com/blocks/customhomepage/csv_file_upload.php"</script>');