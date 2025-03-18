<?php
// session_start(); // Mulai session
include "../config/koneksi.php";
if (isset($_GET['id_berita'])) {
    $id_berita = $_GET['id_berita'];
    $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE id_berita='$id_berita'")
        or die(mysqli_error($koneksi));
    $berita_edit = mysqli_fetch_array($_ambil);
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
// if (isset($_GET['id_berita'])) {
//     $id_berita = $_GET['id_berita'];
//     $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE id_berita='$id_berita'")
//         or die(mysqli_error($koneksi));
//     $berita_edit = mysqli_fetch_array($_ambil);
// }

// Mendapatkan tanggal hari ini
$tanggal_hari_ini = date("Y-m-d");
?>

<form action="berita_proses.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id_berita'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id_berita' value='$id_berita'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table>
        <tr>
            <td colspan="3" align="center">
                <h3>TAMBAH DATA BERITA</h3>
            </td>
        </tr>
        <!-- <tr>
            <td>ID BERITA</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="id_berita" value="<?php echo @$berita_edit['id_berita']; ?>" readonly></td>
        </tr> -->
        
        <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">

        <tr>
            <td>JUDUL BERITA</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="judul_berita" value="<?php echo @$berita_edit['judul_berita']; ?>"></td>
        </tr>
        <!-- <tr>
            <td>TGL BERITA</td>
            <td>:</td>
            <td><input type="date" maxlength="500" size="50" name="tgl_berita" value="<?php echo $tanggal_hari_ini; ?>" readonly></td>
        </tr>  -->
        <tr>
            <td>FOTO BERITA</td>
            <td>:</td>
            <td>
                <?php 
                if (!empty($berita_edit['foto_berita'])) {
                    echo "<img src='{$berita_edit['foto_berita']}' width='100' height='100'>";
                }
                ?>
                <input type="file" name="image1" maxlength="255" size="10">
                <?php 
                if (isset($_GET['id_berita'])) { ?>
                    <br><input type="checkbox" name="centang" value="1"> Centang jika ingin ganti
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>DETAIL BERITA</td>
            <td>:</td>
            <td><textarea name="detail_berita" value="<?php echo @$berita_edit['detail_berita']; ?>"></textarea></td>
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