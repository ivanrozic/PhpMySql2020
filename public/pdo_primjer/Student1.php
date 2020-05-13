<?php

class Student1 {

    //   SELECT stud.mbrStud,imeStud, prezStud from stud LIMIT 10
    public $mbrStud, $imeStud, $prezStud; //  $result->fetch_object("Student") ovo MOZE POSTAVITI PRIVATNE VARIJABLE

    //Uz pomoc PDO
    public static function load_by_id($id) {
        include '../connection/pdo_conn.php';
        /*
        $host = '127.0.0.1';
        $db = 'fakultet';
        $user = 'root';
        $pass = '';
        $port = "3306";
        $charset = 'utf8mb4';

        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        try {
            $pdo = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }


*/
        $stmt = $pdo->prepare('SELECT stud.mbrStud,imeStud, prezStud  FROM stud WHERE mbrStud=?');


        $stmt->execute([$id]);
        return $stmt->fetchObject(__CLASS__);
    }

    //Uz pomoc MySQLi
    public static function load_by_id2($id) {
        include '../connection/mysqli_conn.php';
        $stmt = $mysqli -> stmt_init();
        $stmt = $mysqli->prepare("SELECT stud.mbrStud,imeStud, prezStud  FROM stud WHERE mbrStud=?");

        if (!$stmt->bind_param("i", $id)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
       // echo "<br>ID JE ".$id;
        $s = new Student1();
        $stmt->bind_result($a,$b,$c);  //   <----- OVO JE TREBALO RADITI !!!
        $stmt->fetch();
        $s->mbrStud =$a; 
        $s->imeStud =$b; 
        $s->prezStud=$b;
        
        /*
        $result = $stmt->get_result();
        $row = $result->fetch_array(MYSQLI_NUM);
        $s = new Student1();
        $s->mbrStud =$row[0]; 
        $s->imeStud =$row[1]; 
        $s->prezStud=$row[2];
        */
        
        $stmt->close();
        return $s;
    }

    public function __toString() {
        $pozdrav = sprintf("Pozdrav, moje ime je %s, prezivam se %s, moj maticni broj je: %d, moj prosjek je %.2f"
                , $this->imeStud
                , $this->prezStud
                , $this->mbrStud
                , $this->Prosjek());
        return $pozdrav;
    }

    private function Prosjek() {
        return 3.14;
    }

}

?>
