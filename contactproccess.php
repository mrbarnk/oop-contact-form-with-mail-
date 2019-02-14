<?php

include_once 'Proccess/Proccess.php';

use Proccess;

$obj = new Proccess("hello@hypersoci.com.ng");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	echo json_encode($obj->contactF($name, $email, $message));
}