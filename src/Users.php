<?php
namespace Agenda;
use Agenda\DatabaseModel;

class Users extends DatabaseModel {
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    protected $id;

    public function __construct()
    {
      $this->db_name = "agenda";
    }

    public function get($user_email = '')
    {
      if($user_email != '') {
        $this->query = "SELECT * FROM Users WHERE email = '$user_email';";
        $this->get_results_from_query();
      }

      if(isset($this->rows[0][0]) && is_array($this->rows[0][0])) {
        foreach($this->rows[0][0] as $propiedad => $valor) {
          $this->{$propiedad} = $valor;
        }
      }
    }

    public function set($user_data = array())
    {
        if(array_key_exists('email', $user_data)) {
          $this->get($user_data['email']);
          if($user_data['email'] != $this->email) {
            foreach($user_data as $campo => $valor) {
              $$campo = $valor;
            }
            $this->query = "INSERT INTO Users (nombre,apellido,email,telefono)
                            VALUE ('$nombre','$apellido','$email',$telefono);";
            $this->execute_single_query();
          }
        }
    }

    public function edit()
    {
      //todo
    }
    protected function delete()
    {
      //todo
    }

    public function __destruct()
    {
      $this->db_name = null;
    }
}
