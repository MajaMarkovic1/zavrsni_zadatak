<<<<<<< HEAD
<?php session_unset(); ?>

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
    <link type='text/css' href="styles/blog.css" rel="stylesheet"/>
    <link type='text/css' href="styles/styles.css" rel="stylesheet"/>
  
</head>
<body>
    <header>
        <div class="blog-masthead">
            <div class="container">
                
                <nav class="nav">
                    <a id='nav-link-login' class="nav-link" href="login.php">Log in</a>
                    <a id='nav-link-register' class="nav-link" href="register.php">Register</a>
                </nav>
            </div>
        </div>
    </header>
    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
            
=======
<?php 
session_start();
session_unset();

include('include/header-login.php') ?>

    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
>>>>>>> master
                <h1>Welcome to the Bootstrap blog! Enjoy!</h1>
                <br></br>
            </div><!-- /.blog-main -->

        <div><!-- /.row -->
    </main><!-- /.container -->

<?php include('include/footer.php'); ?>

