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
 * lib.php/modulename_unstall() post installation hook and partially defaults.php
 *
 * @package  local_viva 
 * @auther   Andrew Robinson
 * @copyright 2023 Andrew Robinson
 * @license   fullversion Viva
 */

defined('MOODLE_INTERNAL') || die();

/**
 * This is called at the beginning of the uninstallation process to give the module
 * a chance to clean-up its hacks, bits etc. where possible.
 *
 * @return bool true if success
 */
function local_viva_uninstall() {
	global $CFG, $DB;
	$dbman = $DB->get_manager();	
	$viva_asgn_details = new xmldb_table('viva_asgn_details');
      if($dbman->table_exists($viva_asgn_details)){
      	$dbman->drop_table($viva_asgn_details, $continue=true, $feedback=true);
      }
       return true;
}