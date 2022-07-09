<?php
  declare(strict_types = 1);

  session_start();

  if (!isset($_SESSION['id'])) die(header('Location: /'));

  require_once(__DIR__.'/../database/connection.db.php');
  require_once(__DIR__.'/../database/cart.class.php');

  $db = getDatabaseConnection();

  $id = intval($_GET['id']);


  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array($id);
  }else if(!in_array($id, $_SESSION['cart'] )){// check if id is already in cart
    array_push($_SESSION['cart'], $id);
  }


  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>