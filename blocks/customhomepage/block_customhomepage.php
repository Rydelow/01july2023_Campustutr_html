<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

class block_customhomepage extends block_list {
    function init() {
        $this->title = get_string('pluginname', 'block_customhomepage');
        // $this->title = "Learning Plan reminder";
    }

    function get_content () {
        global $USER, $CFG, $DB, $SESSION, $OUTPUT,$COURSE;
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content         = new stdClass;
        $this->content->items  = array();
        $this->content->icons  = array();
        $this->content->footer = '';
        $spacer = array('height'=>1, 'width'=> 4); 
		$topic = array('height'=>2);
        $subtopic = array('height'=>1, 'width'=> 15);
        $pointearned_content='Custom Homepage';
         $content="";
         $content.="
         	        

         ";
         $this->content->items[]=$content;
   
		   if(is_siteadmin()){
 // $contact_us = $CFG->wwwroot . '/blocks/customhomepage/topbar_content.php';
 // $this->content->items[] = html_writer::tag('a', get_string('contact_us', 'block_customhomepage'), array('href' => $contact_us)); 
 $about_us = $CFG->wwwroot . '/blocks/customhomepage/edit_about_us.php';
 $this->content->items[] = html_writer::tag('a', get_string('about_us', 'block_customhomepage'), array('href' => $about_us));
  $learning = $CFG->wwwroot . '/blocks/customhomepage/edit_learning.php';
  $this->content->items[] = html_writer::tag('a', get_string('learning', 'block_customhomepage'), array('href' => $learning));
 //  $join_now = $CFG->wwwroot . '/blocks/customhomepage/edit_join_now.php';
 // $this->content->items[] = html_writer::tag('a', get_string('join_now', 'block_customhomepage'), array('href' => $join_now));
  $pricing = $CFG->wwwroot . '/blocks/customhomepage/edit_pricing.php';
 $this->content->items[] = html_writer::tag('a', get_string('pricing', 'block_customhomepage'), array('href' => $pricing));
$this->content->items[]="<br><h5 id='instance-92-header' style='padding-right: 19px !important;' class='card-title d-inline'>All Testimonial Content</h5><br>";

$home_page = $CFG->wwwroot . '/blocks/customhomepage/home_testimonials.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i> Home Page', array('href' => $home_page));


$edit_school_collage = $CFG->wwwroot . '/blocks/customhomepage/edit_school_collage.php';
  $this->content->items[] = html_writer::tag('a', get_string('edit_school_collage', 'block_customhomepage'), array('href' => $edit_school_collage));

  $students = $CFG->wwwroot . '/blocks/customhomepage/edit_students.php';
  $this->content->items[] = html_writer::tag('a', get_string('students', 'block_customhomepage'), array('href' => $students));
  $tutors = $CFG->wwwroot . '/blocks/customhomepage/edit_tutors.php';
  $this->content->items[] = html_writer::tag('a', get_string('tutors', 'block_customhomepage'), array('href' => $tutors));
$this->content->items[]="<style>.column.c1 {
    width: 100% !important;
}</style>";



 }    

   
        

       	return $this->content;
    }

 }


