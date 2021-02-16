
<?php

	if( EsteAdmin(Login()))
	{
		?>
                    <h1 class="title is-1">Lista Absentelor Tuturor Elevilor</h1>
		<?php
	}
	else
	{
		?>
					<h1 class="title is-1">Lista Absentelor Tale</h1>
		<?php
	}

	if( EsteAdmin(Login()))
	{
		 $rez = Query_Select("SELECT absente.materie, absente.data, users.user_first, users.user_last FROM absente INNER JOIN users ON users.user_id=absente.id_user");
	}
	else
	{
		$rez = Query_Select("SELECT absente.materie, absente.data, users.user_first, users.user_last FROM absente INNER JOIN users ON users.user_id=absente.id_user WHERE absente.id_user='".Login()."'");

	}
    
    
    if (Count($rez) == 0)
    {
        print("Niciun rezultat returnat!!!!!!!!!!!");
    }
    else
    {
		?>
       
<table class="table">
	<tr>
		<?php
			$id_user_logat = Login();
			$cnt = 0;
			foreach($materii as $materie)
			{
				if ( !EsteAdmin(Login()) )
				{
					$lista_abs=Query_Select("SELECT * FROM absente WHERE id_user={$id_user_logat} AND materie='{$materie}'");
				}
				else
				{
					$lista_abs=Query_Select("SELECT * FROM absente'");

				}
				if(Count($lista_abs) > 0)
				{
				$cnt ++;
				?>
					<td>
						<div class="card">
							<div class="card-body">
							  <h5 class="card-title"><?=$materie?></h5>
							  <ul>
								<?php
									 $cnt1 = 0;
									foreach($lista_abs as $absente)
									{
										$cnt1 ++;

										?>
											<li>
												<span class="label label-default">
													 <?=$absente['data']?>
												</span>
											</li>
										<?php
									}
								?>
								<ul>
							</div>
							
						</div>
					</td>
				<?php
				if($cnt % 4 == 0)
					print "</tr><tr>";
				}
			}
		?>
	</tr>
</table>
<?php
    }
?>