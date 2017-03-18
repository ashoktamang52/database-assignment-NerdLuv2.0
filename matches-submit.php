<?php include("top.html"); ?>
Matches Submit la lalala

<?php 
echo $_POST["name"];
$matches = file("singles.txt");
print_r($matches);
?>

<?php include("bottom.html"); ?>
