<?php
	class extendModel{
		
		//           !Array_shift problem
		//################################# class #####################################
		//
		//
		public function get_product_price_model($productID, $page = false){
			$product = array_shift($this->product_by_id($productID));
			$promoDateClear1 = str_replace(' ','',$product['product_promotion_end']);
			$promoDateClear2 = str_replace(':','',$promoDateClear1);
			$promoDateClear3 = str_replace('-','',$promoDateClear2);
			if(date("YmdHis") < $promoDateClear3) {
				if($page == "product"){
					return '
						<span class="old-price">'.$product['product_price'].' лв.</span>
						<span class="new-price">'.$product['product_price_new'].' лв.</span>
					';
				} else {
					return $product['product_price_new'];
				}
			} else {
				if($page == "product"){
					return '<span class="new-price">'.$product['product_price'].' лв.</span>';
				} else {
					return $product['product_price'];
				}
			}
		}
		
		public function check_category_name_exist($name, $table){
			$getMasive = array_shift($this->dbs($table, ['category_name'=>$name]));
			if($getMasive == null){
				return true;
			} else {
				return false;
			}
		}
	}		