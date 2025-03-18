<?php
include "../config/koneksi.php";

if (isset($_POST['status'])) {
    $status = $_POST['status'];
} elseif (isset($_GET['status'])) {
    $status = $_GET['status']; // Menangani status hapus yang dikirim melalui URL
}

// $username = $_SESSION['user_name'];

switch ($status) {
    case 'tambah':
        // $id_merchan = $_POST['id_merchan'];
        $user_name = $_POST['user_name'];
        $nama_merchan = $_POST['nama_merchan'];
        // $tgl_merchan   = $_POST['editTglmerchan'];
        // $tgl_merchan   = date('Y-m-d H:i:s');

        // Input foto merchan
        $asal = $_FILES['image1']['tmp_name'];
        $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
        move_uploaded_file($asal, $simpan_foto1);

        $harga_merchan = $_POST['harga_merchan'];
        $detail_merchan = $_POST['detail_merchan'];

        $merchan_tambah = mysqli_query($koneksi, "INSERT INTO tb_merchandise VALUES (id_merchan,'$user_name', '$nama_merchan', '$simpan_foto1', '$harga_merchan', '$detail_merchan')");
        if ($merchan_tambah) {
            echo "<script>alert('Tambah Data merchan berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data merchan gagal')</script>";
        }
        break;

    case 'edit':
        $id_merchan = $_POST['id_merchan'];
        $user_name = $_POST['user_name'];
        $nama_merchan = $_POST['nama_merchan'];
        // $tgl_merchan = $_POST['tgl_merchan'];
        $centang = isset($_POST['centang']) ? $_POST['centang'] : 0;

        // Edit foto merchan
        if ($centang == '1') {
            $asal = $_FILES['image1']['tmp_name'];
            $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
            move_uploaded_file($asal, $simpan_foto1);
        } else {
            $simpan_foto1 = $_POST['foto_lama'];
        }
        
        $harga_merchan = $_POST['harga_merchan'];
        $detail_merchan = $_POST['detail_merchan'];

        $merchan_edit = mysqli_query($koneksi, "UPDATE tb_merchandise SET user_name = '$user_name', nama_merchan = '$nama_merchan', foto_merchan = '$simpan_foto1', harga_merchan = '$harga_merchan, detail_merchan = '$detail_merchan' WHERE id_merchan = '$id_merchan'");
        if ($merchan_edit) {
            echo "<script>alert('Edit Data Merchandise berhasil')</script>";
        } else {
            echo "<script>alert('Edit Data Merchandise gagal')</script>";
        }
        break;

    case 'hapus':
        $id_merchan = $_GET['id_merchan']; // Mengambil id_merchan dari URL
        $merchan_hapus = mysqli_query($koneksi, "DELETE FROM tb_merchandise WHERE id_merchan = '$id_merchan'");
        if ($merchan_hapus) {
            echo "<script>alert('Hapus Data Merchandise berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Merchandise gagal')</script>";
        }
        break;

    default:
        echo "<script>alert('Aksi tidak dikenali')</script>";
        break;
}
?>
<meta http-equiv="refresh" content="0;index.php?page=merchan_tampil">