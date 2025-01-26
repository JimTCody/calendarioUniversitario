<?php
    ob_start();
    session_start();
    
    require_once (__DIR__.'/../mdb/mdbUsuario.php');
    
    $idUsuario = $_SESSION['ID_USUARIO'];
    $rol = $_SESSION['ROL_USUARIO'];
    $nombre = $_SESSION['NOMBRE_USUARIO']; // post?
    $apellido = $_SESSION['APELLIDO_USUARIO']; // post?
    $correo = $_SESSION['CORREO_USUARIO'];
    $password = $_POST['password'];
    $idPrograma = $_SESSION['PROGRAMA_USUARIO'];
    $foto = $_SESSION['FOTO_USUARIO'];
    
    $usuario = new Usuario($idUsuario, $rol, $nombre, $apellido, $correo, $password, $idPrograma, $foto);
    editarUsuario($usuario);

    $_SESSION['PASSWORD_USUARIO'] = $password;

    header("Location: ../../perfil.php");
