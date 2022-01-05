<?php
include "header.php";
if (!isset($_SESSION['username'])) {
  header("location:index.php");
}
?>

<section class="page-section bg-light" id="portfolio">
  <div class="container">
    <div class="text-center" style="margin-top: auto;">
      <br><br><br><br>
      <h2 class="section-heading text-uppercase">Your Works </h2> <br>
    </div>
    <div class="row">
      <?php
      $batas   = 10;
      $halaman = @$_GET['halaman'];
      if (empty($halaman)) {
        $posisi  = 0;
        $halaman = 1;
      } else {
        $posisi  = ($halaman - 1) * $batas;
      }
      $no = $posisi + 1;
      $sql = "select * from post where user_id=$user_id limit $posisi,$batas";
      $hasil = mysqli_query($conn, $sql);
      while ($data = mysqli_fetch_array($hasil)) {
      ?>
        <div class="col-lg-3 col-sm-6 mb-4" data-aos="zoom-in">
          <!-- Portfolio item 1-->
          <div class="portfolio-item">
            <a class="portfolio-link" data-bs-toggle="modal" href="detail.php?id=<?= $data['id'] ?>">
              <div class="zoom">
                <img class="img-fluid" src="asset/<?= $data['gambar'] ?>" alt="..." />
              </div>
            </a>
            <div class="portfolio-caption">
              <div class="portfolio-caption-heading"><?= $data['judul'] ?></div>
              <div class="portfolio-caption-subheading text-muted"><?= substr($data['deskripsi'], 0, 100) . "..." ?></div>
            </div>
          </div>
        </div>
      <?php }
      ?>


      <div class="pagination col-12" >
        <?php
        $query2     = mysqli_query($conn, "select * from post where user_id=$user_id");

        $jmldata    = mysqli_num_rows($query2);
        $jmlhalaman = ceil($jmldata / $batas)
        ?>
        <ul class="pagination">
          <?php
          for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i != $halaman) {
              echo "<li class='page-item'><a class='page-link' href='mywork.php?halaman=$i'>$i</a></li>";
            } else {
              echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
            }
          }
          ?>
        </ul>
      </div>
</section>



<footer>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <p class="pt-4 pb-2">
          2021 Copyright Aranastudio. All Rights Reserved.
        </p>
      </div>
    </div>
  </div>
</footer>

</div>


<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.slim.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="/script/navbar-scroll.js"></script>
</body>

</html>