<?php
session_start();
 include('include/header-login.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
               
            <form class="form" action="" method="POST">
                
                <label for="firstName">First Name</label><br>
                <input type="text" name="firstName"><br>
                <label for="lastName">Last Name</label><br>
                <input type="text" name="lastName"><br>
                <label for="email">Email</label><br>
                <input type="email" name="email"><br>
                <label for="password">Password</label><br>
                <input type="password" name="password"> <br>
                <br></br>
               <button class='btn' name='submit' type="submit">Register</button>

                <?php

            	if (isset($_POST['submit'])) {
                    if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password'])){
                    
                            ?>
                            <div class="alert alert-warning">Fields cannot be empty!</div>
                            <?php 
                            $error = 1;
                    } else {
                        $sql1 = 'SELECT email FROM users';
                        $statement1 = $connection->prepare($sql1);
                        
                        $statement1->execute();
                        $statement1->setFetchMode(PDO::FETCH_ASSOC);
            
                        // punimo promenjivu sa rezultatom upita
            
                        $emails = $statement1->fetchAll();
                        //var_dump($emails);
                
                        foreach ($emails as $email){
                            //var_dump($email);
                            if($_POST['email'] === $email['email']){
                                ?>
                                <div class="alert alert-warning">Email is taken. Please select another!</div><?php 
                                $error = 1;
                             } 
                          
                        }
                    }
                }
                    if (isset($_POST['submit']) && empty($error)){
                        //$_POST['password'] = crypt($_POST['password']);
                        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES 
                        ('{$_POST['firstName']}', '{$_POST['lastName']}', '{$_POST['email']}', '{$_POST['password']}')";
            
                        $statement = $connection->prepare($sql);
                        
                        $statement->execute();
                
                        session_unset();
                
                        $_SESSION = [
                                    'firstName' => $_POST['firstName'],
                                    'lastName' => $_POST['lastName'],
                                    'email' => $_POST['email']
                                ];
                
                        header('Location:posts.php?user='.$_POST['firstName'].'');

                    }
  
 
                ?>
	        </form>
            <br>
        </div><!-- /.blog-main -->

    <div><!-- /.row -->
</main><!-- /.container -->

<script src='index.js'></script>

<?php include('include/footer.php'); ?>