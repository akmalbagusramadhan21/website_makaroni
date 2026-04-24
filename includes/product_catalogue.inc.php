<?php
require_once "class_autoloader.php";

// Ganti konstanta agar sesuai dengan tema makanan & minuman
const CATEGORY_NAMES = ["Makanan", "Minuman"];
const BRAND_NAMES = ["Makaroni", "Es Teh", "Dimsum", "Kentang Goreng", "Jagung Goreng"];
const SORT_NAMES = ["Harga Rendah ke Tinggi", "Harga Tinggi ke Rendah"];
const VIEW_NAMES = ["List"];

// Fungsi untuk memformat harga ke dalam format Rupiah
function formatRupiah($angka) {
  return "Rp " . number_format($angka, 0, ',', '.');
}

function searchItems($category, $brand, $sort) {
  $searchName = "";
  if (isset($_GET["query"])) $searchName = $_GET["query"];

  $sql = "SELECT ItemID FROM Items WHERE (Name LIKE '%$searchName%')";

  if ($category != -1) $sql .= " AND Category = $category";

  if ($brand != -1) {
    $brandName = BRAND_NAMES[$brand];
    $sql .= " AND Brand = '$brandName'";
  }

  if ($sort == 0) $sql .= " ORDER BY SellingPrice ASC";
  else if ($sort == 1) $sql .= " ORDER BY SellingPrice DESC";

  $sql .= " LIMIT 50";

  $conn = new Dbhandler();
  $result = $conn->conn()->query($sql) or die($conn->conn()->error);

  $items = array();

  if ($result->num_rows < 1) {
    echo "<h5 class='white-text bold center' style='padding-top: 150px'>
      0 hasil ditemukan. Silakan coba pencarian atau filter lain.</h5>";
    return;
  }

  while ($row = $result->fetch_assoc()) {
    $itemID = $row["ItemID"];
    array_push($items, new Item($itemID));
  }

  generateItemList($items);
}

/**
 * @param Item[] $items
 */
function generateItemList($items) {
  $itemCount = count($items);
  $itemIdx = 0;

  while ($itemIdx < $itemCount) {
    echo("<div class='row'>");

    for ($i = 0; $itemIdx < $itemCount && $i < 4; $itemIdx++) {
      $item = $items[$itemIdx];

      if ($item->getQuantityInStock() <= 0) {
        continue; // Skip jika stok habis
      }

      $i++;

      $itemID = $item->getItemID();
      $image = $item->getImage();
      $name = $item->getName();
      $price = $item->getSellingPrice();
      $displayPrice = formatRupiah($price);

      $hasReviews = $item->HasReviews();
      $avgRatings = $item->getAvgRatings();

      echo("
      <div class='col s3'>
        <a href='product.php?item_id=$itemID'>
          <div class='selectable-card' style='height: 480px; min-width: 300px'>
            <img class='shadow-img center' src='product_images/$image' style='height: 300px; max-width: 300px; display: block; margin: 0 auto; object-fit:scale-down;'>
            <h6 class='center bold white-text'>$name</h6>
            <table class='center'>
              <tbody class='center'>
                <h6 class='amber-text' style='padding-top: 60px'>$displayPrice</h6>
                <tr>");

      if ($hasReviews) {
        $intRating = $avgRatings * 5 / 100;
        $reviews = $item->GetReviews();
        $reviewCount = count($reviews);

        if ($intRating >= 10) {
          $intRating = $intRating / $reviewCount;
          $intRating = number_format((float)$intRating, 2, '.', '');
          $avgRatings = $intRating * 20;
        }

        echo("
          $intRating
          <div class='ratings' style='padding-bottom: 5px'>
            <div class='empty-stars'></div>
            <div class='full-stars' style='width: $avgRatings%'></div>
          </div>");
      } else {
        echo("- | ");
      }

      echo($hasReviews ? " | $reviewCount Ratings" : "No ratings yet");

      echo($item->checkSoldCount() ? " | " . $item->checkSoldCount() . " Sold" : " | 0 Sold");

      echo("</tr>
              </tbody>
            </table>
          </div>
        </a>
      </div>");
    }

    echo("</div>"); // tutup row
  }
}
