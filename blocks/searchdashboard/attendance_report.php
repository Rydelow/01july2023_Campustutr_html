<?php
require_once("../../config.php");
global $DB,$CFG, $OUTPUT, $PAGE, $USER;
echo $OUTPUT->header();


// SELECT ass.*,a.*,ats.* FROM `mo_attendance` as a INNER join `mo_attendance_sessions` as ats on a.id=ats.attendanceid INNER JOIN `mo_attendance_log` as atg on ats.id=atg.sessionid INNER join `mo_attendance_statuses` as ass on atg.statusid=ass.id where a.course='755' and atg.studentid=11

?>

  <div class="row processing_header">
    <div class="col-md-12">
        <breadcrum>
                <div class="second_heading">
                    <p><a href="<?php echo $CFG->wwwroot?>/my/index.php">Dashboard</a> > Attendance Report</p>
                </div>
        </breadcrum>
    </div>
</div>
<br>

<div class="row">
	<div class="col-md-10"></div>
	<div class="col-md-2"><a href="#" download="" class="btn btn-primary pull-right">Export</a></div>
</div>
<br>

<section class="filter_data">
<form method="get">
<div class="row">	
	<div class="col-md-4">
		<div class="row">
			<div class="col-sm-3"><label class="font_weight">Branch</label> </div>
			<div class="col-sm-9">
				<select name="branchid" id="" class="form-control">
				<option value="">Select Branch Name</option>
					<?php
					if(is_siteadmin()){     
						$groupinfo = $DB->get_records_sql("SELECT DISTINCT idnumber,name FROM {groups}" );
					}else{
						$query ="select * from  {groups_members} as gm INNER join {groups} as g on gm.groupid = g.id where gm.userid =$USER->id ";  
						$groupinfo = $DB->get_records_sql($query);
					}
					foreach($groupinfo as $groupRow){ ?>
						<option value="<?php echo $groupRow->idnumber ; ?>"><?php echo $groupRow->name."-".$groupRow->idnumber; ?></option>
				<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-1"><button class="btn btn-primary" name="search_data">Filter data</button></div>
	</form>
</div>
</section>
 

<br><br>






<br>
<div class="row">
<div class="col-sm-12 attendence_reports">         
		  <table class="table">
				<thead> 
				<?php 
				$userroleinfos = $DB->get_record_sql("SELECT * FROM {role_assignments} where userid = '$USER->id'" );
				if($userroleinfos->roleid==5){ ?>				
					<tr>
						<th>Course Name</th>
						<th>Total Sessions</th>
						<th>Absent</th>
						<th>Present</th>
						<th>Attendance Percentage</th>
					</tr>
					<?php } else { ?>
					<tr>
						<th>Course Name</th>
						<th>Total Students</th>
						<th>Total Sessions</th>
						<th>Overall Attendance</th>
						<th>Attendance Details</th>
					</tr>
					<?php } ?>
				</thead>
					<tbody>
						<?php
							$tsession=0; $t1session=0; $present=0; $absent=0; $tlog=0; $sln=0; $count1=0;
							if(is_siteadmin()){ 

								$courseinfo = $DB->get_records_sql("SELECT * FROM {course} where visible!=0 and id!=1 order by id ASC" );}
							else{ $cquery ="select * from  {user_enrolments} as ue INNER join {enrol} as e on ue.enrolid = e.id INNER JOIN {course} as c on c.id = e.courseid  where ue.userid =$USER->id  order by c.id ASC"; $courseinfo = $DB->get_records_sql($cquery);}
							foreach($courseinfo as $courseRow)
							{
								$sln++; $count1=0;
								$uquery ="select ue.userid from  {user_enrolments} as ue INNER join {enrol} as e on ue.enrolid = e.id where e.courseid=$courseRow->id "; 
								$participantinfo = $DB->get_records_sql($uquery);
								foreach($participantinfo as $participantRow){
									if(is_siteadmin()){
										if(isset($_GET['search_data']))
										{
											$idnbr=$_GET['branchid'];
											$groupinfo = $DB->get_records_sql("SELECT * FROM {groups} WHERE courseid='$courseRow->id' and idnumber='$idnbr' ");
											foreach($groupinfo as $groupRow){
												$groups_membersinfo = $DB->get_records_sql("SELECT * FROM {groups_members} WHERE groupid=$groupRow->id and userid=$participantRow->userid ");
												foreach($groups_membersinfo as $groups_membersRow){
													$roleinfo = $DB->get_record_sql("SELECT DISTINCT userid FROM {role_assignments} WHERE userid=$groups_membersRow->userid and roleid=5 ");
													if(!empty($roleinfo)){ $count1++; } 
												}
											}


										}else{
											$userroleinfo = $DB->get_record_sql("SELECT * FROM {role_assignments} where userid = '$participantRow->userid' and roleid='5' " );
												if(!empty($userroleinfo)){ $count1++; } 
										}
									}elseif(($userroleinfos->roleid==9) || ($userroleinfos->roleid==3) || ($userroleinfos->roleid==4)){ 
										$grpmbrinfo = $DB->get_records_sql("SELECT * FROM {groups_members} Where userid=$USER->id" );
											foreach ($grpmbrinfo as $grpmbrRow) {
											$posinfo = $DB->get_records_sql("SELECT * FROM {groups_members} Where userid='$participantRow->userid' and  groupid =$grpmbrRow->groupid ");
											if(!empty($posinfo)){
												foreach($posinfo as $posRow){ 
													$cousinfo = $DB->get_record_sql("SELECT * FROM {groups} where id = '$posRow->groupid' and courseid='$courseRow->id' " );
													if($cousinfo){ 
														$userroleinfo = $DB->get_record_sql("SELECT * FROM {role_assignments} where userid = '$participantRow->userid' and roleid='5' " );
														if(!empty($userroleinfo)){ $count1++; } 
													}
												}
											}
										}
									}
								} 
								$coursemodule_info = $DB->get_record_sql("SELECT * FROM {course_modules} where course='$courseRow->id' and module=3 and deletioninprogress!=1");
								$tsession=0; $tlog=0; $percrnt=0; $present=0; $absent=0;
								$attendanceinfo = $DB->get_records_sql("SELECT * FROM {attendance} WHERE course='$courseRow->id' ");
								foreach($attendanceinfo as $attendanceRow)
								{
									if(isset($_GET['search_data']))
									{
										$idnbr=$_GET['branchid'];
										$groupinfo = $DB->get_record_sql("SELECT * FROM {groups} WHERE courseid='$courseRow->id' and idnumber='$idnbr' ");
										if(!empty($groupinfo)){
											$attsessioninfo = $DB->get_records_sql("SELECT * FROM {attendance_sessions} WHERE attendanceid='$attendanceRow->id' and groupid=$groupinfo->id ");
									foreach($attsessioninfo as $attsessionRow)
									{
										if(is_siteadmin()){
											$tsession++;
											$t1session++;
											$sum=$t1session;
										}
										else{
											$grpmbrinfo = $DB->get_record_sql("SELECT * FROM {groups_members} Where userid=$USER->id and groupid=$attsessionRow->groupid" );
											if($grpmbrinfo){
												$tsession++;
												$t1session++;
												$sum=$t1session;
											}
										}
										if(is_siteadmin()){ $attloginfo = $DB->get_records_sql("SELECT * FROM {attendance_log} WHERE sessionid='$attsessionRow->id' ");}
										elseif(($userroleinfos->roleid==9) || ($userroleinfos->roleid==3) || ($userroleinfos->roleid==4)){ 
											$grpmbrinfo = $DB->get_records_sql("SELECT * FROM {groups_members} Where userid=$USER->id" );
												foreach ($grpmbrinfo as $grpmbrRow) {
												$posinfo = $DB->get_records_sql("SELECT * FROM {groups_members} Where userid='$participantRow->userid' and  groupid =$grpmbrRow->groupid ");
												if(!empty($posinfo)){
													foreach($posinfo as $posRow){ 
														$attloginfo = $DB->get_records_sql("SELECT * FROM {attendance_log} WHERE sessionid='$attsessionRow->id' and studentid='$posRow->userid' ");
													}
												}
											}
										}
										else{ 
											$attloginfo = $DB->get_records_sql("SELECT * FROM {attendance_log} WHERE sessionid='$attsessionRow->id' and studentid='$USER->id' ");}
										foreach($attloginfo as $attlogRow)
										{
											$tlog++;
											$tlogover++;
											$sumt=$tlogover;
											$attstatusinfo = $DB->get_records_sql("SELECT * FROM {attendance_statuses} WHERE id='$attlogRow->statusid' ");
											foreach($attstatusinfo as $attstatusRow)
											{
												if($attstatusRow->acronym=="P"){
													$present++;
													$overallpresent++;
												}
												else if($attstatusRow->acronym=="A"){
													$absent++;
													$overallabsent++;
												}
												$sumabsent=$overallabsent;
												$sumpresent=$overallpresent;
											}
											$percrnt=round(($present/$tlog)*100);
										}
									}
											
										}
									}
									else{ 
									$attsessioninfo = $DB->get_records_sql("SELECT * FROM {attendance_sessions} WHERE attendanceid='$attendanceRow->id' ");
									foreach($attsessioninfo as $attsessionRow)
									{
										if(is_siteadmin()){
											$tsession++;
											$t1session++;
											$sum=$t1session;
										}
										else{
											$grpmbrinfo = $DB->get_record_sql("SELECT * FROM {groups_members} Where userid=$USER->id and groupid=$attsessionRow->groupid" );
											if($grpmbrinfo){
												$tsession++;
												$t1session++;
												$sum=$t1session;
											}
										}
										if(is_siteadmin()){ $attloginfo = $DB->get_records_sql("SELECT * FROM {attendance_log} WHERE sessionid='$attsessionRow->id' ");}
										elseif(($userroleinfos->roleid==9) || ($userroleinfos->roleid==3) || ($userroleinfos->roleid==4)){ 
											$grpmbrinfo = $DB->get_records_sql("SELECT * FROM {groups_members} Where userid=$USER->id" );
												foreach ($grpmbrinfo as $grpmbrRow) {
												$posinfo = $DB->get_records_sql("SELECT * FROM {groups_members} Where userid='$participantRow->userid' and  groupid =$grpmbrRow->groupid ");
												if(!empty($posinfo)){
													foreach($posinfo as $posRow){ 
														$attloginfo = $DB->get_records_sql("SELECT * FROM {attendance_log} WHERE sessionid='$attsessionRow->id' and studentid='$posRow->userid' ");
													}
												}
											}
										}
										else{ 
											$attloginfo = $DB->get_records_sql("SELECT * FROM {attendance_log} WHERE sessionid='$attsessionRow->id' and studentid='$USER->id' ");}
										foreach($attloginfo as $attlogRow)
										{
											$tlog++;
											$tlogover++;
											$sumt=$tlogover;
											$attstatusinfo = $DB->get_records_sql("SELECT * FROM {attendance_statuses} WHERE id='$attlogRow->statusid' ");
											foreach($attstatusinfo as $attstatusRow)
											{
												if($attstatusRow->acronym=="P"){
													$present++;
													$overallpresent++;
												}
												else if($attstatusRow->acronym=="A"){
													$absent++;
													$overallabsent++;
												}
												$sumabsent=$overallabsent;
												$sumpresent=$overallpresent;
											}
											$percrnt=round(($present/$tlog)*100);
										}
									}
								}
										$percentage=round(($sumpresent/$sumt)*100);
								}
								

								if($userroleinfos->roleid!=5){ 
									if($coursemodule_info->id==""){
										echo '
										<tr>
										<td><a href="'.$CFG->wwwroot.'/course/view.php?id='.$courseRow->id.'">'.$courseRow->fullname.'</a></td>
										';
									}
									else{
									echo '
										<tr>		
										<td><a href="'.$CFG->wwwroot.'/mod/attendance/manage.php?id='.$coursemodule_info->id.'">'.$courseRow->fullname.'</a></td>
										';
									}
										echo'
										<td align="center"><a href="'.$CFG->wwwroot.'/user/index.php?id='.$courseRow->id.'">'.$count1.'</a></td>
										<td align="center">'.$tsession.'</td>
										<td align="center">'.$percrnt.'%</td>';
										if($coursemodule_info->id==""){
											echo '		
											<td><a href="'.$CFG->wwwroot.'/course/view.php?id='.$courseRow->id.'">View</a></td>
											';
										}
										else{
										echo '	
											<td><a href="'.$CFG->wwwroot.'/mod/attendance/manage.php?id='.$coursemodule_info->id.'">View</a></td>
											';
										}
										
										echo '</tr>';
							}else if($userroleinfos->roleid==5){
								if($coursemodule_info->id==""){
									echo '
									<tr>		
									<td><a href="'.$CFG->wwwroot.'/course/view.php?id='.$courseRow->id.'">'.$courseRow->fullname.'</a></td>
									';
								}
								else{
								echo '
									<tr>			
									<td><a href="'.$CFG->wwwroot.'/mod/attendance/manage.php?id='.$coursemodule_info->id.'">'.$courseRow->fullname.'</a></td>
									';
								}
									echo'
									<td align="center">'.$tsession.'</td>
									<td align="center">'.$absent.'</td>
									<td align="center">'.$present.'</td>
									<td align="center">'.$percrnt.'%</td>
									</tr>
								';
							}
							}
						?>

					<tfoot>
						<tr>
							<td>Overall Attendance</td>
							<?php if($userroleinfos->roleid==5){ ?>
							<td align="center"><?php if($t1session==""){echo 0;} else{echo $t1session;} ?></td>
							<td align="center"><?php if($sumabsent==""){echo 0;} else{echo $sumabsent;}?></td>
							<td align="center"><?php if($sumpresent==""){echo 0;} else{ echo $sumpresent;}?></td>
							<td align="center">
								<?php if($percentage>85){ ?>
								<p ><font color="green"><?php echo $percentage; ?>%</p>
								<?php } else if(($percentage < 75) OR ($percentage==NAN))  { ?>
									<p><font color="red"><?php echo $percentage; ?>%</p>
								<?php } else if(($percentage >75) OR ($percentage<85)){ ?>
									<p><font color="orange"><?php echo $percentage; ?>%</p>
								<?php }else { ?>
									<p><font color="red"><?php echo 0; ?>%</p>
								<?php } ?>
							</td>
							<?php } else{ ?>
								<td></td>
							<td align="center"><?php if($t1session==""){echo 0;} else{echo $t1session;} ?></td>
								<td align="center">
								<?php if($percentage>85){ ?>
								<p ><font color="green"><?php echo $percentage; ?>%</p>
								<?php } else if(($percentage >75) OR ($percentage<85)){ ?>
									<p><font color="orange"><?php echo $percentage; ?>%</p>
								<?php }else { ?>
									<p><font color="red"><?php echo 0; ?>%</p>
								<?php } ?>
							</td>
							<td></td>
							<?php } ?>
							
						</tr>
					</tfoot>					  	 
				</tbody>
		  </table>
    </div>
  </div>
</div>




<style>
#region-main {
    overflow-x: unset;
    overflow-y: unset;
}
 .processing_header {
    background: #f8f8f8;
    margin-left: -30px;
    margin-right: -30px;
    margin-top: -35px;
    padding: 15px;
    padding-left: 0;
}
.second_heading p {
    color: #777;
    font-size: 14px;
}

