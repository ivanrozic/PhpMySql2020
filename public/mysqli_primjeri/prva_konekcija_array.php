<?php
require_once '../connection/mysqli_conn.php';
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
// Perform some queries
        $sql = "SELECT stud.mbrStud,imeStud, prezStud from stud LIMIT 10";
        $result = $mysqli->query($sql);
        ?>

        <div>Ovo su podaci o bazi:<br>
            <p>
                Query: <code><?= $sql ?></code>
            </p>
            <p>
                Broj selektiranih stupaca: <code><?= $mysqli->field_count ?></code>
            </p>
            <p>
                Info <code><?= $mysqli->info ?></code>
            </p>
            <p>
                Ispis indeksirnog polja<br>
                <?php
                if ($result = $mysqli->query($sql)) {
                    while ($row = $result->fetch_array(MYSQLI_NUM)) { //  indeksirano polje
                        printf("<b>%d</b> %s, %s <br>", $row[0], $row[2], $row[1]);
                    }
                    $result->free_result();
                }
                ?>
            <hr>
Ispis asocijativnog polja<br>
            <?php
            if ($result = $mysqli->query($sql)) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {  //  asocijativno polje
                    printf("<b>%d</b> %s, %s <br>", $row['mbrStud'], $row["prezStud"], $row['imeStud']);
                }
                $result->free_result();
            }
            ?>
            <hr>
Ispis asocijativnog/indeksiranog polja<br>
            <?php
            if ($result = $mysqli->query($sql)) {
                while ($row = $result->fetch_array(3)) { // MYSQLI_BOTH=3
                    printf("<b>%d</b> %s, %s <br>", $row[0], $row[2], $row['imeStud']);
                }
                $result->free_result();
            }
            ?>

        </div>


        <?php
        $mysqli->close();
        ?>
    </body>
</html>
