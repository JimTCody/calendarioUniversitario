<?php


/**
 * Actividad
 */
class Actividad
{
    private $id;
    private $title;
    private $start;
    private $end;
    private $color;
    private $idUsuario;
    private $idTipoActividad;

    public function __construct($id, $title, $start, $end, $color, $idUsuario, $idTipoActividad){
        $this->id = $id;
        $this->title = $title;
        $this->start = $start;
        $this->end = $end;
        $this->color = $color;
        $this->idUsuario = $idUsuario;
        $this->idTipoActividad = $idTipoActividad;

    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }
    public function setEnd($end)
    {
        $this->end = $end;
        return $this;
    }

    public function getEnd()
    {
        return $this->end;
    }
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdTipoActividad($idTipoActividad)
    {
        $this->idTipoActividad = $idTipoActividad;

        return $this;
    }

    public function getIdTipoActividad()
    {
        return $this->idTipoActividad;
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

