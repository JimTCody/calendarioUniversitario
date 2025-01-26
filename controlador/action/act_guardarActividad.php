<?php
    ob_start();
    session_start();
    require_once (__DIR__."/../mdb/mdbActividad.php");
    require_once (__DIR__."/../../modelo/entidad/Actividad.php");

        if (isset($_POST)) {
            if (empty($_POST['nombre']) || empty($_POST['fecha'])) {

            }else{
                $nombre = $_POST['nombre'];
                $fecha = $_POST['fecha'];
                $end = $_POST['end'];
                $color = $_POST['color'];
                $id = $_POST['id'];
                $idUsuario=$_SESSION['ID_USUARIO'];
                $idTipoActividad=$_POST['idTipoActividad'];

                //ROL:  1) ESTUDIANTE 2) MONITOR 3) PROFESOR
                $permisosUsuario = $_SESSION['ROL_USUARIO'];

                $publico = isset($_POST['check']) && $_POST['check'] === 'true';

                if($publico=='true'){
                    $idUsuario = ($permisosUsuario == 2) ? NULL : $idUsuario;
                }
                $idUsuario = ($permisosUsuario == 3) ? NULL : $idUsuario;
                
                if($id == ''){
                    if($publico=='true'){
                        $nombre = '[PUB] '.$nombre;
                        $idUsuario = ($permisosUsuario == 2) ? NULL : $idUsuario;
                    }else{
                        $nombre = '[PRIV] '.$nombre;
                    }

                    $actividad = new Actividad(NULL,$nombre, $fecha, $end, $color, $idUsuario, $idTipoActividad);
                    $registro = guardarActividad($actividad);
                    if ($registro) {
                        $msg = array('msg' => 'Evento Registrado', 'estado' => true, 'tipo' => 'success');
                    }else{
                        $msg = array('msg' => 'Error al Registrar', 'estado' => false, 'tipo' => 'warning');
                    }
                }else{
                    $actividad = new Actividad($id,$nombre, $fecha, $end, $color, $idUsuario, $idTipoActividad);
                    $registro = modificarActividad($actividad);
                    if ($registro) {
                        $msg = array('msg' => 'Evento Modificado', 'estado' => true, 'tipo' => 'success');
                    }else{
                        $msg = array('msg' => 'Error al Modificar', 'estado' => false, 'tipo' => 'warning');
                        //$msg = array('msg' => $nombre, $fecha, $end, $color, $idUsuario, $idTipoActividad);
                    }
                }
            }
            
            echo json_encode($msg);
        }
        die();
    

        
        
