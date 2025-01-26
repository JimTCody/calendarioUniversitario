<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

    ob_start();
    session_start();
    
    $_SESSION['TIPO_ACTIVIDADES'] = $_GET['idTipoActividad'];
        
    //header("Location: ../../principal.php");
    
    die();
    

        