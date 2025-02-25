<?php

	require_once 'model/usuario.model.php';
	require_once 'service/usuario.service.php';
	require_once 'conexao/conexao.php';
	
	@$acaoNs = isset($_GET['acaoNs'])? $_GET['acaoNs']:$acaoNs; 
	@$idNs = isset($_GET['idNs'])? $_GET['idNs']:$idNs; 
	echo $acaoUs;
	if($acaoUs == 'inserir'){
		$newsletter = new Newsletter();
		$newsletter->__set('email',$_POST['email']);
		$conexao = new Conexao();
		
		$newsletterService = new NewsletterService($newsletter, $conexao);
		$newsletterService->inserir();
		
		//header('location: index.php?link=1');
	}
	if($acaoNs == 'recuperar'){
		$newsletter = new Newsletter();
		$conexao = new Conexao();
		
		$newsletterService = new NewsletterService($newsletter, $conexao);
		$newsletter= $newsletterService->recuperar();
	}
	if($acaoNs == 'recuperarNewsletter'){
		$newsletter = new Newsletter();
		$conexao = new Conexao();
		
		$newsletterService = new NewsletterService($newsletter, $conexao);
		$newsletter= $newsletterService->recuperarNewsletter($idNs);
	}
	if($acaoUs == 'alterar'){
		$newsletter = new Newsletter();
		$newsletter->__set('email',$_POST['email']);
		$newsletter->__set('id',$_POST['idNs']);

		$conexao = new Conexao();
		
		$newsletterService = new NewsletterService($newsletter, $conexao);
		$newsletterService->alterar();
		
		header('location: index.php?link=1');
	}
	if($acaoUs == 'excluir'){
		$newsletter = new Newsletter();
		$newsletter->__set('id',$_POST['idNs']);
				
		$conexao = new Conexao();
		
		$newsletterService = new NewsletterService($newsletter, $conexao);
		$newsletterService->excluir();
		
		header('location: index.php?link=1');
	}