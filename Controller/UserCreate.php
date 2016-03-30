<?php 

include_once '../Model/UserModel.php';
/**
 * @brief 		class that is creating the user as controller; It is using constructor
 * 				and connection with the database
 * @details		it works with inherit singleton database connection
 * 
 */
class UserCreate
{
	/**
	 * 
	 * @var array $userData
	 */
	protected $userData;
	
	public function __construct()
	{
		if( !empty( $_POST ) )
		{
			$this->userData = array(
			'username' => $_POST['username'],
			'password' => md5( trim ( $_POST['[password']) ),
			'role_id' => $_POST['role_id'],
			'fname' => $_POST['fname'],
			'lname' => $_POST['lname'],
			'age'	=> $_POST['age'],
			);				
		}
	}
	
	/**
	 * brief 	create model
	 * 
	 * @param	$this->userData
	 * 
	 * @return	$this->user->userData
	 */
	public function createUser()
	{
		$userModel = new UserModel();
		
		$userModel->createUser( $this->userData );
	}
	
	/**
	 * brief class that requesting html form and putting the values into the DB
	 */
	public function renderForm()
	{
		$form = file_get_contents(__DIR__ . '/../View/CreateUser.html' );
		
		print ($form);
	}
}




?>