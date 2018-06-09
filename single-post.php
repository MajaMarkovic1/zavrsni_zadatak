<?php include('include/header.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php

                if (isset($_GET['post_id'])) {
                                
                    $sql = "SELECT p.id, p.created_at, p.title, p.body, c.author as user, c.id as comment_id, c.text,
                    c.post_id, u.first_name, u.last_name
                                    
                    FROM posts as p 
                    join users as u
                    on p.user_id = u.id
                    LEFT JOIN comments as c 
                    ON p.id = c.post_id 
                    
                    WHERE p.id = {$_GET['post_id']}";

                    // pripremamo upit
                    $statement = $connection->prepare($sql);
                                    
                    // izvrsavamo upit
                    $statement->execute();

                    // zelimo da se rezultat vrati kao asocijativni niz.
                    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                    $statement->setFetchMode(PDO::FETCH_ASSOC);

                    // punimo promenjivu sa rezultatom upita

                    $posts = $statement->fetchAll();

                    $comments = [];
                    //var_dump($posts);

                    foreach($posts as $post){
                    
                        array_push($comments, ['comment_id' => $post['comment_id'], 'user' => $post['user'], 'text' => $post['text']]);

                    }
                    //var_dump($comments);
            ?>

            <!-- prikazi post -->
            <!--  -->
            <!--  -->

            <div class="blog-post" >
                
                <h2 class="blog-post-title"><?php echo $post['title']?></h2>
                <p class="blog-post-meta"><?php echo $post['created_at']?> by <a href="#"><?php echo $post['first_name']?></a></p>
                <p><?php echo $post['body']?></p>

            </div><!-- /.blog-post -->

        
            <!-- izbrisi post -->
            <!--  -->
            <!--  -->

            <form action='delete-post.php' method='POST' onsubmit='return myFunction()' id='forma'>
                <input name='post_id' type='hidden' value='<?php echo $_GET['post_id']?>'>
                <button name='del-post' class='btn' id='delbtn'>Delete post</button>
                <br></br>
            </form>
            <script>
                function myFunction() {
                    
                    if (window.confirm("Do you really want to delete this post?")) {
                        return true
                    }
                    return false
             
                }
            </script>
            
            <!-- dodaj komentar -->
            <!--  -->
            <!--  -->

            <form action='comments.php' method='POST'>
                
                <label> Name: </label><br>
                <input name='name' type='text'><br>
                <label>Comment: </label><br>
                <input name='comment' type='text'><br><br>
                <input type="hidden" name="post_id" value=<?php echo $post['id'] ?>>
                <button type='submit' class='btn' name='submit'>Submit</button><br>
                
                <?php if (!empty($_GET['error'])) {  ?>
                    <div class="alert alert-danger"><strong>Danger!</strong> All fields are required.</div>
                <?php } ?>
                
            </form>
         
            <br>
            <button type='button' id='btn' class='btn'>Hide comments</button>
            <br></br>
            <ul id="comments">
            <label >Comments: </label><br></br>
            <?php  
                // var_dump($singlePost);
                foreach ($comments as $comment){
                    //var_dump($comment);
            ?>

           <!-- izbrisi komentar -->
           <!--  -->
           <!--  -->
               
            <form action='delete-comment.php' method='POST'>
                <input name='comm' type='hidden' value='<?php echo $comment['comment_id']?>'>
                <input name='post_id' type='hidden' value='<?php echo $_GET['post_id']?>'>
                <li ><?php echo $comment['user']; echo "<br>"; echo $comment['text'] ?></li><br>
                <button  name='delete' class='btn' type='submit'>Delete</button><hr>
            </form>
           
            <!-- sakrij komentare -->
            <!--  -->
            <!--  -->

            <?php

                if ($comment['user'] === null && $comment['text'] === null){?>

                    <script> 
                        var myBtn = document.getElementById('btn');
                        var comments = document.getElementById("comments")
                        myBtn.style.display = "none"
                        comments.style.display = "none"
                    </script>

                <?php } ?>
                <?php
                
                }?>
        
                <?php
                    } else {
                        echo('post_id nije prosledjen kroz $_GET');
                    }
                
            ?>
            </ul>
            
        </div><!-- /.blog-main -->

        <?php include('include/sidebar.php'); ?>

    <div><!-- /.row -->
</main><!-- /.container -->

<script src='index.js'></script>

<?php include('include/footer.php'); ?>
