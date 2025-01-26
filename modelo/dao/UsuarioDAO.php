<?php


require_once ("DataSource.php");
require_once (__DIR__."/../entidad/Usuario.php");


/**
 * Description of UsuarioDAO
 *
 * @author Admin
 */
class UsuarioDAO {
    
    public function autenticarUsuario($correo, $password){  // Login
        $data_source = new DataSource();
      
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM Usuario WHERE correo = :correo AND password = :password", 
                                                    array(':correo'=>$correo,':password'=>$password));
        $usuario= null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["idUsuario"],
                        $data_table[$indice]["rol"],
                        $data_table[$indice]["nombre"],
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["correo"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["idPrograma"],
                        $data_table[$indice]["foto"]
                        );
            }
            return $usuario;
        }else{
            return null;
        }
    }

    public function registrarUsuario(Usuario $usuario){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO Usuario VALUES (NULL,:rol,:nombre,:apellido,:correo,:password,:idPrograma,:foto)"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':rol' => $usuario->getRol(),
            ':nombre' => $usuario->getNombre(),
            ':apellido' => $usuario->getApellido(),
            ':correo' => $usuario->getCorreo(),
            ':password' => $usuario->getPassword(),
            ':idPrograma' => $usuario->getIdPrograma(),
            ':foto' => $usuario->getFoto()
            )
        ); 

      return $resultado;
    }

    public function eliminarUsuario($idUsuario){
        $data_source = new DataSource();
        
        $stmt1 = "DELETE FROM Usuario WHERE idUsuario = :idUsuario"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':idUsuario' => $idUsuario
            )
        ); 

      return $resultado;
    }

    public function editarUsuario($usuario){
        $data_source = new DataSource();
        
        $stmt1 = "UPDATE Usuario SET rol = :rol, nombre = :nombre, apellido = :apellido, correo = :correo, password = :password, idPrograma = :idPrograma, foto = :foto WHERE idUsuario = :idUsuario"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':idUsuario' => $usuario->getIdUsuario(),
            ':rol' => $usuario->getRol(),
            ':nombre' => $usuario->getNombre(),
            ':apellido' => $usuario->getApellido(),
            ':correo' => $usuario->getCorreo(),
            ':password' => $usuario->getPassword(),
            ':idPrograma' => $usuario->getIdPrograma(),
            ':foto' => $usuario->getFoto()
            )
        ); 

      return $resultado;
    }

    public function recuperarContrasena($correo){
        $data_source = new DataSource();

        $stmt1 = "SELECT password FROM Usuario WHERE correo = :correo";
        $data_table = $data_source->ejecutarConsulta($stmt1, array(
            ':correo' => $correo
        ));
        
        if(count($data_table) == 1){
            return $data_table[0]['password'];
        } else {
            return null;
        }
    }

 /*   
    public function buscarUsuarioPorId($id){
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE id = :id", 
                                                    array(':id'=>$id));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["username"],
                    $data_table[$indice]["password"]
                    );
            }
            return $usuario;
        }else{
            return null;
        }
    }    
    
    
    public function leerUsuarios(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario");
        $usuario=null;
        $usuarios=array();
        foreach($data_table as $indice=>$valor){
            $usuario = new Usuario(
                $data_table[$indice]["id"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["username"],
                $data_table[$indice]["password"]
                );
                array_push($usuarios,$usuario);
        }
        return $usuarios;   
    }
    
    public function insertarUsuario(Usuario $usuario){
        $data_source= new DataSource();
        $sql = "INSERT INTO usuario VALUES (:id, :nombre, username, :password)";
        $resultado = $data_source->ejecutarActualizacion($sql, array(
            ':id'=>$usuario->getId(),
            ':nombre'=>$usuario->getNombre(),
            ':username'=>$usuario->getUsername(),
            ':password'=>$usuario->getPassword()
            )
        );
        return $resultado;
    }
    
    public function modificarUsuario(Usuario $usuario){
        $data_source= new DataSource();
        $sql = "UPDATE usuario SET nombre= :nombre, "
                . " username= :username, "
                . " password= :password "
                . " WHERE id= :id ";
        $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':nombre'=>$usuario->getNombre(),
                ':username'=>$usuario->getUsername(),
                ':password'=>$usuario->getPassword(),
                ':id'=>$usuario->getId()
            )
        );
        
        return $resultado;
    }
    
    public function borrarUsuario($id){
        $data_source = new DataSource();
        $usuario=  buscarUsuarioPorId($id);
        $resultado= $data_source->ejecutarActualizacion("DELETE FROM usuario WHERE id = :id", array('id'=>$id));
        
        return $resultado;
    }
    
*/
    
}
