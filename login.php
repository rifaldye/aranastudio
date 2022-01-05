<?php
include "header.php";
if(isset($_SESSION['username'])){
  header("location:index.php");
}
?>
<div class="box" style="width: 500px; background-color:#F8F8F8; padding: 5px 30px 30px 35px; margin: 200px auto; margin-top:80px; border-radius: 15px;">
  <div class="alert_form">
    <?php
    if (isset($_POST['submit'])) {
      $username = mysqli_escape_string($conn, $_POST['username']);
      $password = mysqli_escape_string($conn, $_POST['password']);

      if (!empty(trim($username)) && !empty(trim($password))) {
        $query = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if ($row != null && password_verify($password, $row['password'])) {
          $_SESSION['email'] = $row["email"];
          $_SESSION['user_id'] = $row["id"];
          $_SESSION['username'] = $row["username"];
          header("location:index.php");
        } else {
          echo "username atau password salah";
        }
      } else {
        echo "email atau password tidak boleh kosong";
      }
    }
    ?>
  </div>
  <form class="form-container" action="login.php" method="POST"><br>
                    <h2 class="text-center font-weight-bold"><font color =#302A69 >Login </h2>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Type your username">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Type your password">
                    </div>
                    <button type="submit" name="submit" class="btn" style="color: white; background: #302A69;  padding: 7px 190px 8px 190px;  text-align: center;">Login</button></font>
                    <div class="form-footer mt-2">
                         <font color = "black"><p> don't have an account yet?</font><a class="link" href="register.php" style="color: #3225AF"> Register</a></p></font>
                    </div>
                </form>

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