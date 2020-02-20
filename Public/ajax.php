<?php 
	if($_POST){
		require_once('../Core/set.php');
		$directory_path = '../Plugins';
		$sub_directories = array_map('basename', glob($directory_path . '/'.set::Post('PlugName'), GLOB_ONLYDIR));
		set::Controller(set::Post('PlugName'), 'access', 'run', "");
		if($sub_directories){
			if( 
				empty(set::Post('PlugName')) || 
				empty(set::Post('FileName')) || 
				empty(set::Post('Method')) || 
				empty(set::Post('DataResult'))
			){
				header('Location: index.php');
			} else {
				set::Controller(
					set::Post('PlugName'), 
					set::Post('FileName'), 
					set::Post('Method'), 
					set::Post('DataResult')
				);
			}
		} else {
			echo set::pageNotFound(set::Post('PlugName'));
			exit;
		}
	} else {
		require('../UploadHandler.php');
		$upload_handler = new UploadHandler();
	}
?>