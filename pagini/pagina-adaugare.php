<?php
  if(EsteAdmin(Login()))
  {
?>
<style >
	
	#hid{
		display:none;
	}
	#hid2{
		display:none;
	}
</style>
<div class = "container">
<section class="section">
    <div class="container">
	<div class="buttons are-large">
  
      <a class="button" onclick='document.getElementById("hid").style.display= "block"'>Adauga Nota</a>
      <a class="button" onclick='document.getElementById("hid2").style.display= "block"'>Adauga Absenta</a>
    </div>
	</div>
  </section>
<div class = "hidden" id="hid">
<div class="tile is-ancestor">
  <div class="tile is-vertical is-8">
    <div class="tile is-parent">
      <article class="tile is-child notification is-warning">
        <p class="title">Adaugare Nota-Elev</p><div class="content">
        <form action="adaugare.php" method="POST">
          <div class="form-group">
            <label class="control-label" for="id_user">Alege elev</label>
            <select name="id_user" id="id_user" class="form-control">
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
          </div>
          <div class="form-group">
            <label class="control-label" for="nota">Nota</label>
            <select name="nota" id="nota" class="form-control">
              <?php
                for($i = 1 ; $i <= 10 ; $i ++)
                {
                  ?>
                    <option value="<?=$i?>"><?=$i?></option>
                  <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="materie">Materia</label>
            <select name="materie" id="materie" class="form-control">
              <?php
                foreach($materii as $materie)
                {
                  ?>
                    <option value="<?=$materie?>"><?=$materie?></option>
                  <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="data">Materia</label>
            <input type="date" name="data" id="data" class="form-control" value="<?=date("Y-m-d")?>">
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">
              Adăugare
            </button>
          </div>
        </form>
		<?php
	?>
        
        
          <!-- Content -->
        </div>
      </article>
    </div>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child notification is-success">
      <div class="content">
        <p class="title">Ultimele intrari</p>
        <p class="subtitle">Note Elevi..</p>
        <div class="content">
					<?php
           $rez = Query_Select("SELECT catalog.id, catalog.data,catalog.materie, catalog.nota, users.user_first, users.user_last FROM catalog INNER JOIN users ON catalog.id_user=users.user_id order by catalog.data DESC LIMIT 5");
					
            if (Count($rez) == 0)
            {
              print("Niciun rezultat returnat!!!!!!!!!!!");
            }
            else
            { 
              AfisareTabel($rez,
                     [
                      'user_first' => 'Nume',
                      'user_last' => 'Prenume',
                      'materie' => 'Materie',
                      'nota' =>'Nota',
                      'data' => 'Data'
                    ]
              );
            }
          ?>
        </div>
      </div>
    </article>
  </div>
</div>
</div>
</div>
<?php
  }
  else
    print "Zona rezervata administratorului.";
?>
<?php
  if(EsteAdmin(Login()))
  {
?>

<div class = "hidden" id="hid2">
<div class="tile is-ancestor">
  <div class="tile is-vertical is-8">
    <div class="tile is-parent">
      <article class="tile is-child notification is-warning">
        <p class="title">Adaugare Absenta-Elev</p><div class="content">
        <form action="adaugare2.php" method="POST">
          <div class="form-group">
            <label class="control-label" for="id_user">Alege elev</label>
            <select name="id_user" id="id_user" class="form-control">
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
          </div>
          
            
          <div class="form-group">
            <label class="control-label" for="materie">Materia</label>
            <select name="materie" id="materie" class="form-control">
              <?php
                foreach($materii as $materie)
                {
                  ?>
                    <option value="<?=$materie?>"><?=$materie?></option>
                  <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="data">Materia</label>
            <input type="date" name="data" id="data" class="form-control" value="<?=date("Y-m-d")?>">
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">
              Adăugare
            </button>
          </div>
        </form>
		<?php
	?>
        
        
          <!-- Content -->
        </div>
      </article>
    </div>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child notification is-success">
      <div class="content">
        <p class="title">Ultimele intrari</p>
        <p class="subtitle">Absente Elevi..</p>
        <div class="content">
					<?php
           $rez = Query_Select("SELECT absente.id, absente.data,absente.materie, users.user_first, users.user_last FROM absente INNER JOIN users ON absente.id_user=users.user_id order by absente.data DESC LIMIT 3");
					
            if (Count($rez) == 0)
            {
              print("Niciun rezultat returnat!!!!!!!!!!!");
            }
            else
            { 
              AfisareTabel($rez,
                     [
                      'user_first' => 'Nume',
                      'user_last' => 'Prenume',
                      'materie' => 'Materie',
                      
                      'data' => 'Data'
                    ]
              );
            }
          ?>
        </div>
      </div>
    </article>
  </div>
</div>
</div>
</div>
<?php
  }
  else
    print "Zona rezervata administratorului.";
?>

