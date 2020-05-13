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
        $stmt = $pdo->query("SELECT stud.mbrStud,imeStud, prezStud from stud LIMIT 10");
while ($row = $stmt->fetch()) {
    //var_dump($row);
    echo $row['imeStud']."<br />\n";
}
        ?>
    </body>
</html>
