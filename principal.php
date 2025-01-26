<?php
ob_start();
session_start();
$nombre_usuario = $_SESSION['NOMBRE_USUARIO'] . ' ' . $_SESSION['APELLIDO_USUARIO'];
$foto_usuario=$_SESSION['FOTO_USUARIO'];

if (isset($_SESSION['ROL_USUARIO'])) {
  if ($_SESSION['ROL_USUARIO'] == 2) {
    $perfil_usuario = "Perfil Monitor";
    $clases_display = 'block';

  } else if ($_SESSION['ROL_USUARIO'] == 3) {
    $perfil_usuario = "Perfil Docente";
    $clases_display = 'none';

  } else {
    $perfil_usuario = "Perfil Estudiantil";
    $clases_display = 'none';

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
  <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
  <link href="assets/css/principal_style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
  <link rel="icon" href="assets/img/favicon.ico">
</head>

<body>

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="bootstrap" viewBox="0 0 118 94">
      <title>Bootstrap</title>
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
      </path>
    </symbol>
    <symbol id="home" viewBox="0 0 16 16">
      <path
        d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
    </symbol>
    <symbol id="speedometer2" viewBox="0 0 16 16">
      <path
        d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
      <path fill-rule="evenodd"
        d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
    </symbol>
    <symbol id="table" viewBox="0 0 16 16">
      <path
        d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
    </symbol>
    <symbol id="people-circle" viewBox="0 0 16 16">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
      <path fill-rule="evenodd"
        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
    </symbol>
    <symbol id="grid" viewBox="0 0 16 16">
      <path
        d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
    </symbol>
  </svg>

  <main>
    <header class="p-3 color text-white shadow">
      <div class="container  ">

        <div class="align-items-center justify-content-between  d-flex">
          <div class="d-flex align-items-center aqua">
            <img src="assets/img/logo.png" alt="escudo_unimagdalena" class="logo-img">
            <h1 class="logo"><a href="https://www.unimagdalena.edu.co">CALENDARIO <span id="unimag">UNIVERSITARIO</span>
              </a></h1>
          </div>


          <div class="text-end d-flex margin align-items-center justify-content-between">
            <div class="not d-flex justify-content-center align-items-center">
              <i class="bi bi-bell-fill text-white fs-5 ho"></i>
            </div>

            <div class="cont pr-lg-4 d-none d-md-block d-lg-block ml">
              <p class="name conf-etiqueta"><span id="nombre_usuario">
                  <?php echo $nombre_usuario; ?>
                </span></p>
              <p class="perfil conf-etiqueta"><span id="perfil_usuario">
                  <?php echo $perfil_usuario; ?>
                </span></p>
            </div>

            <div class="dropdown text-end mar">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle caret-color" id="dropdownUser1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo $foto_usuario; ?>" alt="mdo" width="42" height="42" class="rounded-circle">
              </a>
              <ul class="dropdown-menu dropdown-menu-end text-medium dropdown-top" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="perfil.php"><i class="bi bi-person fa-fw me-2"></i>Perfil</a></li>
                <li><a class="dropdown-item" href="configuracion.php"><i
                      class="bi bi-gear fa-fw me-2"></i>Configuración</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item bg-danger-soft-hover" href="../controlador/action/act_logout.php"><i
                      class="bi bi-power fa-fw me-2"></i>Cerrar Sesión</a></li>
              </ul>

            </div>

          </div>

        </div>

      </div>
      </div>
    </header>
    <div class="container-principal container-fluid  d-flex ">

      <div class="container-fluid options col-md-7 col-lg-9 ">
        <div class="container margen">
          <div id='calendar'></div>
        </div>

        <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="myModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h5 class="modal-title" id="titulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>


              <form id="formulario" autocomplete="off">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <input id="title" type="text" class="form-control" name="nombre">
                        <label for="title">Evento</label>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-floating mb-3">
                        <input class="form-control" id="start" type="date" name="fecha">
                        <label for="" class="form-label">Fecha de inicio</label>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-floating mb-3">
                        <input class="form-control" id="end" type="date" name="end">
                        <label for="" class="form-label">Fecha de finalización</label>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="TipoActividad" name="idTipoActividad" onchange="updateColor()">
                          <option value="1" data-color="#2F4F4F">Extracurriculares</option>
                          <option value="2" data-color="#008000">Deportes</option>
                          <option value="3" data-color="#8B8B00">Entretenimiento</option>
                          <option value="4" data-color="#800000">Académicos</option>
                          <option value="5" data-color="#4B0082">Seminario</option>
                        </select>
                        <label for="TipoActividad" class="form-label">Tipo de Actividad</label>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="form-floating mb-3">
                        <input class="form-control" id="color" type="color" name="color">
                        <label for="color" class="form-label">Color</label>
                      </div>
                    </div>


                    <div class="col-md-12" style="display: <?php echo $clases_display; ?>">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkPublico" name="check" value="true">
                        <label class="form-check-label" for="checkPublico">Evento Público</label>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                  <button type="submit" class="btn btn-primary submit" id="btnAccion" type="submit">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>





      </div>
      <div class="container-filtro shadow me-4 m-0 sidebar container d-none d-md-block col-md-5 col-lg-3">
        <div class="container-fluid border-bottom">
          <p class="editar-cont mt-5">Seleccionar eventos</p>
        </div>
        <p id="f1" class="filtro p-3 mb-0 mt-0 navhover cursor-pointer border-bottom">Extracurriculares</p>
        <p id="f2" class="filtro p-3 mb-0 mt-0 border-bottom navhover cursor-pointer">Deportes</p>
        <p id="f3" class="filtro p-3 mb-0 mt-0 border-bottom navhover cursor-pointer">Entretenimiento</p>
        <p id="f4" class="filtro p-3 mb-0 mt-0 border-bottom navhover cursor-pointer">Académicos</p>
        <p id="f5" class="filtro p-3 mb-0 mt-0 border-bottom navhover cursor-pointer">Seminario</p>
        <p id="f0" class="filtro p-3 mb-0 mt-0 border-bottom navhover cursor-pointer">Mostrar Todos</p>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
    <script src="assets/js/es.global.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>

    <script>
      const base_url = '<?php echo base_url; ?>';
    </script>

    <script src="assets/js/app.js"></script>
</body>
</body>


<script>
  // Obtener el elemento HTML con el ID "nombre-usuario"
  var nombreUsuarioElemento = document.getElementById('nombre-usuario');
  document.getElementById("checkPublico").checked = false;
  // Actualizar el contenido del elemento con el nombre del usuario
  nombreUsuarioElemento.textContent = '<?php echo $nombre_usuario; ?>';

  function updateColor() {
    var selectElement = document.getElementById("TipoActividad");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var color = selectedOption.getAttribute("data-color");
    var checkbox = document.getElementById("checkPublico");

    if (!checkbox.checked) {
      var colorPicker = document.getElementById("color");
      colorPicker.value = color;
    }
  }

</script>




</html>