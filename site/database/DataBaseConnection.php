<?php
	Class DataBaseConnection{
		protected $user; 
		protected $password;
		protected $database; 
		protected $url;

		public function __construct(){
			// INFORMAR AQUI OS DADOS PARA CONEXÃO COM O BANCO DE DADOS
			$this->url = 'localhost';
			$this->username = 'matcomp';  
			$this->password = 'axiomasdepeano';
			$this->database = 'matcomp';
		}
	}
?>