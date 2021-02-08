<?php

// Conexão com banco de dados, padrão singleton
class Conexao
{
  private static $con;
  public static function getConn()
  { 
    if (!isset(self::$con)) :
      self::$con = new \PDO("mysql:host=localhost;port=3306;dbname=crud;charset=utf8", 'root', ''); // Se não existir a instancia, ele cria uma nova
    endif;
    return self::$con;
  }
}
