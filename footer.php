<footer class="page-footer black darken-3" style="margin-top: 120px; box-shadow: 0px 0px 2px white;">
  <div class="row wide-container">
    <div class="col s3">
      <h4 class="white-text bold underline">Makaroni Bang Zaad</h4>
      <p class="grey-text text-lighten-4">Cemilan gurih pedas favorit semua kalangan!</p>
    </div>
    <div class="col s2">
      <h5 class="white-text bold underline">Layanan</h5>
      <p><a class='dropdown-trigger white-text bold' href='#' data-target='dropdown1'>Info Toko 
        <i class='material-icons' style='display: inline-flex; vertical-align: top;'>arrow_drop_down</i>
      </a></p>
      <ul id='dropdown1' class='dropdown-content white'>
        <li><a href='aboutUs.php' class='black-text bold'>Tentang Kami</a></li>
        <li class='divider'></li>
        <li><a href='contactUs.php' class='black-text bold'>Kontak</a></li>
      </ul>
    </div>
    <div class="col s2">
      <h5 class="white-text bold">Alamat Kami</h5>
      <p class="bold">
        Senin - Minggu <br> 09.00 - 21.00 WIB
      </p>
      <p class="bold">
        Gg.sukamanah<br>Cikaret, Jawa Barat<br>Indonesia
      </p>
    </div>
    <div class="col s2">
      <h5 class="white-text bold">Sosial Media</h5>
      <a class="waves-effect waves-light blue lighten-1 btn" style="margin: 2px;">
        <i class="fa fa-facebook fa-fw"></i> Facebook
      </a>
      <a class="waves-effect waves-light pink lighten-1 btn" style="margin: 2px;">
        <i class="fa fa-instagram fa-fw"></i> Instagram 
      </a>
    </div>
    <div class="col s3">
      <h5 class="white-text bold">Partner Kami</h5>
      <img src="static/images/esteh.png" />
    </div>
  </div>

  <div class="footer-copyright">
    <div class="wide-container center-align">
      © <?= date('Y') ?> Makaroni Bang Zaad. All rights reserved.
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('.dropdown-trigger').dropdown({ coverTrigger: false });

      $('#pagination').pageMe({
        pagerSelector:'#myPager',
        activeColor: 'black',
        prevText:'Sebelumnya',
        nextText:'Berikutnya',
        showPrevNext:true,
        hidePageNumbers:false,
        perPage:5
      });
    });
  </script>
</footer>
