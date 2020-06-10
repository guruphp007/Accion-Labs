<?php
/**
 * Accion Labs _Code Test Assignment
 * @author	Guruprabakaran S
 */

/**
 * MySQLi Database Adapter Class
 */
class Database {
	  
    private $_mysqli;
    private static $_instance; //The single instance
    private $_result;
	
	private function __construct() {
        $this->_mysqli = new mysqli(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
    }

    public static function getInstance() {
    	
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	public function query($query)
    {
        $this->_result	=	$this->_mysqli->query($query);
		
		return $this->_result;
    }
	
	public function fetch()
    {
        if (is_object($this->_result)) {
            if (method_exists('mysqli_result', 'fetch_all')) {
                $results = $this->_result->fetch_all(MYSQLI_ASSOC);
            } else {
                for ($results = array(); $tmp = $this->_result->fetch_array(MYSQLI_ASSOC);)
                    $results[] = $tmp;
            }

            return $results;
        }
    }

    public function escape($string)
    {
        if (get_magic_quotes_runtime())
            $string = stripslashes($string);
		
        return $this->_mysqli->real_escape_string($string);
    }
	
	public function sanitize($str)
	{
		return htmlspecialchars(strip_tags($str));
	}
	
	/**
     * Close connection
     */
    public function __destruct()
    {
        $this->_mysqli->close();
    }
}
