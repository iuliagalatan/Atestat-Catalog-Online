<?php
    session_start();    
    include ("./module/modul-conectare.php");
    include ("./module/modul-functii.php");
    include ("./module/modul-setari.php");
            
    if(isset($_SESSION['u_id']))
    {
        $_SESSION['u_id'] = $rez[0]['user_id'];
    }
    header("Location: ./");
    exit();
    