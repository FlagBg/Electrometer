<?php

include_once 'Database.php';
include_once '..helpers/Electromer.php';

Class ElectrometerModel
{
	
	
	protected $db;
	
	public function __construct()
	{
		$this->db = Database::getInstance();
	}
	
	public function showElectromer( $id, $dayRateValue, $nightRateValue)
	{
		$sql = ' SELECT * FROM `electrometer ';
		
		$stmt	=	$this->db->prepare( $sql );
		
		$result = $stmt->execute( array( $id, $dayRateValue, $nightRateValue) );
		
		if ( $result )
		{
			if ( $stmt->rowCount() > 0 )
			{
				$rows = $stmt->fetchAll( PDO::FETCH_ASSOC);
				$electrometer = array_pop( $rows );
				
				return new Electrometer($electrometer['id'], $electrometer['dayRateValue'], $electrometer['nightRateValue']);
			}
			else we
			{
				return false;
			}
			
			
		
			//
			//else return false;
		}
		return false;okay
	
		//spored Bojo da suzdam edin metod, koyto da mi raboti s bazata danni i 
		//da pravi zayavka v bazata danni, kakto i da insertva kum neya, a v drugoto
		//samo da podavam i promenyam.
	}
	
	
	
	
	
	
}