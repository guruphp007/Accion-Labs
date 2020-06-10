<?php
class Weather extends BaseModel{
	
	private $table	=	'weather_info';
	
	public function insert($arrJSON)
	{		
		$arrValues			=	array();
		$arrValues['name']	=	@$arrJSON['name'];
		$arrValues['id']	=	@$arrJSON['id'];
		$arrValues['cod']	=	@$arrJSON['cod'];
		$arrValues['timezone']	=	@$arrJSON['timezone'];
		$arrValues['sys_country']	=	@$arrJSON['sys']['country'];
		$arrValues['sys_sunrise']	=	@$arrJSON['sys']['sunrise'];
		$arrValues['sys_sunset']	=	@$arrJSON['sys']['sunset'];
		$arrValues['clouds_all']	=	@$arrJSON['clouds']['all'];
		$arrValues['wind_speed']	=	@$arrJSON['wind']['speed'];
		$arrValues['wind_deg']	=	@$arrJSON['wind']['deg'];
		$arrValues['main_temp']	=	@$arrJSON['main']['temp'];
		$arrValues['main_feels_like']	=	@$arrJSON['main']['feels_like'];
		$arrValues['main_temp_min']	=	@$arrJSON['main']['temp_min'];
		$arrValues['main_temp_max']	=	@$arrJSON['main']['temp_max'];
		$arrValues['main_pressure']	=	@$arrJSON['main']['pressure'];
		$arrValues['main_humidity']	=	@$arrJSON['main']['humidity'];
		$arrValues['base']	=	@$arrJSON['base'];
		$arrValues['coord_lon']	=	@$arrJSON['coord']['lon'];
		$arrValues['coord_lat']	=	@$arrJSON['coord']['lat'];
		$arrValues['timestamp']	=	@$arrJSON['dt'];
		
		$arrFValues		=	array_map(array($this->db, 'sanitize'), $arrValues);
		$arrFSValues	=	array_map(array($this->db, 'escape'), $arrFValues);
		
		$insert_columns	=	'`'.implode('`, `', array_keys($arrFSValues)).'`';
		$insert_values	=	"'".implode("','", array_values($arrFSValues))."'";
		
		$id		=	$arrFSValues['id'];
		$timestamp		=	$arrFSValues['timestamp'];
		
		$select_sql		=	"SELECT COUNT(1) AS TOT FROM `{$this->table}` WHERE `id` = '$id' AND `timestamp` = '$timestamp'";
		$this->db->query($select_sql);
		$dbresult		=	$this->db->fetch();
		
		if($dbresult[0]['TOT'] > 0)	
			return TRUE;
		else
		{	
			$insert_sql		=	"INSERT INTO `{$this->table}` ({$insert_columns}, `created_at`) VALUES ({$insert_values}, NOW());";
			return $this->db->query($insert_sql);
		}
	}
}
