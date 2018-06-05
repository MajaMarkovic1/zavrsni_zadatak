<?php include('db.php')?>

<?php include('include/header.php'); ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
                if (isset($_GET['post_id'])) {
                    
                // pripremamo upit
                $sql = "SELECT p.created_at,p.author, p.title, p.body, c.author as user, c.text
                  
                FROM posts as p INNER JOIN comments as c
                ON p.id = c.post_id 
                WHERE p.id = {$_GET['post_id']}";

                $singlePost = database($sql, $connection, 'fetch');
                    
                
        
            ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $singlePost['title']?></h2>
                <p class="blog-post-meta"><?php echo $singlePost['created_at']?> by <a href="#"><?php echo $singlePost['author']?></a></p>

                <p><?php echo $singlePost['body']?></p>
            </div><!-- /.blog-post -->

            <?php
                 
            ?>
            <div>Comments: </div><br>
            <?php
                
                $comments = database($sql, $connection, 'fetchAll');
                //var_dump($comments);
                    foreach ($comments as $comment){
                
            ?>
            <ul>
                <li><?php echo $comment['user'] ?><br><?php echo $comment['text'] ?></li><hr>

            </ul>
            <?php
                } 
            } else {
                echo('post_id nije prosledjen kroz $_GET');
            }
            ?>
        </div><!-- /.blog-main -->

        <?php include('include/sidebar.php'); ?>

    <div><!-- /.row -->

</main><!-- /.container -->

<?php include('include/footer.php'); ?>
