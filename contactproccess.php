<?php

include_once 'Proccess/Proccess.php';



$obj = new Proccess("hello@hypersoci.com.ng");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	var_dump($obj->contactF($name, $email, $message));
}