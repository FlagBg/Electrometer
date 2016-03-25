<?php

include_once '../Model/UserModel.php';

/**
 *	@brief	class that doing the login. Ones we start the program it will ask for who is who,
 *			so we need usernames that are stored in the DB; It works with md5 and username and password
 * 
 */

class Login
{
	/**
	 * 
	 * @var string $username;
	 */
	protected $username;
	
	/**
	 * 
	 * @var md5 string $password
	 */
	protected $password;
	
	/**
	 * 
	 * @var boolean		$loggedIn
	 */
	protected $loggedIn = false;
	
	/**
	 * 
	 * @var string $user
	 */
	protected $user;
	
	/**
	 * @brief	default function that create the connection fron
	 */
	public function __construct()
	{
	}
	
	/**
	 * 
	 * @param 	string $username
	 * @param 	md5 string $password
	 * 
	 * return	string array[] boolean $this->loggedIn as true or not and
	 * 							if is true is creating $this->user that is a model from userModel;
	 */
	public function login( $username, $password )
	{
		$password = md5( trim ( $password ) );
		
		$userModel = new UserModel();
		
		if( $this->user = $userModel->login( $username, $password ))
		{
			$this->loggedIn = true;
		}		
	}
	
	/**
	 * @brief 	function is we logged print the datas!
	 */
	public function isLoggedIn()
	{
		if ($this->loggedIn)
		{
			print "User is logged in";
			var_dump( $this->user->getFirstName());
			var_dump( $this->user->getLastName());
			print_r( $this->user);
		}
		else 
		{
			print "Invalid login parameters";
		}
	}
	
	/**
	 * @brief	call the html render form;
	 */
	public function renderLoginForm()
	{
		$form = file_get_contents(__DIR__ . '/../Views/Login.html');
		
		print( $form );
		
	}
}


?>