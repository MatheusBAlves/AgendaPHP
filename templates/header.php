<?php
include_once("config/url.php");
include_once("config/process.php");

if (isset($_SESSION['msg'])) {
  $printMsg = $_SESSION['msg'];
  $_SESSION['msg'] = '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda de Contatos</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a href="<?= $BASE_URL ?>" class="navbar-brand">
          <img src="<?= $BASE_URL ?>img/logo.svg" alt="Agenda"></img>
        </a>
        <div>
          <div class="navbar-nav">
            <a href="<?= $BASE_URL ?>" class="nav-link active" id="home-link">Agenda</a>
            <a href="<?= $BASE_URL ?>create.php" class="nav-link active">Adicionar Contatos</a>
          </div>
        </div>
      </div>
    </nav>
  </header>