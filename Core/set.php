<?php 
	require_once('../Core/custom.php');
	class set extends custom{
		
		public static function Post($Value){
			$Method = $_POST[$Value];
			$Trim = trim($Method);
			$Chars = htmlspecialchars($Trim);
			return $Chars;
		}
		
		public static function bot($Type, $Folder, $PluginName, $FileName, $Data){
			if($Data){
				foreach($Data as $key=>$value)
				{
					${$key} = $value;
				}
			}
			$Path = '../Plugins/'.$PluginName.'/'.$Folder.'/'.$FileName.'.php';
			if($Type){
				require_once($Path);
				} else {
				include $Path;
			}
		}
		
		public static function Controller($PluginName, $ControllerName, $Method, $Data){
			session_start();
			$json = str_replace('&quot;', '"', $Data);
			$getData = json_decode($json, true);
			define("p",$PluginName);
			self::Model('Trait', 'DBModel');
			self::bot(true, 'Controller', $PluginName, $ControllerName, null);
			$New = new $ControllerName($PluginName);
			$New->$Method($getData);
		}
		
		public static function Model($PluginName, $ModelName){
			self::bot(true, 'Model', $PluginName, $ModelName, null);
		}
		
		public static function View($PluginName, $ViewName, $Data){
			if($PluginName === true){
				$getPluginName = constant("p");
			} else {
				$getPluginName = $PluginName;
			}
			self::bot(false, 'View', $getPluginName, $ViewName, $Data);
		}
		
		public static function Short($data, $massive){
			$prefixError = 'Function "Short" ERROR >';
			$dataExpolde = explode("-",$data);
			if(count($dataExpolde) == 2){
				if($dataExpolde[0] == 'm'){
					if($dataExpolde[1]){
						$nameModel = $dataExpolde[1];
					} else {
						$nameModel = 'Model';
					}
					self::Model(constant("p"), $nameModel);
				}elseif($dataExpolde[0] == 'v'){
					if($dataExpolde[1]){
						$nameView = $dataExpolde[1];
					} else {
						$nameView = 'index';
					}
					self::View(constant("p"), $nameView, $massive);
				}else{
					echo  $prefixError.' Not the right choice of type';
				}
			} else {
				echo  $prefixError.' Incorrect parameter form';
				exit;
			}
		}
		
		public static function config($data){
			$ini = parse_ini_file('../Config.ini');
			return $ini[$data];
		}
		
		public static function pageNotFound($name){
			return "<b>ERROR</b> > Plugin with name: <b> $name </b> doesn't not exist";
		}
	}
?>