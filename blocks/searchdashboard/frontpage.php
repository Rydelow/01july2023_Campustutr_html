


 <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

<style >
ul.cl_as_e{padding: 0;}	
ul.cl_as_e li.cl_aps_e {
list-style: none;
color: #000;
padding: 23px 33px;
border-bottom: 1px dotted #bfbfbf;
position: relative;
margin-top: 27px;
}
ul.cl_as_e li.cl_aps_e a {
font-weight: bold;
font-size: 22px;
font-family: "Open Sans",sans-serif;
color: #555;
font-size: 1.23rem;
}
.cl_aps_e::before {
    content: "\f04b";
    font-family: FontAwesome;
    margin-left: -11px;
    position: absolute;
    left: 25px;
    color: #827d7dd9;
}
</style>

<div id="frontpage-category-names"><h2>Available Categories</h2>


<div class="_lect_c"> 
<ul class="cl_as_e">
	<?php 

	$data=$DB->get_records_sql("SELECT c.instanceid,cc.name FROM {role_assignments} as rs INNER JOIN {context} as c ON rs.contextid=c.id INNER JOIN {course_categories} as cc on c.instanceid=cc.id WHERE rs.userid='".$USER->id."' and c.contextlevel='40' and rs.roleid=12");


foreach ($data as $data) {

	 ?>
	<li class="cl_aps_e" > <a href="<?php echo $CFG->wwwroot; ?>/course/index.php?categoryid=<?php echo $data->instanceid; ?>"><?php echo $data->name; ?></a></li>
	<?php } ?>

</ul>
</div>