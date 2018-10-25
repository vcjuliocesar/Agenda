<?php
namespace Agenda;

class Contact extends Users{
  protected $correo;
  protected $direccion;
  protected $telefono;

  public function __construct($name)
  {
      parent::__construct($name);
  }

  public function setCorreo($correo)
  {
    $this->correo = $correo;
  }

  public function getCorreo()
  {
    return $this->correo;
  }

  public function setDireccion($direccion)
  {
    $this->direccion = $direccion;
  }

  public function getDireccion()
  {
    return $this->direccion;
  }

  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
  }

  public function getTelefono()
  {
    return $this->telefono;
  }
}
