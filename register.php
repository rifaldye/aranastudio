<?php
include "header.php";
if (isset($_SESSION['username'])){
  header("location:index.php");
}
?>

<div class="box" style="width: 500px; height: auto; background-color:#F8F8F8; padding: 5px 30px 30px 35px; margin: 40px auto; border-radius: 15px;">
  <div class="alert_form">
    <?php
    if (isset($_POST['submit'])) {
      if (isset($_POST['captcha']) && $_POST['captcha'] == $_SESSION['code']) {
        $name = mysqli_escape_string($conn, $_POST['name']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $telp = mysqli_escape_string($conn, $_POST['telp']);
        $username = mysqli_escape_string($conn, $_POST['username']);
        $password = mysqli_escape_string($conn, $_POST['password']);
        $repassword = mysqli_escape_string($conn, $_POST['repassword']);
        if (!empty($name) && !empty($email) && !empty($telp) && !empty($username) && !empty($password) && !empty($repassword)) {
          if ($password == $repassword) {
            $query = "SELECT * FROM user WHERE email='$email'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 0) {
              $query = "SELECT * FROM user WHERE username='$username'";
              $result = mysqli_query($conn, $query);
              if (mysqli_num_rows($result) == 0) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO user SET name='$name' ,email='$email' , telp='$telp' , username='$username' , password='$password'";
                $result = mysqli_query($conn, $query);
                if ($result) {
                  header('location:login.php');
                } else {
                  echo "pendaftaran gagal";
                }
              } else {
                echo "username telah digunakan";
              }
            } else {
              echo "email telah digunakan";
            }
          } else {
            echo "password dan repassword tidak sesuai";
          }
        } else {
          echo "form tidak boleh kosong";
        }
      } else {
        echo "captcha salah";
      }
    }
    ?>
  </div>
  <form action="" method="POST"><br>
    <h2 class="text-center font-weight-bold">
      <font color=#302A69>Register
    </h2>

    <div class="form-group">
      <font color="black"><label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Input Name">
    </div>
    <div class="form-group">
      <label for="InputEmail">Email</label>
      <input type="email" class="form-control" id="InputEmail" name="email" aria-describeby="emailHelp" placeholder="Email Address">
    </div>
    <div class="form-group">
      <label for="InputHp">Phone Number</label>
      <input type="text" class="form-control" id="InputHp" name="telp" placeholder="Input Phone Number">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Input Username">
    </div>
    <div class="form-group">
      <label for="InputPassword">Password</label>
      <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Input Password">
    </div>
    <div class="form-group">
      <label for="InputPassword">Re-enterPassword</label>
      <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Re-enter Password">
    </div>
    <div class="form-group">
      <label>Captcha</label><br>
      <img src="captcha.php" alt="gambar" />
    </div>
    <div class="form-group">
      <input class="form-control" name="captcha" value="" placeholder="kode captcha" maxlength="7" />
    </div>
    <button type="submit" name="submit" class="btn" style="color: white; background: #302A69;  padding: 7px 190px 8px 190px;  text-align: center;">Register</button>
    <div class="form-footer mt-2">
      <p> already have an account?</font><a class="link" href="login.php" style="color: #3225AF"> Login</a></p>
      </font><br>
    </div>
  </form>
  </section>
  </section>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
  </body>

  </html>