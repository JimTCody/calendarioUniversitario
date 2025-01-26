<?php
ob_start();
session_start();
require_once(__DIR__ . "/../mdb/mdbActividad.php");
require_once(__DIR__ . "/../../modelo/entidad/Actividad.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $idUsuario = $_SESSION['ID_USUARIO'];

    $actividad = new Actividad($id, NULL, NULL, NULL, NULL, $idUsuario, NULL);
    $registro = eliminarActividad($actividad);
    if ($registro) {
        $msg = array('msg' => 'Evento eliminado', 'estado' => true, 'tipo' => 'success');
    } else {
        $msg = array('msg' => 'Error al Eliminar', 'estado' => false, 'tipo' => 'warning');
    }
    //$msg=$registro;
    echo json_encode($msg);
}
