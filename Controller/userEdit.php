<?php 

include_once '..Model/UserModel.php';

class UserEdit
{
	protected $userData;
	
	public function __construct()
	{
		if( !empty ($_POST ) )
		{
			$this->userData = array(
					'username' => $_POST['username'],
					'password' => md5(trim($_POST['password'])),
					'role_id' => $_POST['role_id'],
					'fname' => $_POST['fname'],
					'lname' => $_POST['lname'],
					'age' => $_POST['age'],
			);
		}
	}
			
	public function UserEdit()
	{
		$userEdit = new UserModel();
		
		$userEdit->create( $this->userData );
	}
		
	public function rendderForm()
	{
		$form = file_get_contents(__DIR__ . '/..View/UsernameView.html' );	
		
		print ($form );
		
	}
				
}
	
?>

