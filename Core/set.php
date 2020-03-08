<?php 
	class set{
		
		public function linkRun(){
			$data = explode("/",$_SERVER['REQUEST_URI']);
			$upOne = array_shift($data);
			$dataCount = count($data);
			$run = $data[0];
			if($run == 'admin' && $dataCount == 1){
				set::controller('Admin', 'index', 'run', json_encode([]));
				}elseif($run == 'product' && $dataCount == 2){
				echo 'Plugin product by name';
			}
			else{
				set::controller('Index', 'index', 'run', json_encode([]));
			}
		}
		
		public function ajaxRun(){
			set::controller(set::Post('PlugName'), 'access', 'run', null);
			set::controller(set::Post('PlugName'), set::Post('FileName'), set::Post('Method'), set::Post('DataResult'));
		}
		
		public static function plugin($pluginName, $mvc, $file){
			return $pluginPath = str_replace("Core","Plugin",__dir__).'\\'.$pluginName.'\\'.$mvc.'\\'.$file.'.php';
		}
		
		public static function controller($pluginName, $className, $methodName, $data){
			session_start();
			$json = str_replace('&quot;', '"', $data);
			$getData = json_decode($json, true);
			define("p",$pluginName);
			self::model('Trait', 'DBModel');
			require_once(self::plugin($pluginName, 'controller', $className));
			$class = new $className();
			return $class->$methodName($getData);
		}
		
		public static function model($pluginName, $className = 'model'){
			require_once(self::plugin($pluginName, 'model', $className));
		}
		
		public static function view($pluginName, $fileName, $data = false){
			if($data){
				foreach($data as $key=>$value)
				{
					${$key} = $value;
				}
			}
			include(self::plugin($pluginName, 'view', $fileName));
		}
		
		public static function Post($Value){
			$Method = $_POST[$Value];
			$Trim = trim($Method);
			$Chars = htmlspecialchars($Trim);
			return $Chars;
		}
		
		public static function config($data){
			$ini = parse_ini_file('../Config.ini');
			return $ini[$data];
		}
		
		public static function openMethod($data){
			if (in_array(set::Post('Method'), $data)) {
				return true;
			} else {
				set::controller('E404', 'adminIndex', 'run', null);
			}
		}
		
		public static function closeMethod($data){
			if (in_array(set::Post('Method'), $data)) {
				set::controller('E404', 'adminIndex', 'run', null);
			} else {
				return true;
			}
		}
	}
