<?php 
require 'koneksi.php'
 ?>

<?php 
  if (isset($_POST["tambahbibit"])) {
    $kode     = $_POST['kode'];
    $nama_bibit  = $_POST['nama_bibit'];
    $rasa     = $_POST['rasa'];
    $produksi = $_POST['produksi'];
    $tanah    = $_POST['tanah'];
    $iklim    = $_POST['iklim'];

    $rasa_angka = $produksi_angka = $tanah_angka = $iklim_angka = 0;

    if($rasa > 0 && $rasa <= 20){
            $rasa_angka = 1;
        } 
        elseif($rasa > 20 && $rasa <= 40){
            $rasa_angka = 2;
        }
        elseif($rasa > 40 && $rasa <= 60){
            $rasa_angka = 3;
        }
        elseif($rasa > 60 && $rasa <= 80){
            $rasa_angka = 4;
        }
        elseif($harga > 80 && $rasa <=100){
            $rasa_angka = 5;
        } 

    if($produksi < 5) {
      $produksi_angka = 1;
    }
    elseif($produksi >= 5 && $produksi < 5.5) {
      $produksi_angka = 2;
    }
    elseif($produksi >= 5.5 && $produksi < 6) {
      $produksi_angka = 3;
    }
    elseif($produksi >= 6 && $produksi < 6.5) {
      $produksi_angka = 4;
    }
    elseif($produksi >= 6.5) {
      $produksi_angka = 5;
    }

    if ($tanah == "Litosol") {
      $tanah_angka = 1;
    } 
    elseif($tanah == "Andosol") {
      $tanah_angka = 2;
    }
    

    if ($iklim == "Kemarau") {
      $iklim_angka = 1;
    }
    elseif($iklim == "Hujan") {
      $iklim_angka = 2;
    }
    elseif($iklim == "Kemarau-Hujan") {
      $iklim_angka = 3;
    }

    $sql = "INSERT INTO `alternatif` (`kode`, `nama_bibit`, `rasa`, `produksi`, `tanah`, `iklim`, `rasa_angka`, `produksi_angka`, `tanah_angka`, `iklim_angka`) 
        VALUES (:kode, :nama_bibit, :rasa, :produksi, :tanah, :iklim, :rasa_angka, :produksi_angka, :tanah_angka, :iklim_angka)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':kode', $kode);
    $stmt->bindValue(':nama_bibit', $nama_bibit);
    $stmt->bindValue(':rasa', $rasa);
    $stmt->bindValue(':produksi', $produksi);
    $stmt->bindValue(':tanah', $tanah);
    $stmt->bindValue(':iklim', $iklim);
    $stmt->bindValue(':rasa_angka', $rasa_angka);
    $stmt->bindValue(':produksi_angka', $produksi_angka);
    $stmt->bindValue(':tanah_angka', $tanah_angka);
    $stmt->bindValue(':iklim_angka', $iklim_angka);
    $stmt->execute();

    header("location:tambah-data.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>

   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>TUGAS SPK || grow.id</title>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets/css/theme.min.css" rel="stylesheet" />
    

</head>
<body>

	    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.php"><img class="d-inline-block align-top img-fluid" src="assets/img/gallery/logo-icon.png" alt="" width="50" /><span class="text-theme font-monospace fs-4 ps-1">Bebeed</span></a><button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium" aria-current="page" href="home.php">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium  active" href="tambah-data.php">Alternatif</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="hitung.php">Perhitungan</a></li>
              <!-- <li class="nav-item px-2"><a class="nav-link fw-medium" href="hasil">Rekomendasi</a></li> -->
            </ul>
            <form class="d-flex"><button class="btn btn-lg btn-dark bg-gradient order-0" type="submit">Sign Up</button></form>
          </div>
        </div>
      </nav>

      <section class="py-0" id="header" style="height: auto;">
        
        <!--/.bg-holder-->
        <div class="bg-holder d-none d-sm-block" style="background-image:url(assets/img/illustrations/bg.png);background-position: top left; background-size:225px 755px;"></div>
        <div class="bg-holder d-none d-md-block" style="background-image:url(assets/img/illustrations/hero-bg.png);background-position:right top;background-size:contain;"></div>

        <div class="container pt-8 pb-sm-4 opacity-85" >
          <div class="card min-vh-100 py-4" >
            <div class="card text-center pt-lg-4" style="padding-top: 1rem">
              <h2 class="fw-bold">Data Alternatif Padi</h2>
            </div>
            <div class="card dropdown-toggle-split pt-4">
              <table class="table table-stripped table-bordered table-hover text-dark">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama Bibit</th>
                    <th scope="col">Tingkat Kegemaran</th>
                    <th scope="col">Jumlah Produksi</th>
                    <th scope="col">Kondisi Tanah</th>
                    <th scope="col">Kondisi Iklim</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                $no = 1;
                $query = mysqli_query($selectdb, "select * from alternatif");
                while ($d = mysqli_fetch_array($query)) {
                 ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['kode']; ?></td>
                    <td><?php echo $d['nama_bibit']; ?></td>
                    <td><?php echo $d['rasa'], '%'; ?></td>
                    <td><?php echo $d['produksi'], ' Ton'; ?></td>
                    <td><?php echo $d['tanah']; ?></td>
                    <td><?php echo $d['iklim']; ?></td>
                    <td>
                      <a class="btn btn-warning btn-sm text-center" href="edit.php?kode=<?php echo $d['kode']; ?>">Edit</a>
                      <a class="btn btn-danger btn-sm text-center" href="hapus.php?kode=<?php echo $d['kode']; ?>"
                        onclick="return confirm('apakah anda yakin akan menghapus data ini?')">Hapus</a>
                    </td>
                  </tr>
                  <?php
                  } 
                  ?>
                </tbody>
              </table>
            </div>
            <center class="py-3 pb-5">
              <!-- <a href="#tambah" class="btn btn-secondary btn-lg btn-block" style="margin-right: 10px;">Tambah Alternatif</a> -->
              <a href="#matriks" class="btn btn-primary btn-lg btn-block">Lihat Nilai Matriks</a>
            </center>

            <div class="card mb-3 m-sm-2 " style="border-style: solid; border-color: dark; border-width: 2px; ">
              <center><h4 class="m-sm-3">Tambah Data Alternatif</h4></center>
              <div class="card">
                <form method="post" action="">
                  <!--kolom nama kode-->
                  <div class="form-group row m-sm-3">
                    <label class="col-sm-3 col-form-label">Kode Bibit</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="kode" >
                    </div>
                  </div>
                  <!--kolom nama bibit-->
                  <div class="form-group row m-sm-3">
                    <label class="col-sm-3 col-form-label">Nama Bibit</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama_bibit" >
                    </div>
                  </div>
                  <!--kolom cita rasa-->
                  <div class="form-group row m-sm-3">
                    <label class="col-sm-3 col-form-label">Tingkat Kegemaran (%)</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="rasa" >
                    </div>
                  </div>
                  <!--kolom jumlah produksi-->
                  <div class="form-group row m-sm-3">
                    <label class="col-sm-3 col-form-label">Jumlah Produksi (per Hektar)</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="produksi" >
                    </div>
                  </div>
                  <!--kolom tanah-->
                  <div class="form-group row m-sm-3">
                    <label class="col-sm-3 col-form-label">Jenis Tanah</label>
                    <div class="col-sm-9">
                      <select class="form-control" style="display: block; margin-bottom: 4px;" required name="tanah">
                        <option disabled selected value="">Pilih</option>
                        <option value = "Litosol">Litosol</option>
                        <option value = "Andosol">Andosol</option>
                      </select>
                    </div>
                  </div>
                  <!--kolom iklim-->
                  <div class="form-group row m-sm-3">
                    <label class="col-sm-3 col-form-label">Iklim</label>
                    <div class="col-sm-9">
                      <select class="form-control" style="display: block; margin-bottom: 4px;" required name="iklim">
                        <option disabled selected value="">Pilih</option>
                        <option value = "Kemarau">Kemarau</option>
                        <option value = "Hujan">Hujan</option>
                        <option value = "Kemarau-Hujan">Kemarau-Hujan</option>
                      </select>
                    </div>
                  </div>
                  <div class="m-sm-3 pe-sm-3 d-flex justify-content-end">
                    <button type="submit" name="tambahbibit" class="btn btn-success ">SIMPAN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </section>

      

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