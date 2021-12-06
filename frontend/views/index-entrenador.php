<?php
session_start();
if (isset($_SESSION['idUser'])) {
  if (empty($_SESSION['idUser'])) {
  } else {
    $idUser = $_SESSION['idUser'];
    $usuario = $_SESSION['usuario'];
    $descripcion = $_SESSION['descripcion'];
  }
} else {
  header('Location: ../');
}
?>

<?php
$titulo = 'Pokemon Inc Entrenador';
require_once './components/index-apertura.php';
?>

<main class="main">
  <div class="row justify-content-center aling-items-center">
    <div class="col-md-12">
      <h2 class="text-center">Bienvenido</h2>
      <h3 class="text-center"><span class="badge rounded-pill bg-dark"><?php echo "{$idUser}: {$usuario}"; ?></span></h3>
      <h4 class="text-center"><span class="badge rounded-pill bg-primary"><?= $descripcion; ?></span></h4>
      <p class="lead text-center">Esta página se muestra a los entrenadores luego de un iniciar sesión de forma correcta.</p>
      <a href="../../backend/models/Logout.php" class="btn btn-danger btn-lg col-12 my-2">Cerrar sesión</a>
    </div>
  </div>
</main>

<?php
require_once './components/index-cierre.php';
?>