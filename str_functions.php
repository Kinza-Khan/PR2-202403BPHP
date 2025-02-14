<?php
$str = "hello this is ali. ali is intelligent";
$arrayStr = explode(' ', $str);
print_r($arrayStr);
echo "<br>";
$fileName = "img1.rar";
$fileNameArray = explode(".",$fileName);
print_r($fileNameArray);
echo "<br>";
$output = $fileNameArray[count($fileNameArray)-1];
echo $output . "<br>";
if($output == "png" || $output == "jpeg" ){
    echo "valid extension";
}
else{
    echo "invalid extension";
}
echo "<br>";
echo str_word_count($str);
echo "<br>";
echo strlen($str);
echo "<br>";
$stdName = "admin";
$userAuth =  strcmp($stdName,'admin');
if($userAuth == 0)
{
        echo "admin login";
}
else{
       echo "admin not found";
}
echo "<br>";
$empName = "Ali khan";
echo strrev($empName);
echo "<br>";
echo strtolower($empName) . "<br>";
echo ucwords($empName) . "<br>";
echo str_replace("ali" , "hassan" , $str) . "<br>";

?>