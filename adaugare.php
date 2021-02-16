<?php
    session_start();
    include ("module/modul-conectare.php");
    include ("module/modul-functii.php");
    include ("module/modul-setari.php");
    $clean = [
        //valorile primite cu post le punem aici si le escapuim
        'id_user' => intVal($_POST['id_user']),
        'materie' => DB_Escape_String($_POST['materie']),
        'nota' => intval($_POST['nota']),
        'data' => date($_POST['data'])
    ];
	
	
	if ( CitesteDateUser($clean['id_user']) == 0 || empty($clean['materie']) || $clean['nota'] < 1 || $clean['nota'] > 10  || empty($clean['data']) )
    {
        CreareAlerta("Completeaza toate campurile", "danger");
    }
    else
    {
        $query = CreareQueryInsert("catalog", $clean);
        Query_Insert($query);
        CreareAlerta("Nota adaugata", "success");
    }
    header("Location: ./?pagina=adaugare");