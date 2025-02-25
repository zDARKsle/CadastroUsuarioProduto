<?php
    $acao = 'pesquisar';
    require_once 'produto.controller.php';
  ?>
  <div class="row">
    <?php foreach($produto as $indice =>$produto) { ?>
    <div class="col">
        <div class="card" style="width: 100%;">
        <img src="fotoProduto/<?= $produto->foto;?>" height="300"  class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">R$ <?=  $produto->custo * 1.8 ;?></h5>
            <p class="card-text"><?= $produto->descricao;?></p>
            <a href="#" class="btn btn-primary">Comprar</a>
        </div>
        </div>
    </div>
    <?php } ?>
  </div>