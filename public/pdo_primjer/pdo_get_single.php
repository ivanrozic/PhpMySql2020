<?php
include '../connection/pdo_conn.php';
include '../autoload.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         $zdenko = $pdo->query("SELECT * FROM stud WHERE imestud LIKE 'Zdenko'")->fetch();
         print_r($zdenko);
         echo $zdenko['imeStud'].", ".$zdenko['prezStud'];
         
         echo "<hr>";
         $zdenko2 = $pdo->query("SELECT * FROM stud WHERE imestud LIKE 'Zdenko'")->fetchObject();
         echo $zdenko2->prezStud.", ".$zdenko2->imeStud;
         var_dump($zdenko2);
         
         
         echo "<hr>";
         echo "Mapiranje na klasu Student";
         $zdenko3 = $pdo->query("SELECT stud.mbrStud,imeStud, prezStud FROM stud WHERE imestud LIKE 'Zdenko'")->fetchObject("Student1");
         echo $zdenko3->prezStud.", ".$zdenko3->imeStud;
         
         var_dump($zdenko3);
         
         echo $zdenko3;
         
         // PDO
         // Odlican nacin dohvacanja entiteta preko primarnog kljuca
         $jozy= Student1::load_by_id(1123);
          var_dump($jozy); 
          echo "<h4>Uz pomoc PDO objekta</h4>";
          echo $jozy;
          
         // MySQLi 
         // Odlican nacin dohvacanja entiteta preko primarnog kljuca
         $jozy2= Student1::load_by_id2(1123);
          var_dump($jozy2);       
          echo "<h4>Uz pomoc MYSQLi objekta</h4>";
          echo $jozy2;
         
        ?>
    </body>
</html>
