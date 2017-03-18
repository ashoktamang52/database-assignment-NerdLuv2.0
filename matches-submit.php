<?php 
include("top.html");

// Read file
$singles = file("singles.txt");

// find and get owner info
$owner = '';
for ($i = 0; $i < count($singles); $i++) {
    $owner = strstr($singles[$i], $_GET["name"]);
    if ($owner !== FALSE) {
        break;
    }
}

/* 
* $owner_list is comprised of owner attributes in following order:
* Name, Gender, Age, Personality type, Operating System, Min/Max Seeking Age (separate elements)
*/
$owner_list = explode(",", $owner);
print_r($owner_list);


// get match 
// filter opposite gender
$owner_gender = $owner_list[1];
$opposite_gender = '';
if (strcmp($owner_gender, 'M') === 0) {
    $opposite_gender = 'F';
} else {
    $opposite_gender = 'M';
}

$list_after_gender = array();
for ($i = 0; $i < count($singles); $i++) {
    $single_gender = explode(",", $singles[$i])[1];
    if (strcmp($opposite_gender, $single_gender) === 0) {
        $list_after_gender[] = $singles[$i];
    }
}
print_r($list_after_gender);
?>

<?php include("bottom.html"); ?>
