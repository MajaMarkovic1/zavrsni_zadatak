
<?php 
session_start();
include('include/header-login.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
          

            <form method="post" action="">
                
                <label>Email </label><br>
                <input type='text' name='email'>
                <br></br>
                <label>Password </label><br>
                <input type='text' name='password'>
                <br></br>
                <input type='submit' class='btn' name='login' value='Log in'>
                <br></br>
                <?php
                    if (isset($_POST['login'])){
                            if (empty($_POST['email']) || empty($_POST['password'])) {
                                ?>
                                <div class="alert alert-warning">Fields cannot be empty!</div>
                                <?php 
                            } else {
                        
                                $sql1 = 'SELECT * FROM users';
                                $statement1 = $connection->prepare($sql1);
                                
                                $statement1->execute();
                                $statement1->setFetchMode(PDO::FETCH_ASSOC);

                                // punimo promenjivu sa rezultatom upita

                                $users = $statement1->fetchAll();
                                //var_dump($users);


                                foreach ($users as $user){
                                    //var_dump($user);
                                    if($_POST['email'] === $user['email'] && $_POST['password'] === $user['password'] ){
                                    
                                        session_unset();
                                        
                                        $_SESSION = [
                                            'firstName' => $user['first_name'],
                                            'lastName' => $user['last_name'],
                                            'email' => $user['email']
                                        ];
                                    
                                        header('Location:posts.php?user='.$_SESSION['firstName'].'');
                                        
                                    }
                                
                                }

                                ?>
                                <div class="alert alert-warning">You are not registered yet!</div>
                                <?php 
                            
                        }
                    }
                            
                    ?>
                
            </form>
          
        </div><!-- /.blog-main -->


    <div><!-- /.row -->
</main><!-- /.container -->

<script src='index.js'></script>

<?php include('include/footer.php'); ?>