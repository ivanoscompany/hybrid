<?php
	self::model('Admin');
	class blog extends model{
		
		public function run(){
			$blogData = $this->blog_model('blog');
			include set::path('Admin', 'view', 'blog');
		}
		
		public function openModalMenu($data){
			$blogData = $this->blog_model($data['table']);
			include set::path('Admin', 'view', 'blog/add-new-blog');
		}
		
		public function addNewBlog($data){
			$this->add_new_blog_model($data['table'], $data['value']);
			$this->openModalMenu($data);
		}
		
		public function removeBlog($data){
			$this->remove_blog_model($data['table'], $data['id']);
			$this->openModalMenu($data);
		}
	}			