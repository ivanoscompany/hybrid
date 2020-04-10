<?php
	self::model('Index');
	class index extends model{
		
		public function run(){
			$this->setHeader();
			set::view(constant("p"), 'index');
			$this->setFooter();
		}
		
		public function abaut(){
			$this->setHeader();
			set::view(constant("p"), 'abaut/index');
			$this->setFooter();
		}
		
		public function contact(){
			$this->setHeader();
			set::view(constant("p"), 'contact');
			$this->setFooter();
		}
		
		public function blog(){
			$this->setHeader();
			include set::path('Index', 'view', 'blog');
			$this->setFooter();
		}
		
		public function finishCart(){
			$this->setHeader();
			$product = $this->product_cart_innert_product();
			include set::path('Index', 'view', 'cart');
			$this->setFooter();
		}
		
		public function gdprPage(){
			$this->setHeader();
			set::view(constant("p"), 'gdpr');
			$this->setFooter();
		}
		
		public function wishlistPage(){
			$this->setHeader();
			set::view(constant("p"), 'wishlist', ['product'=>$this->user_wishlist_model()]);
			$this->setFooter();
		}
		
		public function comparePage(){
			$this->setHeader();
			$product = $this->user_compare_model();
			include set::path('Index', 'view', 'compare');
			$this->setFooter();
		}
		
		public function supplies($data){
			array_shift($data);
			$this->setHeader();
			$product = $this->product_items_model_innert($data[0], 3);
			include set::path('Index', 'view', 'supplies');
			$this->setFooter();
		}
		
		public function shop($data){
			$getReqestUrl = $_SERVER['REQUEST_URI'];
			$getMostUpPrice = array_shift($this->shop_most_price())['product_price'];
			$getDataPage = $data[0];
			//Product
			$getSimpleLink = array_shift($data);
			$getDataSort = $data[0];
			$getDataSortExplode = explode("-",$getDataSort);
			$getDataSortPage = $getDataSortExplode[0];
			$getDataSortMaxPage = $getDataSortExplode[1];
			$getDataSortType = $getDataSortExplode[2];
			$getMaxPage = $this->shopCheckUrlOne($getDataSortPage, $getDataSortMaxPage, $getDataSortType);
			$getSortPage = $this->shopCheckUrlTow($getDataSortType);
			//1-30-sort
			$getPageSortLink = array_shift($data);
			//Category
			$getCategory = array_shift($data);
			if(!$getCategory){ 
				header('Location:'.set::url($getSimpleLink.'/'.$getPageSortLink.'/none')); 
			}
			//Filter
			foreach ($data as $value) {
				$getFilterLinkSave .= '/'.$value;
			}
			foreach ($data as $value) {
				$valueExplode = explode(":", $value);
				if($valueExplode[0] == 'priceSize'){
					$getPrizeRange = explode("-", $valueExplode[1]);
					$getSqlPriceFilter .= ' product_price > '.htmlspecialchars($getPrizeRange[0]).' AND product_price <= '.htmlspecialchars($getPrizeRange[1]);
					} elseif($valueExplode[0] == 'brand') {
					$getSqlBrandFilter .= "product_brand = '".$valueExplode[1]."' OR ";
					} elseif($valueExplode[0] == 'search') {
					$getSqlSearch .= "product_title LIKE '%".urldecode($valueExplode[1])."%'";
					} else {
					$getSqlFilter .= "inter_active_product_category_filter LIKE '%".$value."%' AND ";
				}
			}
			$sqlUrlShopRtrimAnd2 = rtrim($getSqlBrandFilter, "OR ");
			$sqlUrlShopRtrimAnd3 = rtrim($getSqlFilter, "AND ");
			if($sqlUrlShopRtrimAnd2){
				$getSqlPriceFilter .= ' AND ('.$sqlUrlShopRtrimAnd2.')';
			}
			if($sqlUrlShopRtrimAnd3){
				$getSqlPriceFilter .= ' AND ('.$sqlUrlShopRtrimAnd3.')';
			}
			if($getSqlSearch){
				$getSqlPriceFilter = $getSqlSearch;
			}
			if($getCategory != 'none'){
				$whereCategory = "inter_active_product_category_link LIKE '%".$getCategory."%' ".$WhereAnd;
			}
			$offset = ($getDataSortPage-1) * $getMaxPage; 
			$getStructorUrl = $this->dbsProduct($whereCategory, $getSqlPriceFilter, $getSortPage, $offset.','.$getMaxPage);
			$getCountCode = $this->dbsProduct($whereCategory, $getSqlPriceFilter, $getSortPage);
			if($this->db($getCountCode, true) == null){
				$total_rows = 0;
				} else {
				$total_rows = count($this->db($getCountCode, true));
			}
			$total_pages = ceil($total_rows / $getMaxPage);
			
			$this->setHeader();
			$product = $this->db($getStructorUrl, true);
			array_shift($data);
			include set::path('Index', 'view', 'shop');
			set::view(constant("p"), 'footer');
		}
		
		public function promotion($data){
			$this->setHeader();
			$product = $this->product_promotion_only();
			include set::path('Index', 'view', 'shopPromo');
			$this->setFooter();
		}
		
		public function dbsProduct($whereCategory, $structorUrl, $getSortPage, $limit = false){
			if($limit){
				$page = $limit;
				} else {
				$page = '';
			}
			$getStructorUrl = $this->dbsCode(['inter_active_product-RIGHT-product'], $whereCategory.$structorUrl, $getSortPage, $page);
			return $getStructorUrl;
		}
		
		public function shopCheckUrlOne($getDataSortPage, $getDataSortMaxPage, $getDataSortType){
			if(!$getDataSortPage){
				header('Location:'.set::url('product/1'));
			}
			if(!$getDataSortMaxPage){
				header('Location:'.set::url('product/1-30'));
			}
			if(!$getDataSortType){
				header('Location:'.set::url('product/1-30-trade'));
			}
			if($getDataSortMaxPage == 50){
				return $no_of_records_per_page = 50;
				} elseif($getDataSortMaxPage == 100){
				return $no_of_records_per_page = 100;
				} else {
				return $no_of_records_per_page = 30;
			}
		}
		
		public function shopCheckUrlTow($getDataSortType){
			if($getDataSortType == 'trade'){
				return $sortType = ['product_count_sell'=>false];
				}elseif($getDataSortType == 'new'){
				return $sortType = ['product_date'=>false];
				} elseif($getDataSortType == 'priceup'){
				return $sortType = ['product_price'=>false];
				}elseif($getDataSortType == 'pricedown'){
				return $sortType = ['product_price'=>true];
				}elseif($getDataSortType == 'clinet'){
				return $sortType = ['product_count_client_up'=>false];
				}elseif($getDataSortType == 'promo'){
				return $sortType = ['product_price_new'=>false];
			}
		}
		
		public function setHeader(){
			$title = 'Начало';
			$OgImgUrl = 'image/menu/logo/1.jpg';
			$countOfAllProduct = count($this->product());
			$cartProduct = $this->product_cart_innert_product();
			include set::path('Index', 'view', 'header');
			include set::path('Index', 'view', 'header/header-menu');	
		}
		
		public function setFooter(){
			set::view(constant("p"), 'footer');	
		}
	}									