<?php
if(isset($_GET['metodo'])){
		$metodo = $_GET['metodo'];
		$acaoUs = 'recuperarNewsletter';
		$idUs = $_GET['idUs'];
		require_once 'newsletter.controller.php';
		foreach($newsletter as $index => $newsletter){
			$id = $newsletter->id;
			$email = $newsletter->email;
		}
	}
?>

<h1>Newsletter</h1>
<h4> Receba Notícias e Atualizações </h4>
<form name="form1" action="index.php?link=7&acaoNs=<?php if(!isset($metodo)){echo 'inserir';}
    elseif($metodo =='alterar'){echo 'alterar';}else{echo 'excluir';} ?>"
    method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" 
        value="<?php if(isset($email)){echo $email;}else{echo '';} ?>">
</div>
    <input type="hidden" name="idNs" value="<?php if(isset($id)){echo $id;}else{echo '';} ?>">
    <input type="submit" class="btn btn-primary" value="<?php if(!isset($metodo)){echo 'inserir';}
                                                elseif($metodo =='alterar'){echo 'alterar';}else{echo 'excluir';} ?>">
<form>