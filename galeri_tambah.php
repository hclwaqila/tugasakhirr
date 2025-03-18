<?php
// session_start(); // Mulai session
include "../config/koneksi.php";
if (isset($_GET['id_galeri'])) {
    $id_galeri = $_GET['id_galeri'];
    $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_galeri WHERE id_galeri='$id_galeri'")
        or die(mysqli_error($koneksi));
    $galeri_edit = mysqli_fetch_array($_ambil);
}

// Ambil username dari session
// $username = $_SESSION['user_name'];
// $tanggal_hari_ini = date('Y-m-d'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// include "../config/koneksi.php";
// if (isset($_GET['id_galeri'])) {
//     $id_galeri = $_GET['id_galeri'];
//     $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_galeri WHERE id_galeri='$id_galeri'")
//         or die(mysqli_error($koneksi));
//     $galeri_edit = mysqli_fetch_array($_ambil);
// }

// Mendapatkan tanggal hari ini
$tanggal_hari_ini = date("Y-m-d");
?>

<form action="galeri_proses.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id_galeri'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id_galeri' value='$id_galeri'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table>
        <tr>
            <td colspan="3" align="center">
                <h3>TAMBAH DATA GALLERY</h3>
            </td>
        </tr>
        <!-- <tr>
            <td>ID galeri</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="id_berita" value="<?php echo @$galeri_edit['id_galeri']; ?>" readonly></td>
        </tr> -->
        
        <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">

        <tr>
            <td>JUDUL GALLERY</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="judul_galeri" value="<?php echo @$galeri_edit['judul_galeri']; ?>"></td>
        </tr>
        <tr>
            <td>TGL BERITA</td>
            <td>:</td>
            <td><input type="date" maxlength="500" size="50" name="tgl_berita" value="<?php echo $tanggal_hari_ini; ?>" readonly></td>
        </tr> 
        <tr>
            <td>FOTO GALLERY</td>
            <td>:</td>
            <td>
                <?php 
                if (!empty($galeri_edit['foto_galeri'])) {
                    echo "<img src='{$galeri_edit['foto_galeri']}' width='100' height='100'>";
                }
                ?>
                <input type="file" name="image1" maxlength="255" size="10">
                <?php 
                if (isset($_GET['id_galeri'])) { ?>
                    <br><input type="checkbox" name="centang" value="1"> Centang jika ingin ganti
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>DETAIL GALLERY</td>
            <td>:</td>
            <td><textarea name="detail_galeri" value="<?php echo @$galeri_edit['detail_galeri']; ?>"></textarea></td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="SIMPAN">
                <input type="reset" value="BATAL">
            </td>
        </tr>
    </table>
</form>
</body>
</html>