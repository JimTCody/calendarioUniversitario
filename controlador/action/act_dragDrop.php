<?php
    ob_start();
    session_start();
    require_once (__DIR__."/../mdb/mdbActividad.php");
    require_once (__DIR__."/../../modelo/entidad/Actividad.php");

        if (isset($_POST)) {
            if (empty($_POST['id']) || empty($_POST['fecha'])) {
                $msg = array('msg' => 'Todo los campos son requeridos', 'estado' => false, 'tipo' => 'warning');
            }else{
                $fecha = $_POST['fecha'];
                $end = $_POST['end'];
                $id = $_POST['id'];
                $idUsuario=$_SESSION['ID_USUARIO'];
               
                $registro = dragOver($fecha,$end, $id, $idUsuario);
                if ($registro) {
                    $msg = array('msg' => 'Evento Modificado', 'estado' => true, 'tipo' => 'success');
                }else{
                    $msg = array('msg' => 'Error al Modificar', 'estado' => false, 'tipo' => 'warning');
                }
            }
            //$msg = array('msg'=> 'fecha: '.$fecha, 'end: '.$end,'id: '.$id, 'idUsuario: '.$idUsuario);
            echo json_encode($msg);
        }
        die();
    

        
        
