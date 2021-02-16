<?php
    session_start();    
    include ("./module/modul-conectare.php");
    include ("./module/modul-functii.php");
    include ("./module/modul-setari.php");

    if (isset($_POST['submit']))
    {
        $uid =DB_Escape_String($_POST['uid']);
        $pwd =DB_Escape_String(Parola($_POST['pwd']));   
        if ( empty($uid) || empty($pwd))
        {
            CreareAlerta("Completeaza toate campurile", "danger");
            header("Location: ./");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM users WHERE user_uid='{$uid}' AND user_pwd='{$pwd}'";
            $rez = Query_Select($sql);
            if(Count($rez) != 1)
            {
                CreareAlerta("User/parola incorecte.", "danger");
                header("Location: ./");
                exit();
            }
            else
            {
                $_SESSION['u_id'] = $rez[0]['user_id'];
                header("Location: ./");
                exit();
            }
        }
        
        
    }
