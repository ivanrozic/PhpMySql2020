<?php
require_once '../connection/mysqli_conn.php';
include '../autoload.php';
class Student{
 //   SELECT stud.mbrStud,imeStud, prezStud from stud LIMIT 10
  private $mbrStud,$imeStud,$prezStud; //  $result->fetch_object("Student") ovo MOZE POSTAVITI PRIVATNE VARIJABLE
  public function __toString() {
      $pozdrav= sprintf("Pozdrav, moje ime je %s, prezivam se %s, moj maticni broj je: %d"
              ,$this->imeStud
              ,$this->prezStud
              ,$this->mbrStud);
      return $pozdrav;
  }
    
}

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
                Ispis:<br>
                <?php
                if ($result = $mysqli->query($sql)) {
                    echo "<ul>";
                    while ($stud  = $result->fetch_object("Student")) {
                        echo "<li>".$stud."</li>";
                    }
                    echo "</ul>";

                    $result->free_result();
                }
                ?>
                
                Ispis nove klase:<br>
                <?php
 //Selektiraj sve studente koji su upisali neki predmet ali nisu nikada izasli na ispit
 $sql="SELECT 
 pred.nazPred, 
 COUNT(upisani_pred_stud.pred_id) AS broj_upisanih_koji_su_izasli_na_ispit,
 AVG(ispit.ocjena) AS prosjek,
SUM(ispit.ocjena) AS suma_ocjena
FROM
upisani_pred_stud LEFT JOIN stud ON upisani_pred_stud.stud_mbr=stud.mbrStud
LEFT JOIN ispit ON upisani_pred_stud.pred_id=ispit.sifPred
LEFT JOIN pred ON pred.sifPred = upisani_pred_stud.pred_id 
WHERE ispit.ocjena IS NOT NULL
GROUP BY upisani_pred_stud.pred_id
ORDER BY broj_upisanih_koji_su_izasli_na_ispit DESC
LIMIT 10";
                if ($result = $mysqli->query($sql)) {
                    echo "<ul>";
                    while ($ghost  = $result->fetch_object("Ghost")) {
                        //echo "<li>".$ghost->broj_upisanih_koji_su_izasli_na_ispit." ".$ghost->nazPred." ".$ghost."</li>";
                        echo "<li>".$ghost."</li>";
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
