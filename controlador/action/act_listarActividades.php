<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

    ob_start();
    session_start();
    require_once(__DIR__."/../../modelo/dao/ActividadDAO.php");

    //$msg = array('msg' => 'lista de eventos desplegadas');
        
        $dao =new ActividadDAO();

        if( $_SESSION['TIPO_ACTIVIDADES'] == 0){
            $data = $dao->getActividades($_SESSION['ID_USUARIO']);
        }else{
            $data = $dao->getActividades($_SESSION['ID_USUARIO'], $_SESSION['TIPO_ACTIVIDADES']);
        }
       
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    

        