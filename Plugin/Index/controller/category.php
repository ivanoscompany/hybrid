<?php
	self::model('Index');
	class category extends model{
		
		public function run($data){
			array_shift($data);
			if($data[2]){
				$link = $data[0].'/'.$data[1].'/'.$data[2];
			}elseif($data[1]){
				$link = $data[0].'/'.$data[1];
			}else{
				$link = $data[0];
			}
			$product = $this->select_product_category($link);
			set::controller('Index', 'index', 'setHeader');
			include set::path('Index', 'view', 'shop');
			set::controller('Index', 'index', 'setFooter');
		}
	}						