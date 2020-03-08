<?php
	self::model(constant("p"));
	class index extends model{
		
		public function run(){
			$this->headerTemp();
			$this->homeTemp();
			$this->footerTemp();
		}
		
		public function abaut(){
			$this->headerTemp();
			$this->abautTemp();
			$this->footerTemp();
		}
		
		public function shop(){
			$this->headerTemp();
			$this->shopTemp();
			$this->footerTemp();
		}
		
		public function headerTemp(){
			set::view(constant("p"), 'header');
			set::view(constant("p"), 'header/logo-card-header');
			set::view(constant("p"), 'header/menu-header');
			set::view(constant("p"), 'header/add-to-card');
		}
		
		public function footerTemp(){
			//set::view(constant("p"), 'header/popup-footre');
			set::view(constant("p"), 'footer/subscribe-form-footer');
			set::view(constant("p"), 'footer/menu-footer');
			set::view(constant("p"), 'footer/copyright');
			set::view(constant("p"), 'footer');
		}
		
		public function homeTemp(){
			set::view(constant("p"), 'home/slider-home');
			set::view(constant("p"), 'home/img-section-three');
			set::view(constant("p"), 'home/shipping-home');
			set::view(constant("p"), 'home/new-sell-recommended-product');
			set::view(constant("p"), 'home/promotion-product');
			set::view(constant("p"), 'home/banner-content-home');
			set::view(constant("p"), 'home/most-popular-product');
			set::view(constant("p"), 'home/img-section-tow');
			set::view(constant("p"), 'home/select-sell-new-product');
			set::view(constant("p"), 'home/brand');
			set::view(constant("p"), 'home/img-section-four');
		}
		
		public function abautTemp(){
			set::view(constant("p"), 'abaut/information-abaut');
			set::view(constant("p"), 'abaut/project-count-abaut');
			set::view(constant("p"), 'abaut/team-abaut');
		}
		
		public function shopTemp(){
			set::view(constant("p"), 'shop/html-start-shop');
			set::view(constant("p"), 'shop/filter-shop');
			set::view(constant("p"), 'shop/interactive-product');
			set::view(constant("p"), 'shop/html-end-shop');
		}
	}		