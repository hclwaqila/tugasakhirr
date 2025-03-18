<?php
// session_start(); // Mulai session
include "../config/koneksi.php";
if (isset($_GET['id_game'])) {
    $id_game = $_GET['id_game'];
    $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_game WHERE id_game='$id_game'")
        or die(mysqli_error($koneksi));
    $game_edit = mysqli_fetch_array($_ambil);
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
// if (isset($_GET['id_game'])) {
//     $id_game = $_GET['id_game'];
//     $_ambil = mysqli_query($koneksi, "SELECT * FROM tb_game WHERE id_game='$id_game'")
//         or die(mysqli_error($koneksi));
//     $game_edit = mysqli_fetch_array($_ambil);
// }

// Mendapatkan tanggal hari ini
$tanggal_hari_ini = date("Y-m-d");
?>

<form action="game_proses.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id_game'])) {
        echo "<input type='hidden' name='status' value='edit'>";
        echo "<input type='hidden' name='id_game' value='$id_game'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>
    <table>
        <tr>
            <td colspan="3" align="center">
                <h3>TAMBAH DATA GAME</h3>
            </td>
        </tr>
        <!-- <tr>
            <td>ID GAME</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="id_game" value="<?php echo @$game_edit['id_game']; ?>" readonly></td>
        </tr> -->
        <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">

        <tr>
            <td>JUDUL GAME</td>
            <td>:</td>
            <td><input type="text" maxlength="100" size="30" name="judul_game" value="<?php echo @$game_edit['judul_game']; ?>"></td>
        </tr>
        <!-- <tr>
            <td>TGL BERITA</td>
            <td>:</td>
            <td><input type="date" maxlength="500" size="50" name="tgl_berita" value="<?php echo $tanggal_hari_ini; ?>" readonly></td>
        </tr>  -->
        <tr>
            <td>FOTO GAME</td>
            <td>:</td>
            <td>
                <?php 
                if (!empty($game_edit['foto_game'])) {
                    echo "<img src='{$game_edit['foto_game']}' width='100' height='100'>";
                }
                ?>
                <input type="file" name="image1" maxlength="255" size="10">
                <?php 
                if (isset($_GET['id_game'])) { ?>
                    <br><input type="checkbox" name="centang" value="1"> Centang jika ingin ganti
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>DETAIL GAME</td>
            <td>:</td>
            <td><textarea name="detail_game" value="<?php echo @$game_edit['detail_game']; ?>"></textarea></td>
        </tr>
        <tr>
            <td>VERSI GAME</td>
            <td>:</td>
            <td><input type="text" maxlength="500" size="50" name="versi" value="<?php echo @$game_edit['versi']; ?>"></td>
        </tr>
        <tr>
            <td>SPESIFIKASI GAME</td>
            <td>:</td>
            <td><textarea name="spesifikasi" value="<?php echo @$game_edit['spesifikasi']; ?>"></textarea></td>
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