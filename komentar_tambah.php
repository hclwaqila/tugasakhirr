<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "../config/koneksi.php";
if (isset($_GET['id_komentar'])) {
    $id_komentar = $_GET['id_komentar'];
    $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_komentar WHERE id_komentar='$id_komentar'")
        or die(mysqli_error($koneksi));
    $komentar_edit = mysqli_fetch_array($_ambil);
}
?>

<form action="komentar_proses.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id_komentar'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id_komentar' value='$id_komentar'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table>
        <tr>
            <td colspan="3" align="center">
                <h3>TAMBAH DATA KOMENTAR</h3>
            </td>
        </tr>
        <tr>
            <td>ID KOMENTAR</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="id_komentar" value="<?php echo @$komentar_edit['id_komentar']; ?>"></td>
        </tr>
        <tr>
            <td>NAMA TAMU</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="nama_tamu" value="<?php echo @$komentar_edit['nama_tamu']; ?>"></td>
        </tr>
        <tr>
            <td>TGL KOMENTAR</td>
            <td>:</td>
            <td><input type="date" maxlength="500" size="50" name="tgl_komentar" value="<?php echo @$komentar_edit['tgl_komentar']; ?>"></td>
        </tr>
        <tr>
            <td>KOMENTAR</td>
            <td>:</td>
            <td><input type="text" maxlength="500" size="50" name="komentar" value="<?php echo @$komentar_edit['komentar']; ?>"></td>
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