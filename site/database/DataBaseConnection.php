<?php
	Class DataBaseConnection{
		private $user; 
		private $password;
		private $database; 
		private $url;

		public function __construct(){
			// INFORMAR AQUI OS DADOS PARA CONEXÃO COM O BANCO DE DADOS
			$this->url = 'localhost';
			$this->username = 'Usuário';  
			$this->password = 'Senha';
			$this->database = 'matcomp';
		}
		
		public function getUser(){
			return $user;
		}

		public function getPassword(){
			return $password;
		}

		public function getDatabase(){
			return $database;
		}

		public function getUrl(){
			return $url;
		}
	}
?>