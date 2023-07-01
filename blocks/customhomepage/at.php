<?php
require_once("../../config.php");



global $DB,$CFG, $OUTPUT, $PAGE, $USER;
//require_once('ExcelExport.php');
require_once("$CFG->libdir/formslib.php");


global $DB, $USER;

echo $OUTPUT->header();

// $course_data = $DB->get_record_sql("SELECT * FROM {course} as c INNER JOIN {course_modules} as cm on c.id=cm.course WHERE cm.module IN ('2','5','8','9','10','14','18')");

?>
<style>

.canvasjs-chart-credit {
    display: none;
}
.chart_box{POSITION:RELATIVE}

.overlay_js{
    position: absolute;
    background-color: #fff;
    top: 0;
    left: 0;
    width: 10%;
    height: 25px;
z-index: 9;}
.inner_canvas {
    text-align: center;
    background-color: #fff;
}
.chart_box {
    POSITION: RELATIVE;
    padding: 51px;
    background: #0879da;
}
</style>



<div class="section-2">
<br>
<?php 
class customauthnticate_form extends moodleform {                  
  public function definition() {
  global $CFG, $DB, $PAGE, $USER, $COURSE,$OUTPUT;
  $mform = $this->_form;

  $courses = $DB->get_records_sql("select * from {course} WHERE visible=1");
  $course_arr = array();
  foreach($courses as $course_data){
    $course_arr[$course_data->id]= $course_data->fullname;
  }
  $courses_arr = array(''=>'-- Select Course --')+$course_arr;   

  $mform->addElement('select', 'course', "Choose Course" , $courses_arr);
  $mform->addRule('course', null, 'required', null, 'course');
 
  $mform->addElement('date_selector', 'enroll_date_from',  'Date From' );
  $mform->addElement('date_selector', 'enroll_date_to',  'To' );

  $buttonarray[] = $mform->createElement('submit', 'submitbutton', "Generate");
  // $buttonarray[] = &$mform->createElement('cancel', 'cancelbutton', "Cancel");
  $mform->addGroup($buttonarray, 'buttonar', '', ' ', false); 
  }
}

$mform = new customauthnticate_form();
echo "<br><br><br>";
 
if ($mform->is_cancelled()) { 
   redirect($CFG->wwwroot.'/local/gradesummary/submission_report.php');
} else if ($data = $mform->get_data()) {

    $courseid = $data->course;
    $enroll_date_from = $data->enroll_date_from;

    $enroll_date_to = $data->enroll_date_to;

    // $enroll_date_to = strtotime("+1 day", strtotime($data->enroll_date_to));
    // $enroll_date_to = date('m-d-Y H:i:s', strtotime($data->enroll_date_to . ' +1 day'));
    // print_r($enroll_date_to);die();
    
}

$mform->display();


$data = $mform->get_data();


