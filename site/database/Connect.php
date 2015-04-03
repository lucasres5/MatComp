<?php 

class Connect {
	private $url;
	private $username;
	private $password;
	protected $connection;
	protected $database;
	
	public function __construct(){
		$this->url = 'localhost';
		$this->username = 'Usuário';
		$this->password = 'Senha';
		$this->database = 'matcomp';
		
		$this->connection = mysql_connect($this->url,$this->username,$this->password);
		if (!$this->connection) {
			die('Não conectou: ' . mysql_error() .' <br />'.$php_errormsg);
		}
	}
	
	public function query($sql) {
		mysql_select_db($this->database, $this->connection);	
		$Query = mysql_query($sql, $this->connection);

		return $Query;
	}
	
	public function __destruct() {
		if($this->connection)
			mysql_close($this->connection);
	}
}
?>
