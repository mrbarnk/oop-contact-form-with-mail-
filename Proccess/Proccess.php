<?php

// namespace Proccess;

// include_once 'autoload.php';
// include_once '../vendor/autoload.php';

// use Database\DB as DB;

class Proccess {
	
	// Database connection handler
	public $conn;

	// Email to be send to??
	protected $to;
	
	// Email sender
	public $mailFrom;


	public function __construct($to) {

		// Setting the email receiver.

		$this->to = $to;//'mrbarnk1@gmail.com';
		
		// $DB = new DB();
		// $this->conn = $DB->connect();
	}

	private static function sendEmail($to, $email, $text, $name) {
        // $to = $;
        $subject = "New MEssage From Contact Form";
        $txt = $text;
        $headers = "From: ".$email . "\r\n" .
        "CC: ".$email;

        return mail($to,$subject,$txt,$headers);
    }
    private function error(array $array = NULL) {
    	if(array_key_exists('status', $array) && array_key_exists('field', $array) && array_key_exists('type', $array)) {
    		// if(empty())
	    		switch ($array['type']) {
	    			case 'email':
		    				return  exit('The email is invalid.');
	    				break;
	    			
	    			default:
	    					return  exit('The emai {{'.$array['field'].'}} is invalid.'); 
	    				break;
    			// }
    		}
    	}
    	else {
    		return exit('Array Values Not Complete.');
    	}
    }

    private static function insertContact($name, $email, $text) {
    	$query = $this->conn->query('INSERT INTO `messages`(`name`, `email`, `message`) VALUES (?,?,?)');
    	$query->bind_param('sss',$name, $email, $text);
    	$query->execute();

    	return exit($query->num_rows);

    	// if($query->num_rows == 0) {
    	// 	return 'Successfully contacted! Kindly wait shortly for reply';
    	// }else {
    	// 	return 'Something went wrong';
    	// }
    }

	public function contactF($name, $email, $message, $phone = NULL) {
		$text = $message;
		if(!is_null($name) && !is_null($email) && !is_null($message)) {
			if(filter_var($email, FILTER_VALIDATE_EMAIL) != false) {
				// $q = self::insertContact($name, $email, $text);

		    	// if($q == 0) {
					$return = self::sendEmail($this->to, $email, $text, $name);
					if($return == true ) {
		    		    return exit('Successfully contacted! Kindly wait shortly for reply');
					}else {
					    return exit('Unable to send email.');
					}
		    	// }else {
		    	// 	return 'Something went wrong';
		    	// }

			}else {
				return (object) array([
					'status' => 'false',
					'field' => 'email',
					'type' => 'email'
				]);
			}
		}else {
			return (object) array([
					'status' => 'false',
					'field' => 'text',
					'type' => 'text'
				]);
			// return 'All fields are required.';
		}
	}
}