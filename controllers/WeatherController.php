<?php
class WeatherController extends BaseController{
	
	public function save()
	{
		try 
		{
			if(!isset($_GET['q']))
				throw new AppException('Parameter is missing.');
			
			$q	=	trim($_GET['q']);
			
			if(empty($q))
				throw new AppException('Parameter is empty.');						
			
			$api_url	=	"http://api.openweathermap.org/data/2.5/weather?q={$q}&appid=".OPENWEATHERMAP_API_KEY;
			
			$curl		=	new MyCurl($api_url);
			$arr_api_json_content	=	$curl->get();
			
			if($arr_api_json_content['errorno'])
				throw new AppException('Http error found.');
			
			if($arr_api_json_content['info']['http_code'] != 200)
				throw new AppException('city not found.');
			
			$arrJSONContent		=	json_decode($arr_api_json_content['output'], TRUE);
			
			$this->app->model(array('Weather'));
			
			if($this->app->Weather->insert($arrJSONContent))
			{
				exit('Successfully Saved!');
			}
			else {
				exit('Something went wrong!');
			}
		}
		catch (AppException $e) {
		  
		  echo 'Error : ',$e->getMessage();
		}
	}
}