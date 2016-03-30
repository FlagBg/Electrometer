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
		if ( isset( $_SESSION['user_id'] ) && $_SESSION['user_id'] )
		{
			$this->loggedIn	= true; 
		}
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
			$_SESSION['user_id'] = $this->user->getId();

			$this->loggedIn		= true;
		}
	}
	
	public function logout()
	{
		unset( $_SESSION['user_id'] );
		
		$this->loggedIn		= false;
	}
	
	/**
	 * @brief 	function is we logged print the datas!
	 * 
	 * @return	boolean
	 */
	public function isLoggedIn()
	{
		return $this->loggedIn;
	}
	
	/**
	 * @brief	call the html render form;
	 */
	public function renderLoginForm()
	{
		$form = file_get_contents(__DIR__ . '/../View/Login.html');
		
		print( $form );
		
	}
}


?>