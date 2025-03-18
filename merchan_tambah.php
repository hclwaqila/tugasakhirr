<?php
// session_start(); // Mulai session
include "../config/koneksi.php";
if (isset($_GET['id_merchan'])) {
    $id_merchan = $_GET['id_merchan'];
    $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_merchandise WHERE id_merchan='$id_merchan'")
        or die(mysqli_error($koneksi));
    $merchan_edit = mysqli_fetch_array($_ambil);
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
<textarea?php
// include "../config/koneksi.php";
// if (isset($_GET['id_merchan'])) {
//     $id_merchan = $_GET['id_merchan'];
//     $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_merchan WHERE id_merchan='$id_merchan'")
//         or die(mysqli_error($koneksi));
//     $merchan_edit = mysqli_fetch_array($_ambil);
// }

// Mendapatkan tanggal hari ini
// $tanggal_hari_ini = date("Y-m-d");
?>

<form action="merchan_proses.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id_merchan'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id_merchan' value='$id_merchan'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table>
        <tr>
            <td colspan="3" align="center">
                <h3>TAMBAH DATA MERCHAN</h3>
            </td>
        </tr>
        <!-- <tr>
            <td>ID merchan</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="id_merchan" value="<?php echo @$merchan_edit['id_merchan']; ?>" readonly></td>
        </tr> -->
        
        <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">

        <tr>
            <td>NAMA MERCHANDISE</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="nama_merchan" value="<?php echo @$merchan_edit['nama_merchan']; ?>"></td>
        </tr>
        <!-- <tr>
            <td>TGL merchan</td>
            <td>:</td>
            <td><input type="date" maxlength="500" size="50" name="tgl_merchan" value="<?php echo $tanggal_hari_ini; ?>" readonly></td>
        </tr>  -->
        <tr>
            <td>FOTO MERCHAN</td>
            <td>:</td>
            <td>
                <?php 
                if (!empty($merchan_edit['foto_merchan'])) {
                    echo "<img src='{$merchan_edit['foto_merchan']}' width='100' height='100'>";
                }
                ?>
                <input type="file" name="image1" maxlength="255" size="10">
                <?php 
                if (isset($_GET['id_merchan'])) { ?>
                    <br><input type="checkbox" name="centang" value="1"> Centang jika ingin ganti
                <?php } ?>
            </td>
        </tr>
            <td>HARGA MERCHAN</td>
            <td>:</td>
            <td><input type="text" maxlength="500" size="50" name="harga_merchan" value="<?php echo @$merchan_edit['harga_merchan']; ?>"></td>
        </tr>
        <tr>
            <td>DETAIL MERCHAN</td>
            <td>:</td>
            <td><textarea name="detail_merchan" value="<?php echo @$merchan_edit['detail_merchan']; ?>"></textarea></td>
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