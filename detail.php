<?php
require "header.php";
$id = $_GET['id'];
$query = "SELECT * FROM post WHERE id=$id";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_array($result);
$ids = $post['user_id'];
$query = "SELECT * FROM user WHERE id=$ids";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_array($result);
?>
<section class="page-section bg-white" id="portfolio">
  <div class="container">
    <?php
    if ($post['user_id'] == $_SESSION['user_id']) {
    ?>
      <a href="edit.php?id=<?= $post['id'] ?>" class="btn btn-warning">Update</a>
      <a href="delete.php?id=<?= $post['id'] ?>" class="btn btn-danger">Delete</a>
    <?php } ?>
    <div class="text-center" style="margin-top: auto;">
      <h2 class="section-heading text-uppercase" style="margin-right: 600px;">
        <a href="<?= $post['link'] ?>"> <?= $post['judul'] ?></a>
      </h2>
    </div>
    <div class="row">
      <div class="col-lg col-sm-6 mb-4" data-aos="zoom-in">
        <!-- Portfolio item 1-->
        <div class="portfolio-item">
          <a class="portfolio-link" data-bs-toggle="modal" href="detail.php">
            <div class="zoom">
              <img class="img-fluid" style="border-radius: 20px; " src="asset/<?= $post['gambar'] ?>" alt="..." />
            </div>
          </a>
          <div class="portfolio-caption">
            <div class="portfolio-caption-heading" style="text-align: left;">By <?= $user['username'] ?></div>
          </div>
        </div>
      </div>
      <div class="col-lg col-sm-6 mb-4">
        <div class="portfolio-item">
          <div class="portfolio-caption">
            <div class="portfolio-caption-subheading " style="text-align: justify;">
              <?= $post['deskripsi'] ?>
            </div>
          </div>
</section>

<!-- projek-->
<section class="page-section bg-light" id="portfolio">
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase" style="padding-top: 30px;">Project Lainnya</h2>
    </div>
    <div class="row">
      <?php
      $kategori = $post['kategori'];
      $query = "SELECT * FROM post WHERE kategori='$kategori' LIMIT 4";
      $result = mysqli_query($conn, $query);
      while ($data = mysqli_fetch_array($result)) {

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

      <?php
      }
      ?>
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
<!-- <section class="section-products">
        <div class="container container-products">
          <div class="row">
            <div class="col-12">
              <h2 class="text-primary text-center">
                Need Help For Your Smaller Tasks?
              </h2>
              <p class="text-center">Smaller task? We got you covered.</p>
            </div>
          </div>
          <div class="row">
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a href="#" class="component-products d-block p-3">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="background-image: url('images/product-1.png')"
                  ></div>
                </div>
                <div class="products-text">User Interface Design</div>
              </a>
            </div>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a href="#" class="component-products d-block p-3">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="background-image: url('images/product-2.png')"
                  ></div>
                </div>
                <div class="products-text">User Interface Design</div>
              </a>
            </div>
          </div>
        </div>
      </section> -->
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