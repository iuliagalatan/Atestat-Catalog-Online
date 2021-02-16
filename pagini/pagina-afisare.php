<h1 class="title"> Cautare elev </h1>

<?php
    $nume = "";
    if (isset($_GET['nume']))
        $nume = DB_Escape_String($_GET['nume']);
?>
<form>
    <input type="hidden" name="pagina" value="afisare">
    <div class="form-group">
        <label class="control-label" for="nume">
            Nume
        </label>
        <input type="text" name="nume" id="nume" class="form-control" value="<?=$nume?>">
    </div>
    
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">
            CAUTA
        </button>
    </div>
</form>

<?php
    if(isset($_GET['nume']))
    {
        $query = "SELECT catalog.nota,catalog.materie, catalog.data, users.user_first, users.user_last FROM catalog INNER JOIN users ON users.user_id=catalog.id_user WHERE lower(users.user_first) LIKE lower('{$nume}%')"; //acest query trebuie modificat
        
        $rez = Query_Select($query); 
    
        if (Count($rez) == 0)
        {
            print("Niciun rezultat returnat!!!!!!!!!!!");
        }
        else
        {
            AfisareTabel($rez,
                     [
                      'user_first' => 'Numele',
						'user_last' => 'Prenumele',
					  'materie' => 'Materia',
                      'nota' =>'Nota',
                      'data' => 'Data'
                    ]
            );
        }
    }
?>