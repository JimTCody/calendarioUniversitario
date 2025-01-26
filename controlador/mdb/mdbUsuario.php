<?php

require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");

    function autenticarUsuario($correo, $contrasena){
        $dao=new UsuarioDAO();
        $usuario = $dao->autenticarUsuario($correo, $contrasena);
        return $usuario;
    }

    function registrarUsuario(Usuario $usuario){
    
        $dao=new UsuarioDAO();
        $usuario = $dao->registrarUsuario($usuario);
        return $usuario;
    }

    function eliminarUsuario($idUsuario){
        $dao=new UsuarioDAO();
        $dao->eliminarUsuario($idUsuario);
    }

    function editarUsuario($usuario){
        $dao=new UsuarioDAO();
        $dao->editarUsuario($usuario);
    }

    function recuperarContrasena($correo){
        $dao=new UsuarioDAO();
        $password = $dao->recuperarContrasena($correo);
        return $password;
    }

/*

    function buscarUsuarioPorId($id){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $usuario = $dao->buscarUsuarioPorId( $id);
        return $usuario;
    }

    function leerUsuarios(){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $usuarios = $dao->leerUsuarios();
        return $usuarios;
    }


    

    function modificarUsuario($usuario){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $resultado=$dao->modificarUsuario($usuario);
        return $resultado;
    }

    function borrarUsuario($id){
        require_once(__DIR__."/../../model/DAO/UsuarioDAO.php");
        $dao = new UsuarioDAO();
        $res=$dao->borrarUsuario($id);
        return $res;
    }
*/