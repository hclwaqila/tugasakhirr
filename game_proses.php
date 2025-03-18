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
        // $id_game = $_POST['id_berita'];
        $user_name = $_POST['user_name'];
        $judul_game = $_POST['judul_game'];
        // $tgl_berita   = $_POST['editTglBerita'];
        // $tgl_game   = date('Y-m-d H:i:s');

        // Input foto berita
        $asal = $_FILES['image1']['tmp_name'];
        $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
        move_uploaded_file($asal, $simpan_foto1);

        $detail_game = $_POST['detail_game'];
        $versi = $_POST['versi'];
        $spesifikasi = $_POST['spesifikasi'];

        $game_tambah = mysqli_query($koneksi, "INSERT INTO tb_game VALUES (id_game,'$user_name', '$judul_game', '$simpan_foto1', '$detail_game', '$versi', '$spesifikasi')");
        if ($game_tambah) {
            echo "<script>alert('Tambah Data game berhasil')</script>";
        } else {
            echo "<script>alert('Tambah Data game gagal')</script>";
        }
        break;

    case 'edit':
        $id_game = $_POST['id_game'];
        $user_name = $_POST['user_name'];
        $judul_game = $_POST['judul_game'];
        // $tgl_game = $_POST['tgl_game'];
        $centang = isset($_POST['centang']) ? $_POST['centang'] : 0;

        // Edit foto game
        if ($centang == '1') {
            $asal = $_FILES['image1']['tmp_name'];
            $simpan_foto1 = "../foto/" . $_FILES['image1']['name'];
            move_uploaded_file($asal, $simpan_foto1);
        } else {
            $simpan_foto1 = $_POST['foto_lama'];
        }

        $detail_game = $_POST['detail_game'];
        $versi = $_POST['versi'];
        $spesifikasi = $_POST['spesifikasi'];

        $game_edit = mysqli_query($koneksi, "UPDATE tb_game SET user_name = '$user_name', judul_game = '$judul_game', foto_game = '$simpan_foto1', detail_game = '$detail_game', versi = '$versi', spesifikasi = '$spesifikasi' WHERE id_game = '$id_game'");
        if ($game_edit) {
            echo "<script>alert('Edit Data Game berhasil')</script>";
        } else {
            echo "<script>alert('Edit Data Game gagal')</script>";
        }
        break;

    case 'hapus':
        $id_game = $_GET['id_game']; // Mengambil id_game dari URL
        $game_hapus = mysqli_query($koneksi, "DELETE FROM tb_game WHERE id_game = '$id_game'");
        if ($game_hapus) {
            echo "<script>alert('Hapus Data Game berhasil')</script>";
        } else {
            echo "<script>alert('Hapus Data Game gagal')</script>";
        }
        break;

    default:
        echo "<script>alert('Aksi tidak dikenali')</script>";
        break;
}
?>
<meta http-equiv="refresh" content="0;index.php?page=game_tampil">