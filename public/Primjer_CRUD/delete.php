<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_GET)) {
    $id = isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] != 'auto' ? $_GET['id'] : NULL;
    $stmt = $pdo->prepare('DELETE FROM stud WHERE  `mbrStud`=? ');

    
    $stmt->execute([$id]);
 
}
   header("location:./read.php");
?>
