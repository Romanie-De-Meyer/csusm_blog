<?php require "db.php"; ?>

<?php
session_start();

$loggedin = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css styles -->
  <link rel="stylesheet" href="public/css/font.css" />
  <link rel="stylesheet" href="public/css/global.css" />
  <link rel="stylesheet" href="public/css/header.css" />

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />