<?php
include "../config/koneksi.php";

$guru_edit = null; // Initialize to null to avoid warnings
if (isset($_GET['user_name'])) {
    $username = $_GET['user_name']; // Retrieve the username from the query parameter
    $agama_ambil = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE user_name='$username'")
        or die("Query failed: " . mysqli_error($koneksi)); // Add error message for debugging
    $guru_edit = mysqli_fetch_array($agama_ambil);
}
?>

<form action="admin_proses.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($_GET['user_name'])) {
        echo "<input type='hidden' name='status' value='edit'>";
    } else {
        echo "<input type='hidden' name='status' value='tambah'>";
    }
    ?>

    <table>
        <tr>
            <td>
                <h3>TAMBAH DATA ADMIN</h3>
            </td>
        </tr>

        <tr>
            <td>USERNAME</td>
            <td>:</td>
            <td><input type="text" maxlength="255" size="11" name="user_name" value="<?php echo @$guru_edit['user_name'] ?? ''; ?>" required></td>
        </tr>

        <tr>
            <td>PASSWORD</td>
            <td>:</td>
            <td>
                <input type="password" maxlength="11" size="10" name="password"
                    value="" <?php echo isset($_GET['user_name']) ? '' : 'required'; ?>>
                <?php if (isset($_GET['user_name'])) { ?>
                    <br><small>* Biarkan kosong jika tidak ingin mengubah password</small>
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td>NAMA ADMIN</td>
            <td>:</td>
            <td><input type="text" maxlength="11" size="10" name="nama_admin" value="<?php echo @$guru_edit['nama_admin'] ?? ''; ?>" required></td>
        </tr>

        <tr>
            <td>NO TELP ADMIN</td>
            <td>:</td>
            <td><input type="text" maxlength="11" size="10" name="no_telp_admin" value="<?php echo @$guru_edit['no_telp_admin'] ?? ''; ?>" required></td>
        </tr>

        <tr>
            <td>ALAMAT ADMIN</td>
            <td>:</td>
            <td><input type="text" maxlength="11" size="10" name="alamat_admin" value="<?php echo @$guru_edit['alamat_admin'] ?? ''; ?>" required></td>
        </tr>

        <tr>
            <td>FOTO ADMIN</td>
            <td>:</td>
            <td>
                <?php
                if (!empty($guru_edit['foto_admin'])) {
                    echo "<img src='{$guru_edit['foto_admin']}' width='100' height='100'>";
                }
                ?>
                <input type="file" name="image" maxlength="255" size="10">
                <?php
                if (isset($_GET['user_name'])) { ?>
                    <br><input type="checkbox" name="centang" value="1"> Centang jika ingin ganti
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" value="SIMPAN">
                <input type="button" value="BATAL" onclick="history.back();">
            </td>
        </tr>
    </table>
</form>