<?php

session_start();

include_once("url.php");
include_once("connection.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = $_POST;
  if ($data['type'] === 'create') {
    $name = $data['name'];
    $phone = $data['phone'];
    $observations = $data['observations'];

    $query = "insert into contacts (name, phone, observations) values (:name, :phone, :observations)";

    $smtm = $conn->prepare($query);
    $smtm->bindParam(":name", $name);
    $smtm->bindParam(":phone", $phone);
    $smtm->bindParam(":observations", $observations);


    try {

      $smtm->execute();
      $_SESSION['msg'] = "Contato criado com sucesso";
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "Erro: $error";
    }
  } else if ($data['type'] === "edit") {
    $id = $data['id'];
    $name = $data['name'];
    $phone = $data['phone'];
    $observations = $data['observations'];

    $query = "update contacts 
              set name = :name,
              phone = :phone, 
              observations = :observations 
              where id = :id";

    $smtm = $conn->prepare($query);
    $smtm->bindParam(":id", $id);
    $smtm->bindParam(":name", $name);
    $smtm->bindParam(":phone", $phone);
    $smtm->bindParam(":observations", $observations);

    try {

      $smtm->execute();
      $_SESSION['msg'] = "Contato atualizado com sucesso";
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "Erro: $error";
    }
  } else if ($data['type'] === "delete") {
    $id = $data['id'];

    $query = "delete from contacts where id = :id";

    $smtm = $conn->prepare($query);
    $smtm->bindParam(":id", $id);

    try {

      $smtm->execute();
      $_SESSION['msg'] = "Contato excluído com sucesso";
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "Erro: $error";
    }
  }
  header("Location: ../");
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $id;

  if (!empty($_GET)) {
    $id = $_GET["id"];
  }
  if (!empty($id)) {
    $query = "Select * from contacts where id = :id";
    $smtm = $conn->prepare($query);
    $smtm->bindParam(":id", $id);
    $smtm->execute();
    $contact = $smtm->fetch();
  } else {
    $contacts = [];

    $query = "Select * from contacts";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $contacts = $stmt->fetchAll();
  }
}

$conn = null;
