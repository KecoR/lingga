<?php
  error_reporting(0);
  ob_start();

  session_start();

  if($_SESSION['user'] || $_SESSION['admin']) {
    header("location:index.php");
  } else {
?>

<div id="app">
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="card card-primary margin-top">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Login" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php
    if(isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $ambil = $koneksi->query("SELECT * FROM tbluser where username='$username' AND pass='$password'");

      $data = $ambil->fetch_assoc();
      
      if($ambil->num_rows >= 1) {
        session_start();

        $_SESSION[username] = $data[username];
        $_SESSION[pass] = $data[pass];
        $_SESSION[level] = $data[level];

        if($data['level'] == "admin"){
          $_SESSION['admin'] = $data[id];
          header("location:index.php");
        } else if($data['level']== "user"){
          $_SESSION['user'] = $data[id];
          header("location:index.php");
        }
      } else {
        ?>
          <script type="text/javascript">
              alert("Login Gagal Username dan Password Salah.. Silahkan Ulangi Lagi");
          </script>
        <?php
      }
    }
  }
?>