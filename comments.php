<<<<<<< HEAD
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
   
    if (isset($_POST['submit'])){

        if(!empty($_POST['name']) || !empty($_POST['comment'])) {
    
            $sql = "INSERT INTO comments (author, text, post_id) 
            VALUES ('{$_POST['name']}', '{$_POST['comment']}', '{$_POST['post_id']}')";
            // pripremamo upit
            $statement = $connection->prepare($sql);
        
            // izvrsavamo upit
            $statement->execute();
            
            //echo $id;
            header('Location: single-post.php?post_id='.$_POST['post_id'].'');
            
        } else {
            
            header('Location: single-post.php?post_id='.$_POST['post_id'].'&error=1');
            
        }
    } 

?>


=======
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
   
    if (isset($_POST['submit'])){

        if(!empty($_POST['name']) || !empty($_POST['comment'])) {
    
            $sql = "INSERT INTO comments (author, text, post_id) 
            VALUES ('{$_POST['name']}', '{$_POST['comment']}', '{$_POST['post_id']}')";
            // pripremamo upit
            $statement = $connection->prepare($sql);
        
            // izvrsavamo upit
            $statement->execute();
            
            //echo $id;
            header('Location: single-post.php?post_id='.$_POST['post_id'].'');
            
        } else {
            
            header('Location: single-post.php?post_id='.$_POST['post_id'].'&error=1');
            
        }
    } 

?>


>>>>>>> master
