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
        $jozy2 = Student1::load_by_id2(1124);

        echo "<h4>Uz pomoc MYSQLi objekta</h4>";
        echo $jozy2;
        ?>
    </body>
</html>
