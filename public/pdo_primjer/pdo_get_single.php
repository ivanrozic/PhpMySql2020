<?php
include '../connection/pdo_conn.php';
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
         
         $zdenko2 = $pdo->query("SELECT * FROM stud WHERE imestud LIKE 'Zdenko'")->fetchObject();
         echo $zdenko2->prezStud.", ".$zdenko2->imeStud;
        ?>
    </body>
</html>
