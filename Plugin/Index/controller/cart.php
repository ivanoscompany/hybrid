<?php
	self::model('Index');
	class cart extends model{
		
		public function refreshCartInfo($data){
			$this->update_user_cart($data['id'], $data['count']);
		}
		
		public function removeItemCart($data){
			$this->removeProductCartModel($data['id']);
		}
		
	}			