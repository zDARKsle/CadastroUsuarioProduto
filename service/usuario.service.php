<?php
class UsuarioService{
	private $usuario;
	private $conexao;
	
	public function __construct(Usuario $usuario, Conexao $conexao){
		$this->conexao= $conexao->conectar();
		$this->usuario= $usuario;
	}
	
	public function inserir(){
		$query = 'insert into usuarios (nome, email, senha, foto)
			      values(?,?,?,?)';
				   
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->usuario->__get('nome'));	
		$stmt->bindValue(2,$this->usuario->__get('email'));	
		$stmt->bindValue(3,$this->usuario->__get('senha'));	
		$stmt->bindValue(4,$this->usuario->__get('foto'));	
	    		
		if($stmt->execute()){
			$diretorio = 'fotoUsuario/';
			move_uploaded_file($_FILES['foto']['tmp_name'],
			$diretorio.$this->usuario->__get('foto'));
		}	
	}
	public function recuperar(){
		$query = 'select id, nome, email, senha, foto
				  from usuarios';
		$stmt=$this->conexao->prepare($query);
		$stmt->execute();		
		return $stmt->fetchALL(PDO::FETCH_OBJ);
	}
	public function recuperarUsuario($idUs){
		$query = 'select id, nome, email, senha, foto
		from usuarios
		where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$idUs);
		$stmt->execute();
		return $stmt->fetchALL(PDO::FETCH_OBJ);
	}
	public function alterar(){
		$query = 'update usuarios
				 set nome = ?, email= ?, senha=?, foto=?
				 where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->usuario->__get('nome'));	
		$stmt->bindValue(2,$this->usuario->__get('email'));	
		$stmt->bindValue(3,$this->usuario->__get('senha'));	
		$stmt->bindValue(4,$this->usuario->__get('foto'));	
		$stmt->bindValue(5,$this->usuario->__get('id'));
		if($stmt->execute()){
			if($_SESSION['fotoUs']!=$this->usuario->__get('foto')){
			unlink('fotoUsuario\\'.$_SESSION['fotoUs']);
			$diretorio = 'fotoUsuario/';
			move_uploaded_file($_FILES['foto']['tmp_name'],
			$diretorio.$this->usuario->__get('foto'));
			}
		}	
	}
	public function excluir(){
		$query = 'delete from usuarios where id = ?';  
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->usuario->__get('id'));	
		if($stmt->execute()){
			unlink('fotoUsuario\\'.$_SESSION['fotoUs']);
		}	
	}
	
}