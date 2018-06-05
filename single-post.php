<?php include('db.php')?>

<?php include('include/header.php'); ?>



<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
                if (isset($_GET['post_id'])) {
                    
                // pripremamo upit
                $sql = "SELECT p.created_at,p.author, p.title, p.body, c.author as user, c.text
                  
                FROM posts as p LEFT JOIN comments as c
                ON p.id = c.post_id 
                WHERE p.id = {$_GET['post_id']}";

                $posts = database($sql, $connection, 'fetchAll');
                
                $comments = [];
                //var_dump($posts);
                foreach($posts as $post){
                  
                    array_push($comments, ['user' => $post['user'], 'text' => $post['text']]);

                }
                // var_dump($comments);
                
        
            ?>
            <div class="blog-post">
                
                <h2 class="blog-post-title"><?php echo $post['title']?></h2>
                <p class="blog-post-meta"><?php echo $post['created_at']?> by <a href="#"><?php echo $post['author']?></a></p>

                <p><?php echo $post['body']?></p>
            </div><!-- /.blog-post -->

            <form action='#' method='POST'>
                
            </form>

            <button type='button' id='btn' class='btn'>Hide comments</button>
            
            <div >Comments: </div><br>
            <ul id="comments">
            <?php
                
                // var_dump($singlePost);
                foreach ($comments as $comment){
                
            ?>
            
                <li ><?php echo $comment['user'] ?><br><?php echo $comment['text'] ?></li><hr>

            
            <?php
                } 
            } else {
                echo('post_id nije prosledjen kroz $_GET');
            }
            ?>
                </ul>
            
        </div><!-- /.blog-main -->

        <?php include('include/sidebar.php'); ?>

    <div><!-- /.row -->

</main><!-- /.container -->

<script src='index.js'>

</script>

<?php include('include/footer.php'); ?>
