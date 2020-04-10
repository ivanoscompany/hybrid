<?php
	self::model('Index');
	class brand extends model{
		
		public function run(){
			set::view('Admin', 'brand', [
				'brand'=>$this->brand_model()
			]);
		}
		
		public function addImgBrand($data){
			$this->add_brand_model($data['name']);
			$this->run();
		}
		
		public function updateBrand($data){
			$this->update_brand_model($data['name'], $data['id']);
			$this->run();
		}
		
		public function deleteBrand($data){
			$getHostName = 'http://'.$_SERVER['HTTP_HOST'].'/';
			$getNameTumb = str_replace($getHostName,"",$data['name']);
			$getName = str_replace("thumbnail/","",$getNameTumb);
			unlink($getNameTumb);
			unlink($getName);
			$this->delete_brand_model($data['id']);
			$this->run();
		}
		
	}			