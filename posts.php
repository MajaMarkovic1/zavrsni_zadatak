

 <?php include('include/header.php'); ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
            <?php

                // pripremamo upit
                $sql = "SELECT * FROM posts ORDER BY posts.created_at DESC";

                $statement = $connection->prepare($sql);
                                
                // izvrsavamo upit
                $statement->execute();

                // zelimo da se rezultat vrati kao asocijativni niz.
                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                $statement->setFetchMode(PDO::FETCH_ASSOC);

                // punimo promenjivu sa rezultatom upita

                $posts = $statement->fetchAll();
        //var_dump($posts);
                foreach ($posts as $post) {
            ?>

            <div class="blog-post">
                <a href='single-post.php?post_id=<?php echo $post['id']?>' class="blog-post-title"><h2><?php echo $post['title']?></h2></a>
                
                <p class="blog-post-meta"><?php echo $post['created_at']?> <a href="#"><?php echo $post['author']?></a></p>

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
