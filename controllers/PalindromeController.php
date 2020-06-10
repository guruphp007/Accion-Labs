<?php
class PalindromeController extends BaseController{
	
	public function index()
	{		
		require FRAMEWORK_PATH . "Palindrome.php";
		require FRAMEWORK_PATH . "Reverse.php";
		
		$input	=	'MADAM';
		
		$Palindrome			=	new Palindrome(new Reverse); //Injecting a dependency explicitly
		$Palindrome->input	=	$input;
		$result				=	$Palindrome->validate();
		
		if($result)
			echo "THE GIVEN VALUE \"{$input}\" IS A <b>PALINDROME</b>.";
		else
			echo "THE GIVEN VALUE \"{$input}\" IS <b>NOT A PALINDROME</b>.";
	}
}