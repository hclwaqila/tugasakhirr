<h2 align="center">DATA PEMBUAT</h2>
<br>
<?php
echo "<a href='index.php?page=pembuat_tambah'><input type='button' name='input' value='TAMBAH DATA'></a>"; 
?>
<table border="1" width="95%" style="text-align: center;" >
    <tr align="center" bgcolor="#f795c7">
        <td width="5%" align="center">NO.</td>
        <td width="10%" align="center">USERNAME</td>
        <td width="10%" align="center">NAMA PEMBUAT</td>
        <td width="10%" align="center">PENDIDIKAN PEMBUAT</td>
        <td width="10%" align="center">DETAIL PEMBUAT</td>
        <td width="10%" align="center">FOTO PEMBUAT</td>
        <td width="10%" colspan="2" align="center">AKSI</td>
    </tr>
    <?php
    include "../config/koneksi.php";
    $no = 1;
    $tampil_pembuat = mysqli_query($koneksi, "SELECT * FROM tb_pembuat ORDER BY id_pembuat");
    while ($hasil = mysqli_fetch_array($tampil_pembuat)) {
        echo "<tr>";
        echo "<td align='center'>$no</td>";
        echo "<td>$hasil[user_name]</td>";
        echo "<td>$hasil[nama_pembuat]</td>";
        echo "<td>$hasil[pendidikan_pembuat]</td>";
        echo "<td>$hasil[detail_pembuat]</td>";
        echo "<td align='center'><img src='$hasil[foto_pembuat]' width='100' height='100'></td>";
        echo "<td align='center'><a href='index.php?page=pembuat_tambah&id_pembuat=$hasil[id_pembuat]'>EDIT</a></td>";
        echo "<td align='center'><a href='#' onclick=\"if(confirm('Apakah Data Yakin Di Hapus')) {window.location.href='pembuat_proses.php?status=hapus&id_pembuat=$hasil[id_pembuat]';}\">HAPUS</a></td>";
        echo "</tr>";
        $no++;
    }
    ?>
</table>