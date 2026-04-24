<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makaroni Bang Zaad - Cemilan Pedas Gurih</title>
  <?php 
    require "header.php"; 
    require_once "includes/class_autoloader.php";

    // Inisialisasi database
    $dbinit = new InitDB();
    $dbinit->initDbExec();
  ?>
</head>
<body>

  <div class="slider" style="width: 60%; margin: auto;">
    <ul class="slides">
      <li>
        <img src="./static/images/3.jpg"> 
        <div class="caption center-align">
          <h5 class="light grey-text text-lighten-3">Nikmati Sensasi Pedas Makaroni Bang Zaad!</h5>
        </div>
      </li>
      <li>
        <img src="./static/images/6.jpg"> 
        <div class="caption center-align">
          <h3 class="bold page-title">Makaroni Bang Zaad</h3>
          <h5 class="bold page-title">Renyah, Gurih, dan Bikin Nagih!</h5>
        </div>
      </li>
      <li>
        <img src="./static/images/12.jpg"> 
        <div class="caption center-align">
          <h5 class="bold page-title">Buruan Cobain Sekarang!!!</h5>
        </div>
      </li>
    </ul>
  </div>

  <div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="row" style="margin-bottom: -20px">
        <h4 class="underline white-text bold center">Varian Rasa</h4>
      </div>
      <div class="row hoverable">
        <div class="col hoverable">
          <a href="product_catalogue.php?category=0" class="hoverable">
            <div class="selectable-card hoverable" style="width: 300px; margin: 50px;">
              <img class="hoverable" src="static/images/10.jpg"/>
              <h5 class="white-text center bold">Pedas Original</h5>
              <p class="white-text center">Harga: Rp5.000</p>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="product_catalogue.php?category=1">
            <div class="selectable-card" style="width: 300px; margin: 50px;">
              <img src="./static/images/5.jpg"/>
              <h5 class="white-text center bold">Daun Jeruk Original</h5>
              <p class="white-text center">Harga: Rp5.000</p>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="product_catalogue.php?category=2">
            <div class="selectable-card" style="width: 300px; margin: 50px;">
              <img src="./static/images/15.jpg"/>
              <h5 class="white-text center bold">Keju Mozarella</h5>
              <p class="white-text center">Harga: Rp10.000</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="section" style="margin-top: 100px;">
    <div class="wide-container">
      <h3 class="white-text center">DIBUAT DENGAN CINTA & CABE ASLI</h3>
      <h5 class="white-text center">
        Di <b class="orange-text">Makaroni Bang Zaad</b>, kami menyajikan cemilan legendaris penuh rasa untuk menemani harimu!
      </h5>
    </div>
  </div>

  <div class="grid" style="margin-top: 20px; margin-bottom: 100px">
    <div class="grid">
      <h1 class="count red-text text-darken-4 bold center">5</h1>
      <h5 class="white-text center">Tahun Berdiri</h5>
    </div>
    <div class="grid">
      <h1 class="count red-text text-darken-4 bold center">15.000+</h1>
      <h5 class="white-text center">Pelanggan Puas</h5>
    </div>
    <div class="grid">
      <h1 class="count red-text text-darken-4 bold center">20</h1>
      <h5 class="white-text center">Kota Terlayani</h5>
    </div>
    <div class="grid">
      <h1 class="count red-text text-darken-4 bold center">100%</h1>
      <h5 class="white-text center">Kepuasan Dijamin</h5>
    </div>
  </div>

 <h3 class="white-text center">Video Produksi Kami</h3>

<video
  style="display: block; margin: 0 auto;"
  class="responsive-video"
  width="720"
  height="480"
  autoplay
  muted
  controls
>
  <source src="static/makaroni.mp4" type="video/mp4">
  Browser Anda tidak mendukung tag video.
</video>

  <h3 class="white-text center">KENAPA PILIH KAMI?</h3>
  <h6 class="white-text center">Bukan sekadar makaroni biasa!</h6>

  <div class="grid" style="margin-bottom: 0px;">
    <div class="grid">
      <div class="rounded-card-parent">
        <div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
          <img src="static/images/16.jpg" style="height: 130px; widht: auto;">
          <div class="row center">
            <h5 class="orange-text bold center">Bumbu Asli</h5>
            <p class="white-text center">Tanpa MSG berlebih</p>
          </div>
        </div>
      </div>
    </div>

    <div class="grid">
      <div class="rounded-card-parent">
        <div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
          <img src="static/images/12.jpg" style="height: 150px; widht: auto;">
          <div class="row center">
            <h5 class="orange-text bold center">Packing Rapi</h5>
            <p class="white-text center">Anti remuk saat pengiriman</p>
          </div>
        </div>
      </div>
    </div>

    <div class="grid">
      <div class="rounded-card-parent">
        <div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
          <img src="static/images/20.jpeg" style="height: 160px; widht: auto;">
          <div class="row center">
            <h5 class="orange-text bold center">Bisa Coba Dulu</h5>
            <p class="white-text center">Gratis tester untuk reseller</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <?php require "footer.php"; ?>
</body>

<script>
  $(document).ready(function(){
    $('.slider').slider({ full_width: true });

    $('.count').each(function () {
      $(this).prop('Counter',0).animate({
        Counter: $(this).text()
      }, {
        duration: 3000,
        easing: 'swing',
        step: function (now) {
          $(this).text(Math.ceil(now));
        }
      });
    });
  });
</script>
</html>
