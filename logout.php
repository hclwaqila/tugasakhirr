<?php
    session_start();
    echo "<script>alert ('Good Bye $_SESSION[nama_admin]')</script>";
    session_destroy();  
?>
<meta http-equiv="refresh" content="0;URL=index.php">