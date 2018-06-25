<?php

    include 'index.php'; //connect with the database

    include 'db.php';// connect to the db

    $sql = "INSERT INTO `test`.`orders` (`userid`, `buying`) VALUES ($id, '$items');";

        $sth = $DBH->prepare($sql);
        
        $sth->execute();
        
        
    } catch(PDOException $e) {echo $e;}  


?>