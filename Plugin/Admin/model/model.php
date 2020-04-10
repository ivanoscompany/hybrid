<?php
	class model{
		
		use DBModel;
		
		public function add_new_blog_model($table, $value){
			return $this->dbi($table, ['blog_name', 'blog_link'], [$value, set::letTrans($value)]);
		}
		
		public function blog_model($table){
			return $this->dbs($table);
		}
		
		public function remove_blog_model($table, $id){
			return $this->dbd($table, ['blog_id'=>$id]);
		}
		
	}	