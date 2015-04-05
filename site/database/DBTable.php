<?php 
require_once('Connect.php');

abstract class DBTable extends Connect{
	protected $tableName;
	
	public function inserir($dados){
		$fields = array_keys($dados);
		$values = array_values($dados);
		$sql = "INSERT INTO {$this->tableName} (".implode(', ', $fields).") VALUES('".implode("', '", $values)."');";
		if( $this->query($sql) ){
			return mysql_insert_id( $this->connection );
		}else{	return false; }
	}
	
	public function alterar($dados, $where){
		$sql = "UPDATE {$this->tableName} SET ";
		$i = count($dados);
		foreach($dados as $field => $value) {
			$sql .= $field." = '". $value."' ";
			$i--;
			if($i) $sql .= ", ";
		}
		
		if(!empty($where)){
			$sql .= " WHERE ".$where;
		}
		return $this->query($sql);
	}
	
	public function excluir($where){
		$sql = "DELETE FROM {$this->tableName} ";

		$sql .= "WHERE ".$where;
		return $this->query($sql);
	}

	// basic selection sintaxe
	public function seleciona($fields, $from, $where, $groupBy, $having, $orderBy, $limit){
		$query = "SELECT ".(($fields)?$fields:"*")
				." FROM ".(($from)?$from : $this->tableName)
				.(($where)? " WHERE {$where}":"")
				.(($groupBy)?" GROUP BY {$groupBy}":"")
				.(($having)?" HAVING {$having}":"")
				.(($orderBy)?" ORDER BY {$orderBy}":"")
				.(($limit)?" LIMIT {$limit}":"");

		return $this->query($query);
	}
}
?>
