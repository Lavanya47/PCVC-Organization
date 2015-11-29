<?php
require_once 'controller/sw_login_controller.php';

// Some redirect has happened and the flow reached here
// Get the error message to display in this page
if (isset($_SESSION["error_info"]))
{
	$error_info = $_SESSION["error_info"];
	
	if(isset($error_info["show_failure_message"]))
	{
		$show_failure_message = $error_info["show_failure_message"];
	}
	
	if(isset($error_info["failure_message"]))
	{
		$failure_message = $error_info["failure_message"];
	}
	
	unset($_SESSION["error_info"]);
}

$sw_login_controller = new SWLoginController();
$container = $sw_login_controller->sw_user_login();

if(isset($_SESSION["error_info"]))
{
		header("Location: login_form.php?kk=true");
}
else
{
	header("Location: sw_dashboard.php");
}
?>