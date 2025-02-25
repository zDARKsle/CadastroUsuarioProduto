<?php
	$acao = 'recuperar';
  $acaoUs ='recuperar';
	require_once 'produto.controller.php';
  require_once 'usuario.controller.php';
?>
<h1>Área restrita</h1>
<h2>Produtos</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Produto</th>
      <th scope="col">Foto</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <?php foreach($produto as $indice =>$produto){ ?>
    <tbody>
      <tr>
        <td><?= $produto->descricao;?></td>
        <td><img src="fotoProduto/<?= $produto->foto;?>" width="40" height="40"></td>
        <td><a href="index.php?link=2&metodo=alterar&id=<?= $produto->id;?>">Alterar</a></td>
        <td><a href="index.php?link=2&metodo=excluir&id=<?= $produto->id;?>">Excluir</a></td>
      </tr>
    </tbody>
  <?php } ?>
</table>
<hr>
<h2>Usuários</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Usuário</th>
      <th scope="col">Foto</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <?php foreach($usuario as $indice =>$usuario){ ?>
    <tbody>
      <tr>
        <td><?= $usuario->nome;?></td>
        <td><img src="fotoUsuario/<?= $usuario->foto;?>" width="40" height="40"></td>
        <td><a href="index.php?link=5&metodo=alterar&idUs=<?= $usuario->id;?>">Alterar</a></td>
        <td><a href="index.php?link=5&metodo=excluir&idUs=<?= $usuario->id;?>">Excluir</a></td>
      </tr>
    </tbody>
  <?php } ?>
</table>