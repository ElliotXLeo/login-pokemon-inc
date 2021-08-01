<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login B SA2 jQ PHP I</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/index.css">
</head>

<body class="body">

  <?php
  session_start();
  if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
    if ($_SESSION["idRol"] != "1") {
      header("Location: ./inicio-otro.php");
    }
  } else {
    header("Location: ../");
  }
  echo $_SESSION["idRol"];
  ?>

  <div class="container contenedor mt-4">
    <div class="row justify-content-center aling-items-center">
      <div class="col-md-12">
        <h2 class="text-center">Bienvenido</h2>
        <h3 class="text-center"><span class="badge rounded-pill bg-dark"><?= $usuario; ?></span></h3>
        <h4 class="text-center"><span class="badge rounded-pill bg-primary">Administrador</span></h4>
        <p class="lead text-center">Esta página se muestra a los administradores luego de un iniciar sesión de forma correcta.</p>
        <hr class="my-4">
        <a href="../../backend/base-de-datos/logout.php" class="btn btn-danger btn-lg col-12">Cerrar sesión</a>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="../js/index.js"></script>
</body>

</html>