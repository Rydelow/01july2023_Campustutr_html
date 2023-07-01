<?php
$observers = array(
	array(
        'eventname' => '\core\event\course_module_created',
        'includefile' => '/local/viva/classes/observer.php',
        'callback' => 'local_viva_observer::assignment_modulecreate',
        'internal' => true
    ),array(
        'eventname' => '\core\event\course_module_updated',
        'includefile' => '/local/viva/classes/observer.php',
        'callback' => 'local_viva_observer::assignment_moduleupdated',
        'internal' => true
    )



)


?>


