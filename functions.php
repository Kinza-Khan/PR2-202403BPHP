<?php
$x = 10 ;
function printVal(){
    global $x ;
    echo $x ."<br>"  ;
}

printVal();

function hello(){
    $x = 10 ;
    echo "local scope variable " .$x . "<br>";
}
hello();


function staticScope(){
   static $x = 1 ;
    echo $x ;
    $x++ ;
}
staticScope();
echo "<br>";
staticScope();
echo "<br>";
staticScope();
?>