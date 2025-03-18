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
        // $id_galeri = $_POST['id_galeri'];
        $user_name = $_POST['user_name'];
        $judul_galeri = $_POST['judul_galeri'];
        // $tgl_galeri   = $_POST['editTglgaleri'];
        $tgl_galeri   = date('Y-m-d H:i:s');

        // Input foto galeri
        $asal = $_FILES['image1']['tmp_name'];
        $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
        move_uploaded_file($asal, $simpan_foto1);

        $detail_galeri = $_POST['detail_galeri'];

        $galeri_tambah = mysqli_query($koneksi, "INSERT INTO tb_galeri VALUES (id_galeri,'$user_name', '$judul_galeri', '$tgl_galeri', '$simpan_foto1', '$detail_galeri')");
        if ($galeri_tambah) {
            echo "<script>alert('Tambah Data Gallery berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data Gallery gagal')</script>";
        }
        break;

    case 'edit':
        $id_galeri = $_POST['id_galeri'];
        $user_name = $_POST['user_name'];
        $judul_galeri = $_POST['judul_galeri'];
        $tgl_galeri = $_POST['tgl_galeri'];
        $centang = isset($_POST['centang']) ? $_POST['centang'] : 0;

        // Edit foto galeri
        if ($centang == '1') {
            $asal = $_FILES['image1']['tmp_name'];
            $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
            move_uploaded_file($asal, $simpan_foto1);
        } else {
            $simpan_foto1 = $_POST['foto_lama'];
        }
        
        $detail_galeri = $_POST['detail_galeri'];

        $galeri_edit = mysqli_query($koneksi, "UPDATE tb_galeri SET user_name = '$user_name', judul_galeri = '$judul_galeri', tgl_galeri = '$tgl_galeri', foto_galeri = '$simpan_foto1', detail_galeri = '$detail_galeri' WHERE id_galeri = '$id_galeri'");
        if ($galeri_edit) {
            echo "<script>alert('Edit Data Gallery berhasil')</script>";
        } else {
            echo "<script>alert('Edit Data Gallery gagal')</script>";
        }
        break;

    case 'hapus':
        $id_galeri = $_GET['id_galeri']; // Mengambil id_galeri dari URL
        $galeri_hapus = mysqli_query($koneksi, "DELETE FROM tb_galeri WHERE id_galeri = '$id_galeri'");
        if ($galeri_hapus) {
            echo "<script>alert('Hapus Data Gallery berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Gallery gagal')</script>";
        }
        break;

    default:
        echo "<script>alert('Aksi tidak dikenali')</script>";
        break;
}
?>
<meta http-equiv="refresh" content="0;index.php?page=galeri_tampil">