<h3 align="center">DATA ADMIN</h3>
<br></br>
<?php
    echo "<a href='index.php?page=admin_tambah'><input type='submit' name='input' value='TAMBAH DATA'></a>";
    //echo "<a href='admin_tambah.php'><input type='submit' name='input' value='TAMBAH DATA'></a>";
?>

<table border="1" style="text-align: center;" >
    <tr bgcolor= #85aadf>
        <td width=5% >NO.</td>
        <td width=5% >USERNAME</td>
        <td width=5% >NAMA ADMIN</td>
        <td width=5% >NO TELP ADMIN</td>
        <td width=5% >ALAMAT ADMIN</td>
        <td width=5% >FOTO ADMIN</td>
        <!-- <td width=5% colspan="2" >AKSI</td> -->

    </tr>
    <?php
    include "../config/koneksi.php";
    $no="1";
    $tampil_pelajar = mysqli_query ($koneksi,
    "SELECT * FROM tb_admin");
    while ($hasil=mysqli_fetch_array($tampil_pelajar))
    {
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>$hasil[user_name]</td>";
        echo  "<td>$hasil[nama_admin]</td>";
        echo  "<td>$hasil[no_telp_admin]</td>";
        echo  "<td>$hasil[alamat_admin]</td>";
        // echo  "<td>$hasil[foto_admin]</td>";
        echo  "<td><img src='$hasil[foto_admin]' width=100 height=100></td>";
        //echo  "<td align='center'><a href='admin_tambah.php?user_name=$hasil[user_name]'>EDIT</a></td>";
        // echo  "<td align='center'><a href='index.php?page=admin_tambah&user_name=$hasil[user_name]'>EDIT</a></td>";
        // echo  "<td align='center'><a href='#' onclick=\"if(confirm('apakah data yakin dihapus?'))
        // {window.location.href='admin_proses.php?status=hapus&user_name=$hasil[user_name]';}\">HAPUS</a></td>";
        echo "</tr>";
        $no++;
    }

    ?>
  
</table>