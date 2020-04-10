<?php
	self::model('Index', 'extendModel');
	class model extends extendModel{
		
		use DBModel;
		##########################################################################################
		//DBS
		##########################################################################################
		//category
		public function category(){
			return $this->dbs('category');
		}
		
		public function category_by_id($id){
			return $this->dbs('category', ['category_id'=>$id]);
		}
		
		public function category_by_link($link){
			return $this->dbs('category', ['category_link'=>$link]);
		}
		
		//category_group
		public function categoryGroup(){
			return $this->dbs('category_group');
		}
		
		public function category_group($id){
			return $this->dbs('category_group', ['category_id'=>$id]);
		}
		
		public function category_group_by_id($id){
			return $this->dbs('category_group', ['category_group_id'=>$id]);
		}
		
		public function category_group_by_link($link){
			return $this->dbs('category_group', ['category_link'=>$link]);
		}
		
		//category_group_content
		public function categorySub(){
			return $this->dbs('category_group_content');
		}
		
		public function category_sub_by_link($link){
			return $this->dbs('category_group_content', ['category_link'=>$link]);
		}
		
		public function category_group_content($id){
			return $this->dbs('category_group_content', ['category_group_id'=>$id]);
		}
		
		public function category_group_content_by_id($id){
			return $this->dbs('category_group_content', ['category_group_content_id'=>$id]);
		}
		
		//product
		public function product($limit = ''){
			return $this->dbs('product', '', ['product_id'=>false], $limit);
		}
		
		public function product_by_id($id){
			return $this->dbs('product', ['product_id'=>$id]);
		}
		
		public function select_product_category($link){
			return $this->dbs(['inter_active_product-INNER-product'], ['inter_active_product_category_link'=>$link]);
		}
		
		public function get_articul_by_name($name){
			return $this->dbs('product', ['product_link_name'=>$name]);
		}
		
		public function get_articul_by_code($code){
			return $this->dbs('product', ['product_code'=>$code]);
		}
		
		public function shop_page_massive(){
			return $this->dbs('product');
		}
		
		public function shop_most_price(){
			return $this->dbs('product', '', ['product_price'=>false], '1');
		}
		
		public function product_consumativ_do_add(){
			return $this->dbs('product', ['product_status'=>3]);
		}
		
		public function product_accessories_do_add(){
			return $this->dbs('product', ['product_status'=>2]);
		}
		
		public function product_gift_do_add(){
			return $this->dbs('product', ['product_status'=>1]);
		}
		
		public function product_promotion_only(){
			return $this->dbs('product', 'product_promotion_end_numeric NOT BETWEEN product_promotion_end_numeric AND '.date("Ymd"), ['product_price_new'=>true]);
		}
		
		//brand
		public function brand_model(){
			return $this->dbs('brand');
		}
		
		public function select_brand_model($name){
			return $this->dbs('brand', ['brand_name'=>$name]);
		}
		
		public function product_img_model($id){
			return $this->dbs('upload_img', ['upload_product_id'=>$id], ['upload_img_active'=>false]);
		}
		
		public function category_by_product($id){
			return $this->dbs('inter_active_product', ['product_id'=>$id]);
		}
		
		//category_filte
		public function category_filte_model($id){
			return $this->dbs(['category_filte-INNER-filter_name'], ['category_id'=>$id]);
		}
		
		public function category_filte_on_page_model($id){
			return $this->dbs(['filter_value_slot-INNER-filter_value'], ['filter_name_id'=>$id]);
		}
		
		//filter_name
		public function filter_name_model(){
			return $this->dbs('filter_name');
		}
		
		public function filter_name_model_by_id($id){
			return $this->dbs('filter_name', ['filter_name_id'=>$id]);
		}
		
		//filter_value_slot
		public function filter_value_slot_model($id){
			return $this->dbs('filter_value_slot', ['filter_name_id'=>$id]);
		}
		
		public function filter_value_slot_innert($id){
			return $this->dbs(['filter_value_slot-INNER-filter_value'], ['filter_name_id'=>$id]);
		}
		
		//filter_value
		public function filter_value_model($id){
			return $this->dbs('filter_value', ['filter_value_id'=>$id]);
		}
		
		public function filter_value_only_model(){
			return $this->dbs('filter_value');
		}
		
		//inter_active_product
		public function inter_active_product_by_product_id($id){
			return $this->dbs('inter_active_product', ['product_id'=>$id]);
		}
		
		//cleint_offer
		public function cleint_offer_select_model_mach_product_session($session, $id){
			return $this->dbs('cleint_offer', ['cleint_offer_id'=>$session, 'product_id'=>$id]);
		}
		
		//product_variation
		public function product_variation_model_by_id($id){
			return $this->dbs(['product_variation-INNER-filter_name'], ['product_id'=>$id]);
		}
		
		//product_cart
		public function product_cart_innert_product(){
			return $this->dbs(['product_cart-INNER-product'], ['product_cart_session'=>session_id()]);
		}
		
		public function product_cart_exist($id){
			return $this->dbs('product_cart', ['product_cart_session'=>session_id(), 'product_id'=>$id]);
		}
		
		//product_rating
		public function product_rating($id){
			return $this->dbs('product_rating', ['product_id'=>$id, 'product_rating_active'=>1]);
		}
		
		public function product_rating_exist($id){
			return $this->dbs('product_rating', ['product_rating_session'=>session_id(), 'product_id'=>$id, 'product_rating_active'=>0]);
		}
		
		public function product_rating_larg($id){
			return $this->dbs('product_rating', ['product_id'=>$id, 'product_rating_active'=>1], ['product_rating'=>false], '1');
		}
		
		public function product_rating_low($id){
			return $this->dbs('product_rating', ['product_id'=>$id, 'product_rating_active'=>1], ['product_rating'=>true], '1');
		}
		
		//product_items
		public function product_items_model_innert($id, $status){
			return $this->dbs(['product_items-INNER-product'], ['product'=>$id, 'product_status'=>$status]);
		}
		
		//user_wishlist
		public function user_wishlist_model(){
			return $this->dbs(['user_wishlist-INNER-product'], ['user_wishlist_session'=>session_id()]);
		}
		
		public function addNewWishlistModelCheck($id){
			return $this->dbs('user_wishlist', ['product_id'=>$id, 'user_wishlist_session'=>session_id()]);
		}
		
		//user_compare
		public function user_compare_model(){
			return $this->dbs(['user_compare-INNER-product'], ['user_compare_session'=>session_id()]);
		}
		
		//blog
		public function blog_model(){
			return $this->dbs('blog');
		}
		
		//blog_category
		public function blog_category_model(){
			return $this->dbs('blog_category');
		}
		
		//blog_tag
		public function blog_tag_model(){
			return $this->dbs('blog_tag');
		}
		
		##########################################################################################
		//DBD
		##########################################################################################
		public function delete_articul($id){
			return $this->dbd('product', ['product_id'=>$id]);
		}
		
		public function remove_category_product($id){
			return $this->dbd('inter_active_product', ['inter_active_product_id'=>$id]);
		}
		
		public function delete_category($id){
			return $this->dbd('category', [ 'category_id'=>$id ]);
		}
		
		public function delete_category_group($id){
			return $this->dbd('category_group', [ 'category_group_id'=>$id ]);
		}
		
		public function delete_category_sup($id){
			return $this->dbd('category_group_content', [ 'category_group_content_id'=>$id ]);
		}
		
		public function product_img_delete_model($id){
			return $this->dbd('upload_img', ['upload_img_id'=>$id]);
		}
		
		public function delete_brand_model($id){
			return $this->dbd('brand', ['brand_id'=>$id]);
		}
		
		public function delete_filter_name($id){
			return $this->dbd('filter_name', ['filter_name_id'=>$id]);
		}
		
		public function delete_filter_slot($id){
			return $this->dbd('filter_value_slot', ['filter_value_slot_id'=>$id]);
		}
		
		public function delete_filter_value($id){
			return $this->dbd('filter_value', ['filter_value_id'=>$id]);
		}
		
		public function category_filte_remove($id){
			return $this->dbd('category_filte', ['category_filte_id'=>$id]);
		}
		
		public function product_varioation_remove($id){
			return $this->dbd('product_variation', ['product_variation_id'=>$id]);
		}
		
		public function product_item_remove($id){
			return $this->dbd('product_items', ['product_items_id'=>$id]);
		}
		
		public function removeWihlistModel($id){
			return $this->dbd('user_wishlist', ['product_id'=>$id, 'user_wishlist_session'=>session_id()]);
		}
		
		public function removeComperModel($id){
			return $this->dbd('user_compare', ['user_compare_id'=>$id]);
		}
		
		public function removeProductCartModel($id){
			return $this->dbd('product_cart', ['product_cart_id'=>$id]);
		}
		
		##########################################################################################
		//DBU
		##########################################################################################
		public function update_category($name, $id){
			return $this->dbu('category', ['category_name'=>$name, 'category_link'=>set::letTrans($name)], [ 'category_id'=>$id ]);
		}
		
		public function update_category_with_fitler($id){
			return $this->dbu('category', ['category_filter'=>1], [ 'category_id'=>$id ]);
		}
		
		public function update_category_group($name, $id){
			return $this->dbu('category_group', ['category_group_name'=>$name, 'category_link'=>set::letTrans($name.' group')], [ 'category_group_id'=>$id ]);
		}
		
		public function update_category_sup($name, $id){
			return $this->dbu('category_group_content', ['category_group_name'=>$name, 'category_link'=>set::letTrans($name.' sub')], [ 'category_group_content_id'=>$id ]);
		}
		
		public function switchSubCategoryModel($id){
			return $this->dbu('category', ['category_group'=>1], [ 'category_id'=>$id ]);
		}
		
		public function update_brand_model($name, $id){
			return $this->dbu('brand', ['brand_name'=>$name], ['brand_id'=>$id]);
		}
		
		public function update_filter_name($id, $name){
			return $this->dbu('filter_name', ['filter_name_title'=>$name], ['filter_name_id'=>$id]);
		}
		
		public function option_filter_slot($id, $value, $link = ''){
			return $this->dbu('filter_value_slot', ['filter_value_id'=>$value, 'filter_value_slot_link'=>$link], ['filter_value_slot_id'=>$id]);
		}
		
		public function add_date_on_item_gift($id, $data){
			return $this->dbu('product_items', ['product_items_date'=>$data], ['product_items_id'=>$id]);
		}
		
		public function update_user_cart($id, $value){
			return $this->dbu('product_cart', ['product_cart_count'=>$value], ['product_cart_id'=>$id]);
		}
		
		public function set_img_product_poster($id, $img, $tableID){
			$this->dbu('upload_img', ['upload_img_active'=>0], ['upload_product_id'=>$id]);
			$this->dbu('upload_img', ['upload_img_active'=>1], ['upload_img_id'=>$tableID]);
			$this->dbu('product', ['product_image'=>$img], ['product_id'=>$id]);
		}
		
		##########################################################################################
		//DBI
		##########################################################################################
		public function addNewProductModel(){
			return $this->dbi('product', ['product_image', 'product_date'], [ 'http://set.host/image/no-image-png-2.png', date("Y-m-d") ]);
		}
		
		public function addNewCategoryFilter($filter, $id){
			return $this->dbi('category_filte', ['filter_name_id', 'category_id'], [ $filter, $id ]);
		}
		
		public function add_new_filter_value($filter){
			return $this->dbi('filter_value', ['filter_value_name'], [ $filter ]);
		}
		
		public function add_new_image($productID, $ImgName){
			$getName = str_replace("thumbnail/","",$ImgName);
			return $this->dbi('upload_img', 
			[
			'upload_img_id', 
			'upload_product_id', 
			'upload_img_name',
			'upload_img_name_small'
			], [
			$this->setDna(),
			$productID,
			$getName,
			$ImgName
			]);
		}
		
		public function add_new_category($name){
			$getMasive = $this->check_category_name_exist($name, 'category');
			if($getMasive){
				return $this->dbi('category', ['category_name', 'category_link'], [$name, set::letTrans($name)]);
			} else {
				return false;
			}
		}
		
		public function add_new_category_group($name, $id){
			return $this->dbi('category_group', ['category_id', 'category_group_name', 'category_link'], [$id, $name, set::letTrans($name.' group')]);
		}
		
		public function add_new_category_sup($name, $id){
			return $this->dbi('category_group_content', ['category_group_id', 'category_group_name', 'category_link'], [$id, $name, set::letTrans($name.' sub')]);
		}
		
		public function add_brand_model($img){
			return $this->dbi('brand', ['brand_img'], [$img]);
		}
		
		public function add_new_filter_name($name){
			return $this->dbi('filter_name', ['filter_name_title'], [$name]);
		}
		
		public function add_new_filter_slot($id){
			return $this->dbi('filter_value_slot', ['filter_name_id'], [$id]);
		}
		
		public function cleint_offer_insert_model($phone, $mail, $coment, $id){
			return $this->dbi('cleint_offer', ['cleint_offer_id', 'cleint_offer_phone', 'cleint_offer_mail', 'cleint_offer_coment', 'product_id'], [session_id(),$phone, $mail, $coment, $id]);
		}
		
		public function add_product_to_cart($id, $count, $info){
			return $this->dbi('product_cart', ['product_id', 'product_cart_session', 'product_cart_count', 'product_cart_info'], [$id, session_id(), $count, $info]);
		}
		
		public function product_items_insert_model($item, $id){
			return $this->dbi('product_items', ['product_id', 'product', 'product_items_date'], [$item, $id, date("Y-m-d")]);
		}
		
		public function addNewWishlistModel($id){
			return $this->dbi('user_wishlist', ['product_id', 'user_wishlist_session'], [ $id, session_id() ]);
		}
		
		public function addNewCompareModel($id){
			return $this->dbi('user_compare', ['product_id', 'user_compare_session'], [ $id, session_id() ]);
		}
		
		public function add_product_coment($id, $rating, $name, $mail, $coment){
			return $this->dbi('product_rating', 
			[
			'product_rating_session', 
			'product_id', 
			'product_rating', 
			'product_rating_date', 
			'product_rating_name', 
			'product_rating_mail', 
			'product_rating_coment',
			'product_rating_active',
			], 
			[
			session_id(), 
			$id, 
			$rating, 
			date("Y-m-d"), 
			$name,
			$mail,
			$coment,
			0
			]);
		}
		
		public function save_changes_model($data){
			$promoDateExplode = explode(' ',$data['promoend']);
			$promoDateExplodeOne = $promoDateExplode[0];
			$getValueOnlyDate = str_replace("-","",$promoDateExplodeOne);
			if($data['variation']){
				$this->dbi('product_variation', ['product_id', 'filter_name_id'], [$data['id'], $data['variation']]);
			}
			if($data['category']){
				$getCategory = array_shift($this->category_by_id($data['category']));
				$getCategoryGroup = array_shift($this->category_group_by_id($data['categoryGroup']));
				$getCategorySub = array_shift($this->category_group_content_by_id($data['categorySub']));
				if($data['categorySub'] == null){
					$categoryId = $data['category'];
					} else {
					$categoryId = $data['categorySub'];
				}
				if($data['categorySub']){
					$structorName = $getCategory['category_name'].' >> '.$getCategoryGroup['category_group_name']. ' >> '.$getCategorySub['category_group_name'];
					$structorLink = $getCategory['category_link'].'/'.$getCategoryGroup['category_link']. '/'.$getCategorySub['category_link'];
					} elseif($data['categoryGroup']){
					$structorName = $getCategory['category_name'].' >> '.$getCategoryGroup['category_group_name'];
					$structorLink = $getCategory['category_link'].'/'.$getCategoryGroup['category_link'].'/none';
					} else {
					$structorName = $getCategory['category_name'];
					$structorLink = $getCategory['category_link'].'/none/none';
				}
				$this->dbi('inter_active_product', 
				['inter_active_product_category_link', 'inter_active_product_category_name', 'product_id', 'category_id'],
				[$structorLink, $structorName, $data['id'], $categoryId]
				);	
			}
			$this->dbu('product', 
			[
			'product_code'=>$data['code'], 
			'product_brand'=>$data['brand'],
			'product_title'=>htmlspecialchars($data['name']), 
			'product_link_name'=>set::letTrans($data['name']),
			'product_price'=>$data['price'],
			'product_price_new'=>$data['pprice'],
			'product_count'=>$data['coute'],
			'product_origin'=>$data['origin'],
			'product_guarantee'=>$data['guarantee'],
			'product_video'=>$data['videoUrl'],
			'product_fast_desc'=>$data['fastdesc'],
			'product_gift'=>$data['gift'],
			'product_new'=>$data['CheckNewEditProduct'],
			'product_promotion_end'=>$data['promoend'].' '.date("H:i:s"),
			'product_promotion_end_numeric'=> $getValueOnlyDate,
			'product_free_ship'=>$data['freeShip'],
			'product_installation'=>$data['install'],
			'product_status'=>$data['status']
			], ['product_id'=>$data['id']]);
			$this->dbu('inter_active_product', 
			['inter_active_product_category_filter'=>$data['filterStructor']],
			['product_id'=>$data['id']]
			);
		}
		
		public function getallRplecmetn(){
			return $this->dbs('product_test');
		}
		
		public function RplecmetnOnMOMENT(){
			foreach ($this->getallRplecmetn() as $value) {
				$getExplode = explode('|||', $value['Снимки']);
					echo '<b>'.$getExplode[0].'</b>';
					echo '<hr>';
					$this->dbi('product', 
					[	
						'product_code', 
						'product_brand', 
						'product_title', 
						'product_price', 
						'product_count', 
						'product_origin', 
						'product_guarantee', 
						'product_image'
						], 
					[ 
						$value['Код на продукта'], 
						$value['Марка'], 
						$value['Заглавие на обявата'], 
						$value['Клиентска цена в Лева с ДДС'], 
						$value['Наличност'], 
						$value['Произход'], 
						$value['Гаранция'], 
						'image/stored/'.$getExplode[0] 
					]);
					foreach ($getExplode as $value2) {
						$this->dbi('upload_img', ['upload_product_id', 'upload_img_name'], [ $value['id'],  'image/stored/'.$value2 ]);
					}
					echo '<hr>';
				//$this->dbi('product', ['product_id', 'user_compare_session'], [ $id, session_id() ]);
			}
		}
		
	}		