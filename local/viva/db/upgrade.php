<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.

/**
 * This file replaces the legacy STATEMENTS section in db/install.xml,
 * lib.php/modulename_upgrade() post installation hook and partially defaults.php
 *
 * @package  local_viva 
 * @auther   Andrew Robinson
 * @copyright 2023 Andrew Robinson
 * @license   fullversion Viva
 */

defined('MOODLE_INTERNAL') || die();

/**
 * This is called at the beginning of the upgrade process to give the module
 * a chance to clean-up its hacks, bits etc. where possible.
 *
 * @return bool true if success
 */

defined('MOODLE_INTERNAL') || die();

function xmldb_local_viva_upgrade($oldversion) {
      global $CFG, $DB;
    $dbman = $DB->get_manager();
    $viva_qst_data = new xmldb_table('viva_qst_data');
    if($oldversion<20210517010){
	    if(!$dbman->table_exists($viva_qst_data)){
	    	echo "enter";
	    	$viva_qst_data->add_field('id', XMLDB_TYPE_INTEGER, '18', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
	    	$viva_qst_data->add_field('assignmentid', XMLDB_TYPE_INTEGER,'18',null,null, null,null,'id');
	    	$viva_qst_data->add_field('question_name', XMLDB_TYPE_TEXT,null,null,null, null,null,'assignmentid');
	    	$viva_qst_data->add_field('createddate',XMLDB_TYPE_INTEGER,'18',null,null, null,null,'question_name');
	    	$viva_qst_data->add_field('modifieddate',XMLDB_TYPE_INTEGER,'18',null,null, null,null,'createddate');
	    	$viva_qst_data->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);
	    	$dbman->create_table($viva_qst_data);
	    }
	}
    return true;
}