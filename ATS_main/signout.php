<?php
	
	include('application.php');
	$user->userLogOut();
	session_destroy();
	header('Location: '.$app->signoutpath);

?>
