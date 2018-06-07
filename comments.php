
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
   
    if (isset($_POST['submit'])){
        if(!empty($_POST['name']) || !empty($_POST['comment'])) {

    
                $sql = "INSERT INTO comments (author, text, post_id) 
                VALUES ('{$_POST['name']}', '{$_POST['comment']}', '{$_POST['post_id']}')";
                // pripremamo upit
                $statement = $connection->prepare($sql);
            
                // izvrsavamo upit
                $statement->execute();
                $id = $_POST['post_id'];
                //echo $id;
                header('Location: single-post.php?post_id='.$id.'');
            } else {
                $id = $_POST['post_id'];
                header('Location: single-post.php?post_id='.$id.'&error=1');
                
            }
        } 

  

   ?>


