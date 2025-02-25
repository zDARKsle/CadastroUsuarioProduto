<?php
if(isset($_GET['metodo'])){
		$metodo = $_GET['metodo'];
		$acao = 'recuperarProduto';
		$id = $_GET['id'];
		require_once 'produto.controller.php';
		foreach($produto as $index => $produto){
			$id = $produto->id;
            $descricao = $produto->descricao;
			$custo = $produto->custo;
			$fornecedor = $produto->fornecedor;
			$foto = $produto->foto;
			$_SESSION['foto']=$produto->foto;
		}
	}
    
?>


<h1>Cadastro de Produto</h1>
<form name="form1" action="index.php?link=4&acao=<?php if(!isset($metodo)){echo 'inserir';}
    elseif($metodo =='alterar'){echo 'alterar';}else{echo 'excluir';} ?>"
    method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Descriçao</label>
        <input type="text" name="descricao" class="form-control" 
        value="<?php if(isset($descricao)){echo $descricao;}else{echo '';} ?>">
    </div>
    <div class="mb-3">
        <label>Valor de custo</label>
        <input type="text" name="custo" class="form-control" 
        value="<?php if(isset($custo)){echo $custo;}else{echo '';} ?>">
    </div>
    <div class="mb-3">
        <label>Fornecedor</label>
        <input type="text" name="fornecedor" class="form-control"
        value="<?php if(isset($fornecedor)){echo $fornecedor;}else{echo '';} ?>">
    </div>
    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" >
    </div>
    <?php
        if(isset($foto)){
			echo '<img src="fotoProduto/'.$foto.'" width="100" height="100">';
		}
	?>
    <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{echo '';} ?>">
    <input type="submit" class="btn btn-primary" value="<?php if(!isset($metodo)){echo 'inserir';}
                                                elseif($metodo =='alterar'){echo 'alterar';}else{echo 'excluir';} ?>">
<form>