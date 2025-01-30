<?php
$stdName = "ali";
 echo $stdName ;
?>
<h1>Hello</h1>
<?php
$stdAge = 21 ;
echo "<h2>".$stdAge."</h2>";
echo "<h2>$stdAge</h2>";
echo '<h2>'.$stdName.'</h2>';
// echo '<h2>$stdName</h2>';
?>
<h2><?php echo $stdName?></h2>
<?php
$empName = "Hassan";
$empAge = 24;
$empEmail = "hassan@gmail.com";
?>
<h1><?php echo $empName .  " " . $empEmail?></h1>
<h2><?php echo $empAge?></h2>
<h3><?php echo $stdName , " " ,$stdAge?></h3>
<?php
echo $stdName,   $stdAge ,"<br>" ;
// print $stdName , $stdAge;
?>
