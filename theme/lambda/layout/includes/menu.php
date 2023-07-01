<?php 
require(__DIR__ . '/../../../../config.php');
function local_universitystr_extend_navigation($navigation) {
	global $DB, $USER;
	$menu = new custom_menu($navigation, current_language());
	foreach ($menu->get_children() as $menunode) {
		// echo "<ul class='menu_box'>";
		// universitystr_custom_menu_item($menunode, $submenucount, $masternode, $flatenabled);
		universitystr_custom_menu_item($menunode, 0, $null, false);
		// echo "</ul>";
	}
}

function universitystr_custom_menu_item(custom_menu_item $menunode, $parent, $pmasternode, $flatenabled) {
	global $PAGE, $CFG;
	static $submenucount = 0;
	if ($menunode->has_children()) {
		
		$submenucount++;
		$url = $CFG->wwwroot;
		if ($menunode->get_url() !== null) {
			$url = new moodle_url($menunode->get_url());
		} else {
			$url = "javascript:void(0);";
		}
		if ($parent > 0) {
$kk=local_universitystr_get_string($menunode->get_text())." ".$menunode->get_title();

			echo "<li class='a'><a href='".$url."' >".local_universitystr_get_string($menunode->get_text())."".$menunode->get_title()."</a>";
			// $masternode = $pmasternode->add(local_universitystr_get_string($menunode->get_text()),
			// $url, navigation_node::TYPE_CONTAINER);
			// $masternode->title($menunode->get_title());
		} else {
			$kk=local_universitystr_get_string($menunode->get_text())." ".$menunode->get_title();
			echo "<li class='b'><a href='".$url."' >".local_universitystr_get_string($menunode->get_text())."".$menunode->get_title()."</a>";
			// $masternode = $PAGE->navigation->add(local_universitystr_get_string($menunode->get_text()),
			// $url, navigation_node::TYPE_CONTAINER);
			// $masternode->title($menunode->get_title());
		}
		echo"<div class='sub_pmn'>";
			echo "<ul class='sbm_box'>";

	echo "<h3 class='menutext'>". $kk."</h3>";

		foreach ($menunode->get_children() as $menunode) {
			$ii++;
		
			

			universitystr_custom_menu_item($menunode, $submenucount, $masternode, $flatenabled);
			
		}

		echo " </ul> </div> </li>";
		// echo "</ul>";

	} else {
		$url = $CFG->wwwroot;
		if ($menunode->get_url() !== null) {
			$url = new moodle_url($menunode->get_url());
		} else {
			$url = null;
		}
		if ($parent) {
			echo "<li><a href='".$url."' >".local_universitystr_get_string($menunode->get_text())." ".$menunode->get_title()."</a></li>";
			// $childnode = $pmasternode->add(),
			// $url, navigation_node::TYPE_CUSTOM);
		} else {
			echo "<li><a href='".$url."' >".local_universitystr_get_string($menunode->get_text())." ".$menunode->get_title()."</a></li>";
			// $masternode = $PAGE->navigation->add(local_universitystr_get_string($menunode->get_text()),
			// $url, navigation_node::TYPE_CONTAINER);
			// $masternode->title($menunode->get_title());
		}
	}
	return true;
}

/**
* Translate Custom Navigation Nodes
*
* This function is based in a short peace of Moodle code
* in Name processing on user_convert_text_to_menu_items.
*
* @param string $string text to translate.
* @return string
*/
function local_universitystr_get_string($string) {
	$title = $string;
	$text = explode(',', $string, 2);
	if (count($text) == 2) {
		// Check the validity of the identifier part of the string.
		if (clean_param($text[0], PARAM_STRINGID) !== '') {
		// Treat this as atext language string.
		$title = get_string($text[0], $text[1]);
		}
	}
return $title;
}
