<?php

$host = "localhost";
$dbname = "AgendaPHP";
$user = "root";
$pass = "123456";

try {

  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

  //ativar modo de erros
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  $error = $e->getMessage();
  echo "Erro: $error";
}
