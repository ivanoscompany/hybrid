<?php
	self::model('Index');
	class product extends model{
		
		public function run($data){
			$no_of_records_per_page = 250;
			$offset = ($data['page']-1) * $no_of_records_per_page; 
			$total_rows = count($this->product());
			$total_pages = ceil($total_rows / $no_of_records_per_page);
			set::view('Admin', 'pegination', [
			'totalPages'=>$total_pages,
			'dataPage'=>$data['page']
			]);
			set::view('Admin', 'product', [
			'product'=>$this->product($offset.','.$no_of_records_per_page)
			]);
		}
		
		public function addNewProduct(){
			$this->addNewProductModel();
			$this->run(array('page'=>1));
		}
		
		public function productInfo($data){
			$singleProduct=array_shift($this->product_by_id($data['id']));
			$brand=$this->brand_model();
			$categoryProduct=$this->category_by_product($data['id']);
			$ProductVaritaion=$this->product_variation_model_by_id($data['id']);
			$categoryProductSingle=array_shift($this->category_by_product($data['id']));
			$getEplodeFilterMassive = explode(' || ', $categoryProductSingle['inter_active_product_category_filter']);
			include set::path('Admin', 'view', 'product/product-edit');
		}
		
		public function productInfoTow($data){
			$singleProduct=array_shift($this->product_by_id($data['id']));
			$accessories = $this->product_accessories_do_add();
			$gifts = $this->product_gift_do_add();
			$consumativ = $this->product_consumativ_do_add();
			$itemsAddedGifs = $this->product_items_model_innert($data['id'], 1);
			$itemsAddedAccssesoar = $this->product_items_model_innert($data['id'], 2);
			$itemsAddedConsumativ = $this->product_items_model_innert($data['id'], 3);
			include set::path('Admin', 'view', 'product/product-edit-tow');
		}
		
		public function addItemToPorduct($data){
			$this->product_items_insert_model($data['item'], $data['id']);
			$this->productInfoTow(array('id'=>$data['id']));
		}
		
		public function removeItemProduct($data){
			$this->product_item_remove($data['item']);
			$this->productInfoTow(array('id'=>$data['id']));
		}
		
		public function setDateItemGift($data){
			$this->add_date_on_item_gift($data['item'], $data['value']);
			$this->productInfoTow(array('id'=>$data['id']));
		}
		
		public function productImg($data){
			set::view('Admin', 'product/product-images', [
			'allIMG'=>$this->product_img_model($data['id']),
			'product'=>array_shift($this->product_by_id($data['id']))
			]);
		}
		
		public function productUploadImg($data){
			$this->add_new_image($data['id'], $data['name']);
			$this->productImg(array('id'=>$data['id']));
		}
		
		public function setPoster($data){
			echo $this->set_img_product_poster($data['id'], $data['name'], $data['tableID']);
			$this->run(array('page'=>1));
		}
		
		public function productImgDlete($data){
			$getNameTumb = str_replace("http://set.host/image/stored/","image/stored/",$data['name']);
			$getName = str_replace("http://set.host/image/stored/","image/stored/thumbnail/",$data['name']);
			unlink($getNameTumb);
			unlink($getName);
			$this->product_img_delete_model($data['rowID']);
			$this->productImg(array('id'=>$data['id']));
		}
		
		public function saveChanges($data){
			$this->save_changes_model($data);
			set::view('Admin', 'sweetAlert/success-add-new-category');
		}
		
		public function deleteArticul($data){
			$this->delete_articul($data['id']);
			$this->run(array('page'=>1));
		}
		
		public function viewCategoryGroup($data){
			set::view('Admin', 'product/view-category-group-select', [
			'category'=>$this->category_group($data['id']),
			]);
		}
		
		public function viewCategorySub($data){
			set::view('Admin', 'product/view-category-sub-select', [
			'category'=>$this->category_group_content($data['id']),
			]);
		}
		
		public function viewCategory(){
			set::view('Admin', 'product/view-category-select', [
				'category'=>$this->category(),
			]);
		}
		
		public function viewVariation(){
			set::view('Admin', 'product/view-variation-select', [
				'filterName'=>$this->filter_name_model(),
			]);
		}
		
		public function removeVariation($data){
			$this->product_varioation_remove($data['id']);
			$this->productInfo(array('id'=>$data['product']));
			
		}
		
		public function viewDocument($data){
			set::view('Admin', 'product/view-document-add');
		}
		
		public function test($data){
			echo $data['desc'];
		}
		
		public function removeProcutCategory($data){
			$this->remove_category_product($data['id']);
			$this->productInfo(array('id'=>$data['product']));
		}
		
		public function filterPage(){
			include set::path('Admin', 'view', 'product/filter-page-index');
		}
		
		public function filterNameOption($data){
			if($data['type'] == 'CREATE'){
				$this->add_new_filter_name($data['name']);
			}elseif($data['type'] == 'PUT'){
				$this->update_filter_name($data['id'], $data['name']);
			}elseif($data['type'] == 'DELETE'){
				$this->delete_filter_name($data['id']);
			}elseif($data['type'] == 'POST'){
				$this->add_new_filter_slot($data['id']);
			}elseif($data['type'] == 'DELETEPOST'){
				$this->delete_filter_slot($data['id']);
			}elseif($data['type'] == 'REMOVEPOST'){
				$this->option_filter_slot($data['id'], null);
			}
			$this->filterPage();
		}
		
		public function filteValuePage($data){
			$getFilteName = array_shift($this->filter_name_model_by_id($data['filterID']));
			include set::path('Admin', 'view', 'product/filter-page-value');
		}
		
		public function filterValueOption($data){
			$getFilteName = array_shift($this->filter_name_model_by_id($data['blokID']));
			$getFilteValue = array_shift($this->filter_value_model($data['id']));
			$getFilteLink = set::letTrans($getFilteName['filter_name_title'].' '.$getFilteValue['filter_value_name']);
			if($data['type'] == 'DELETE'){
				$this->delete_filter_value($data['id']);
			}elseif($data['type'] == 'PUT'){
				$this->option_filter_slot($data['slot'], $data['id'], $getFilteLink);
			}
			$this->filterPage();
		}
		
		public function addNewFilteValue($data){
			$this->add_new_filter_value($data['name']);
		}
		
	}								