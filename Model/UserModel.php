<?php

include_once 'database.php';
include_once '../Helper/User.php';

/**
 * @brief	Class USerModel representing all the functionality from mvc;
 * 			It takes the values from the database and create an object from the datas!
 * 
 * @param	void	$db
 * 
 */

class UserModel
{
	/**
	 *	@var	pdo $dbo 
	 */
	protected $db;
	
	public function __construct()
	{
		$this->db =Database::getInstance();
	}
	
	/**
	 * @brief	create object login that is checking $username, $password
	 * 
	 * @param	string $username
	 * @param	string $password
	 * 
	 * @return	User
	 */
	public function login( $username, $password )
	{
		$sql = '
				SELECT * FROM users WHERE username = ? AND 
									password = ?';
		
		$stmt = $this->db->prepare( $sql );
		
		$result = $stmt->execute( array( $username, $password ) );
		
		if ( $result )
		{
			if( $stmt->rowCount() > 0 )
			{
				$rows	= $stmt->fetchAll( PDO::FETCH_ASSOC );
				$row	= array_pop( $rows );
				
				$user	= new User( $row['fname'], $row['lname'], $row['age']);
				$user->setId( $row['id'] );
				
				return $user;
			}
		}
			
		return false;
	}
	
	/**
	 * @brief	PDO query that is using the html and creating the object; 
	 * 
	 * @param void PDO $userData
	 * 
	 * @return	pdo;
	 */
	public function createUser( $userData )
	{
		$sql = ' 
					INSERT INTO users
					SET username 	= ?,
					password 		= ?,
					role_id 		= ?,
					fname 			= ?,
					lname			= ?,
					age				= ?
				';	
		
		$stmt = $this->db->prepare( $sql );
		
		$result = $stmt->execute( $userData );
	}
	
	public function updateUser( $userData )
	{
		$sql	= '
				
				
				
				
				
				';
		
	}
}


?>