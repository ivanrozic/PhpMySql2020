<?php
//create function with an exception
function checkNum($number) {
  if($number>1) {
    throw new Exception("vrijednost je 1 ili mnaja od 1<br>");
  }
  return true;
}

//trigger exception in a "try" block\
try {
    checkNum(22);

} catch (Exception $exixix) {
    echo "greska";
    echo $exixix->getTraceAsString();
    echo '<br>';
    echo $exixix->getMessage();
    echo $exixix->getFile();
    echo $exixix->getLine();
}
try {
 
  checkNum(2);
  //If the exception is thrown, this text will not be shown
  echo 'If you see this, the number is 1 or below';
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
