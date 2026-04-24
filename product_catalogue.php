<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makaroni Bang Zaad - Cemilan Pedas Gurih</title>
  <?php 
    require_once "header.php";
    require_once "includes/product_catalogue.inc.php";
  ?>
</head>

<body>
  <main>
    <div class="row" style="padding-top: 15px;">
      <div class="col s2 center">
        <div id="rgb_hover" style="position: fixed;">
          <form id="form-filter" action="" method="GET">
            <input type="hidden" name="query" value="<?php if(isset($_GET["query"])) echo($_GET["query"]); ?>">

            <!-- Kategori -->
            <div class="section" style="margin-bottom: 100px;">
              <div class="col unglow">
                <ul id="sort_dropdown" class="dropdown-content black">
                  <li><a class="page-title" onclick="select_category(this)">Clear</a></li>
                  <li><a class="page-title" onclick="select_category(this)">Makanan</a></li>
                  <li><a class="page-title" onclick="select_category(this)">Minuman</a></li>
                </ul>
                <a class="btn dropdown-trigger" data-target="sort_dropdown" style="margin-top: 5px;">
                  <?php
                    $category = -1;
                    if (isset($_GET["category"])) $category = $_GET["category"];

                    echo($category != -1 ? CATEGORY_NAMES[$category] : "Select Category");
                    echo("<input type='hidden' name='category' value=$category>");
                  ?>
                  <i class="material-icons right">arrow_drop_down</i>
                </a>
              </div>
            </div>

            <!-- Brand -->
            <div class="section" style="margin-bottom: 100px;">
              <div class="col unglow">
                <ul id="choose_dropdown" class="dropdown-content black">
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Clear</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Makaroni</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Es Teh</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Dimsum</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Kentang Goreng</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Jagung Goreng</a></li>
                </ul>
                <a class="btn dropdown-trigger cyan" data-target="choose_dropdown" style="margin-top: 5px;">
                  <?php
                    $brand = -1;
                    if (isset($_GET["brand"])) $brand = $_GET["brand"];

                    echo($brand != -1 ? BRAND_NAMES[$brand] : "Select Brand");
                    echo("<input type='hidden' name='brand' value=$brand>");
                  ?>
                  <i class="material-icons right">arrow_drop_down</i>
                </a>
              </div>
            </div>

            <!-- Sort -->
            <div class="section">
              <div class="col unglow">
                <ul id="filter_dropdown" class="dropdown-content black">
                  <li><a class="cyan-text page-title" onclick="select_sort(this)">Clear</a></li>
                  <li><a class="cyan-text page-title" onclick="select_sort(this)">Harga Rendah ke Tinggi</a></li>
                  <li><a class="cyan-text page-title" onclick="select_sort(this)">Harga Tinggi ke Rendah</a></li>
                </ul>
                <a class="btn dropdown-trigger cyan" data-target="filter_dropdown" style="margin-top: 5px;">
                  <?php
                    $sort = -1;
                    if (isset($_GET["sort"])) $sort = $_GET["sort"];

                    echo($sort != -1 ? SORT_NAMES[$sort] : "Select Sort Type");
                    echo("<input type='hidden' name='sort' value=$sort>");
                  ?>
                  <i class="material-icons right">arrow_drop_down</i>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col s9" style="margin-bottom: 80px;">
        <?php
          searchItems($category, $brand, $sort);
        ?>
      </div>
    </div>
  </main>

  <script>
    // Inisialisasi langsung
    var form = document.getElementById("form-filter");
    var category = document.getElementsByName("category")[0];
    var brand = document.getElementsByName("brand")[0];
    var sort = document.getElementsByName("sort")[0];

    var categoryBy = {
      "Clear": -1,
      "Makanan": 0,
      "Minuman": 1
    };

    var brandBy = {
      "Clear": -1,
      "Makaroni": 0,
      "Es Teh": 1,
      "Dimsum": 2,
      "Kentang Goreng": 3,
      "Jagung Goreng": 4
    };

    var sortBy = {
      "Clear": -1,
      "Harga Rendah ke Tinggi": 0,
      "Harga Tinggi ke Rendah": 1
    };

    function select_category(selectedItem) {
      var categoryID = categoryBy[selectedItem.textContent];
      category.value = categoryID;
      form.submit();
    }

    function select_brand(selectedItem) {
      var brandID = brandBy[selectedItem.textContent];
      brand.value = brandID;
      form.submit();
    }

    function select_sort(selectedItem) {
      var sortID = sortBy[selectedItem.textContent];
      sort.value = sortID;
      form.submit();
    }
  </script>

  <?php include_once "footer.php"; ?>
</body>
</html>
