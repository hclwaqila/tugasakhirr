<?php session_start();
include "config/koneksi.php";

// GET DATA ADMIN
$query = "SELECT * FROM tb_admin";
$result = mysqli_query($koneksi, $query);
$numAdmin = mysqli_num_rows($result);
if (!$result) {
    die("Kueri gagal: " . mysqli_error($koneksi));
}

// GET DATA ABOUT GAME
$queryGame = "SELECT * FROM tb_game";
$resultGame = mysqli_query($koneksi, $queryGame);
$numGame = mysqli_num_rows($resultGame);
if (!$resultGame) {
    die("Kueri gagal: " . mysqli_error($koneksi));
}

// // GET DATA MINUMAN
// $queryMinuman = "SELECT * FROM tb_minuman";
// $resultMinuman = mysqli_query($koneksi, $queryMinuman);
// $numMinuman = mysqli_num_rows($resultMinuman);
// if (!$resultMinuman) {
//     die("Kueri gagal: " . mysqli_error($koneksi));
// }

// // GET DATA daerah
// $queryDaerah = "SELECT * FROM tb_daerah";
// $resultDaerah = mysqli_query($koneksi, $queryDaerah);
// $numDaerah = mysqli_num_rows($resultDaerah);
// if (!$resultDaerah) {
//     die("Kueri gagal: " . mysqli_error($koneksi));
// }
// // GET DATA daerah
// $queryProfil = "SELECT * FROM tb_profil";
// $resultProfil = mysqli_query($koneksi, $queryProfil);
// $numProfil = mysqli_num_rows($resultProfil);
// if (!$resultProfil) {
//     die("Kueri gagal: " . mysqli_error($koneksi));
// }