<?php
	class model{
		
		use DBModel;
		
		public function test(){
			return $this->dbsCode('mytable', ['value1'=>'test'], ['value1'=>false], '1,3');
		}
		
	}	