#region-main{
    border: 0 !important;
    background-color: #fff;
    box-shadow: 0 0 5px 0 #ddd;
}
#region-main > .card{
	border-color: transparent !important;
}

.attendence_reports .table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 0;
    border: 0;
    text-align: left;
    background: rgb(218,31,61);
        color: #fff !important; 
    font-size: 15pt;
    font-weight: 400;
    text-transform: capitalize !important;
}
.attendence_reports .table tbody tr td,
.attendence_reports .table tfoot tr td{
	    font-size: 15pt;
	    font-weight: 400;
	    color: rgb(0,0,0);
}

.attendence_reports .tbl_bnt1{
    width: 100px;
    border: 1px solid #eee;
    text-transform: uppercase;
    background: #fff;
    box-shadow: 0 0;
    outline: 0;
}
.attendence_reports .tbl_bnt1:hover{
	-webkit-box-shadow: 0 0 5px 0 #ddd;
	box-shadow: 0 0 5px 0 #ddd;
}
.attendence_reports tfoot{
    font-weight: 600;
}
.blue_footer {
    width: 101%;
    background: #0495d7;
    height: 100px;
    margin-bottom: -20px;
    margin-top: 120px;
    margin-left: -5.5px;
}
#page-header {
    display: none !important;
}
#region-main .card-body {
    min-height: 800px;
}
#page-content{
    margin-top: 30px;
}



.font_weight {
    font-size: 16px;
    font-weight: 600;
}

.filter_data{
	background: #ffffff;
    padding: 30px 15px;
    -webkit-box-shadow: 0 0 5px 0 #ddd;
    box-shadow: 0 0 5px 0 #ddd;
}



</style>




 <?php
echo $OUTPUT->footer(); ?> 

<div class="col-md-12">
<div class="row blue_footer"></div>
</div>

 