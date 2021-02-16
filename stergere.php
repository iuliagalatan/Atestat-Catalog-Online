<?php
	
	session_start();
	include ("module/modul-conectare.php");
    include ("module/modul-functii.php");
    include ("module/modul-setari.php");
    
	
	if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            
			$sql = Query_Delete("DELETE * FROM catalog WHERE id = '{$check}'");
		
			CreareAlerta("Note sterse", "success");
			 }
	header("Location: ./?pagina=stergere");
}
?>