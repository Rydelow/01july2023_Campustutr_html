<?php require_once("../../config.php");

global $DB, $OUTPUT, $PAGE, $USER,$CFG;


require_once($CFG->dirroot . '/mod/quiz/locallib.php');
require_once($CFG->dirroot . '/mod/quiz/report/reportlib.php');

$attemptid = required_param('attempt', PARAM_INT);
$page      = optional_param('page', 0, PARAM_INT);
$showall   = optional_param('showall', null, PARAM_BOOL);
$cmid      = optional_param('cmid', null, PARAM_INT);


$attemptobj = quiz_create_attempt_handling_errors($attemptid, $cmid);
// $attemptobj->check_review_capability();
$quizobj = $attemptobj->get_quizobj();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style type="text/css">
	table.quizreviewsummary {
	    width: 100%;
	}

	.generaltable, table.flexible {
	    display: table;
	    overflow-x: auto;
	}

	table.flexible, .generaltable {
	    width: 100%;
	    margin-bottom: 20px;
	}

	table {
	    max-width: 100%;
	    background-color: transparent;
	    border-collapse: collapse;
	    border-spacing: 0;
	}
</style>
<body style="background: url(https://www.campustutr.com/theme/image.php/lambda/theme/1629982568/page_bg/page_bg_00) no-repeat fixed 0 0;">
	<div style="text-align: center; margin-top: 5%;">
		<h2><?=$attemptobj->get_course()->fullname;?></h2>
		<h2><?=$attemptobj->get_quiz()->name;?></h2>
		<?php echo date('l, d F Y, h:i A',$attemptobj->get_quiz()->reviewattempt); ?>
	</div>
	<section class="main">
		<div id="page" class="container">
	    <div class="row">
	        <div class="col-md-12">
	        	<div  class="profi_le" style="background:#fff">
	            	<div role="main">
	            		<span id="maincontent"></span>
	            		<table class="generaltable generalbox quizreviewsummary">
	            			<tbody>
	            				<tr>
	            					<th class="cell" scope="row">Started on</th>
	            					<td class="cell"><?php echo date('l, d F Y, h:i A',$attemptobj->get_attempt()->timestart); ?></td>
	            				</tr>
	            				<tr>
	            					<th class="cell" scope="row">State</th>
	            					<td class="cell"><?php echo ucfirst($attemptobj->get_attempt()->state); ?></td>
	            				</tr>
	            				<tr>
	            					<th class="cell" scope="row">Completed on</th>
	            					<td class="cell"><?php echo date('l, d F Y, h:i A',$attemptobj->get_attempt()->timefinish); ?></td>
	            				</tr>
	            				<tr>
	            					<th class="cell" scope="row">Time taken</th>
	            					<td class="cell">14 secs</td>
	            				</tr>
	            				<tr>
	            					<th class="cell" scope="row">Marks</th>
	            					<td class="cell"><?php echo $attemptobj->get_attempt()->sumgrades; ?>/<?php echo $attemptobj->get_quiz()->sumgrades; ?></td>
	            				</tr>
	            				<tr>
	            					<th class="cell" scope="row">Grade</th>
	            					<td class="cell"><b>10.00</b> out of 10.00 (<b>100</b>%)</td>
	            				</tr>
	            			</tbody>
	            		</table>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
	</section>

</body>
<?php
echo "fffff";
echo "<pre>";
print_r($attemptobj);
echo "</pre>";
$options = $attemptobj->get_display_options(true);
