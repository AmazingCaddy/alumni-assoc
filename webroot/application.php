<?php
require_once(dirname(__FILE__).'/../application.php');
$app = new App();
try {
	$app->run();
} catch (Exception $e) {
	$app->handleException($e);
}
