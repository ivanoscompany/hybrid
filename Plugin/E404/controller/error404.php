<?php
	class error404{
		
		public function run(){
			set::view('E404', 'index');
			exit;
		}
		
	}		