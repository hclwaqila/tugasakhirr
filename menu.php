<span>
    SELAMAT DATANG ADMIN
    <br></br>
    <?php echo $_SESSION['nama_admin'];?>
    <br></br>
    <img src=<?php echo $_SESSION['foto_admin']?> width="90"
    style="border-radius: 60px; -moz-border-radius: 60px;"/>
</span>
<ul align = 'left'>
    <li>
        <a href="index.php?page=admin_tampil">ADMIN</a>
    </li>
    <li>
        <a href="index.php?page=berita_tampil">BERITA</a>
    </li>
    <li>
        <a href="index.php?page=galeri_tampil">GALERI</a>
    </li>
    <li>
        <a href="index.php?page=game_tampil">GAME</a>
    </li>
    <li>
        <a href="index.php?page=merchan_tampil">MERCHANDISE</a>
    </li>
    <li>
        <a href="index.php?page=pembuat_tampil">PEMBUAT</a>
    </li>
    <li>
        <a href="index.php?page=komentar_tampil">KOMENTAR</a>
    </li>


   
</ul>

<ul>
    <li>
        <a href="logout.php">LOGOUT</a>
    </li> 
</ul>