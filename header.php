<?php
include "koneksi.php";
session_start();
$user_id = 0;
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="upload.css" rel="stylesheet" />
  <link href="style/main.css" rel="stylesheet" />
  <title>Aranastudio - Your Dream Project</title>
  <style>
    .zoom {
      overflow: hidden;
      margin: 0 auto;
    }

    .zoom img {
      width: 100%;
      transition: 0.5s all ease-in-out;
    }

    .zoom:hover img {
      transform: scale(1.2);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-white navbar-arana  navbar-fixed-top">
    <div class="container">
      <a href="index.php" class="navbar-brand navbar-logo-journal">
        <img src="images/logo.svg" alt="Logo" class="logo-journal" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"> </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <?php
          if (isset($_SESSION['username'])) {
          ?>
            <li class="nav-item text-center active">
              <a href="mywork.php" class="nav-link">My Work</a>
            </li>
          <?php
          }
          ?>
          <li class="nav-item text-center">
            <a href="ourwork.php" class="nav-link">Our Works</a>
          </li>
          <li class="nav-item text-center">
            <a href="about.php" class="nav-link">About Us</a>
          </li>
          <li class="nav-item text-center">
            <a href="https://www.instagram.com/aranastudio.id/" target="_blank" class="nav-link">Contact Us</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <?php
          if (isset($_SESSION['username'])) {
          ?>
            <li class="nav-item text-center">
              <a href="upload.php" class="btn btn-primary nav-link px-4 text-white " style="margin-right: 20px;">Upload</a>
            </li>
            <li class="nav-item text-center" >
              <a href="logout.php" class="btn btn-danger nav-link px-4 text-white" style="border-radius: 8px;">Logout</a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item text-center mr-xl-3">
              <a href="register.php" class="nav-link">Register</a>
            </li>
            <li class="nav-item text-center">
              <a href="login.php" class="btn btn-primary nav-link px-4 text-white">Login</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>