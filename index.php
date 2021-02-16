<?php
    session_start();
    include ("module/modul-conectare.php");
    include ("module/modul-functii.php");
    include ("module/modul-setari.php");
    
    
    $user_conectat = CitesteDateUser(Login());
    
    $pagina = 'index';
    if (isset($_GET['pagina']))
        $pagina = $_GET['pagina'];
    
    if(! Login())
    {
    ?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Login</title>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
            <link rel="stylesheet" href="stylesheet.css" >

		
        </head>
    <body>
        
     <div class="wrapper fadeInDown">
        <div id="formContent">
        
    <div class = "container">
        <h1>Intra in Cont </h1>
        <header>
            <?php
              AfisareAlerta();
            ?>
        </header>
  <div class="form-group">
    <form action="login.php" method="POST">
    <label >Username</label>
    <input type="text" class="form-control" name="uid" placeholder="User">
    <label >Password</label>
    <input type="password" class="form-control" name="pwd" placeholder="Password">
  <button type="submit" class="btn btn-primary" name="submit">Log in</button>
  
 <a href="signup.php"> <button type="button" class="btn btn-primary">Sign up</button></a>
  
 </form>
    </div>
    </div>
        </div>
    </body>
</html>
    <?php
    die();
  }
  else
  {
    // daca nu este autentificat
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?=$app_name . " - " . $page_titles[$pagina]?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	 <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css.map">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
	
</head>
<body>
<section class="hero is-primary is-primary">
  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">
            Buna, <?=$user_conectat['user_first'] . " " . $user_conectat['user_last']?>
          </a>
          <span class="navbar-burger burger" data-target="navbarMenuHeroA">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroA" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item <?=$pagina == "index"?"is-active":""?>" href="./">
              Acasa
            </a>
              <?php
                if( EsteAdmin(Login()))
                {
                ?>
					
                    <a class="navbar-item <?=$pagina == "adaugare"?"is-active":""?>"  href="./?pagina=adaugare">Adaugare</a>
                    <a class="navbar-item <?=$pagina == "afisare"?"is-active":""?>"  href="./?pagina=afisare">Filtrare</a>
					<a class="navbar-item <?=$pagina == "stergere"?"is-active":""?>"  href="./?pagina=stergere">Stergere</a>
                <?php
                }
                if(EsteElev(Login()))
                {
                  ?>
				  <a class="navbar-item <?=$pagina == "absente"?"is-active":""?>"  href="./?pagina=absente">Absente</a>
                  <a class="navbar-item <?=$pagina == "statistici"?"is-active":""?>"  href="./?pagina=statistici">Statistici-Note</a>
                  <a class="navbar-item <?=$pagina == "chart"?"is-active":""?>"  href="./?pagina=chart">Raport-Note</a>
                  <?php
                }
                ?>
            <span class="navbar-item">
              <a class="button is-primary is-inverted" href="./logout.php">
                <span class="icon">
                  <i class="fab fa-github"></i>
                </span>
                <span>Log Out</span>
              </a>
            </span>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title" id="titlu">
        Catalog online
      </h1>
      <h2 class="subtitle">
        De Iulia Galatan
      </h2>
    </div>
  </div>

  <!-- Hero footer: will stick at the bottom -->
  <div class="hero-foot">
    <nav class="tabs">
      <div class="container">
        
      </div>
    </nav>
  </div>
</section>
    <div class="container">
        <?php
          AfisareAlerta();
            $nf = "pagini/pagina-{$pagina}.php";
            if (file_exists($nf))
                include $nf;
            else
            {
                print("pagina nu exista!");
            }
            
        ?>
    </div>
  </body>
</html>      
    <?php
  }