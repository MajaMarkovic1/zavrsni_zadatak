<?php 
    $servername = "localhost";
    $username = "root";
    $password = "vivify";
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
    if (isset($_POST['delete'])){
        $sql = 'DELETE FROM comments WHERE id ='.$_POST['comm'].'';
        $statement = $connection->prepare($sql);
                    
        // izvrsavamo upit
        $statement->execute();
        header('Location: single-post.php?post_id='.$_POST['post_id'].'');
        
    }
?>