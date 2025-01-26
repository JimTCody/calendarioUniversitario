<?php
        ob_start();
        session_start();
        $nombre_usuario = $_SESSION['NOMBRE_USUARIO'].' '.$_SESSION['APELLIDO_USUARIO'];
        $foto_usuario=$_SESSION['FOTO_USUARIO'];

        if(isset($_SESSION['ROL_USUARIO'])){
          if($_SESSION['ROL_USUARIO'] == 2){
            $perfil_usuario="Perfil Monitor";
          }else if($_SESSION['ROL_USUARIO'] == 3){
            $perfil_usuario="Perfil Docente";
          }else{
            $perfil_usuario="Perfil Estudiantil";
          }
        }

        if (!isset($_SESSION['ID_USUARIO'])) {
          header("Location: login.html");
       }
      
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>CALENDARIO UNIVERSITARIO</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/configuracion_style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="icon" href="assets/img/favicon.ico">
  </head>
  <body class="container-padre">
    <div class="p-3 color text-white ">
      <div class="container  ">
      <div class="align-items-center justify-content-between  d-flex" >
          <div class="d-flex align-items-center aqua">
            <a id="volver" href="principal.php">
              <i class="fa-solid fa-chevron-left" ></i>
            </a>
              <img src="assets/img/logo.png" alt="escudo_unimagdalena" class="logo-img">
              <h1 class="logo"><a href="https://www.unimagdalena.edu.co">CALENDARIO <span id="unimag">UNIVERSITARIO</span> </a></h1>
            </div>
          <div class="text-end d-flex margin align-items-center justify-content-between">
              <div class="not d-flex justify-content-center align-items-center">
                  <i class="bi bi-bell-fill text-white fs-5 ho"></i>
                </div>

              <div class="cont pr-lg-4 d-none d-md-block d-lg-block ml">
                  <p class="name conf-etiqueta"><span id="nombre_usuario"><?php echo $nombre_usuario; ?></span></p>
                  <p class="perfil conf-etiqueta"><span id="perfil_usuario"><?php echo $perfil_usuario; ?></span></p>
              </div>

              <div class="dropdown text-end mar">
                  <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle caret-color" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="<?php echo $foto_usuario; ?>" alt="mdo" width="42" height="42" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end text-medium dropdown-top" aria-labelledby="dropdownUser1">
                  <li><a class="dropdown-item" href="perfil.php"><i class="bi bi-person fa-fw me-2"></i>Perfil</a></li>
                    <li><a class="dropdown-item" href="configuracion.php"><i class="bi bi-gear fa-fw me-2" ></i>Configuración</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item bg-danger-soft-hover" href="../controlador/action/act_logout.php"><i class="bi bi-power fa-fw me-2"></i>Cerrar Sesión</a></li>
                  </ul>
                </div>       
          </div> 
        </div>
      </div>
     
    </div>


    <!-- --------------------------------------------------------------------------------------------------->
    <div class="container-principal container-fluid  d-flex">
      <div class="container-fluid shadow-lg me-4 height-100vh m-0 width sidebar container d-none d-md-block col-md-5 col-lg-3 d-flex align-items-center justify-content-center">
        <div class="border-bottom mt-3 p-3 d-flex align-items-center  .cursor-pointer">
          <img src="<?php echo $foto_usuario; ?>" alt="mdo" width="42" height="42" class="rounded-circle">
          <div class="cont pr-lg-4 d-none d-md-block d-lg-block ml">
            <p class="name conf-etiqueta"><span id="nombre_usuario"><?php echo $nombre_usuario; ?></span></p>
            <p class="perfil conf-etiqueta"><?php echo $perfil_usuario; ?></span></p>
        </div>
        </div>
        <a href="perfil.php" class="sidebar-op"><p class="p-3  mb-0 navhover cursor-pointer"><i class="bi bi-person fa-fw me-2"></i>Editar perfil</p></a>
        <a href="configuracion.php" class="sidebar-op"><p class=" p-3  mb-0 mt-0 border-bottom navhover cursor-pointer"><i class="bi bi-gear fa-fw me-2"></i>Configuración</p></a>
        <a href="../controlador/action/act_logout.php" class="sidebar-op"><p class=" p-3  navhover cursor-pointer" ><i class="bi bi-power fa-fw me-2 "></i>Cerrar sesión</p></a>
      </div>

      <div class="container-fluid options col-md-7 col-lg-9">
        <div class=" container-fluid d-flex justify-content-between align-items-center border-bottom">
          <p class="editar-cont mt-5" >Configuración</p>
        </div>
        <p class="p-3  mb-0 navhover cursor-pointer border-bottom">Preferencias de idioma</p>
        <p class=" p-3  mb-0 mt-0 border-bottom navhover cursor-pointer">Configuración de notificaciones</p>
        <p class=" p-3  mb-0 mt-0 border-bottom navhover cursor-pointer">Privacidad y seguridad</p>

        <form action="../controlador/action/act_eliminarUsuario.php" method="post">
          <a class="sidebar-op" href="../controlador/action/act_eliminarUsuario.php"><p  type="submit" name='submit' value="Submit" class=" p-3  navhover cursor-pointer border-bottom">Eliminar cuenta</p></a>
        </form>
        
     
      </div>
    </div>
    

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/principal.js"></script>
  </body>
</html>