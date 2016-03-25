<?php 

/**
 * @brief		Abstract Class Database demonstates singleton design pattern
 * 
 * @detail		when designing applications often we use singleton design pattern because we d
 *				access and with only one isntance and after that we inheritet
 *				$singleton	= Singleton::getInstance();
 *				
 */

class Database
{
	/**
	 * 
	 * @var const	USER
	 */
	const USER						= 'root';
	
	/**
	 * @var const	PASSWORD
	 */
	const PASSWORD					= '';
	
	/**
	 * @var const	HOST
	 */
	const HOST						= 'localhost';
	
	/**
	 * @var	const DB_NAME
	 */
	const DB_NAME					= 'electromer';
	
	/**
	 * 
	 */
	public static $connection = null;
	
	/**
	 * @brief	private function construct as default that create connection with no param
	 */
	private function __construct()
	{
		
	}
	
	/**
	 * @brief	function that create the database connection. Works as object
	 * 
	 * @param	if	self::$connection === NULL;
	 * @return	PDO Connection;
	 */
	public static function getInstance()
	{
		if (self::$connection === NULL)
		{
			self::$connection = new PDO( 'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME, self::USER, self::PASSWORD );
		}
		
		return self::$connection;
	}
}



?>