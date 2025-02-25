<?php

	require_once 'model/produto.model.php';
	require_once 'service/produto.service.php';
	require_once 'conexao/conexao.php';
	
	@$acao = isset($_GET['acao'])? $_GET['acao']:$acao; 
	@$id = isset($_GET['id'])? $_GET['id']:$id; 
	
	if($acao == 'inserir'){
		$produto = new Produto();
		$produto->__set('descricao',$_POST['descricao']);
		$produto->__set('custo',$_POST['custo']);
		$produto->__set('fornecedor',$_POST['fornecedor']);
		$produto->__set('foto',$_FILES['foto']['name']);
			
		$conexao = new Conexao();
		
		$produtoService = new ProdutoService($produto, $conexao);
		$produtoService->inserir();
		
		header('location: index.php?link=1');
	}
	if($acao == 'recuperar'){
		$produto = new Produto();
		$conexao = new Conexao();
		
		$produtoService = new ProdutoService($produto, $conexao);
		$produto= $produtoService->recuperar();
	}
	if($acao == 'recuperarProduto'){
		$produto = new Produto();
		$conexao = new Conexao();
		
		$produtoService = new ProdutoService($produto, $conexao);
		$produto= $produtoService->recuperarproduto($id);
	}
	if($acao == 'alterar'){
		$produto = new Produto();
		$produto->__set('descricao',$_POST['descricao']);
		$produto->__set('custo',$_POST['custo']);
		$produto->__set('fornecedor',$_POST['fornecedor']);
		if($_FILES['foto']['name'] !=''){
	    	$produto->__set('foto',$_FILES['foto']['name']);
		}else{
			$produto->__set('foto',$_SESSION['foto']);	
		}
		$produto->__set('id',$_POST['id']);

		$conexao = new Conexao();
		
		$produtoService = new ProdutoService($produto, $conexao);
		$produtoService->alterar();
		
		header('location: index.php?link=1');
	}
	if($acao == 'excluir'){
		$produto = new Produto();
		$produto->__set('id',$_POST['id']);
				
		$conexao = new Conexao();
		
		$produtoService = new ProdutoService($produto, $conexao);
		$produtoService->excluir();
		
		//header('location: index.php?link=1');
	}
	if($acao == 'pesquisar'){
		$produto = new Produto();
		$conexao = new Conexao();
		
		$produtoService = new ProdutoService($produto, $conexao);
		$produto= $produtoService->pesquisar();
	}
