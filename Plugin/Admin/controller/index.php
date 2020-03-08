<?php
	self::model(constant("p"));
	class index extends model{
		
		public function run($error){
			set::view('Index', 'header');
			if($_SESSION['ADMIN']){
				set::view(constant("p"), 'index');
			} else {
				set::view(constant("p"), 'Login', ['errorLog'=>$error]);
			}
			set::view('Index', 'footer');
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
		
		public function logaut(){
			session_destroy();
			$_SESSION['ADMIN'] = false;
			$this->run(array());
		}
		
	}		