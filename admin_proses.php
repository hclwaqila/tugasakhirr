<?php
include "../config/koneksi.php";

if (isset($_POST['status'])) {
    $status = $_POST['status'];
}

switch ($status) {
    case 'tambah':
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);
        $nama_admin = $_POST['nama_admin'];
        $no_telp_admin = $_POST['no_telp_admin'];
        $alamat_admin = $_POST['alamat_admin'];

        //input foto
        $asal = $_FILES['image']['tmp_name'];
        $simpan_foto = "../foto/" . $_FILES['image']['name'];
        move_uploaded_file($asal, $simpan_foto);

        $guru_tambah = mysqli_query($koneksi, "INSERT INTO tb_admin VALUES ('$user_name' , '$password', '$nama_admin', '$no_telp_admin', '$alamat_admin', '$simpan_foto')");
        if ($guru_tambah == true) {
            echo "<script> alert ('Tambah Data Admin Berhasil!') </script>";
        } else {
            echo "<script> alert ('Tambah Data Admin Gagal!') </script>";
        }
        break;
    case 'edit':
        $user_name = $_POST['user_name'];
        $nama_admin = $_POST['nama_admin'];
        $no_telp_admin = $_POST['no_telp_admin'];
        $alamat_admin = $_POST['alamat_admin'];
        $centang = isset($_POST['centang']) ? $_POST['centang'] : 0;

        // Ambil data lama
        $result = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE user_name='$user_name'");
        $row = mysqli_fetch_assoc($result);

        // Gunakan password lama jika input password kosong
        $password = empty($_POST['password']) ? $row['password'] : md5($_POST['password']);

        // Cek apakah user ingin mengganti foto
        if ($centang == 1 && !empty($_FILES['image']['name'])) {
            $asal = $_FILES['image']['tmp_name'];
            $simpan_foto = "../foto/" . $_FILES['image']['name'];
            move_uploaded_file($asal, $simpan_foto);
        } else {
            $simpan_foto = $row['foto_admin']; // Gunakan foto lama jika tidak diubah
        }

        // Update data admin
        $guru_edit = mysqli_query($koneksi, "UPDATE tb_admin 
            SET password ='$password', nama_admin='$nama_admin', no_telp_admin='$no_telp_admin', alamat_admin='$alamat_admin', foto_admin='$simpan_foto' 
            WHERE user_name = '$user_name'");

        if ($guru_edit) {
            echo "<script>alert ('EDIT DATA Admin BERHASIL') </script>";
        } else {
            echo "<script>alert ('EDIT DATA Admin GAGAL') </script>";
        }
        break;


    default:
        $user_name = $_GET['user_name'];
        $kelas_hapus = mysqli_query($koneksi, "DELETE FROM tb_admin WHERE user_name = '$user_name'");
        if ($kelas_hapus == true) {
            echo "<script> alert ('Hapus Data admin Berhasil!') </script>";
        } else {
            echo "<script> alert ('Hapus Data admin Gagal!') </script>";
        }
        break;
}
?>

<meta http-equiv="refresh" content="0;index.php?page=admin_tampil">