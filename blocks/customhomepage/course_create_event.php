<?php function coursecreate(\core\event\enrol_instance_created $event)
{
global $DB, $USER;
$data=new stdClass();
$data->courseid=$event->courseid;
$data->course_designation="private_free";
$check=$DB->get_record_sql("select * from {course_designation} where `courseid`='".$event->courseid."'");
if(empty($check)){
$DB->insert_record('course_designation',$data);
}
}