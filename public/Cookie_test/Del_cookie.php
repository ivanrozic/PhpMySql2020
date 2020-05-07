<?php
$cookie_name = "_AspNetCore_Antiforgery_m-VHvBF6naM";      // ime varijable
$cookie_value = ""; // vrijedonst varijable
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie($cookie_name, $cookie_value, time() -3600, "/"); // pola minute i mrtav si
$_COOKIE=array();
print_r($_COOKIE);

foreach ($_COOKIE as $key => $value) {
    setcookie($key , '', time() -3600, "/");
    echo $key."<br>";
}
?>
