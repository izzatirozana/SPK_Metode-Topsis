<?php 
include('koneksi.php');
 ?>

 <?php 
 $W1 = 0.5;
 $W2 = 0.3;
 $W3 = 0.15;
 $W4 = 0.05;

 //Pembagi Normalisasi
function pembagiNM($matrik){
    for($i=0;$i<4;$i++){
        $pangkatdua[$i] = 0;
        for($j=0;$j<sizeof($matrik);$j++){
            $pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i],2);}
        $pembagi[$i] = sqrt($pangkatdua[$i]);
    }
    return $pembagi;
}

//Normalisasi
function Transpose($squareArray) {

    if ($squareArray == null) { return null; }
    $rotatedArray = array();
    $r = 0;

    foreach($squareArray as $row) {
        $c = 0;
        if (is_array($row)) {
            foreach($row as $cell) { 
                $rotatedArray[$c][$r] = $cell;
                ++$c;
            }
        }
        else $rotatedArray[$c][$r] = $row;
        ++$r;
    }
    return $rotatedArray;
}

function JarakIplus($aplus,$bob){
    for ($i=0;$i<sizeof($bob);$i++) {
        $dplus[$i] = 0;
        for($j=0;$j<sizeof($aplus);$j++){
            $dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
        }
        $dplus[$i] = round(sqrt($dplus[$i]),4);
    }
    return $dplus;
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
              <!-- <li class="nav-item px-2"><a class="nav-link fw-medium" href="hasil.php">Rekomendasi</a></li> -->
            </ul>
            <form class="d-flex"><button class="btn btn-lg btn-dark bg-gradient order-0" type="submit">Sign Up</button></form>
          </div>
        </div>
      </nav>

      <section class="py-0" id="header" style="height: auto;">
        <!-- <div class="bg-holder d-none d-md-block" style="background-image:url(assets/img/illustrations/hero-bg.png);background-position:right top;background-size:625px 855px;"></div> -->
        /.bg-holder
        <!-- <div class="bg-holder d-none d-sm-block" style="background-image:url(assets/img/illustrations/bg.png);background-position: top left; background-size:225px 755px;"></div> -->
        <div class="bg-holder" style="background-image:url(assets/img/illustrations/opportunities-bg.png);background-position:bottom center;background-size:cover;"></div>
        <div class="bg-holder d-none d-md-block" style="background-image:url(assets/img/illustrations/hero-bg.png);background-position:right top;background-size:625px 855px;"></div>
        <div class="bg-holder d-none d-sm-block" style="background-image:url(assets/img/illustrations/bg.png);background-position: top left; background-size:225px 755px;"></div>

        <div class="container pt-8 pb-sm-4 opacity-85" >
          <div class="card min-vh-100 py-4" >
            <div class="card text-center pt-lg-4" style="padding-top: 1rem">
              <h2 class="fw-bold">HASIL PERHITUNGAN TOPSIS</h2>
            </div>
            
            <div class="card dropdown-toggle-split pt-4">
            <div class="mb-2">
              <h4><center>Matriks Alternatif</center></h4>
            </div>
              <table class="table table-stripped table-bordered table-hover text-dark">
                <thead>
                  <tr>
                    <th scope="col">Nama Bibit</th>
                    <th scope="col">Nomor Alternatif</th>
                    <th scope="col">Kriteria 1 (K1)</th>
                    <th scope="col">Kriteria 2 (K2)</th>
                    <th scope="col">Kriteria 3 (K3)</th>
                    <th scope="col">Kriteria 4 (K4)</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                $no = 1;
                $query = mysqli_query($selectdb, "select * from alternatif");
                while ($d = mysqli_fetch_array($query)) {
                    $Matrik[$no-1]=array($d['rasa_angka'], $d['produksi_angka'],$d['tanah_angka'], $d['iklim_angka']);
                 ?>
                  <tr>
                    <td><?php echo $d['nama_bibit']; ?></td>
                    <td><?php echo "(A", $no++, ') '; ?></td>
                    <td><?php echo $d['rasa_angka']; ?></td>
                    <td><?php echo $d['produksi_angka']; ?></td>
                    <td><?php echo $d['tanah_angka']; ?></td>
                    <td><?php echo $d['iklim_angka']; ?></td>
                  </tr>
                  <?php
                  } 
                  ?>
                </tbody>
              </table>
            </div>
            
            <div class="card dropdown-toggle-split pt-4">
              <div class="mb-2">
                <h4><center>Matriks Ternormalisasi</center></h4>
              </div>
              <table class="table table-stripped table-bordered table-hover text-dark">
                <thead>
                  <tr>
                    <th scope="col">Alternatif</th>
                    <th scope="col">K1</th>
                    <th scope="col">K2</th>
                    <th scope="col">K3</th>
                    <th scope="col">K4</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $query=mysqli_query($selectdb,"SELECT * FROM alternatif");
                    $no=1;
                    $pembagiNM=pembagiNM($Matrik);
                    while ($d=mysqli_fetch_array($query)) {
                        $MatrikNormalisasi[$no-1]=array($d['rasa_angka']/$pembagiNM[0],
                            $d['produksi_angka']/$pembagiNM[1],
                            $d['tanah_angka']/$pembagiNM[2],
                            $d['iklim_angka']/$pembagiNM[3]);
                ?>
                <tr>
                    <td><center><?php echo "(A", $no, ') '; ?></center></td>
                    <td><center><?php echo round($d['rasa_angka']/$pembagiNM[0],6)?></center></td>
                    <td><center><?php echo round($d['produksi_angka']/$pembagiNM[1],6) ?></center></td>
                    <td><center><?php echo round($d['tanah_angka']/$pembagiNM[2],6) ?></center></td>
                    <td><center><?php echo round($d['iklim_angka']/$pembagiNM[3],6) ?></center></td>
                </tr>
                <?php
                $no++;
                }
                ?>
                </tbody>
              </table>
            </div>

            <div class="card dropdown-toggle-split pt-4">
              <div class="mb-2">
                <h4><center>Bobot Kriteria</center></h4>
              </div>
              <table class="table table-stripped table-bordered table-hover text-dark">
                <thead>
                  <tr>
                    <th scope="col">Bobot Kegemaran (K1)</th>
                    <th scope="col">Bobot Produksi (K2)</th>
                    <th scope="col">Bobot Jenis Tanah (K3)</th>
                    <th scope="col">Bobot Jenis Iklim (K4)</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><center><?php echo($W1);?></center></td>
                        <td><center><?php echo($W2);?></center></td>
                        <td><center><?php echo($W3);?></center></td>
                        <td><center><?php echo($W4);?></center></td>
                    </tr>
                </tbody>
              </table>
            </div>

            <div class="card dropdown-toggle-split pt-4">
              <div class="mb-2">
                <h4><center>Matriks Normalisasi Terbobot</center></h4>
              </div>
              <table class="table table-stripped table-bordered table-hover text-dark">
                <thead>
                  <tr>
                    <th scope="col">Alternatif</th>
                    <th scope="col">K1</th>
                    <th scope="col">K2</th>
                    <th scope="col">K3</th>
                    <th scope="col">K4</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $query=mysqli_query($selectdb,"SELECT * FROM alternatif");
                    $no=1;
                    $pembagiNM=pembagiNM($Matrik);
                    while ($d=mysqli_fetch_array($query)) {
                                                    
                    $NormalisasiBobot[$no-1]=array(
                        $MatrikNormalisasi[$no-1][0]*$W1,
                        $MatrikNormalisasi[$no-1][1]*$W2,
                        $MatrikNormalisasi[$no-1][2]*$W3,
                        $MatrikNormalisasi[$no-1][3]*$W4 );
                    ?>
                    <tr>
                        <td><center><?php echo "(A", $no, ') '; ?></center></td>
                        <td><center><?php echo round($MatrikNormalisasi[$no-1][0]*$W1,6) ?></center></td>
                        <td><center><?php echo round($MatrikNormalisasi[$no-1][1]*$W2,6) ?></center></td>
                        <td><center><?php echo round($MatrikNormalisasi[$no-1][2]*$W3,6) ?></center></td>
                        <td><center><?php echo round($MatrikNormalisasi[$no-1][3]*$W4,6) ?></center></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
              </table>
            </div>

            <div class="card dropdown-toggle-split pt-4">
              <div class="mb-2">
                <h4><center>Matriks Solusi Ideal</center></h4>
              </div>
              <table class="table table-stripped table-bordered table-hover text-dark">
                <thead>
                  <tr>
                    <th scope="col">Alternatif</th>
                    <th scope="col">Y1</th>
                    <th scope="col">Y2</th>
                    <th scope="col">Y3</th>
                    <th scope="col">Y4</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $NormalisasiBobotTrans = Transpose($NormalisasiBobot);
                    ?>
                    <tr>
                        <?php  
                        $idealpositif=array(max($NormalisasiBobotTrans[0]),max($NormalisasiBobotTrans[1]),max($NormalisasiBobotTrans[2]),max($NormalisasiBobotTrans[3]));

                        ?>
                        <td><center><?php echo "Y+" ?> </center></td>
                        <td><center><?php echo(round(max($NormalisasiBobotTrans[0]),6));?>&nbsp(max)</center></td>
                        <td><center><?php echo(round(max($NormalisasiBobotTrans[1]),6));?>&nbsp(max)</center></td>
                        <td><center><?php echo(round(max($NormalisasiBobotTrans[2]),6));?>&nbsp(max)</center></td>
                        <td><center><?php echo(round(max($NormalisasiBobotTrans[3]),6));?>&nbsp(max)</center></td>
                    </tr>
                    <tr>
                        <?php  
                        $idealnegatif=array(min($NormalisasiBobotTrans[0]),min($NormalisasiBobotTrans[1]),min($NormalisasiBobotTrans[2]),min($NormalisasiBobotTrans[3]));
                        ?>
                        <td><center><?php echo "Y-" ?> </center></td>
                        <td><center><?php echo(round(min($NormalisasiBobotTrans[0]),6));?>&nbsp(min)</center></td>
                        <td><center><?php echo(round(min($NormalisasiBobotTrans[1]),6));?>&nbsp(min)</center></td>
                        <td><center><?php echo(round(min($NormalisasiBobotTrans[2]),6));?>&nbsp(min)</center></td>
                        <td><center><?php echo(round(min($NormalisasiBobotTrans[3]),6));?>&nbsp(min)</center></td>
                    </tr>
                </tbody>
              </table>
            </div>

            <div class="card dropdown-toggle-split pt-4">
              <div class="mb-2">
                <h4><center>Jarak Solusi Ideal</center></h4>
              </div>
              <table class="table table-stripped table-bordered table-hover text-dark">
                <thead>
                  <tr>
                    <th scope="col">Alternatif</th>
                    <th scope="col">D+</th>
                    <th scope="col">D-</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $query=mysqli_query($selectdb,"SELECT * FROM alternatif");
                    $no=1;
                    $Dplus=JarakIplus($idealpositif,$NormalisasiBobot);
                    $Dmin=JarakIplus($idealnegatif,$NormalisasiBobot);
                    while ($d=mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><center><?php echo "(A", $no, ') '; ?></center></td>
                        <td><center><?php echo round($Dplus[$no-1],6) ?></center></td>
                        <td><center><?php echo round($Dmin[$no-1],6) ?></center></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
              </table>
            </div>

            <div class="card dropdown-toggle-split pt-4">
              <div class="mb-2">
                <h4><center>Nilai Preferensi Untuk Setiap Alternatif</center></h4>
              </div>
              <table class="table table-stripped table-bordered table-hover text-dark">
                <thead>
                  <tr>
                    <th><center>Alternatif</center></th>
                    <th><center>Hasil Total</center></th>
                    <th><center>Nama Bibit</center></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $query=mysqli_query($selectdb,"SELECT * FROM alternatif");
                    $no=1;
                    $nilaiV = array();
                    while ($d=mysqli_fetch_array($query)) {
                                                        
                    array_push($nilaiV, $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]));
                    ?>
                    <tr>
                        <td><center><?php echo "(A", $no, ') '; ?></center></td>
                        <td><center><?php echo $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]); ?></center></td>
                        <td><center><?php echo $d['nama_bibit']; ?></center></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
              </table>
            </div>

            <center class="py-3 pb-5">
              <!-- <a href="#tambah" class="btn btn-secondary btn-lg btn-block" style="margin-right: 10px;">Tambah Alternatif</a> -->
              <!-- <a href="#matriks" class="btn btn-primary btn-lg btn-block">Hasil Rekomendasi</a> -->
              <button id="myBtn" class="btn btn-primary btn-lg btn-block">Hasil Rekomendasi</button>
            </center>
            
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

    <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>