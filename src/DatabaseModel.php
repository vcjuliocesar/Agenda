<?php
namespace Agenda;

use PDO;

abstract class DatabaseModel extends PDO {
  private static $db_host = 'localhost';
  private static $db_user = 'root';
  private static $db_pass = 'julio-dev';
  protected $db_name = 'mysql';
  protected $query;
  protected $rows = array();
  private $conn;

  #metodos abstractor para el CRUD
  abstract protected function get();
  abstract protected function set();
  abstract protected function edit();
  abstract protected function delete();

  /**
   * [open_connection conexion con la Bd ]
   * @return [void] [retorna un mensaje cuando la conexion es exitosa o no]
   */
  private function open_connection()
  {
    try{
      $this->conn = new PDO("mysql:host=".self::$db_host.";dbname=".$this->db_name."",self::$db_user,self::$db_pass);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully\n";
    }catch(PDOException $e){
      echo "Connection failed: ".$e->getMessage();
    }
  }

  /**
   * [close_connection desconaecta la base de datos]
   * @return [null] [destruye el objeto conn]
   */
  private function close_connection()
  {
    $this->conn = null;
  }

  /**
   * [execute_single_query ejecuta un query simple de tipo INSERT, DELETE, UPDATE]
   * @return [type] [description]
   */
  protected function execute_single_query()
  {
    $this->open_connection();
    $sql=$this->conn->prepare($this->query);
    $sql->execute();
    $this->close_connection();
  }
  /**
   * [get_results_from_query trae los resultados de una consulta en un Array]
   * @return [array] [arreglo de datos]
   */
  protected function get_results_from_query()
  {
    $this->open_connection();
    $result=$this->conn->prepare($this->query);
    $result->execute();
    while($this->rows[] = $result->fetchall(PDO::FETCH_ASSOC));
    $result = null;
    $this->close_connection();
    array_pop($this->rows);
  }
}
