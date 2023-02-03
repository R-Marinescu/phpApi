<?php

class UserController
{
	private $response;
	private $getData;
	
	function __construct($getData) 	
	{
		$this->getData = $getData;
	
		$this->response = [
			'status' => '',
			'message' => '',
			'time' => 0,    
			'data' => []
		];
	}

  //Get All from Users 
  public function getAllUsers()
  {
  }

  // Get one user by name 
  public function getUserByName()
  {
    $result = UserRepo::getInstance()->getUserByName($this->getData['name'] ?? null);
    return $result;
  }

  //get user by id
  public function getUserById()
  {

    $result = UserRepo::getInstance()->getUserById($this->getData['id'] ?? null);

    return $result;
  }


  //update user
  public function updateUser()
  {
    $result = UserRepo::getInstance()->updateUser($_GET['id'], $_GET['firstName'], $_GET['lastName'], $_GET['dateOfBirth'], $_GET['email']);

    return $result;
  }

  //delete user
  public function deleteUserById()
  {
    $result = UserRepo::getInstance()->deleteUserById($this->getData['id'] ?? null);

    return $result;
  }

  //insert user into db
  public function insertUser()
  {
    $result = UserRepo::getInstance()->insertUser($_GET['firstName'] ?? "User", $_GET['lastName'] ?? "UserLastname", $_GET['dateOfBirth'] ?? "1/1/2023", $_GET['email'] ?? "exam@exam.com");

    return $result;
  }

  //Default message for the switch case
  public function msgDefault()
  {
    $msg = "Methods available: getall, adduser, getbyid, getbyname, updateuser, deleteuser";
    return $msg;
  }

  public function myNull() {
    return null;
  }




  public function crudActions()
  {
	$start = microtime(true);
	$action = $this->getData['action'] ?? null;
	$this->response['status'] = http_response_code();
	$this->response['message'] = 'All good';
	try {
		switch (strtolower($action)) {
		  case 'getall':
			$this->response['data'] = UserRepo::getInstance()->getAll();
			break;

		  case 'getbyid':
			$data = self::getUserById();
			
			if(!$data) {
				$this->response['message'] = 'Not found ID';
			} else {

				$this->response['data'] = $data;
			}			

			break;
			
		  case 'getbyname':
			$data = self::getUserByName();
			break;

		  case 'deleteuser':
			$data = self::deleteUserById();
			break;			
			
		  case 'adduser':
			$data = self::insertUser();
			break;
			
		  case 'updateuser':
			$data = self::updateUser();
			break;
			


		  default:
		  	$this->response['message'] = 'No data returned';
		  	$this->response['status'] = 404;
			break;
		}
		
	} catch (Exception $e) { 
		$this->response['message'] = $e->getMessage() . '' . $e->getLine();
		$this->response['status'] = 500;
	}
	$this->response['time'] = round(microtime(true) - $start,2);
  }



  public function response()
  {
    $msg = json_encode($this->response, JSON_PRETTY_PRINT);
    return $msg;
  }

  public function logger()
  {
	file_put_contents('./log_'.date("j.n.Y").'.txt', json_encode($this->response) . "\n", FILE_APPEND);	
  }

// public function getUserById() {
//   $result = UserRepo::getInstance()->getUserById($_GET['id']);
//   $message = $result . " status 200";
//   return array("message"=> $message);
// }


}