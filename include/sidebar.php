

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <h4>Latest posts</h4>
            <ul>
            <?php
                $posts = database("SELECT * FROM posts ORDER BY posts.created_at DESC limit 5", $connection, 'fetchAll');
                //var_dump($posts);
                foreach ($posts as $post) {
            ?>
                <a href='single-post.php?post_id=<?php echo $post['id']?>'><li><?php echo $post['title']?></li></a>
                <?php } ?>
            </ul>
            <!-- <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p> -->
        </div>
    
</aside>


