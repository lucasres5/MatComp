<?php
require_once("Modelo.php");

class Usuario extends Modelo{
	protected $login;
	protected $telefone;
	protected $nome;
	protected $email;
	protected $password;

	public function __construct($array){
		parent::__construct();

		$this->login = "";
		$this->telefone = "";
		$this->nome = "";
		$this->email = "";
		$this->password = "";

		if(isset($array) && count($array)){
			foreach ($array as $key => $value) {
				if(property_exists( get_class($this), $key )){	
					$this->$key = $value;
				} else{
					exit("O campo {$key} não existe em ".get_class($this));
				}
			}
		}
	}

	public static function encryptPassword($pwd){
		return hash("sha256", md5($pwd));
	}

    /**
     * Gets the value of login.
     *
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Sets the value of login.
     *
     * @param mixed $login the login
     *
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Gets the value of telefone.
     *
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Sets the value of telefone.
     *
     * @param mixed $telefone the telefone
     *
     * @return self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
?>