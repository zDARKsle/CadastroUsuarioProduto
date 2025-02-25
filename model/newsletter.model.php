<?php
class Newsletter{
	private $id;
	private $email;
	
	public function __get($atributo){
		return $this->$atributo;
	}
	
	public function __set($atributo,$valor){
		$this->$atributo = $valor;
	}
}
/*$ns = new Newsletter();
$ns->__set('id','01');
echo $ns->__get('id');*/
?>