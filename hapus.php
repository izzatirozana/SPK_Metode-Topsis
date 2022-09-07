<?php 
//koneksi database
include 'koneksi.php';

//menangkap data id yang dikirim dari url
$kode = $_GET['kode'];

//menghapus data dari database
mysqli_query($selectdb, "delete from alternatif where kode='$kode'");

//mengalihkan halaman kembali ke index.php
header("location:tambah-data.php");
 ?>