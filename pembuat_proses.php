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
        // $id_pembuat = $_POST['id_pembuat'];
        $user_name = $_POST['user_name'];
        $nama_pembuat = $_POST['nama_pembuat'];
        $pendidikan_pembuat = $_POST['pendidikan_pembuat'];
        $detail_pembuat = $_POST['detail_pembuat'];
        // $tgl_pembuat   = $_POST['editTglpembuat'];
        // $tgl_pembuat   = date('Y-m-d H:i:s');

        // Input foto pembuat
        $asal = $_FILES['image1']['tmp_name'];
        $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
        move_uploaded_file($asal, $simpan_foto1);


        $pembuat_tambah = mysqli_query($koneksi, "INSERT INTO tb_pembuat VALUES (id_pembuat,'$user_name', '$nama_pembuat', '$pendidikan_pembuat', '$detail_pembuat', '$simpan_foto1')");
        if ($pembuat_tambah) {
            echo "<script>alert('Tambah Data Pembuat berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data Pembuat gagal')</script>";
        }
        break;

    case 'edit':
        $id_pembuat = $_POST['id_pembuat'];
        $user_name = $_POST['user_name'];
        $nama_pembuat = $_POST['nama_pembuat'];
        $pendidikan_pembuat = $_POST['pendidikan_pembuat'];
        $detail_pembuat = $_POST['detail_pembuat'];
        // $tgl_pembuat = $_POST['tgl_pembuat'];
        $centang = isset($_POST['centang']) ? $_POST['centang'] : 0;

        // Edit foto pembuat
        if ($centang == '1') {
            $asal = $_FILES['image1']['tmp_name'];
            $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
            move_uploaded_file($asal, $simpan_foto1);
        } else {
            $simpan_foto1 = $_POST['foto_lama'];
        }


        $pembuat_edit = mysqli_query($koneksi, "UPDATE tb_pembuat SET user_name = '$user_name', nama_pembuat = '$nama_pembuat', pendidikan_pembuat = '$pendidikan_pembuat', detail_pembuat = '$detail_pembuat', foto_pembuat = '$simpan_foto1' WHERE id_pembuat = '$id_pembuat'");
        if ($pembuat_edit) {
            echo "<script>alert('Edit Data Pembuat berhasil')</script>";
        } else {
            echo "<script>alert('Edit Data Pembuat gagal')</script>";
        }
        break;

    case 'hapus':
        $id_pembuat = $_GET['id_pembuat']; // Mengambil id_pembuat dari URL
        $pembuat_hapus = mysqli_query($koneksi, "DELETE FROM tb_pembuat WHERE id_pembuat = '$id_pembuat'");
        if ($pembuat_hapus) {
            echo "<script>alert('Hapus Data Pembuat berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Pembuat gagal')</script>";
        }
        break;

    default:
        echo "<script>alert('Aksi tidak dikenali')</script>";
        break;
}
?>
<meta http-equiv="refresh" content="0;index.php?page=pembuat_tampil">