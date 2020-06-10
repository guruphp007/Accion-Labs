<?php
/**
 * Accion Labs _Code Test Assignment
 * @author	Guruprabakaran S
 */

/**
 * Class to check for Palindrome without using PHP in built functions
 */
class Palindrome{
	
	public $input;
	private $reverse;
	
	public function __construct(Reverse $reverse)
	{
        $this->reverse = $reverse;
    }
	
	public function validate()
	{
		$reverse	=	$this->reverse->build($this->input);
		
		if($this->input == $reverse)
			return TRUE;
		else
			return FALSE;
	}
}