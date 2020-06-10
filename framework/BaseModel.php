<?php
/**
 * Accion Labs _Code Test Assignment
 * @author	Guruprabakaran S
 */

/**
 * Application Model Class
 * 
 * This class object is the super class for all the models
 */
class BaseModel{
	
	protected $db; //database connection object
	
	public function __construct(){
		
        $this->db = Database::getInstance();

    }
}
