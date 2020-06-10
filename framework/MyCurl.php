<?php
/**
 * Accion Labs _Code Test Assignment
 * @author	Guruprabakaran S
 */

/**
 * CURL Adapter Class
 */
class MyCurl {
	
	public $url;
    public $user_agent          =   'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36';
    public $timeout             =   300;
	
	public function __construct($url){
		$this->url	=	$url;
	}
	
	public function get(){
		
		$arrResult  =   array();         
        $ch         =   curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $this->url);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 600);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                        
        $response   = curl_exec($ch);
        $errorno    = curl_errno($ch);  
        $error      = curl_error($ch);
        $info       = curl_getinfo($ch);
        curl_close($ch);
        
        $arrResult['errorno']   =   $errorno;
        $arrResult['error']     =   $error;
        $arrResult['info']      =   $info;
        $arrResult['output']    =   $response;
        
        return $arrResult;		
	}
	
}
