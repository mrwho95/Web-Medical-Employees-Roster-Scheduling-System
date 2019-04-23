<?php

require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Test_Users{
	protected $database;
	protected $dbname = 'Test_Users';

	public function __construct(){
		$acc = ServiceAccount::fromJsonFile(__DIR__.'/secret/medical-77850-29cb6f3da67d.json');

		$firebase = (new Factory)->withServiceAccount($acc)->create();
		$this->database = $firebase->getDatabase();

	}

	public function get(int $userID){
		if (empty($userID) || !isset($userID)) {
			return false;
		}
		if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)) {
			return $this->database->getReference($this->dbname)->getChild($userID)->getValue();
		}else{
			return false;
		}
	}

	public function insert(array $data){
		if (empty($data) || !isset($data)) {
			return false;
		}
		foreach($data as $key => $value){
			$this->database->getReference()->getChild($this->dbname)->getChild($key)->set($value);
		}
		return true;
	}

	public function delete(int $userID){
		if (empty($userID) || !isset($userID)) {
			return false;
		}
		if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)) {
			$this->database->getReference($this->dbname)->getChild($userID)->remove();
			return true;
		}else{
			return false;
		}
	}

}


$test_users = new Test_Users();

// var_dump($test_users->insert([
// 	'1' => 'Dennis',
// 	'2' => 'Henry',
// 	'3' => 'Angel'
// ]));

// var_dump($test_users->get(2));

// var_dump($test_users->delete(3));


 ?>