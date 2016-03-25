<?php 

/**
 * 
 * @brief Class that represents electrometer in our project; 
 * 
 * @details when designing it we have two tariffs day, and night; 
 *
 */
class Electromer
{
	/**
	 * 
	 * @var float $dayRateValue
	 */
	protected $dayRateValue;
	
	/**
	 * @var float $nightRateValue
	 */
	protected $nightRateValue;
	
	/**
	 * var int	$id;
	 */
	protected $id;
	
	/**
	 * 
	 * @var float	$dayRate
	 */
	protected $dayRate 	= 0.20492;
	
	/**
	 * 
	 * @var float		= $nightRate
	 */
	protected $nightRate = 0.11639;

	
	public function __construct( $id, $dayRateValue, $nightRateValue )
		{
			$this->dayRateValue 	= $dayRateValue;
			$this->nightRateValue 	= $nightRateValue;
			$this->id 				= $id;
	
			print "I am an Electromer number: " . $this->id . " My dayrate Value 
					is " . $this->dayRateValue . "and my night rate value is " .
					$this->nightRateValue;
		}
	
	/**
	 * @brief	function that we set the value for the protected variable 
	 * 
	 * @param  	float $dayRateValue
	 * 
	 * @return  void
	 */
	public function setDayRateValue( $dayRateValue )
	{
		$this->dayRateValue = $dayRateValue;
	}
	
	/**
	 * @brief	function that set nightRate;
	 * 
	 * @param	float	$nightRateValue;
	 * 
	 * @return 	void
	 */
	public function setNightRateValue( $nightRateValue )
	{
		$this->nightRateValue = $nightRateValue;
	}
	
	/**
	 * @brief	function that we set the value;
	 * 
	 * @param 	int $id
	 * 
	 */
	public function setId( $id )
	{
		$this->id = $id;
	}
	
	/**
	 * @brief	function we get the value day is set already
	 * 
	 * @param	$this->nightRate
	 * 
	 * @return  $this->dayRateValue
	 */
	public function getDayRateValue()
	{
		return $this->dayRateValue;
	}
	
	/**
	 * @brief	get the night ratevalue
	 * 
	 * @param	float	$nightRateValue
	 * 
	 * @return	void
	 */
	public function getNightRateValue()
	{
		return $this->nightRateValue;
	}
	
	/**
	 * @brief	getId
	 * 
	 * @param	int		$id
	 * 
	 * @return	int
	 */
	public function getId()
	{
		return $this->id;
	}
		
	/**
	 * @brief	function that calculate the price for the electricity using during the day;
	 * 
	 * @details	when we are using electricity we have the value and the price!
	 * 
	 * @return 	float $result
	 */
	public function calculatePriceForDayValue()
	{
		//price for dayValue = 0.20492;
		
		$result = $this->dayRate * $this->dayRateValue;
		var_dump( $result );
		
	}
	
	/**
	 * @brief	function that calculate the price for the electricity used during the night
	 * 
	 * @details		we calculate this function when we equal the value and the price
	 * 
	 * @return	float $result
	 * 
	 */
	public function calclulatePriceForNightValue()
	{
		//price for nightValue = 0,11639;
		$result = $this->nightRate * $this->nightRateValue;
		print( $result );
	}
}

$el = new Electromer(1, 10, 10 );
$el->calculatePriceForDayValue();
$el->calclulatePriceForNightValue();





?>