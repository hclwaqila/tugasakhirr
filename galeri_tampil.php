<h2 align="center">DATA GALERI</h2>
<br>
<?php
echo "<a href='index.php?page=galeri_tambah'><input type='button' name='input' value='TAMBAH DATA'></a>"; 
?>
<table border="1" width="95%" style="text-align: center;" >
    <tr align="center" bgcolor="#f795c7">
        <td width="5%" align="center">NO.</td>
        <td width="10%" align="center">USERNAME</td>
        <td width="10%" align="center">JUDUL GALERI</td>
        <td width="10%" align="center">TGL GALERI</td>
        <td width="10%" align="center">FOTO GALERI</td>
        <td width="10%" align="center">DETAIL GALERI</td>
        <td width="10%" colspan="2" align="center">AKSI</td>
    </tr>
    <?php
    include "../config/koneksi.php";
    $no = 1;
    $tampil_galeri = mysqli_query($koneksi, "SELECT * FROM tb_galeri ORDER BY id_galeri");
    while ($hasil = mysqli_fetch_array($tampil_galeri)) {
        echo "<tr>";
        echo "<td align='center'>$no</td>";
        echo "<td>$hasil[user_name]</td>";
        echo "<td>$hasil[judul_galeri]</td>";
        echo "<td>$hasil[tgl_galeri]</td>";
        echo "<td align='center'><img src='$hasil[foto_galeri]' width='100' height='100'></td>";
        echo "<td>$hasil[detail_galeri]</td>";
        echo "<td align='center'><a href='index.php?page=galeri_tambah&id_galeri=$hasil[id_galeri]'>EDIT</a></td>";
        echo "<td align='center'><a href='#' onclick=\"if(confirm('Apakah Data Yakin DI Hapus')) {window.location.href='galeri_proses.php?status=hapus&id_galeri=$hasil[id_galeri]';}\">HAPUS</a></td>";
        echo "</tr>";
        $no++;
    }
    ?>
</table>