
<?php include('include/header.php'); ?>
<main role="main" class="container">

    <div class="row">
    <form action='' method='POST'>
            Title: <br><input name='title' type='text'><br>
            Author: <br><input name='author' type='text'><br>
            text: <br><textarea name='body' type='text' rows='6'></textarea><br>
            Date: <br><input name='created_at' type='text'><br>
            
            <button type='submit' name='submit'>Submit</button>
            <?php
        if (isset($_POST['submit'])){
            if (!empty($_POST['title']) || !empty($_POST['author']) || !empty($_POST['body']) || !empty($_POST['created_at'])){
                
                $sql = "INSERT INTO posts (title, body, author, created_at) VALUES (
                    '{$_POST['title']}',
                    '{$_POST['body']}',
                    '{$_POST['author']}',
                    '{$_POST['created_at']}'
                    
                    )";
                    $statement = $connection->prepare($sql);
                                
                    // izvrsavamo upit
                    $statement->execute();
                //header('location:posts.php');
            } else { ?>
                <div class="alert alert-danger"><strong>Danger!</strong> You must fill all the fields.</div>
            <?php }
        
            }

        ?>
    </form>
    <?php include('include/sidebar.php'); ?>
    <div><!-- /.row -->

</main><!-- /.container -->
    

    <?php include('include/footer.php'); ?>
