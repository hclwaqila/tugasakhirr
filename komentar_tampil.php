<h2 align="center">DATA KOMENTAR</h2>
<br>
<?php
echo "<a href='index.php?page=komentar_tambah'><input type='button' name='input' value='TAMBAH DATA'></a>"; 
?>
<table border="1" width="95%" style="text-align: center;" >
    <tr align="center" bgcolor="#f795c7">
        <td width="5%" align="center">NO.</td>
        <td width="10%" align="center">NAMA TAMU</td>
        <td width="10%" align="center">TGL KOMENTAR</td>
        <td width="10%" align="center">KOMENTAR</td>
        <td width="10%" colspan="2" align="center">AKSI</td>
    </tr>
    <?php
    include "../config/koneksi.php";
    $no = 1;
    $tampil_komentar = mysqli_query($koneksi, "SELECT * FROM tb_komentar ORDER BY id_komentar");
    while ($hasil = mysqli_fetch_array($tampil_komentar)) {
        echo "<tr>";
        echo "<td align='center'>$no</td>";
        echo "<td>$hasil[nama_tamu]</td>";
        echo "<td>$hasil[tgl_komentar]</td>";
        echo "<td>$hasil[komentar]</td>";
        echo "<td align='center'><a href='index.php?page=komentar_tambah&id_komentar=$hasil[id_komentar]'>EDIT</a></td>";
        echo "<td align='center'><a href='#' onclick=\"if(confirm('Apakah Data Yakin Di Hapus')) {window.location.href='komentar_proses.php?status=hapus&id_komentar=$hasil[id_komentar]';}\">HAPUS</a></td>";
        echo "</tr>";
        $no++;
    }
    ?>
</table>