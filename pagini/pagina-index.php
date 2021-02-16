<div class = "container">
<section class="section">
    <div class="container">
      <h1 class="title"> <?" "?></h1>
      
    </div>
  </section>
<div class="tile is-ancestor">
  <div class="tile is-vertical is-12">
    <div class="tile is-parent">
      <article class="tile is-child notification is-warning">
        
<?php

	if( EsteAdmin(Login()))
	{
		?>
                    <p class="title">Lista notelor Elevilor</p><div class="content">
		<?php
	}
	else
	{
		?>
					 <p class="title">Lista notelor tale</p><div class="content">
		<?php
	}

	if( EsteAdmin(Login()))
	{
		 $rez = Query_Select("SELECT catalog.nota,catalog.materie, catalog.data, users.user_first, users.user_last FROM catalog INNER JOIN users ON users.user_id=catalog.id_user");
		 $abs = Query_Select("SELECT absente.materie, absente.data, users.user_first, users.user_last FROM absente INNER JOIN users ON users.user_id=absente.id_user");

	}
	else
	{
		$rez = Query_Select("SELECT catalog.nota,catalog.materie, catalog.data, users.user_first, users.user_last FROM catalog INNER JOIN users ON users.user_id=catalog.id_user WHERE catalog.id_user='".Login()."'");
		$abs = Query_Select("SELECT absente.materie, absente.data, users.user_first, users.user_last FROM absente INNER JOIN users ON users.user_id=absente.id_user WHERE absente.id_user='".Login()."'");

	}
    
    
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
		?>
		
		</article>
		
		 <article class="tile is-child notification is-warning">
			<p class="title">Lista absentelor </p><div class="content">
		 <?php
			AfisareTabel($abs,
                     [
                      'user_first' => 'Numele',
						'user_last' => 'Prenumele',
					  'materie' => 'Materia',
                      
                      'data' => 'Data'
                    ]
        );
    }
?>
</article>
</div>
</div>
</div>