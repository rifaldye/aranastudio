<?php
include "header.php";
if (!isset($_SESSION['username'])) {
  header("location:index.php");
}
if (!isset($_GET['id'])) {
  header("location:index.php");
}
$id = $_GET['id'];
$query = "SELECT * FROM post WHERE id=$id";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_array($result);
?>
<section class="page-section bg-light" id="portfolio" style="width: 50%; margin-left: 400px; border-radius: 20px; padding-top: 20px;">
  <h1 style="margin-top: 80px; color: #302A69;">Form Update Project</h1>
  <div class="alert_form">
    <?php
    if (isset($_POST['submit'])) {
      $judul = mysqli_escape_string($conn, $_POST['judul']);
      $link = mysqli_escape_string($conn, $_POST['link']);
      $kategori = mysqli_escape_string($conn, $_POST['kategori']);
      $deskripsi = mysqli_escape_string($conn, $_POST['deskripsi']);
      if (!empty($judul) && !empty($link) && !empty($kategori) && !empty($deskripsi)) {
        $query = "UPDATE post SET judul='$judul' ,link='$link' ,kategori='$kategori' ,deskripsi='$deskripsi' WHERE id=$id";
        if(mysqli_query($conn,$query)){
          header("location:mywork.php");
        }else{
          echo "gagal memasukan data ke dalam database";
        }
      } else {
        echo "form tidak boleh kosong";
      }
    }
    ?>
  </div>
  <form class="cf" method="POST" enctype="multipart/form-data">
    <div class="half left cf">
      <input type="text" id="input-name" name="judul" placeholder="Judul" value="<?= $post['judul'] ?>">
      <input type="text" id="input-email" name="link" placeholder="Link" value="<?= $post['link'] ?>">
      <br>
      <select name="kategori" id="input-subject" class="form-control" style="background-color: white;">
        <option value="<?= $post['kategori'] ?>"><?= $post['kategori'] ?></option>
        <?php
        $query2 = "SELECT * FROM kategori";
        $result2 = mysqli_query($conn, $query2);
        while ($data = mysqli_fetch_array($result2)) {
          if ($data['kategori'] != $post['kategori']) {
        ?>
            <option value="<?= $data['kategori'] ?>"><?= $data['kategori'] ?></option>
        <?php }
        } ?>
      </select>

    </div>
    <div class="half right cf">
      <textarea name="deskripsi" type="text" id="input-desc" placeholder="Deskripsi"><?= $post['deskripsi'] ?></textarea>
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