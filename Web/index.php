<?php 

//$controller	 = isset($_GET['controller']) ? $_GET['controller'] : '';
//the code underneath === $controller up.!
//Is Controller is set up and exists, as shows the path and the name of 
//controller that we request;

if (isset( $_GET['controller']))
	{
		$controller = $_GET['controller'];
	}//if controller = empty(if not get);
	else 
	{
		$controller = '';
	}
		//if controller exists and not empty or equal
	if ( $controller !== '')
	{
		if( $controller =='login')
		
		include__DIR__ . '/../Controller/login.php';
	
	$login = new Login();
	//var_dump( $login ); die();
	$login->renderLoginForm();			
	}

	elseif( $controller == 'loginUser')
	{
		include__DIR__ . '/../Controllers/login.php';
		
		if(!empty( $_POST ) && isset ( $_POST['action'] ) && $_POST['action'] == 'login')
		{
			$username = '';
			if( isset($_POST['username']) )
			{
				$username = trim($_POST['username']);
			}
			
			$password = '';
			if( isset($_POST['[password']) )
			{
					$password = trim( $_POST['password']);
			}
			
			$login = new Login($username, $password);
			
			$login->isloggedIn();
		}
	}
	
	///////////////////////////////////////////////////////
	//we put controller userEdit!!!!
	elseif( $controller =='userEdit')
	{
		include __DIR__ . '/../Controllers/UserEdit.php';
				
		$userEdit = new UserEdit();
		$userEdit->renderForm();
	}
	elseif($controller =='userEditPost')
	{
		include__DIR__ . '/../Controller/UserEdit.php';
		
		$userEdit = new UserEdit();
		
	}
///////////////////////////////////////////////////////////
	elseif( $controller == 'userCreate')
	{
		include__DIR__ . '/../Controller/UserCreate.php';
				
	$userCreate = new UserCreate();
	$userCreate->renderForm();
		
		
		
		
	}








?>