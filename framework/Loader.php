<?php
/**
 * Accion Labs _Code Test Assignment
 * @author	Guruprabakaran S
 */

/**
 * Loader Class
 * 
 * Loads controller & models components
 */
class Loader{

	private $_models = array();
	
	public function model($model){

        if (empty($model))
		{
			return $this;
		}
		elseif (is_array($model))
		{
			foreach ($model as $key => $value)
			{
				$this->model($value);
			}

			return $this;
		}

		if (in_array($model, $this->_models, TRUE))
		{
			return $this;
		}
		
		$name  =  $model;
		
		$model = ucfirst($model);
		
		require_once(MODEL_PATH.DS.$model.'.php');
		
		$this->_models[] = $model;
		
		$model = new $model();
		
		$this->$name = $model;
		
		return $this;

    }
}