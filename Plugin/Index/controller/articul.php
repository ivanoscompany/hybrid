<?php
	self::model('Index');
	class articul extends model{
		
		public function run($data){
			array_shift($data);
			array_shift($data);
			foreach ($data as $value) {
				$intendCodeArticul .= $value.'/';
			}
			$intendCodeArticulClear = rtrim($intendCodeArticul,"/");
			$getArticulInfo = array_shift($this->get_articul_by_code($intendCodeArticulClear));
			$getAllImg = $this->product_img_model($getArticulInfo['product_id']);
			$getInteractiveProduct = array_shift($this->inter_active_product_by_product_id($getArticulInfo['product_id']));
			$getProducCarExsist = $this->product_cart_exist($getArticulInfo['product_id']);
			$getAllComent = $this->product_rating($getArticulInfo['product_id']);
			$getRatingLarg = array_shift($this->product_rating_larg($getArticulInfo['product_id']));
			$getRatingLow = array_shift($this->product_rating_low($getArticulInfo['product_id']));
			$getGifsWhile = $this->product_items_model_innert($getArticulInfo['product_id'], 1);
			$getAccsessoariWhile = $this->product_items_model_innert($getArticulInfo['product_id'], 2);
			$getProductRaitingValue = floor(($getRatingLarg['product_rating'] + $getRatingLow['product_rating']) / 2);
			$getProductVariation = $this->product_variation_model_by_id($getArticulInfo['product_id']);
			$getVategoryPathPorduct = explode('>>',$getInteractiveProduct['inter_active_product_category_name']);
			$Brand = array_shift($this->select_brand_model($getArticulInfo['product_brand']));
			$replaceEndPromo = str_replace('-','/',$getArticulInfo['product_promotion_end']);
			$promoDateClear1 = str_replace(' ','',$getArticulInfo['product_promotion_end']);
			$promoDateClear2 = str_replace(':','',$promoDateClear1);
			$promoDateClear3 = str_replace('-','',$promoDateClear2);
			set::controller('Index', 'index', 'setHeader');
			include set::path('Index', 'view', 'articul');
			set::controller('Index', 'index', 'setFooter');
		}
		
		public function needOffer($data){
			$getMuch = $this->cleint_offer_select_model_mach_product_session(session_id(), $data['id']);
			if($getMuch[0] == null){
				$phoneValidator = preg_match('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', $data['phone']);
				$emailValidator = preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data['email']);
				if(!$phoneValidator){
					echo 'Невалиден телефонен номер';
					} elseif(!$emailValidator){
					echo 'Невалидна електрона поща';
					} elseif(!$data['coment']){
					echo 'Не сте въвели коментра';
					} else {
					$this->cleint_offer_insert_model($data['phone'], $data['email'], $data['coment'], $data['id']);
					echo 'Успешно запитване';
				}
				}else {
				echo 'Вече сте направили запитване за този артикул';
			}
		}
		
		public function addPordeuctToCart($data){
			$getProducCarExsist = $this->product_cart_exist($data['id']);
			var_dump($getProducCarExsist);
			if($getProducCarExsist[0] != null){
				echo "<script>location.reload()</script>";
				} else {
				$variationInfo = $data['info'];
				$variationInfoReplaced = str_replace('undefined/','',$variationInfo);
				$this->add_product_to_cart($data['id'], $data['count'], $variationInfoReplaced);
			}
		}
		
		public function userPostComent($data){
			$comentNotGood = $this->product_rating_exist($data['id']);
			if($comentNotGood[0] == null){
				$emailValidator = preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data['email']);
				if($data['rating'] > 5 || $data['rating'] < 1){
					echo 'Невалидна стоиност за рейтинг';
					}elseif(preg_match ('/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u', $data['name'])){
					if(mb_strlen($data['name'] , 'UTF-8')<6){
						echo 'Името е прекалено късо';
						}else{
						echo 'Не валидно име';
					}
					}elseif(!$emailValidator){
					echo 'Невалидна електрона поща';
					}else {
					$this->add_product_coment($data['id'], $data['rating'], $data['name'], $data['email'], htmlspecialchars($data['coment']));
					echo 'Успешно пратихте отзив.';
				}
				}else {
				echo 'Вече сте написал отзив за този артикул който чака удобрение';
			}
		}
		
		public function addNewWihlistContoller($data){
			$check = $this->addNewWishlistModelCheck($data['id']);
			if($check[0] == null){
				$this->addNewWishlistModel($data['id']);
			}
		}
		
		public function addNewCompareContoller($data){
			echo count($this->user_compare_model());
			if(count($this->user_compare_model()) <= 2){
				$this->addNewCompareModel($data['id']);
			}else{
				echo '<script>alert(Имате прекалено много артикули за сравняване)</script>';
			}
			
		}
		
		public function removeWihlistContoller($data){
			echo $this->removeWihlistModel($data['id']);
		}
		
		public function removeCompareContoller($data){
			$this->removeComperModel($data['id']);
		}
	}	