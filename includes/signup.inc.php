<?php

if(isset($_POST['submit'])){
    
    include_once 'dbh.inc.php';
    
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    //pt spatii necompletate
    if ( empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) )
    {
        echo("completeaza toate campurile");
    }else{
        //daca caracterele sunt valide
        if ( !preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
        {
            echo("caractere interzise");    
        }else{
            //daca email e ok
            if ( !filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo("email invalid");
            }
            else{
                
                        //insert in baza de date
                        $sql="INSERT INTO users(user_first, user_last, user_email, user_uid, user_pwd) VALUES('$first', '$last', '$email', '$uid', '$pwd');";
                        $result = mysqli_query($conn, $sql);
                         header("Location: ../index.php");
                         exit();
                 }
        }
    }
    
    
}else{
    header("Location: ../signup.php");
    exit();
    
}