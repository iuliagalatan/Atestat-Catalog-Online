<?php
  if(EsteAdmin(Login()))
  {
?>
<div class = "container">
<section class="section">
    <div class="container">
      <h1 class="title">Stergere Nota-Elev</h1>
      <h2 class="subtitle">
        Formularul de stergere al notelor elevilor
      </h2>
    </div>
  </section>

<div class="tile is-ancestor">
  <div class="tile is-vertical is-8">
    <div class="tile is-parent">
      <article class="tile is-child notification is-warning">
        <p class="title">Stergere Nota-Elev</p><div class="content">
         
		  
		  <form method="get" id ="forma">
		  <input type="hidden" name="pagina" value="stergere">
		   <div class="form-group">
            <label class="control-label" for="id_user">Alege elev</label>
            <select name="id_user" id="id_user"  class ="form-control">
              <?php
			  
                $elevi = Query_Select("SELECT * FROM users WHERE este_elev=1 ORDER BY user_first");
                foreach($elevi as $elev)
                {
                  ?>
				 
                    <option value="<?=$elev['user_id']?>"><?=$elev['user_first']." ". $elev['user_last']?></option>
                  <?php
                }
              ?>
            </select>
			<button type="submit" form="forma"  class="btn btn-primary">
              Cauta
            </button>
			</div>
          </form>
		  
         
<?php
$id_user="";

    if(isset($_GET['id_user']))
    {
		$id_user=intVal($_GET['id_user']);
		
		///print $id_user;
		///$rez = Query_Select("SELECT nota, materie , data FROM catalog WHERE id_user='{$id_user}'");
		$prez = Query_Select("SELECT catalog.id, catalog.nota,catalog.materie, catalog.data, users.user_first, users.user_last FROM catalog INNER JOIN users ON users.user_id=catalog.id_user WHERE catalog.id_user='{$id_user}'");
        if (Count($prez) == 0)
        {
		
			
            print("Niciun rezultat returnat!!!!!!!!!!!");
        }
        else
        {
			$buton=true;
			?>
			<form action="stergere.php" method="POST">
			<div class="form-group"><?php
            AfisareTabel($prez,
                     [
						'id'=>'id',
                      'user_first' => 'Prenume',
					  'user_last' => 'Nume',
					  'materie' => 'Materia',
                      'nota' =>'Nota',
                      'data' => 'Data'
                    ], $buton
            );
			?><div class="form-group text-right">
            <button type="submit" class="btn btn-primary">
              Stergere
            </button>
          </div><?php  
		  }
    }
?>




<?php
  }
  else
    print "Zona rezervata administratorului.";
?>