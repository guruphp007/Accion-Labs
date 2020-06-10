<?php
/**
 * Accion Labs _Code Test Assignment
 * @author	Guruprabakaran S
 */

/**
 * Loads the base classes and executes the request.
 */
class Framework
{
    public static function run()
    {
        self::init();

        self::autoload();

        self::dispatch();
    }

    private static function init()
    {
        /*
         *  Load the framework constants
        */

        define("DS", DIRECTORY_SEPARATOR);

        define("ROOT", getcwd() . DS);

        define("FRAMEWORK_PATH", ROOT . "framework" . DS);

        define("CONFIG_PATH", ROOT . "config" . DS);

        define("CONTROLLER_PATH", ROOT . "controllers");

        define("MODEL_PATH", ROOT . "models");

        define("VIEW_PATH", ROOT . "views" . DS);

        $server_path_info = $_SERVER['PATH_INFO']??false;

        $controller_name = 'palindrome';

        $controller_action_name = 'index';

        if ($server_path_info)
        {
            $url_path = trim($server_path_info, '/');

            $arrUrlChunks = explode('/', $url_path);

            $controller_name = trim($arrUrlChunks[0]);

            $controller_action_name = 'index';

            if (count($arrUrlChunks) > 1) $controller_action_name = trim($arrUrlChunks[1]);
        }

        define("CONTROLLER", $controller_name);

        define("ACTION", $controller_action_name);

        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . DS);

        define("CURR_VIEW_PATH", VIEW_PATH . DS);

        /*
         *  include the framework default files
        */

        require CONFIG_PATH . "config.php";
        
		require FRAMEWORK_PATH . "Loader.php";
		
		require FRAMEWORK_PATH . "Database.php";

        require FRAMEWORK_PATH . "BaseController.php";      
		
		require FRAMEWORK_PATH . "BaseModel.php";         

        require FRAMEWORK_PATH . "AppException.php";

        require FRAMEWORK_PATH . "MyCurl.php";
    }

    private static function autoload()
    {
        spl_autoload_register(array(
            __CLASS__,
            'load'
        ));
    }

    private static function load($classname)
    {
        if (substr($classname, -10) == "Controller")
        {
            // Controller
            if (file_exists(CURR_CONTROLLER_PATH . "$classname.php")) 
            	require_once CURR_CONTROLLER_PATH . "$classname.php";
        }
    }

    private static function dispatch()
    {
        $controller_name = CONTROLLER . "Controller";

        $action_name = ACTION;

        try
        {

            if (!class_exists($controller_name))
            {
                throw new Exception("Invalid Controller.");
            }

            $controller = new $controller_name;

            try
            {
                if (!method_exists($controller, $action_name)) 
                	throw new Exception("Invalid Controller Method.");

                $controller->$action_name();
            }
            //catch exception
            catch(Exception $e)
            {
                echo 'Error: ' . $e->getMessage();
            }
        }
        //catch exception
        catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }

    }

}

