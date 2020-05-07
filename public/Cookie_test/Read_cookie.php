<!DOCTYPE html>
<html>
<body>

<?php
$cookie_name='voce';
print_r($_COOKIE);
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

<?php



if(isset($_COOKIE['neko_polje'])){
    echo "serijalizirani ispis:";
    echo $_COOKIE['neko_polje'];
    echo "<hr>";
    echo "JSON";
    echo $_COOKIE['neko_polje2'];
      echo "<pre>";
    print_r(json_decode($_COOKIE['neko_polje2']));
    echo "</pre>";
      echo "<hr>";
    
    
    echo "<pre>";
    print_r(unserialize($_COOKIE['neko_polje']));
    echo "</pre>";    
}



?>



    
</body>
</html>