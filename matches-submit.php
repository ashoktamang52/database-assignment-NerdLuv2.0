<?php 
include("top.html");
echo $_GET["name"];
$singles = file("singles.txt");
// print_r($singles);
for($i=0; $i < count($singles); $i++) {
    $owner = strstr($singles[$i], $_GET["name"]);
    echo $owner;
}
?>

<?php include("bottom.html"); ?>
