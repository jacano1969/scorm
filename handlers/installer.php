<?php

$this->require_admin ();

$page->layout = 'admin';

if (! isset ($_FILES['zip'])) {
	$this->add_notification (__ ('File upload failed.'));
	$this->redirect ('/scorm/admin');
}

$res = Scorm::install ($_FILES['zip']);
if ($res === false) {
	$this->add_notification (Scorm::$error);
	$this->redirect ('/scorm/admin');
}

$this->add_notification (__ ('SCORM module installed.'));
$this->redirect ('/scorm/admin');

?>