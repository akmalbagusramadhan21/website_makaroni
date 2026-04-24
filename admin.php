<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makaroni Bang Zaad - Admin Panel</title>
  <?php 
    include "header.php";
    include "static/pages/side_nav.html";
    include "static/pages/admin_nav.php";
    require_once "includes/class_autoloader.php";
  ?>
</head>
<body>
  <div class="row" style="margin-top: 100px; justify-content: center; display: flex; flex-wrap: wrap; gap: 30px;">
    
    <!-- SignUps Card -->
    <div class="col s12 m6 l3">
      <div class="card blue darken-1">
        <div class="card-content white-text">
          <span class="card-title">SignUps</span>
          <div class="center-align" id="signup">
            <?php 
              $sql = "SELECT * FROM Members";
              $conn = new Dbhandler();
              $result = $conn->conn()->query($sql) or die($conn->conn()->error);
              $signUpCount = $result->num_rows;
              echo "<h5>$signUpCount</h5>";
            ?>
            <i class="material-icons white-text">supervisor_account</i>
          </div>
        </div>
        <div class="card-action">
          <a href="admin_report.php#user">View Report</a>
          <a href="admin_manage_users.php">Manage Users</a>
        </div>
      </div>
    </div>

    <!-- Products Card -->
    <div class="col s12 m6 l3">
      <div class="card amber darken-4">
        <div class="card-content white-text">
          <span class="card-title">Products</span>
          <div class="center-align">
            <?php 
              $sql = "SELECT * FROM Items";
              $conn = new Dbhandler();
              $result = $conn->conn()->query($sql) or die($conn->conn()->error);
              $productCount = $result->num_rows;
              echo "<h5>$productCount</h5>";
            ?>
            <i class="material-icons white-text">category</i>
          </div>
        </div>
        <div class="card-action">
          <a href="admin_report.php#product">View Report</a>
          <a href="admin_manage_products.php">Manage Products</a>
        </div>
      </div>
    </div>

    <!-- Total Orders Card -->
    <div class="col s12 m6 l3">
      <div class="card green darken-1">
        <div class="card-content white-text">
          <span class="card-title">Total Orders</span>
          <div class="center-align" id="order">
            <?php 
              $sql = "SELECT M.*, O.*, P.* FROM Members M, Orders O, Payment P
                      WHERE M.PrivilegeLevel = 0 AND P.OrderID = O.OrderID AND M.MemberID = O.MemberID";
              $conn = new Dbhandler();
              $result = $conn->conn()->query($sql) or die($conn->conn()->error);
              $orderCount = $result->num_rows;
              echo "<h5>$orderCount</h5>";
            ?>
            <i class="material-icons white-text">shopping_cart</i>
          </div>
        </div>
        <div class="card-action">
          <a href="admin_report.php#order">View Report</a>
          <a href="admin_view_orders.php">Manage Orders</a>
        </div>
      </div>
    </div>

    <!-- Today's Orders Card -->
    <div class="col s12 m6 l3">
      <div c
