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
        <header>
            
        </header>
        
    <div class="wrapper fadeInDown">
        <div id="formContent">
        <h1>Sign-up</h1>  
  <form action ="includes/signup.inc.php" method="POST" >
    <input type="text" class="form-control" name="first"  placeholder="FirstName">
     <input type="text" class="form-control" name="last"  placeholder="LastName">
    <input type="text" class="form-control" name="email"  placeholder="E-mail">
     <input type="text" class="form-control" name="uid"  placeholder="Username">
    <input type="password" class="form-control" name ="pwd" placeholder="Password">
  <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
  </form>
        </div>
    </div>
    <button type="submit"></button>
    
    </body>
    </html>