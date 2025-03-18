<h2 align="center">DATA GAME</h2>
<br>
<?php
echo "<a href='index.php?page=game_tambah'><input type='button' name='input' value='TAMBAH DATA'></a>"; 
?>
<table border="1" width="95%" style="text-align: center;" >
    <tr align="center" bgcolor="#f795c7">
        <td width="5%" align="center">NO.</td>
        <td width="10%" align="center">USERNAME</td>
        <td width="10%" align="center">JUDUL GAME</td>
        <td width="10%" align="center">FOTO GAME</td>
        <td width="10%" align="center">DETAIL GAME</td>
        <td width="10%" align="center">VERSI</td>
        <td width="10%" align="center">SPESIFIKASI</td>
        <td width="10%" colspan="2" align="center">AKSI</td>
    </tr>
    <?php
    include "../config/koneksi.php";
    $no = 1;
    $tampil_game = mysqli_query($koneksi, "SELECT * FROM tb_game ORDER BY id_game");
    while ($hasil = mysqli_fetch_array($tampil_game)) {
        echo "<tr>";
        echo "<td align='center'>$no</td>";
        echo "<td>$hasil[user_name]</td>";
        echo "<td>$hasil[judul_game]</td>";
        echo "<td align='center'><img src='$hasil[foto_game]' width='100' height='100'></td>";
        echo "<td>$hasil[detail_game]</td>";
        echo "<td>$hasil[versi]</td>";
        echo "<td>$hasil[spesifikasi]</td>";
        echo "<td align='center'><a href='index.php?page=game_tambah&id_game=$hasil[id_game]'>EDIT</a></td>";
        echo "<td align='center'><a href='#' onclick=\"if(confirm('Apakah Data Yakin DI Hapus')) {window.location.href='game_proses.php?status=hapus&id_game=$hasil[id_game]';}\">HAPUS</a></td>";
        echo "</tr>";
        $no++;
    }
    ?>
</table>