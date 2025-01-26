<?php


require_once ("DataSource.php");
require_once (__DIR__."/../entidad/Actividad.php");


/**
 * Description of UsuarioDAO
 *
 * @author oa
 */
class ActividadDAO {
    
    //Este archivo es similar a HomeModel.php

   public function guardarActividad(Actividad $actividad){
        $data_source = new DataSource();
        // Insertar la actividad en la tabla "Actividad"
        $stmt1 = "INSERT INTO Actividad VALUES (NULL, :title, :start, :end, :color, :idUsuario, :idTipoActividad)";
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':title' => $actividad->getTitle(),
            ':start' => $actividad->getStart(),
            ':end' => $actividad->getEnd(),
            ':color' => $actividad->getColor(),
            ':idUsuario' => $actividad->getIdUsuario(),
            ':idTipoActividad' => $actividad->getIdTipoActividad()
        ));

        if ($resultado) {
            // Obtener el último ID insertado
            $idActividad = $data_source->obtenerUltimoIdInsertado();
    
            // Insertar la relación en la tabla "ActividadXUsuario"
            $stmt2 = "INSERT INTO ActividadxUsuario VALUES (:idActividad, :idUsuario)";
            $resultadoRelacion = $data_source->ejecutarActualizacion($stmt2, array(
                ':idActividad' => $idActividad,
                ':idUsuario' => $_SESSION['ID_USUARIO']
            ));
    
            if ($resultadoRelacion) {
                return $resultadoRelacion;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function modificarActividad(Actividad $actividad){
        $data_source = new DataSource();
        // Modificar la actividad en la tabla "Actividad"
        $stmt1 = "UPDATE Actividad SET title = :title, start = :start, end = :end, color = :color, idTipoActividad = :idTipoActividad WHERE id = :id AND (idUsuario = :idUsuario OR idUsuario IS NULL)";
        
        if($_SESSION['ROL_USUARIO'] == 2 || $_SESSION['ROL_USUARIO'] == 3){
            $resultado = $data_source->ejecutarActualizacion($stmt1, array(
                ':id' => $actividad->getId(),
                ':title' => $actividad->getTitle(),
                ':start' => $actividad->getStart(),
                ':end' => $actividad->getEnd(),
                ':color' => $actividad->getColor(),
                ':idUsuario' => NULL,
                ':idTipoActividad' => $actividad->getIdTipoActividad()
            ));
        }else{
            $resultado = $data_source->ejecutarActualizacion($stmt1, array(
                ':id' => $actividad->getId(),
                ':title' => $actividad->getTitle(),
                ':start' => $actividad->getStart(),
                ':end' => $actividad->getEnd(),
                ':color' => $actividad->getColor(),
                ':idUsuario' => $actividad->getIdUsuario(),
                ':idTipoActividad' => $actividad->getIdTipoActividad()
            ));
        }
        
        
        return $resultado;
    }
    
    public function eliminarActividad(Actividad $actividad){
        $data_source = new DataSource();
        
        
        $stmt2 = "DELETE FROM ActividadxUsuario WHERE idActividad = :idActividad AND idUsuario = :idUsuario"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt2, array(
            ':idActividad' => $actividad->getId(),
            ':idUsuario' => $actividad->getIdUsuario()
            )
        );
        
        if ($resultado) {
           
            //$stmt1 = "DELETE FROM Actividad WHERE id = :id AND idUsuario = :idUsuario";
            $stmt1 = "DELETE FROM Actividad WHERE id = :id AND (idUsuario = :idUsuario OR idUsuario IS NULL)";
            
            //$idUsuario = $actividad->getIdUsuario();

            $resultadoRelacion = $data_source->ejecutarActualizacion($stmt1, array(
                ':id' => $actividad->getId(),
                ':idUsuario' => $actividad->getIdUsuario()
            ));

            if ($resultadoRelacion) {
                return $resultadoRelacion;
            } else {

                if($_SESSION['ROL_USUARIO'] == 2 || $_SESSION['ROL_USUARIO'] == 3){
                    $resultadoRelacion = $data_source->ejecutarActualizacion($stmt1, array(
                        ':id' => $actividad->getId(),
                        ':idUsuario' => NULL
                    ));
                }else{
                    return false;
                }

                return $resultadoRelacion;
            }
        } else {
            return false;
        }
    }
    
    public function dragOver($fecha,$end, $id, $idUsuario)
    {
        $data_source = new DataSource();
        $sql = "UPDATE Actividad SET start = :start, end= :end WHERE id = :id AND idUsuario = :idUsuario";
        $resultado = $data_source->ejecutarActualizacion($sql, array(
            ':start'=>$fecha,
            ':end'=>$end,
            ':id'=>$id,
            ':idUsuario'=>$idUsuario
        ));
        return $resultado;
    }


    public function getActividades($idUsuarioConectado, $idTipoActividad = null)
    {
        $data_source = new DataSource();
        $sql = "SELECT * FROM Actividad WHERE (idUsuario = $idUsuarioConectado OR idUsuario IS NULL)";

        if ($idTipoActividad !== null) {
            // Agregar la condición para filtrar por el idTipoActividad si se proporciona
            $sql .= " AND idTipoActividad = $idTipoActividad";
        }

        return $data_source->selectAll($sql);
    }


}
