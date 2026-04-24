<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makaroni Bang Zaad</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./static/materialize/js/materialize.min.js" defer></script>
  <link rel="stylesheet" href="./static/css/base.css">
  <link rel="icon" type="image/png" href="./static/images/1.png">

  <style>
    nav {
      height: 80px;
      line-height: 80px;
    }
    .brand-logo img {
      height: 65px;
      margin-top: 5px;
    }
    .nav-wrapper .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .search-form {
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .search-form input {
      background-color: #1c1c1c;
      color: white;
      padding: 8px 12px;
      border: 1px solid #444;
      border-radius: 20px;
      width: 250px;
    }
    .search-form button {
      background: none;
      border: none;
      color: white;
      cursor: pointer;
      margin-top: 3px;
    }
    ul#nav-mobile {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    body {
      padding-top: 90px;
    }
  </style>
</head>

<?php
require_once "includes/class_autoloader.php";
session_start();

if (isset($_SESSION["Member"])) {
  $member = $_SESSION["Member"];
  $member = Member::CreateMemberFromID($member->getMemberID());
  $_SESSION["Member"] = $member;
  $memberID = $member->getMemberID();
  $username = $member->getUsername();
  $email = $member->getEmail();
  $privilegeLevel = $member->getPrivilegeLevel();
  $cart = $member->getCart();
  $orderItemCount = count($cart->getOrderItems());
  $orders = $member->getOrders();
}
?>

<body>
  <div class="nav-wrapper">
   <nav class="black">
  <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
    
    <!-- Logo & Search -->
    <div style="display: flex; align-items: center;">
      <!-- LOGO -->
      <a href="index.php" style="display: block; width: 70px; margin-right: 30px;">
        <img src="./static/images/2.png" alt="Logo" style="height: 90px; width: auto; border-radius: 100px; -moz-border-radius: 100px;">
      </a>

      <!-- FORM CARI -->
      <form action="product_catalogue.php" method="GET" style="display: flex; align-items: center; gap: 10px;">
        <input type="text" name="query" placeholder="Cari makaroni..."
          value="<?php if (isset($_GET["query"])) echo($_GET["query"]); ?>"
          style="padding: 8px 15px; width: 250px; background: #1c1c1c; color: white; border: 1px solid #444; border-radius: 25px;">
        <button type="submit" style="background: none; border: none;">
          <i class="material-icons white-text">search</i>
        </button>
      </form>
    </div>

    <!-- MENU KANAN -->
    <ul id="nav-mobile" class="right hide-on-med-and-down" style="display: flex; gap: 20px;">
      <?php
      if (isset($_SESSION["Member"])) {
        if ($privilegeLevel == 1) echo("<li><a href='admin.php' target='_blank'>Admin</a></li>");
        echo("
          <li><a href='cart.php?member_id=$memberID'>Keranjang
            <span class='new badge unglow' id='cart_badge'>$orderItemCount</span>
          </a></li>
          <li><a href='manage_profile.php?email=$email'>Profil</a></li>
          <li><a href='includes/logout.inc.php'>Keluar</a></li>
        ");
      } else {
        echo("<li><a href='login.php'>Masuk</a></li><li><a href='signup.php'>Daftar</a></li>");
      }
      ?>
    </ul>
  </div>
</nav>

  </div>

  <script>
    $(document).ready(function () {
      $('input.autocomplete').autocomplete({
        data: {
          'Makaroni Pedas': null,
          'Balado': null,
          'Keju': null,
          'Level 5': null
        }
      });
    });

    var path = window.location.pathname;
    var page = path.split("/").pop().split(".")[0];
    var links = document.getElementsByClassName(page);
    if (links[0] != null) links[0].classList.add("page_underline");
  </script>
</body>
