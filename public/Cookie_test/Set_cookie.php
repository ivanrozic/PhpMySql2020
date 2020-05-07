<?php
$cookie_name = "voce";      // ime varijable
$cookie_value = "banana"; // vrijedonst varijable
setcookie($cookie_name, $cookie_value, time() + (30)); // pola minute i mrtav si
$polje[]=[12,3,2,3,123,45,12,3,true,false,5,34,56,4,67,"textic",57,56,8,6,98,79,45,789,87,0,89,0];
setcookie($cookie_name, $cookie_value, time() + (30));
setcookie("neko_polje", serialize($polje), time() + (30));
setcookie("neko_polje2", json_encode($polje), time() + (30));
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

?>
<!DOCTYPE html>

<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>