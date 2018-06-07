<?php include('include/header.php'); ?>


<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
            if (isset($_GET['post_id'])) {
                            
                $sql = "SELECT p.id, p.created_at,p.author, p.title, p.body, c.author as user, c.id as comment_id, c.text, c.post_id
                                
                FROM posts as p LEFT JOIN comments as c
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
            <div class="blog-post" >
                
                <h2 class="blog-post-title"><?php echo $post['title']?></h2>
                <p class="blog-post-meta"><?php echo $post['created_at']?> by <a href="#"><?php echo $post['author']?></a></p>

                <p><?php echo $post['body']?></p>

            </div><!-- /.blog-post -->



            <form action='delete-post.php' method='POST' onsubmit='return myFunction()'>
                    <input name='post_id' type='hidden' value='<?php echo $_GET['post_id']?>'>
                    <button name='del-post' class='btn' id='delbtn'>Delete post</button>
               
            </form>
            <script>
            
                function myFunction() {
                   
                    var del = prompt("Do you really want to delete this post?", 'Ok');
                    if (del != null) {
                        return true
                    } else {
                        
                        
                    }
                    //document.getElementById("").innerHTML = txt;
                }
            
            </script>
            
         
                   
       
            <form action='comments.php' method='POST'>
                Ime: <br><input name='name' type='text'><br>
               
                Komentar: <br><input name='comment' type='text'><br><br>
                <input type="hidden" name="post_id" value=<?php echo $post['id'] ?>>
                <button type='submit' name='submit'>Submit</button><br>
                
                <?php if (!empty($_GET['error'])) {  ?>
                    <div class="alert alert-danger"><strong>Danger!</strong> All fields are required.</div>
                <?php } ?>
                
            </form>

    

        <div class='koment'>
                    

            <br><button type='button' id='btn' class='btn'>Hide comments</button>
            
            <ul id="comments">
            <?php
                 
                // var_dump($singlePost);
                foreach ($comments as $comment){
                    //var_dump($comment);
               
            ?>
           
               
            <form action='delete-comment.php' method='POST'>
                <input name='comm' type='hidden' value='<?php echo $comment['comment_id']?>'>
                <input name='post_id' type='hidden' value='<?php echo $_GET['post_id']?>'>
                
                <li ><?php echo $comment['user']; echo "<br>"; echo $comment['text'] ?></li>
                <button name='delete' class='btn' type='submit'>Delete</button><hr>

            </form>
           
           
            
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
        </div>
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

<script src='index.js'>

</script>

<?php include('include/footer.php'); ?>
