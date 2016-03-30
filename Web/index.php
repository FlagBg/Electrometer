<?php 

//$controller	 = isset($_GET['controller']) ? $_GET['controller'] : '';
//the code underneath === $controller up.!
//Is Controller is set up and exists, as shows the path and the name of 
//controller that we request;
//da si vzemem dannite ot sesiyata, da vidim kak se setva, destroyva, izvikvat dannite po id ili kakvoto i da e tam;
//sled tova da si napravya edno vikane po sesiya... i da vurna stoynostta po sesiya po id; 

session_start();

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

 	if (isset( $_GET['controller'] ) )
	{
		$controller = $_GET['controller'];
	}//if controller = empty(if not get);
	else 
	{
		$controller = '';
	}
	
	if( $controller == 'login' )
	{
		include __DIR__ . '/../Controller/login.php';
		$login = new Login();
		
		if ( ! $login->isloggedIn() )
		{
			$login->renderLoginForm();
		}
		else
		{
			header( 'Location: ?controller=userEdit' );
			exit;
		}
	}
	elseif ( $controller == 'logout' )
	{
		include __DIR__ . '/../Controller/login.php';
		$login = new Login();
		$login->logout();
		
		if ( ! $login->isloggedIn() )
		{
			header( 'Location: ?controller=login' );
			exit;
		}
	}
	elseif( $controller == 'loginUser')
	{
		include __DIR__ . '/../Controller/login.php';
		
		if ( ! empty( $_POST ) && isset ( $_POST['action'] ) && $_POST['action'] == 'login')
		{
			$username = '';
			if( isset($_POST['username']) )
			{
				$username = trim($_POST['username']);
			}
			
			$password = '';
			if( isset($_POST['password']) )
			{
				$password = trim( $_POST['password']);
			}
			
			$login = new Login();
			$login->login( $username, $password );
			
			if ( $login->isLoggedIn() )
			{
				header( 'Location: ?controller=userEdit' );
				exit;
			}
			else
			{
				header( 'Location: ?controller=login' );
				exit;
			}
		}
	}
	
	///////////////////////////////////////////////////////
	//we put controller userEdit!!!!
	elseif( $controller =='userEdit')
	{
		include __DIR__ . '/../Controller/UserEdit.php';
				
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
	
//echo "done\n";