if(!empty($data->course)){
    $course_data=$DB->get_record('course',array('id' =>$data->course));
    $enrolleduserdata=$DB->get_records_sql("SELECT u.id,u.firstname,u.lastname,c.instanceid,cs.fullname FROM {role_assignments} as rs INNER JOIN {context} as c on rs.contextid=c.id INNER JOIN {course} as cs on c.instanceid=cs.id INNER JOIN {user} as u on rs.userid=u.id WHERE rs.roleid='5' and c.contextlevel='50'and c.instanceid='".$data->course."'");

        foreach ($enrolleduserdata as $enrollvalue) {
            $userabsent=$DB->get_record_sql("SELECT count(atg.id) as absent  FROM {attendance} as a INNER join {attendance_sessions} as ats on a.id=ats.attendanceid INNER JOIN {attendance_log} as atg on ats.id=atg.sessionid INNER join {attendance_statuses} as ass on atg.statusid=ass.id where a.course='".$data->course."' and atg.studentid='".$enrollvalue->id."' and ass.acronym='A' and ats.sessdate BETWEEN ".$data->enroll_date_from." and ".$data->enroll_date_to.""); 

          $userpresent=$DB->get_record_sql("SELECT count(atg.id) as present  FROM {attendance} as a INNER join {attendance_sessions} as ats on a.id=ats.attendanceid INNER JOIN {attendance_log} as atg on ats.id=atg.sessionid INNER join {attendance_statuses} as ass on atg.statusid=ass.id where a.course='".$data->course."' and atg.studentid='".$enrollvalue->id."' and ass.acronym='P' and ats.sessdate BETWEEN ".$data->enroll_date_from." and ".$data->enroll_date_to."");

          $userlate=$DB->get_record_sql("SELECT count(atg.id) as late  FROM {attendance} as a INNER join {attendance_sessions} as ats on a.id=ats.attendanceid INNER JOIN {attendance_log} as atg on ats.id=atg.sessionid INNER join {attendance_statuses} as ass on atg.statusid=ass.id where a.course='".$data->course."' and atg.studentid='".$enrollvalue->id."' and ass.acronym='L' and ats.sessdate BETWEEN ".$data->enroll_date_from." and ".$data->enroll_date_to."");


    $userexcused=$DB->get_record_sql("SELECT count(atg.id) as excused  FROM {attendance} as a INNER join {attendance_sessions} as ats on a.id=ats.attendanceid INNER JOIN {attendance_log} as atg on ats.id=atg.sessionid INNER join {attendance_statuses} as ass on atg.statusid=ass.id where a.course='".$data->course."' and atg.studentid='".$enrollvalue->id."' and ass.acronym='E' and ats.sessdate BETWEEN ".$data->enroll_date_from." and ".$data->enroll_date_to."");

          
          $user_excused=$user_late . '"'.$userexcused->excused.'"'.',';

          $user_late=$user_late . '"'.$userlate->late.'"'.',';

          $user_present=$user_present . '"'.$userpresent->present.'"'.',';

          $user_absent=$user_absent . '"'.$userabsent->absent.'"'.',';

          $userdata1= $userdata1 . '"'. $enrollvalue->firstname.' '.$enrollvalue->lastname.'"'.',';

        }



 //print_r($userdata1);die;

  //$a=implode("",$userdata);
$lenrolled=rtrim($userdata1,',');//die;
echo $uabsent=rtrim($user_absent,',');//die;
echo $upresent=rtrim($user_present,',');//die;
echo $ulate=rtrim($user_late,',');//die;
echo $uexcused=rtrim($user_excused,',');//die;
?>




<!-------chart--------->
<script src="http://103.234.195.166/Chart.min.js"></script>
 <script type="text/javascript">
 
  var df='<?php print_r( "[".$lenrolled."]"); ?>';
  parsedTest = JSON.parse(df);
  console.log(parsedTest[0]); //1
console.log(parsedTest[1]); //2
var barChartData = {
  labels: parsedTest,
  datasets: [
    {
      label: "Excused",
      backgroundColor: "#849bc8",
      borderColor: "#849bc8",
      borderWidth: 1,
      data: [3, 5]
    },
    {
      label: "Absent",
      backgroundColor: "#f4ad8d",
      borderColor: "#f4ad8d",
      borderWidth: 1,
      data: [4, 7]
    },
    {
      label: "Late",
      backgroundColor: "#c7c7c7",
      borderColor: "#c7c7c7",
      borderWidth: 1,
      data: [0,7]
    },
    {
      label: "Present",
      backgroundColor: "#f6d065",
      borderColor: "#f6d065",
      borderWidth: 1,
      data: [6,9,]
    }
  ]
};
console.log(barChartData)
var chartOptions = {
  responsive: true,
  legend: {
    position: "bottom"
  },
  title: {
    display: true
  },
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
}

window.onload = function() {
  var ctx = document.getElementById("canvas").getContext("2d");
  window.myBar = new Chart(ctx, {
    type: "bar",
    data: barChartData,
    options: chartOptions
  });
};

</script>

<!-------chart--------->
<!------chart------>



    <div class="chart_box">
 <!--- <div class="overlay_js"> </div>*/--->
  <h1 class="text-center text-white mb-4"><?php echo $course_data->fullname; ?></h1>
  <div class="inner_canvas">
    <div id="container" style="width: 100%;    margin: auto;">
  <canvas id="canvas"></canvas></div>
</div>
    </div>

<?php 

} 
?>

<!------chart------>

 <!-- <div class="main">
    <div class="sub-main">
       <a class="btn button-two eb" id="download_link" download="page-views.png" style="color: white">Download as Image</a>
    
    </div>
  </div>  -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php
echo $OUTPUT->footer();
?>