<?php
    if(isset($_GET['page']))
    {
        SWITCH ($_GET['page'])
        {
            
            case 'admin_tampil' :
                include "admin_tampil.php";
            break;
            case 'admin_tambah' :
                include "admin_tambah.php";
            break;

            case 'berita_tampil' :
                    include "berita_tampil.php";
            break;
            case 'berita_tambah' :
                    include "berita_tambah.php";
            break;

            case 'galeri_tampil' :
                include "galeri_tampil.php";
            break;
            case 'galeri_tambah' :
                include "galeri_tambah.php";
            break;

            case 'game_tampil' :
                include "game_tampil.php";
            break;
            case 'game_tambah' :
                include "game_tambah.php";
            break;

            case 'merchan_tampil' :
                include "merchan_tampil.php";
            break;
            case 'merchan_tambah' :
                include "merchan_tambah.php";
            break;

            case 'pembuat_tampil' :
                include "pembuat_tampil.php";
            break;
            case 'pembuat_tambah' :
                include "pembuat_tambah.php";
            break;

            case 'komentar_tampil' :
                include "komentar_tampil.php";
            break;
            case 'komentar_tambah' :
                include "komentar_tambah.php";
            break;
        }
    }
?>