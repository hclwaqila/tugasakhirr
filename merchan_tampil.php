<h2 align="center">DATA MERCHANDISE</h2>
<br>
<?php
echo "<a href='index.php?page=merchan_tambah'><input type='button' name='input' value='TAMBAH DATA'></a>"; 
?>
<table border="1" width="95%" style="text-align: center;" >
    <tr align="center" bgcolor="#f795c7">
        <td width="5%" align="center">NO.</td>
        <td width="10%" align="center">USERNAME</td>
        <td width="10%" align="center">NAMA MERCHANDISE</td>
        <td width="10%" align="center">FOTO MERCHANDISE</td>
        <td width="10%" align="center">HARGA MERCHANDISE</td>
        <td width="10%" align="center">DETAIL MERCHANDISE</td>
        <td width="10%" colspan="2" align="center">AKSI</td>
    </tr>
    <?php
    include "../config/koneksi.php";
    $no = 1;
    $tampil_merchan = mysqli_query($koneksi, "SELECT * FROM tb_merchandise ORDER BY id_merchan");
    while ($hasil = mysqli_fetch_array($tampil_merchan)) {
        echo "<tr>";
        echo "<td align='center'>$no</td>";
        echo "<td>$hasil[user_name]</td>";
        echo "<td>$hasil[nama_merchan]</td>";
        echo "<td align='center'><img src='$hasil[foto_merchan]' width='100' height='100'></td>";
        echo "<td>$hasil[harga_merchan]</td>";
        echo "<td>$hasil[detail_merchan]</td>";
        echo "<td align='center'><a href='index.php?page=merchan_tambah&id_merchan=$hasil[id_merchan]'>EDIT</a></td>";
        echo "<td align='center'><a href='#' onclick=\"if(confirm('Apakah Data Yakin Di Hapus')) {window.location.href='merchan_proses.php?status=hapus&id_merchan=$hasil[id_merchan]';}\">HAPUS</a></td>";
        echo "</tr>";
        $no++;
    }
    ?>
</table>