<?php
class ReverseController extends BaseController{
	
	public function index()
	{		
		require FRAMEWORK_PATH . "Reverse.php";
		
		$input	=	123456789;		
		$Reverse	=	new Reverse;
		$reverse_value	=	$Reverse->build($input);
		
		echo "THE REVERSED VALUE OF \"{$input}\" IS <b>{$reverse_value}</b>.";
	}
}