<?php
    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
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
      
    // pripremamo upit
    $sql = "SELECT * FROM posts ORDER BY posts.created_at DESC limit 5";
    $statement = $connection->prepare($sql);

    // izvrsavamo upit
    $statement->execute();

    // zelimo da se rezultat vrati kao asocijativni niz.
    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    // punimo promenjivu sa rezultatom upita

    $posts = $statement->fetchAll();
       
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <h4>Latest posts</h4>
            <ul>
                <?php
                    //var_dump($posts);
                    foreach ($posts as $post) {
                ?>
                <a href='single-post.php?post_id=<?php echo $post['id']?>'><li><?php echo $post['title']?></li></a>
                <?php } ?>
            </ul>
            <!-- <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p> -->
        </div>
</aside>


