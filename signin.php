
<?php

require_once("helpers.php");
require_once("controladores/funciones.php");

if($_POST){
  $errores = validar($_POST,'registro');
  if(count($errores)== 0){
    $avatar = armarAvatar($_FILES);
    $usuario = armarUsuario($_POST,$avatar);
    guardarUsuario($usuario);
    header("location: login.php");
    exit;
  }
}

if (isset($_SESSION["avatar"])){
  $imagen="fotosPerfil/".$_SESSION["avatar"];
}else{
$imagen="http://ssl.gstatic.com/accounts/ui/avatar_2x.png";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <meta charset="utf-8">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>
  <!--Nuestra pagina de estilo-->
  <link rel="stylesheet" href="css/style.css">
  <!--Nuestra pagina de animacicion-->
  <link rel="stylesheet" href="css/animate.min.css">

  <title>BAST</title>
</head>





<body>

  <header>  <!-- Ini header -->

      <nav class="navbar navbar-expand-lg navbar-light ml-auto d-flex fixed-top" style="background-color:#6fbffa;">

        <a class="navbar-brand logo" href="index.php">BAST</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-auto" id="navbarNav">

          <ul class="navbar-nav ml-auto d-flex">

            <li class="nav-item active">
              <a class="nav-link" href="lugares.php">Lugares <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="actividades.php">Actividades<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="gastronomia.php">Gastronomia<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="hoteles.php">Hoteles<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="preguntas.php">FAQ
                <i class="far fa-question-circle">  </i>
                <span class="sr-only">(current)
                </span>
              </a>
            </li>

            <!-- USUARIOS -->
            <!-- SI ESTA SIN LOGUEAR MOSTRAR ESTO -->

            <!--  USUARIO LOGUEADO MOSTRAR ESTO-->
            <li class="nav-item avatar dropdown">

              <!-- Foto de usuario -->
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink-40" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img src="<?= $imagen ;?>" class="rounded-circle z-depth-0"
                  alt="avatar" height="30">
              </a>

              <!-- Parte del menu dropdown -->
              <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                aria-labelledby="navbarDropdownMenuLink-40">
                <a class="dropdown-item nav-link" href="perfil.php"><i class="fas fa-address-card"></i> Perfil y Cuenta</a>
                <a class="dropdown-item nav-link" href="#"><i class="fas fa-cogs"></i> Preferencias</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
              </div>

            </li>

            <li class="nav-item active">
              <a class="nav-link" href="login.php">
              <i class="fas fa-sign-in-alt"></i> Login
                <span class="sr-only">(current)</span></a>
            </li>

          </ul>

        </div>

      </nav><!-- Fin  nav -->

    </header> <!-- Fin del header-->



<div class="jumbotron">
  <h1 class="display-4">Registrate</h1>
  <p class="lead">Para poder realizar reservas y busquedas personalizadas.</p>
  <hr class="my-4">


  <div class="container">
  <div class="row justify-content-center">
  <div>

<!-- FORMULARIO REGISTRO -->
  <form class="form-signin" action="" method="POST" enctype= "multipart/form-data"  >

  <?php if(isset($errores)) :?>
         <ul class="alert alert-danger">
            <?php foreach ($errores as $key => $value) :?>
                <li> <?=$value ?></li>
            <?php endforeach; ?>

         </ul>
      <?php endif; ?>

  <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-envelope"></i></div>
        </div>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email@ejemplo.com">

  </div>
<div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-lock"></i></div>
        </div>
        <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
      </div>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-lock"></i></div>
        </div>
        <input type="password" class="form-control" id="Password" name="repassword" placeholder="RePassword">
      </div>

<div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-user"></i></div>
        </div>
        <input type="text" class="form-control" id="user" name="nombre" aria-describedby="userHelp"placeholder="Nombre de Usuario">

</div>
<div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-user"></i></div>
        </div>
        <input type="file" class="custom-file-input" name="avatar"id="customFileLang" lang="es">
  <label class="custom-file-label" for="customFileLang">Subi tu avatar</label>

</div>

<div class="form-group form-check">
  <label>
      <input type="checkbox" value="remember-me"> Recordarme
  </label>
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
<br>
<a class="mt-5 mb-3" href="login.php">Ya tengo cuenta!</a>
<p class="mt-5 mb-3 text-muted">&copy; 2019</p>
</form>
<!-- FIN FORMULARIO REGISTRO -->
</div>
  </div>
  </div>



  <p>Recuerda que regitrandote estas aceptando las politicas de privacidad..</p>

</div>

<!-- Ini footer -->
<footer>
  <div class="card text-white">
    <img src="img/footer.png" class="card-img" alt="...">
    <div class="card-img-overlay">
      <h3 class="card-title">Bast</h3>
      <p>Políticas de privacidad</p>
      <hr>
      <p>Nulla vitae elit libero, a pharetra augue mollis interdum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div>
  </div>

</footer>  <!-- Fin footer -->

</body>

</html>
