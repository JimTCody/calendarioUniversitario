<?php
    ob_start();
    session_start();
    
    require_once (__DIR__."/../mdb/mdbUsuario.php");
    require_once (__DIR__."/../../modelo/entidad/Usuario.php");

        //$rol = $_POST['rol'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $idPrograma = $_POST['idPrograma'];
        $foto = '/assets/img/perfil.png';
        $usuario = new Usuario(NULL, 1,$nombre, $apellido, $correo, $password, 1,$foto);
        $registro = registrarUsuario($usuario);
        if($registro){
            header("Location: ../../login.html");
        }else{ 
            header("Location: ../../login.html?msg=No se pudo realizar el registro");
        }
    

        
        
