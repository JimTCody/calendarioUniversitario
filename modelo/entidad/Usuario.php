<?php


/**
 * Usuario
 */
class Usuario
{
    private $idUsuario;
    private $rol;
    private $nombre;
    private $apellido;
    private $correo;
    private $password;
    private $idPrograma;
    private $foto;

    public function __construct($idUsuario, $rol, $nombre, $apellido, $correo, $password, $idPrograma, $foto){
        $this->idUsuario = $idUsuario;
        $this->rol = $rol;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->password = $password;
        $this->idPrograma = $idPrograma;
        $this->foto = $foto;
    }
    
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }


    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setIdPrograma($idPrograma)
    {
        $this->idPrograma = $idPrograma;
        return $this;
    }

    public function getIdPrograma()
    {
        return $this->idPrograma;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

        
    public function toArray() {
        $vars = get_object_vars ( $this );
        $array = array ();
        foreach ( $vars as $key => $value ) {
            $array [ltrim ( $key, '_' )] = $value;
        }
        return $array;
    }
}

