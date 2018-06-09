<?php
 
    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog1";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
      
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="blog-masthead">
            <div class="container">
                <nav class="nav">
                    <a id='nav-link-login' class="nav-link" href="login.php">Log in</a>
                    <a id='nav-link-register' class="nav-link" href="register.php">Register</a>
                    
                </nav>
                <script>

                    if (document.location.href.indexOf('login') > -1) {
                        document.getElementById('nav-link-login').className += ' active'
                    } else  {
                        document.getElementById('nav-link-register').className += ' active'
                    }

                    // Loop through the buttons and add the active class to the current/clicked button
                    </script>
            </div>
        </div>

       
    </header>

