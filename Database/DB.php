<?php 

namespace Database;

class DB {
	private $dbname = 'contact_form';
	private $dbuser = 'root';
	private $dbpas = '';
	private $dbserver = 'localhost';

	public function connect() {
		try {
			$dbCon = mysqli_connect($this->dbserver, $this->dbuser, $this->dbpas,$this->dbname);
			return $dbCon;
		} catch (Exception $e) {
			echo 'An error occured connecting to the database. '.$e->getMessage();;
		}
	}

}