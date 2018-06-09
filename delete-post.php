<?php 

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


    if (isset($_POST['del-post'])){
         
         $sql = 'DELETE FROM posts WHERE id ='.$_POST['post_id'].'';
         $statement = $connection->prepare($sql);
                     
         // izvrsavamo upit
         $statement->execute();
         $sql1 = 'DELETE FROM comments WHERE post_id ='.$_POST['post_id'].'';
         $statement1 = $connection->prepare($sql1);
                     
         // izvrsavamo upit
         $statement1->execute();
         
        header('Location: posts.php');
        
    }
?>