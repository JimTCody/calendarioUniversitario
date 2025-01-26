<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

    ob_start();
    session_start();
    require_once (__DIR__.'/../mdb/mdbUsuario.php');

    //$msg = array('msg' => 'lista de eventos desplegadas');
    
    
    
    $idUsuario = $_SESSION['ID_USUARIO'];
    $rol = $_SESSION['ROL_USUARIO'];
    $nombre = $_SESSION['NOMBRE_USUARIO'];
    $apellido = $_SESSION['APELLIDO_USUARIO'];
    $correo = $_SESSION['CORREO_USUARIO'];
    $password = $_SESSION['PASSWORD_USUARIO'];
    $idPrograma = $_SESSION['PROGRAMA_USUARIO'];
    $foto = $_POST['link'];
    
    $usuario=new Usuario($idUsuario, $rol, $nombre, $apellido, $correo, $password, $idPrograma, $foto);
    editarUsuario($usuario);

    $_SESSION['FOTO_USUARIO']=$foto;

    header("Location: ../../perfil.php");
    die();


        