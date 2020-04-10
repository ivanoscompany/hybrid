<?php
	self::model('Index');
	class index extends model{
		
		public function run($error = null){
			set::view(constant("p"), 'header');
			if($_SESSION['ADMIN']){
				set::view(constant("p"), 'index');
			} else {
				set::view(constant("p"), 'Login', ['errorLog'=>$error]);
			}
			set::view(constant("p"), 'footer');
		}
		
		public function login($data){
			if($data['user'] == "" || $data['pass'] == ""){
				$this->run('Моля попъленте всички пулета');
				} else {
				if($data['user'] == set::config('admin_user') && $data['pass'] == set::config('admin_pass')){
					$_SESSION['ADMIN'] = true;
					$this->run(array());
					} else {
					$this->run('Нямате достъп с въведените данни');
				}
			}
		}
		
		public function categoryPage(){
			set::view(constant("p"), 'index/category', [
				'category'=>$this->category()
			]);
		}
		
		public function setFilterCategory($data){
			$this->update_category_with_fitler($data['id']);
			$this->categoryPage();
		}
		
		public function categoryFilterPage($data){
			set::view(constant("p"), 'index/category/category-filter', [
				'catID'=>$data['id'],
				'filterName'=>$this->filter_name_model(),
				'categoryFilteModel'=>$this->category_filte_model($data['id'])
			]);
		}
		
		public function categoryFilterOption($data){
			if($data['type']=="DELETE"){
				$this->category_filte_remove($data['id']);
			}elseif($data['type']=="POST"){
				$this->addNewCategoryFilter($data['input'], $data['categoryid']);
			}
			$this->categoryFilterPage(array('id'=>$data['categoryid']));
		}
		
		public function categoryGroupPage($data){
			set::view(constant("p"), 'index/category-group', [
				'category'=>$this->category_group($data['id']),
				'lastCategory'=>array_shift($this->category_by_id($data['id']))
			]);
		}
		
		public function categorySupPage($data){
			set::view(constant("p"), 'index/category-sup', [
				'category'=>$this->category_group_content($data['id']),
				'lastCategory'=>array_shift($this->category_group_by_id($data['id']))
			]);
		}
		
		public function categoryPageTable($data){
			$getInputName = $data['name'];
			$getInputID = $data['id'];
			$getMethodType = $data['methodType'];
			if($getMethodType == 'PUT'){ 
				$getModelCat = $this->add_new_category($getInputName); 
				if($getModelCat === false){
					set::view(constant("p"), 'sweetAlert/error-category-name-exist');
				} else {
					set::view(constant("p"), 'sweetAlert/success-add-new-category');
				}
			}
			if($getMethodType == 'UPDATE'){ $this->update_category($getInputName, $getInputID); }
			set::view(constant("p"), 'index/category/category-table', [
				'category'=>$this->category()
			]);
		}
		
		public function categoryGroupPageTable($data){
			$getInputName = $data['name'];
			$getInputID = $data['id'];
			$getInputGroupID = $data['groupid'];
			$getMethodType = $data['methodType'];
			if($getMethodType == 'PUT'){ $this->add_new_category_group($getInputName, $getInputID); }
			if($getMethodType == 'UPDATE'){ $this->update_category_group($getInputName, $getInputGroupID); }
			set::view(constant("p"), 'index/category/category-group-table', [
				'category'=>$this->category_group($getInputID),
				'lastCategory'=>array_shift($this->category_by_id($getInputGroupID))
			]);
			if($getMethodType == 'PUT'){ set::view(constant("p"), 'sweetAlert/success-add-new-category'); }
		}
		
		public function categorySupPageTable($data){
			$getInputName = $data['name'];
			$getInputID = $data['id'];
			$getInputGroupID = $data['supid'];
			$getMethodType = $data['methodType'];
			if($getMethodType == 'PUT'){ $this->add_new_category_sup($getInputName, $getInputID); }
			if($getMethodType == 'UPDATE'){ $this->update_category_sup($getInputName, $getInputGroupID); }
			set::view(constant("p"), 'index/category/category-sub-table', [
				'category'=>$this->category_group_content($getInputID),
				'lastCategory'=>array_shift($this->category_group_by_id($getInputGroupID))
			]);
			if($getMethodType == 'PUT'){ set::view(constant("p"), 'sweetAlert/success-add-new-category'); }
		}
		
		public function deleteCategorySup($data){
			$this->delete_category_sup($data['id']);
			set::view(constant("p"), 'index/category/category-sub-table', [
				'category'=>$this->category_group_content($data['subid']),
				'lastCategory'=>array_shift($this->category_group_by_id($data['id']))
			]);
		}
		
		public function deleteCategoryGroup($data){
			$this->delete_category_group($data['id']);
			set::view(constant("p"), 'index/category/category-group-table', [
				'category'=>$this->category_group($data['subid']),
				'lastCategory'=>array_shift($this->category_by_id($data['id']))
			]);
		}
		
		public function deleteCategory($data){
			$this->delete_category($data['id']);
			set::view(constant("p"), 'index/category/category-table', [
				'category'=>$this->category()
			]);
		}
		
		public function switchSubCategory($data){
			$this->switchSubCategoryModel($data['id']);
			set::view(constant("p"), 'index/category/category-table', [
				'category'=>$this->category()
			]);
		}
		
		public function logaut(){
			session_destroy();
			$_SESSION['ADMIN'] = false;
			$this->run(array());
		}
		
	}			