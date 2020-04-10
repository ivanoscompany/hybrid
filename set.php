<?php 
	class set{
		
		public static function run(){
			$data = explode("/",$_SERVER['REQUEST_URI']);
			$shiftOne = array_shift($data);
			$run = $data[0];
			if($run == ""){
				return set::controller('Index');
			} else {
				require_once('Route.php');
				$urlCheck = array_search($run,$setRoude);
				if($urlCheck){
					foreach ($setRoude as $key => $value){
						if($run == $value){
							$keyExplored = explode("/",$key);
							return self::route(['name'=>$keyExplored[0], 'control'=>$keyExplored[1]], $data);
						}
					}
					} else {
					return set::controller('Error404', 'error404');
				}
			}
		}
		
		public function ajaxRun(){
			if($_FILES){
				set::controller('Admin', 'upload', false, json_encode([$_FILES]));
			} else {
				//set::controller(set::Post('PlugName'), 'access', 'run', null);
				set::controller(set::Post('PlugName'), set::Post('FileName'), set::Post('Method'), set::Post('DataResult'));
			}
		}
		
		public static function route($mod, $data){
			$PluginName = $mod['name'];
			$Controller = explode("@",$mod['control']);
			$className = $Controller[0];
			$methodName = $Controller[1];
			return set::controller($PluginName, $className, $methodName, json_encode($data));
		}
		
		public static function path($pluginName, $mvc, $file){
			$getDir = str_replace("\\","/",__dir__);
			$pluginFolderPath = '/Plugin/';
			return $pluginPath = $getDir.$pluginFolderPath.'/'.$pluginName.'/'.$mvc.'/'.$file.'.php';
		}
		
		public static function controller($pluginName = 'Index', $className = 'index', $methodName = 'run', $data = false){
			session_start();
			if($data){
				$json = str_replace('&quot;', '"', $data);
				$getData = json_decode($json, true);
				} else {
				$getData = $data;
			}
			define("p",$pluginName);
			self::model('Trait', 'DBModel');
			require_once(self::path($pluginName, 'controller', $className));
			$class = new $className();
			if($methodName){
				return $class->$methodName($getData);
			}
		}
		
		public static function model($pluginName, $className = 'model'){
			require_once(self::path($pluginName, 'model', $className));
		}
		
		public static function view($pluginName, $fileName, $data = false){
			if($data){
				foreach($data as $key=>$value)
				{
					${$key} = $value;
				}
			}
			include(self::path($pluginName, 'view', $fileName));
		}
		
		public static function Post($Value){
			$Method = $_POST[$Value];
			$Trim = trim($Method);
			$Chars = htmlspecialchars($Trim);
			return $Chars;
		}
		
		public static function config($data){
			$ini = parse_ini_file('Config.ini');
			return $ini[$data];
		}
		
		public static function url($url){
			$getRule = 'http://'.$_SERVER['SERVER_NAME'].'/'.$url;
			return $getRule;
		}
		
		public static function host(){
			$getRule = 'http://'.$_SERVER['SERVER_NAME'];
			return $getRule;
		}
		
		public static function letTrans($ward){
			$tr = array(
			"А"=>"a", "Б"=>"b", "В"=>"v", "Г"=>"g", "Д"=>"d",
			"Е"=>"e", "Ё"=>"yo", "Ж"=>"zh", "З"=>"z", "И"=>"i", 
			"Й"=>"j", "К"=>"k", "Л"=>"l", "М"=>"m", "Н"=>"n", 
			"О"=>"o", "П"=>"p", "Р"=>"r", "С"=>"s", "Т"=>"t", 
			"У"=>"u", "Ф"=>"f", "Х"=>"kh", "Ц"=>"ts", "Ч"=>"ch", 
			"Ш"=>"sh", "Щ"=>"sch", "Ъ"=>"", "Ы"=>"y", "Ь"=>"", 
			"Э"=>"e", "Ю"=>"yu", "Я"=>"ya", "а"=>"a", "б"=>"b", 
			"в"=>"v", "г"=>"g", "д"=>"d", "е"=>"e", "ё"=>"yo", 
			"ж"=>"zh", "з"=>"z", "и"=>"i", "й"=>"j", "к"=>"k", 
			"л"=>"l", "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", 
			"р"=>"r", "с"=>"s", "т"=>"t", "у"=>"u", "ф"=>"f", 
			"х"=>"kh", "ц"=>"ts", "ч"=>"ch", "ш"=>"sh", "щ"=>"sch", 
			"ъ"=>"", "ы"=>"y", "ь"=>"", "э"=>"e", "ю"=>"yu", 
			"я"=>"ya", " "=>"-", "."=>"", ","=>"", "/"=>"-",  
			":"=>"", ";"=>"","—"=>"", "–"=>"-"
			);
			$value = strtr($ward,$tr);
			$valueSpecialCar = htmlspecialchars($value);
			return rtrim($valueSpecialCar,"-");
		}
	}		