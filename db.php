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

    function database($sql, $connection, $fetch){
// pripremamo upit
        $statement = $connection->prepare($sql);

        // izvrsavamo upit
        $statement->execute();

        // zelimo da se rezultat vrati kao asocijativni niz.
        // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        // punimo promenjivu sa rezultatom upita

        return $statement->$fetch();
    }
    
?>