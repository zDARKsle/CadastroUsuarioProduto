<?php
class ProdutoService{
	private $produto;
	private $conexao;
	
	public function __construct(Produto $produto, Conexao $conexao){
		$this->conexao= $conexao->conectar();
		$this->produto= $produto;
	}
	
	public function inserir(){
		$query = 'insert into produtos (descricao, custo, fornecedor, foto)
			      values(?,?,?,?)';
				   
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->produto->__get('descricao'));	
		$stmt->bindValue(2,$this->produto->__get('custo'));	
		$stmt->bindValue(3,$this->produto->__get('fornecedor'));	
		$stmt->bindValue(4,$this->produto->__get('foto'));	
	    		
		if($stmt->execute()){
			$diretorio = 'fotoProduto/';
			move_uploaded_file($_FILES['foto']['tmp_name'],
			$diretorio.$this->produto->__get('foto'));
		}	
	}
	public function recuperar(){
		$query = 'select id, descricao, custo, fornecedor, foto
				  from produtos';
		$stmt=$this->conexao->prepare($query);
		$stmt->execute();		
		return $stmt->fetchALL(PDO::FETCH_OBJ);
	}
	public function recuperarProduto($id){
		$query = 'select id, descricao, custo, fornecedor, foto
		from produtos
		where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$id);
		$stmt->execute();
		return $stmt->fetchALL(PDO::FETCH_OBJ);
	}
	public function alterar(){
		$query = 'update produtos
				 set descricao = ?, custo= ?, fornecedor=?, foto=?
				 where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->produto->__get('descricao'));	
		$stmt->bindValue(2,$this->produto->__get('custo'));	
		$stmt->bindValue(3,$this->produto->__get('fornecedor'));	
		$stmt->bindValue(4,$this->produto->__get('foto'));	
		$stmt->bindValue(5,$this->produto->__get('id'));
		if($stmt->execute()){
			if($_SESSION['foto']!=$this->produto->__get('foto')){
			unlink('fotoProduto\\'.$_SESSION['foto']);
			$diretorio = 'fotoProduto/';
			move_uploaded_file($_FILES['foto']['tmp_name'],
			$diretorio.$this->produto->__get('foto'));
			}
		}	
	}
	public function excluir(){
		$query = 'delete from produtos where id = ?';  
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1,$this->produto->__get('id'));	
		if($stmt->execute()){
			unlink('fotoProduto\\'.$_SESSION['foto']);
		}	
	}
	public function pesquisar(){
		$query = 'select id, descricao, custo, fornecedor, foto
				  from produtos limit 5';
		$stmt=$this->conexao->prepare($query);
		$stmt->execute();		
		return $stmt->fetchALL(PDO::FETCH_OBJ);
	}
	
}