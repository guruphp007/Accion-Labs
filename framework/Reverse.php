<?php
/**
 * Accion Labs _Code Test Assignment
 * @author	Guruprabakaran S
 */

/**
 * Class to reverse any strings/numbers without using PHP in built functions
 */
class Reverse{
	
	public function build($input)
	{
		if(is_numeric($input))
			return $this->number($input);
		else
			return $this->string($input);
	}
	
	public function string($input)
	{
		//$input		=	strtolower($input);
		$reverse 	=	"";
		$length		=	strlen($input);
		for ($i = ($length-1); $i >= 0; $i--)
		{
			$reverse = $reverse.$input[$i];
		}
		
		return $reverse;
	}
	
	public function number($number)
	{
		$sum = 0;
		//using while loop to get the reverse of the input number
		while(floor($number))
		{
			$remainder = $number % 10;
			$sum = $sum * 10 + $remainder;
			$number = $number / 10;
		}
		
		return $sum;
	}
}