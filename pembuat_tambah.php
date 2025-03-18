<?php
// session_start(); // Mulai session
include "../config/koneksi.php";
if (isset($_GET['id_pembuat'])) {
    $id_pembuat = $_GET['id_pembuat'];
    $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_pembuat WHERE id_pembuat='$id_pembuat'")
        or die(mysqli_error($koneksi));
    $pembuat_edit = mysqli_fetch_array($_ambil);
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
// if (isset($_GET['id_pembuat'])) {
//     $id_pembuat = $_GET['id_pembuat'];
//     $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_pembuat WHERE id_pembuat='$id_pembuat'")
//         or die(mysqli_error($koneksi));
//     $pembuat_edit = mysqli_fetch_array($_ambil);
// }

// Mendapatkan tanggal hari ini
// $tanggal_hari_ini = date("Y-m-d");
?>

<form action="pembuat_proses.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id_pembuat'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id_pembuat' value='$id_pembuat'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table>
        <tr>
            <td colspan="3" align="center">
                <h3>TAMBAH DATA PEMBUAT</h3>
            </td>
        </tr>
        <!-- <tr>
            <td>ID pembuat</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="id_pembuat" value="<?php echo @$pembuat_edit['id_pembuat']; ?>" readonly></td>
        </tr> -->
        <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">

        <tr>
            <td>NAMA PEMBUAT</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="nama_pembuat" value="<?php echo @$pembuat_edit['nama_pembuat']; ?>"></td>
        </tr>
        <tr>
            <td>PENDIDIKAN PEMBUAT</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="pendidikan_pembuat" value="<?php echo @$pembuat_edit['pendidikan_pembuat']; ?>"></td>
        </tr>
        <tr>
            <td>DETAIL PEMBUAT</td>
            <td>:</td>
            <td><textarea name="detail_pembuat" value="<?php echo @$pembuat_edit['detail_pembuat']; ?>"></textarea></td>
        </tr>
        <!-- <tr>
            <td>TGL BERITA</td>
            <td>:</td>
            <td><input type="date" maxlength="500" size="50" name="tgl_berita" value="<?php echo $tanggal_hari_ini; ?>" readonly></td>
        </tr>  -->
        <tr>
            <td>FOTO PEMBUAT</td>
            <td>:</td>
            <td>
                <?php 
                if (!empty($pembuat_edit['foto_pembuat'])) {
                    echo "<img src='{$pembuat_edit['foto_pembuat']}' width='100' height='100'>";
                }
                ?>
                <input type="file" name="image1" maxlength="255" size="10">
                <?php 
                if (isset($_GET['id_pembuat'])) { ?>
                    <br><input type="checkbox" name="centang" value="1"> Centang jika ingin ganti
                <?php } ?>
            </td>
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