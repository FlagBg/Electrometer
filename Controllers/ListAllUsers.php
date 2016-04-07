<?php
include_once '../Models/UsersModel.php';

/**
 *
 * @brief this class create user! it is using constructor and connection with the database!
 *
 * @details: it works with inherit singleton database connection; and passing the cription using md5;
 */
class ShowAllUsers
{
	/**
	 * @brief	construct the model
	 *
	 * @return	boolean
	 */
	public function __construct()
	{  
	}

	/**
	 * @brief 	this function create the model, we create the if statement, if!empty array()
	 *
	 * @param 	$this->userData;$this
	 *
	 * $return	array( $result ) not anymore $user->userData
	 *
	 */
	public function listAllUsers()
	{
		$usersModel = new UsersModel();
		
		if( ! empty( $_POST ) )
		{
			if (is_string($_POST['username']))
			{
				$username = $_POST['username'];
			}
			else
			{
				return "Username is not a string....oh crap." ;
			}
			
			if (is_numeric($_POST['role_id']) && strlen((string)$_POST['role_id']) < 12)
			{
				$roleId = $_POST['role_id'];
			}
			else
			{
				return "Role ID is not valid....oh crap.";
			}
			
			if (is_string($_POST['fname']))
			{
				$fname = $_POST['fname'];
			}
			else 
			{
				return "Firstname is not string oh crap....";
			}
			
			if (is_string($_POST['lname']))
			{
				$lname = $_POST['lname'];
			}
			else 
			{
				return "Firstname is not string oh crap....";
			}
			
			if (is_numeric($_POST['age']) && strlen((string)$_POST['age']) < 4)
			{
				$age = $_POST['age'];
			}
			else
			{
				return "Age is not valid....oh crap.";
			}
			
			
			if (isset($username, $roleId, $fname, $lname, $age))
			{
				
			
			$userList = array(
					'username' => $username,
					'role_id' =>$roleId,
					'fname' => $fname,
					'lname' => $lname,
					'age' => $age
			);

			

			$result		= $usersModel->createUser( $userdata );//

			return $result;
			
			}
			else
			{
				return "This shouldn't have happened.";
			}
		}
		else 
		{
			
			$userList = $usersModel->listAllUsers();
			$this->renderForm($userList);
			
		}

	}

	/**
	 * @brief	class that is colling the html form that creating the user;
	 *
	 * @details	it has an address that shows the html path we are calling it;
	 *
	 * @return	boolean true/false;$this
	 *
	 */
	public function renderForm($userList)
	{
		if (is_array($userList))
		{
		
		include ( __DIR__ . '/../Views/userList.php' );

		
		}
		else
		{
			echo "an error has occurred.";
		}
		
		
	}
	
	
}


