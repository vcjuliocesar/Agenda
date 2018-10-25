<?php
namespace Agenda;
require '../vendor/autoload.php';

$Usuario = new Users();
$Usuario->get('usermail@outlook.com');
print($Usuario->nombre);

$new_user_data = array(
  'nombre' => 'Julio',
  'apellido' => 'castaneda',
  'email' => 'usermail@outlook.com',
  'telefono'=> '556789334'
);

$Usuario2 = new Users();
$Usuario2->set($new_user_data);
$Usuario2->nombre;
