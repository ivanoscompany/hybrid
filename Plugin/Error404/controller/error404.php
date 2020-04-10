<?php
	class error404{
		
		public function run(){
			set::controller('Index', 'index', 'setHeader');
			set::view(constant("p"), 'index');
			set::view('Index', 'footer');
		}
		
	}		