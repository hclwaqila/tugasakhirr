<?php session_start();?>
<html>
    <head>
        <title>NAMA ADMIN</title>
        <link rel="stylesheet" href="surabaya.css"></link>     
<head>
<body> 
    <div id="header">
        HALAMAN ADMIN   
    </div>
    <?php
        if(isset($_SESSION['user_name'])){
    ?>
    <div id="menu">
        <?php include "menu.php"?>   
    </div>
    <div id="isi">
        <?php include "isi.php"?>
    </div>
    <?php
        }else include "login.php"; 
    ?>
    <div id="footer">
        Copyright 2025 by qila
    </div>    
</body>
</html>