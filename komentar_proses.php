<?php
include "../config/koneksi.php";

if (isset($_POST['status'])) {
    $status = $_POST['status'];
} elseif (isset($_GET['status'])) {
    $status = $_GET['status']; // Menangani status hapus yang dikirim melalui URL
}

switch ($status) {
    case 'tambah':
        $id_komentar = $_POST['id_komentar'];
        $nama_tamu = $_POST['nama_tamu'];
        $tgl_komentar = $_POST['tgl_komentar'];
        $komentar = $_POST['komentar'];
        
        $komentar_tambah = mysqli_query($koneksi, "INSERT INTO tb_komentar (id_komentar, nama_tamu, tgl_komentar, komentar) VALUES ('$id_komentar', '$nama_tamu', '$tgl_komentar', '$komentar')");
        if ($komentar_tambah) {
            echo "<script>alert('Tambah Data Komentar Berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data Komentar Gagal')</script>";
        }
        break;

    case 'edit':
        $id_komentar = $_POST['id_komentar'];
        $nama_tamu = $_POST['nama_tamu'];
        $tgl_komentar = $_POST['tgl_komentar'];
        $komentar = $_POST['komentar'];

        $komentar_edit = mysqli_query($koneksi, "UPDATE tb_komentar SET nama_tamu = '$nama_tamu', tgl_komentar = '$tgl_komentar', komentar = '$komentar' WHERE id_komentar = '$id_komentar'");
        if ($komentar_edit) {
            echo "<script>alert('Edit Data Komentar Berhasil')</script>";
        } else {
            echo "<script>alert('Edit Data Komentar Gagal')</script>";
        }
        break;

    case 'hapus':
        $id_komentar = $_GET['id_komentar']; // Mengambil id_komentar dari URL
        $komentar_hapus = mysqli_query($koneksi, "DELETE FROM tb_komentar WHERE id_komentar = '$id_komentar'");
        if ($komentar_hapus) {
            echo "<script>alert('Hapus Data Komentar Berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Komentar Gagal')</script>";
        }
        break;

    default:
        echo "<script>alert('Aksi tidak dikenali')</script>";
        break;
}
?>
<meta http-equiv="refresh" content="0;index.php?page=komentar_tampil">