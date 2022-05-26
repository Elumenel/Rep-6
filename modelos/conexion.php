<?php
class Conexion {
  static public function conectar() {
    //XAMPP port=3306
    $link = new PDO('mysql:host=localhost; port=3306; dbname=castellarin_florencia', 'root','');
    $link -> exec('set names utf8');
    return $link;
  }
}
