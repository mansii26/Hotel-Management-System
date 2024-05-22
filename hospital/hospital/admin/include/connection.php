<?php   $servername= "localhost";
        $dbname="healthcare";
        $username="root";
        $password="";
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            
        // Set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); ?>

