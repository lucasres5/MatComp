<<?php 
class Modelo{
	protected $id;

	public function __construct(){
		$this->id = "";
	}

	public function getJSON(){
		$json = "{";
		$i = count((array)$this);
		foreach ($this as $key => $value) {
			$json .= "\"{$key}\" : \"{$value}\"";
			if(--$i){
				$json .= ", ";
			}
		}

		$json .= "}";

		return $json;
	}

	public function asArray(){
		return (array)$this;
	}

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
?>