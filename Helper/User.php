<?php

/**
 * 
 * @brief 		in this class we are creating people that have electrometers, they obviosly could have one, two or n devices
 * 				As humans they are  users. What they have: firstname, lastname and age;
 * 
 * @details		when we initialize we create the object;
 *
 */
class User
{
	/**
	 * @var string $firstName;
	 */
	protected $firstName;
	
	/**
	 * @var	string $lastName;
	 */
	protected $lastName;
	
	/**
	 * @var	int	$age
	 */
	protected $age;
	
	/**
	 * @var	int $id
	 */
	protected $id;
	
	
	public function __construct( $firstName, $lastName, $age )
	{
		$this->firstName 	= $firstName;
		$this->lastName 	= $lastName;
		$this->age			= $age;
		
	}
	
	/**
	 * @brief	getFirstName
	 * 
	 * @var		$firstName
	 * 
	 * @return	$this->firstName
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}
	
	/**
	 * @brief	getLastName
	 *
	 * @var		$lastName
	 *
	 * @return	$this->lastName
	 */
	public function getLastName()
	{
		return $this->lastName;
	}
	
	/**
	 * @brief	getAge
	 *
	 * @var		$age
	 *
	 * @return	$this->age
	 */
	public function getAge()
	{
		return $this->age;
	}
	
	/**
	 * @brief	setFirstName
	 *
	 * @var		$firstName
	 *
	 * @return	string
	 */
	public function setFirstName( $firstName )
	{
		$this->firstName = $firstName;
	}
	
	/**
	 * @brief			setLastName
	 *
	 * @var				$lastName
	 *
	 * @return	string $lastName
	 */
	public function setLastName( $lastName )
	{
		$this->lastName = $lastName;
	}
	
	/**
	 * @brief	getAge
	 *
	 * @var		$age
	 *
	 * @return	$this->age
	 */
	public function setAge( $age )
	{
		$this->age = $age;
	}
	
	/**
	 * @brief	Get user id
	 *
	 * @return	int
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @brief	Set user id
	 * 
	 * @param	int $id
	 * 
	 * @return	void
	 */
	public function setId( $id )
	{
		$this->id	= $id;
	}
}














?>
