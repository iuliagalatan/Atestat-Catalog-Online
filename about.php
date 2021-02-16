<!DOCTYPE html>
    
    <?php
    session_start();
   ?>
    <html>
        <head>
            <title>Contul tau</title>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
             <link rel="stylesheet"  href="stil2.css">
        </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand"><h1>Ai intrat in cont!!</h1></a>
			<a class="navbar-brand"><h1>Buna,  $_SESSION['u_first']</h1>
            <form class="form-inline">
              <a href="/proiect-login/index.php"><button  class="btn btn-outline-success my-2 my-sm-0" type="button" class="btn btn-primary">Log out</button></a>
              
            </form>
          </nav>
            
            
            <h2>Jurnalul meu</h2>
            <table class ="table" >
            <th  scope="row" >Intrari jurnale</th>
             <?php
                $continut = file_get_contents("data/jurnal.txt");
                $linii = explode("\n", $continut);
                foreach($linii as $linie)
                {
                ?>
                <tr>
                <td>
                    <?=$linie?>
                </td>
                </tr>      
            <?php
                 }?>
            
            </table>
            
    <div class="container">
    <div class="row">
    <div class="col-md-6">
    	<div class="widget-area no-padding blank">
			<div class="status-upload">
				<form action="includes/addline.php" method="POST">
					<textarea type="text" name="Text" placeholder="Draga Jurnalule..." ></textarea>
					<button type="submit" class="btn btn-success green" name="submit" ><i class="fa fa-share"></i> Save</button>
				</form>
			</div>
		</div>
	</div>
    </div>
</div>
            
            
       
        </div>
    </body>
    </html>