<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
print("Moja omiljena boja je ".$_SESSION["favcolor"]);
echo "<br>" ;
echo "Moja omiljena zivotinja je:";
echo $_SESSION["favanimal"];
echo "<br>" ;
echo "Session variables are set.";
echo "<br>" ;
?>

    
    <?php
 $_SESSION['datetime']="2020-05-05 20:39:00";  
    
    
    ?>
    
    
    
</body>
</html>