<?php
/**
 * Accion Labs _Code Test Assignment
 * @author	Guruprabakaran S
 */

/**
 * Application Controller Class
 * 
 * This class object is the super class for all the controllers
 */
class BaseController{

    protected $app;

    public function __construct(){

        $this->app = new Loader();

    }
}