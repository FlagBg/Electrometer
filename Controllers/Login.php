<?php

include_once '../Models/UsersModel.php';

/**
 * 
 * @brief 	class that is doing the Login. As we have database that keeps records for
 * 			the username and the password of every user so here we are doing object and
 * 			functions that doing exactly this and checking is the useris loggedIn and 
 * 			than prints the Strings as results taking them from the html form;
 */
class Login
{
	/**
	 * this class is creating the object
	 * 
	 * @param 	string 	$username
	 * @param	string 	$password
	 * @param	boolean $loggedIn
	 * 
	 * return	boolean $user
	 */
	protected $username;
	protected $password;
	protected $loggedIn = false;
	protected $user;
	
	/*
	 * default constructor;
	 */
	public function __construct()
	{
	}
	
	
	/**
	 * @brief the function is extending the userModel crypting the password using 
	 * 		  md5 method; That is why is checking through $sql what the contains is;
	 * 		  
	 * 
	 * @param string $username
	 * @param string $password
	 * 
	 * return	string array[] boolean $this->loggedIn as true or not true and if true
	 * 			than is creating $this->user that is a model from userModel;
	 */
	public function login( $username, $password )
	{
		$password = md5( trim( $password ) );
		//die( $password ); 
		$userModel = new UsersModel();
		
		if( $this->user = $userModel->login($username, $password))
		{
			$this->loggedIn 		= true;
			$_SESSION['user_id']	= $this->user->getId();
			$_SESSION['user_key']	= md5($this->user->getFirstName() . $this->user->getLastName() . $this->user->getAge());
			
		}
	}

	/*
	 * @brief	function isLoggedIn checked if true print $results:
	 * 			if true print everything in $this->user 
	 */
	public function isloggedIn()
	{
		/* if ($this->loggedIn) //KOMENTIRAM!!!
		{   print "User is logged in";
			var_dump( $this->user->getFirstName());
			var_dump($this->user->getLastName());
		}
		else
		{
			print "Invalid login parameters";
		}
		 */
		//I do comment that here and writing the code above!! 
		return $this->loggedIn;
		//as we return this..... is not really clear why is like that...
	}
	
	/**
	 * @brief	Logout user
	 * 
	 * @return	void
	 */
	public function logout()//this is clear
	{
		session_destroy();
		session_start();
	}
	
	/**
	 * @brief	if all true take all the values from the html and print 
	 * 
	 * @param	string	$form
	 */
	public function renderLoginForm()//this is clear
	{
		$form	= file_get_contents( __DIR__ . '/../Views/Login.html' );
		
		print( $form );
		print('render form'); die();
	}
	
// 	public function dropUser()
// 	{
// 	//	if( isset( $_SESSION['user_id'] );
				
		
// 	}
}
