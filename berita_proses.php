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
        // $id_berita = $_POST['id_berita'];
        $user_name = $_POST['user_name'];
        $judul_berita = $_POST['judul_berita'];
        // $tgl_berita   = $_POST['editTglBerita'];
        $tgl_berita   = date('Y-m-d H:i:s');

        // Input foto berita
        $asal = $_FILES['image1']['tmp_name'];
        $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
        move_uploaded_file($asal, $simpan_foto1);

        $detail_berita = $_POST['detail_berita'];

        $berita_tambah = mysqli_query($koneksi, "INSERT INTO tb_berita VALUES (id_berita,'$user_name', '$judul_berita', '$tgl_berita', '$simpan_foto1', '$detail_berita')");
        if ($berita_tambah) {
            echo "<script>alert('Tambah Data Berita berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data Berita gagal')</script>";
        }
        break;

    case 'edit':
        $id_berita = $_POST['id_berita'];
        $user_name = $_POST['user_name'];
        $judul_berita = $_POST['judul_berita'];
        $tgl_berita = $_POST['tgl_berita'];
        $centang = isset($_POST['centang']) ? $_POST['centang'] : 0;

        // Edit foto berita
        if ($centang == '1') {
            $asal = $_FILES['image1']['tmp_name'];
            $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
            move_uploaded_file($asal, $simpan_foto1);
        } else {
            $simpan_foto1 = $_POST['foto_lama'];
        }

        $detail_berita = $_POST['detail_berita'];

        $berita_edit = mysqli_query($koneksi, "UPDATE tb_berita SET user_name = '$user_name', judul_berita = '$judul_berita', tgl_berita = '$tgl_berita', foto_berita = '$simpan_foto1', detail_berita = '$detail_berita' WHERE id_berita = '$id_berita'");
        if ($berita_edit) {
            echo "<script>alert('Edit Data Berita berhasil')</script>";
        } else {
            echo "<script>alert('Edit Data Berita gagal')</script>";
        }
        break;

    case 'hapus':
        $id_berita = $_GET['id_berita']; // Mengambil id_berita dari URL
        $berita_hapus = mysqli_query($koneksi, "DELETE FROM tb_berita WHERE id_berita = '$id_berita'");
        if ($berita_hapus) {
            echo "<script>alert('Hapus Data Berita berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Berita gagal')</script>";
        }
        break;

    default:
        echo "<script>alert('Aksi tidak dikenali')</script>";
        break;
}
?>
<meta http-equiv="refresh" content="0;index.php?page=berita_tampil">