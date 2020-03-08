<?php
	class access{	
		public function run(){
			if($_SESSION['ADMIN']){
				
			} else{
				set::openMethod(['run','login']);
			}
		}
	}
?>