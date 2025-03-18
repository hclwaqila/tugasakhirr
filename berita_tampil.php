<h2 align="center">DATA BERITA</h2>
<br>
<?php
echo "<a href='index.php?page=berita_tambah'><input type='button' name='input' value='TAMBAH DATA'></a>"; 
?>
<table border="1" width="95%" style="text-align: center;" >
    <tr align="center" bgcolor="#f795c7">
        <td width="5%" align="center">NO.</td>
        <td width="10%" align="center">USERNAME</td>
        <td width="10%" align="center">JUDUL BERITA</td>
        <td width="10%" align="center">TGL BERITA</td>
        <td width="10%" align="center">FOTO BERITA</td>
        <td width="10%" align="center">DETAIL BERITA</td>
        <td width="10%" colspan="2" align="center">AKSI</td>
    </tr>
    <?php
    include "../config/koneksi.php";
    $no = 1;
    $tampil_berita = mysqli_query($koneksi, "SELECT * FROM tb_berita ORDER BY id_berita");
    while ($hasil = mysqli_fetch_array($tampil_berita)) {
        echo "<tr>";
        echo "<td align='center'>$no</td>";
        echo "<td>$hasil[user_name]</td>";
        echo "<td>$hasil[judul_berita]</td>";
        echo "<td>$hasil[tgl_berita]</td>";
        echo "<td align='center'><img src='$hasil[foto_berita]' width='100' height='100'></td>";
        echo "<td>$hasil[detail_berita]</td>";
        echo "<td align='center'><a href='index.php?page=berita_tambah&id_berita=$hasil[id_berita]'>EDIT</a></td>";
        echo "<td align='center'><a href='#' onclick=\"if(confirm('Apakah Data Yakin DI Hapus')) {window.location.href='berita_proses.php?status=hapus&id_berita=$hasil[id_berita]';}\">HAPUS</a></td>";
        echo "</tr>";
        $no++;
    }
    ?>
</table>