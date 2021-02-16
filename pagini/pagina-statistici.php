<?php
	$id_user_logat = Login();
?>
<table class="table">
	<tr>
		<?php
			$cnt = 0;
			foreach($materii as $materie)
			{
				$lista_note=Query_Select("SELECT * FROM catalog WHERE id_user={$id_user_logat} AND materie='{$materie}'");
				if(Count($lista_note) > 0)
				{
				$cnt ++;
				?>
					<td>
						<div class="card">
							<div class="card-body">
							  <h5 class="card-title"><?=$materie?></h5>
							  <ul>
								<?php
									$suma = 0; $cnt1 = 0;
									foreach($lista_note as $nota)
									{
										$cnt1 ++;
										$suma += $nota['nota'];
										?>
											<li>
												<span class="label label-default">
													<?=$nota['nota']?> / <?=$nota['data']?>
												</span>
											</li>
										<?php
									}
								?>
								<ul>
							</div>
							<div class="card-footer text-muted">
								Media curenta: 
								<?=$cnt1==0?"-":sprintf("%.2f", $suma/$cnt1)?>
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