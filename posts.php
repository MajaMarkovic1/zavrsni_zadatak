<?php include('db.php')?>

 <?php include('include/header.php'); ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
            <?php

                // pripremamo upit
                $posts = database("SELECT * FROM posts ORDER BY posts.created_at DESC", $connection);
        
                foreach ($posts as $post) {
            ?>

            <div class="blog-post">
                <a href='single-post.php?post_id=<?php echo $post['id']?>' class="blog-post-title"><h2><?php echo $post['title']?></h2></a>
                
                <p class="blog-post-meta"><?php echo $post['created_at']?> by <a href="#"><?php echo $post['author']?></a></p>

                <p ><?php echo $post['body']?></p>
            </div><!-- /.blog-post -->

            <?php
                }
            ?>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
            
        </div><!-- /.blog-main -->

        <?php include('include/sidebar.php'); ?>
    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('include/footer.php'); ?>
