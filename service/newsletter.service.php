<?php
class NewsletterService{
	private $newsletter;
	private $conexao;
	
	public function __construct(Newsletter $newsletter, Conexao $conexao){
		$this->conexao= $conexao->conectar();
		$this->newsletter= $newsletter;
	}
	
	public function inserir(){
		$query = 'insert into newsletters (email)
			      values(?)';
				   
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->newsletter->__get('email'));	
		}
	
	public function recuperar(){
		$query = 'select email
				  from newsletters';
		$stmt=$this->conexao->prepare($query);
		$stmt->execute();		
		return $stmt->fetchALL(PDO::FETCH_OBJ);
	}
	public function recuperarNewsletter($idNs){
		$query = 'select email
		from newsletters
		where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$idNs);
		$stmt->execute();
		return $stmt->fetchALL(PDO::FETCH_OBJ);
	}
	public function alterar(){
		$query = 'update newsletters
				 set email =?
				 where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->newsletter->__get('email'));	
	}
	public function excluir(){
		$query = 'delete from newsletters where id = ?';  
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->newsletter->__get('id'));	
	}
	
}