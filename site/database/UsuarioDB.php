<<?php 
require_once("DBTable.php");
require_once("modelos/Usuario.php");
/**
* 
*/
class UsuarioDB extends DBTable
{
	public function __construct()
	{
		$this->tableName = "usuario";
		parent::__construct();
	}

	/**
	 * Busca um usuário específico no banco de dados respectivamente por id, login, email  (unic fields).
	 * @param  {Usuario} $usuario  Usuário a ser buscado
	 * @return {Usuario} Retorna o usuário selecionado
	 */
	public function selecionaUsuario($usuario){
		if($usuario INSTANCEOF Usuario){
			$fields = "*";
			$where = "";
			if(!empty($usuario->getId())){
				$where = "id = {$usuario->getId()}";
			} elseif(!empty($usuario->getEmail())){
				$where = "login = {$usuario->getLogin()}";
			} elseif(!empty($usuario->getId())){
				$where = "email = {$usuario->getEmail()}";
			}

			$sqlReturn = parent::seleciona($fields, "",  $where, "", "", "", "");
			if($sqlReturn && mysql_num_rows($sqlReturn)){
				return new Usuario(mysql_fetch_assoc($sqlReturn));
			}
			return false;

		}
		return false;
	}

}

?>