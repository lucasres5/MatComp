<?php 
require_once("DataBaseConnection.php");

class Connect {
	protected $connection;
	private $databaseConnection = new DataBaseConnection();
	
	public function __construct(){
		$databaseConnection.__construct();
	
		$this->connection = mysql_connect( $databaseConnection.getUrl(), $databaseConnection.getUsername(), $databaseConnection.getPassword() );
		if (!$this->connection) {
			die('Não conectou: ' . mysql_error() .' <br />'.$php_errormsg);
		}
	}
	
	public function query($sql) {
		mysql_select_db($databaseConnection.getDatabase(), $this->connection);	
		$Query = mysql_query($sql, $this->connection);

		return $Query;
	}
	
	public function __destruct() {
		if($this->connection)
			mysql_close($this->connection);
	}
}
?>
