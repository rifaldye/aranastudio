<?php
include "header.php";
if (!isset($_SESSION['username'])) {
  header("location:index.php");
}
?>
<section class="page-section bg-light" id="portfolio" style="width: 50%; margin-left: 400px; border-radius: 20px; padding-top: 20px;">
  <h1 style="margin-top: 80px; color: #302A69;">Form Upload Project</h1>
  <div class="alert_form">
    <?php
    if (isset($_POST['submit'])) {
      $judul = mysqli_escape_string($conn, $_POST['judul']);
      $link = mysqli_escape_string($conn, $_POST['link']);
      $kategori = mysqli_escape_string($conn, $_POST['kategori']);
      $deskripsi = mysqli_escape_string($conn, $_POST['deskripsi']);
      if (!empty($judul) && !empty($link) && !empty($kategori) && !empty($deskripsi)) {
        $images = $_FILES['gambar'];
        $rand = rand(0, 10000);
        $images_name = $rand . "-" . $images["name"];
        if (move_uploaded_file($images["tmp_name"], "asset/" . $images_name)) {
          $query = "INSERT INTO post SET judul='$judul' ,link='$link' , kategori='$kategori' , deskripsi='$deskripsi', gambar='$images_name' ,user_id=$user_id";
          if (mysqli_query($conn, $query)) {
            header("location:mywork.php");
          } else {
            echo "gagal memasukan data ke dalam database";
          }
        } else {
          echo "gagal mengupload gambar";
        }
      } else {
        echo "form tidak boleh kosong";
      }
    }
    ?>
  </div>
  <form class="cf" method="POST" enctype="multipart/form-data">
    <div class="half left cf">
      <input type="text" id="input-name" name="judul" placeholder="Judul">
      <input type="text" id="input-email" name="link" placeholder="Link">
      <br>
      <select name="kategori" id="input-subject" class="form-control" style="background-color: white;">
        <option value="">pilih</option>
        <?php
        $query2 = "SELECT * FROM kategori";
        $result2 = mysqli_query($conn, $query2);
        while ($data = mysqli_fetch_array($result2)) {
        ?>
          <option value="<?= $data['kategori'] ?>"><?= $data['kategori'] ?></option>
        <?php } ?>
      </select>
      <input type="file" name="gambar" placeholder=" File">
    </div>
    <div class="half right cf">
      <textarea name="deskripsi" type="text" id="input-desc" placeholder="Deskripsi"></textarea>
    </div>
    <input type="submit" name="submit" value="Submit" id="input-submit" style="color: white">
  </form>
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