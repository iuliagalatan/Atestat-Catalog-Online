<?php

    $mysql_server = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_database = "proiect-login";

    
    function DB_Connect( $close_connection = false)
	{
        global $mysql_server, $mysql_user, $mysql_password, $mysql_database;
		static $connection;

		if($close_connection)
		{
			mysqli_close($connection);
			$connection = false;
			return false;
		}
		if(!isset($connection) || $connection === false)
		{
			$connection = @mysqli_connect($mysql_server, $mysql_user, $mysql_password, $mysql_database);
		}
		if($connection === false) {
            print "Nu pot realiza conectarea MySQL.\n";
			die();
            return false;
        }
		mysqli_query($connection, 'SET character_set_client="utf8",character_set_connection="utf8",character_set_results="utf8";');
        return $connection;
    }

	function DB_Close(){
		return DB_Connect(true);
	}

	function DB_Escape_String($string){
        //o folosim direct
		$connection = DB_Connect();
		return mysqli_real_escape_string($connection, $string);
	}

	function DB_Error() {
        //o folosim direct
        $connection = DB_Connect();
        return mysqli_error($connection);
    }

	function DB_Query($query) {
        //o folosim direct mai rar
        $connection = DB_Connect();
		$result = mysqli_query($connection, $query);
        return $result;
    }

	function Query_Select($q){
        //o folosim direct
		$connection = DB_Connect();
		if($connection === false)
		{
			print "Conexiunea nu este disponibila\n";
			return false;
		}
		$r = DB_Query($q, $connection);
		if(!$r)
			return false;
		$rez = array();
		while($l = mysqli_fetch_array($r, MYSQLI_ASSOC))
			$rez[] = $l;
		return $rez;
	}

	function Query_Insert($q){
        //o folosim direct
		$connection = DB_Connect();
		if($connection === false)
		{
			print "Conexiunea nu este disponibila\n";
			return false;
		}
		$r = DB_Query($q, $connection);
		if(!$r)
			return false;
		return mysqli_insert_id($connection);
	}

	function Query_Update($q){
        //o folosim direct
		$connection = DB_Connect();
		if($connection === false)
		{
			print "Conexiunea nu este disponibila\n";
			return false;
		}
		$r = DB_Query($q, $connection);
		if(!$r)
			return false;
		return mysqli_affected_rows($connection);
	}

	function Query_Delete($q){
        //o folosim direct
		$connection = DB_Connect();
		if($connection === false)
		{
			print "Conexiunea nu este disponibila\n";
			return false;
		}
		$r = DB_Query($q, $connection);
		if(!$r)
			return false;
		return true;
	}

    function CreareQueryInsert($tabel, $v)
    {
        $query = "INSERT INTO `{$tabel}` (";
        $cnt = 0;
        foreach($v as $i => $x)
        {
            $cnt ++;
            if($cnt > 1)
                $query .= ' , ';
            $query .= "`{$i}`";
        }
        $query .= ") VALUES (";
        
        $cnt = 0;
        foreach($v as $i => $x)
        {
            $cnt ++;
            if($cnt > 1)
                $query .= ' , ';
            $query .= "'{$x}'";
        }
        $query .= ")";
        return $query;
    }
    