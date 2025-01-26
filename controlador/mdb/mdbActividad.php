<?php
require_once(__DIR__."/../../modelo/dao/ActividadDAO.php");

    function guardarActividad(Actividad $actividad){
    
        $dao=new ActividadDAO();
        $resultado = $dao->guardarActividad($actividad);

        return $resultado;
    }

    function modificarActividad(Actividad $actividad){
        $dao=new ActividadDAO();
        $resultado = $dao->modificarActividad($actividad);
        return $resultado;
    }

    function eliminarActividad(Actividad $actividad){
        $dao = new ActividadDAO();
        $resultado = $dao->eliminarActividad($actividad);
        return $resultado;
    }

    function dragOver($fecha,$end, $id, $idUsuario){
        $dao = new ActividadDAO();
        $resultado = $dao->dragOver($fecha,$end, $id, $idUsuario);
        return $resultado;
    }
    

