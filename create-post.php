<?php include('include/header.php'); ?>

<main role="main" class="container">
    <div class="row">
    <div class="col-sm-8 blog-main">
        <form id='post-text' name='form' action='' method='POST' onsubmit='return validateForm()'>
            Title: <br><input name='title' type='text'><br>
            Author: <br><input name='first_name' type='text'><br>
            Text: <br><textarea  name='body' type='text' rows='6'></textarea><br>
            Date: <br><input name='created_at' type='text'><br>
            <button class='btn' type='submit' name='submit' >Submit</button>

            <script>
             function validateForm() {
                 var title = document.forms["form"]["title"].value;
                 var author = document.forms["form"]["first_name"].value;
                 var text = document.forms["form"]["body"].value;
                 var date = document.forms["form"]["created_at"].value;
                 
                 if (title,author,text,date == "") {
                     alert("All fields must be filled out");
                     return false;
                 }
             }
            </script>
            
            <?php
           
                if (isset($_POST['submit'])){
                
                    if (!empty($_POST['title']) && !empty($_POST['first_name']) && !empty($_POST['body'])
                     && !empty($_POST['created_at'])){
                
                        $sql = "INSERT INTO posts ( title, body,  created_at, user_id) VALUES (
                            '{$_POST['title']}',
                            '{$_POST['body']}',
                            '{$_POST['created_at']}',
                            (SELECT id FROM users WHERE first_name = '{$_POST['first_name']}')
                            )";

                        $statement = $connection->prepare($sql);            
                           // izvrsavamo upit
                        $statement->execute();
                        header('location:posts.php');
                    }
                }
            ?>
        </form>
        </div>
        <?php include('include/sidebar.php'); ?>
    <div><!-- /.row -->
</main><!-- /.container -->

<?php include('include/footer.php'); ?>
