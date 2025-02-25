<?php
 session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?link=1">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=2">Cadastro de Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=5">Cadastro de Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=7">Newsletter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?link=3">Área Restrita</a>
                    </li>



                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
    <?php
          $link = @$_GET['link'];
          $pag[1]='principal.php';
          $pag[2]='cadProduto.php';
          $pag[3]='areaRestrita.php';
          $pag[4]='produto.controller.php';
          $pag[5]='cadUsuario.php';
          $pag[6]='usuario.controller.php';
          $pag[7]='cadNewsletter.php';
          $pag[8]='newsletter.controller.php';
                     
          if(!empty($link)){
            if(file_exists($pag[$link])){
              include $pag[$link];
            }
          }else{
            trim(include 'principal.php');
          }
      ?>
    </div>

    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produto com PHP e Mysql</h5>
            <p class="card-text">Site para desenvolvimento de cadastro de produto</p>
            <a href="index.php?link=1" class="btn btn-primary">Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>