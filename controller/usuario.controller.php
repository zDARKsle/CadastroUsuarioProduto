<?php

	require_once 'model/usuario.model.php';
	require_once 'service/usuario.service.php';
	require_once 'conexao/conexao.php';
	
	@$acaoUs = isset($_GET['acaoUs'])? $_GET['acaoUs']:$acaoUs; 
	@$idUs = isset($_GET['idUs'])? $_GET['idUs']:$idUs; 
	echo $acaoUs;
	if($acaoUs == 'inserir'){
		$usuario = new Usuario();
		$usuario->__set('nome',$_POST['nome']);
		$usuario->__set('email',$_POST['email']);
		$usuario->__set('senha',$_POST['senha']);
		$usuario->__set('foto',$_FILES['foto']['name']);
			
		$conexao = new Conexao();
		
		$usuarioService = new UsuarioService($usuario, $conexao);
		$usuarioService->inserir();
		
		//header('location: index.php?link=1');
	}
	if($acaoUs == 'recuperar'){
		$usuario = new Usuario();
		$conexao = new Conexao();
		
		$usuarioService = new UsuarioService($usuario, $conexao);
		$usuario= $usuarioService->recuperar();
	}
	if($acaoUs == 'recuperarUsuario'){
		$usuario = new Usuario();
		$conexao = new Conexao();
		
		$usuarioService = new UsuarioService($usuario, $conexao);
		$usuario= $usuarioService->recuperarUsuario($idUs);
	}
	if($acaoUs == 'alterar'){
		$usuario = new Usuario();
		$usuario->__set('nome',$_POST['nome']);
		$usuario->__set('email',$_POST['email']);
		$usuario->__set('senha',$_POST['senha']);
		if($_FILES['foto']['name'] !=''){
	    	$usuario->__set('foto',$_FILES['foto']['name']);
		}else{
			$usuario->__set('foto',$_SESSION['foto']);	
		}
		$usuario->__set('id',$_POST['idUs']);

		$conexao = new Conexao();
		
		$usuarioService = new UsuarioService($usuario, $conexao);
		$usuarioService->alterar();
		
		header('location: index.php?link=1');
	}
	if($acaoUs == 'excluir'){
		$usuario = new Usuario();
		$usuario->__set('id',$_POST['idUs']);
				
		$conexao = new Conexao();
		
		$usuarioService = new UsuarioService($usuario, $conexao);
		$usuarioService->excluir();
		
		header('location: index.php?link=1');
	}