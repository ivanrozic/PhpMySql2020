<?php
//require_once '../connection/mysqli_conn.php';
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
        //TODO rijesi AUTOLOAD
// Perform some queries
        $sql = "SELECT stud.mbrStud,imeStud, prezStud from stud LIMIT 10";
        $mysqli=new Podaci();
        //$mysqli->query($sql)
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
                Ispis:<br>
                <?php
                if ($result = $mysqli->query($sql)) {
                    while ($obj = $result->fetch_object()) {
                        printf("<b>%d</b> %s, %s <br>", $obj->mbrStud, $obj->prezStud, $obj->imeStud);
                    }
                    
                    $result->data_seek(0);  // vrati pointer na pocetak
                    
                    echo "<ul>";
                    while ($obj = $result->fetch_object()) {
                        echo "<li><b>".$obj->mbrStud."</b> ".$obj->prezStud.",". $obj->imeStud."</li>";
                    }
                    echo "</ul>";

                    $result->free_result();
                }
                ?>

        </div>


        <?php
        $mysqli->close();
        ?>
    </body>
</html>
