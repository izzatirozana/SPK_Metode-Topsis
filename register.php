<?php

	require 'koneksi.php';
	session_start();

	$error = '';
	$validate = '';

	//mengecek apakah form registrasi di submit atau tidak
	if( isset($_POST['submit']) ){
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($selectdb, $username);

        $name     = stripslashes($_POST['name']);
        $name     = mysqli_real_escape_string($selectdb, $name);

        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($selectdb, $password);
        
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($password)) ){

                //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                if( cek_nama($username,$selectdb) == 0 ){

                    //hashing password sebelum disimpan didatabase
                    $pass  = password_hash($password, PASSWORD_DEFAULT);

                    //insert data ke database
                    $query = "INSERT INTO users (id, nama, username, password) VALUES ('', '$name','$username','$pass')";

                    $result   = mysqli_query($selectdb, $query);

                    if (mysqli_connect_errno()) {
					    // echo "gagal : " . mysqli_connect_error();
					    echo "<script>alert('Gagal Mendaftar!');</script>";
					} else{
					    echo "<script>alert('Pendaftaran Berhasil!');window.location='login.php'</script>";
					} 
                }else{
                        echo "<script>alert('Username Sudah Terdaftar!!');</script>";
                }
            }
             
        }else {
            $error =  'Data tidak boleh kosong !!';
        }


    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username,$selectdb){
        $nama = mysqli_real_escape_string($selectdb, $username);
        $query = "SELECT * FROM users WHERE username = '$username'";
        if( $result = mysqli_query($selectdb, $query) ) return mysqli_num_rows($result);
    }

?>


<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<style type="text/css">
  
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

 * {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Poppins', sans-serif
 }

 body {
     background: #ecf0f3
 }

 .wrapper {
     max-width: 350px;
     min-height: 400px;
     margin: 30px auto;
     padding: 40px 30px 30px 30px;
     background-color: #ecf0f3;
     border-radius: 15px;
     box-shadow: 13px 13px 20px #085e0c, -13px -13px 20px #0c8a12
 }


 .wrapper .name {
     font-weight: 600;
     font-size: 1.4rem;
     letter-spacing: 1.3px;
     padding-left: 10px;
     color: #555
 }

 .wrapper .form-field input {
     width: 100%;
     display: block;
     border: none;
     outline: none;
     background: none;
     font-size: 1.2rem;
     color: #666;
     padding: 10px 15px 10px 10px
 }

 .wrapper .form-field {
     padding-left: 10px;
     margin-bottom: 20px;
     border-radius: 20px;
     box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
 }

 .wrapper .form-field .fas {
     color: #555
 }

 .wrapper .btn {
     box-shadow: none;
     width: 100%;
     height: 40px;
     background-color: #03A9F4;
     color: #fff;
     border-radius: 25px;
     box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
     letter-spacing: 1.3px
 }

 .wrapper .btn:hover {
     background-color: #039BE5
 }

 .wrapper a {
     text-decoration: none;
     font-size: 0.8rem;
     color: #03A9F4
 }

 .wrapper a:hover {
     color: #039BE5
 }

 @media(max-width: 380px) {
     .wrapper {
         margin: 30px 20px;
         padding: 40px 15px 15px 15px
     }
 }

</style>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Zoufarm | Landing, Corporate &amp; Business Templatee</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.min.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

      <!-- menu -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container" ><a class="navbar-brand" href="index.php"><img class="d-inline-block align-top img-fluid" src="assets/img/gallery/logo-icon.png" alt="" width="50" /><span class="text-theme font-monospace fs-4 ps-2">Bebeed</span></a><button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <!-- <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="index.php">Home</a></li> -->
            </ul>
            <!-- <form class="d-flex"><button class="btn btn-lg btn-dark bg-gradient order-0" type="submit">Masuk</button></form> -->
          </div>
        </div>
      </nav>

      <!-- Log in -->
      <section class="py-0">
        <div class="bg-holder" style="background-image:url(assets/img/illustrations/how-it-works.png);background-position:center bottom;background-size:cover;"></div>

        <!--/.bg-holder-->
        <div class="container-lg">
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-9 col-xl-5 text-center pt-8">
              <div class="wrapper">
                <div class="text-center name"> Registrasi </div>
                <form class="p-3 mt-3" action="register.php" method="post">
                    <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="name" placeholder="Nama" required=""> </div> 
                    <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="username" placeholder="Username" required=""> </div>
                    <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" placeholder="Password" required=""> </div>
                    <button class="btn mt-3" type="submit" name="submit">Sign Up</button>
                </form>
                <div class="text-center">Sudah Punya Akun ?<a href="login.php"> Sign In</a> </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ====================FOOTER========================-->

      <section class="py-0" id="contact">
        <div class="container">
          <div class="row justify-content-lg-between">
          <hr class="text-300 mb-0" />
          <div class="row flex-center py-5">
            <div class="col-12 col-sm-8 col-md-6 text-center text-md-start"> <a class="text-decoration-none" href="#"><img class="d-inline-block align-top img-fluid" src="assets/img/gallery/logo-icon.png" alt="" width="40" /><span class="text-theme font-monospace fs-3 ps-2">Beebed</span></a></div>
            <div class="col-12 col-sm-8 col-md-6">
              <p class="fs--1 text-dark my-2 text-center text-md-end">&copy; This template is made with&nbsp;<svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#76C279" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="text-dark" href="https://themewagon.com/" target="_blank">ThemeWagon </a></p>
            </div>
          </div>
          </div>
        </div>
      </section>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="assets/js/theme.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet">
  </body>

</html>