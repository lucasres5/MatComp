<?php 
require_once("DataBaseConnection.php");

class Connect extends DataBaseConnection{
	protected $connection;
	
	public function __construct(){
		parent::__construct();
		$this->connection = mysql_connect( $this->url, $this->username, $this->password );
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
