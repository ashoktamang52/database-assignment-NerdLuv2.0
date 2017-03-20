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
// $owner details
$owner_gender = $owner_list[1];
$owner_age = (int)$owner_list[2];
$owner_personality = $owner_list[3];
$owner_os = $owner_list[4];
$owner_min_seek = (int)$owner_list[5];
$owner_max_seek = (int)$owner_list[6];


// get match 

// get opposite gender
$opposite_gender = '';
if (strcmp($owner_gender, 'M') === 0) {
    $opposite_gender = 'F';
} else {
    $opposite_gender = 'M';
}

$matches = array();
for ($i = 0; $i < count($singles); $i++) {
    $single_list = explode(",", $singles[$i]);
    $single_gender = $single_list[1];
    $single_age = (int)$single_list[2];
    $single_personality = $single_list[3];
    $single_os = $single_list[4];
    $single_min_seek = (int)$single_list[5];
    $single_max_seek = (int)$single_list[6];

    // Check requirements
    // Check gender req
    if (strcmp($opposite_gender, $single_gender) === 0) {
        $owner_compatible = NULL;
        $single_compatible = NULL;
        if ($single_min_seek <= $owner_age && $owner_age <= $single_max_seek)
            $owner_compatible = TRUE;
        if ($owner_min_seek <= $single_age && $single_age <= $owner_max_seek)
            $single_compatible = TRUE;
        // check compatible age range req
        if ($owner_compatible && $single_compatible) {
            // check os req 
            if (strcmp($owner_os, $single_os) === 0) {
                // check personality req 
                $pattern = "/[".$owner_personality."]/";
                if (preg_match($pattern, $single_personality) === 1) {
                    $matches[] = $singles[$i];
                }
            }
        }
    }
}
if (count($matches) === 0) { 
?>
    <div> No match is found. </div>
<?php 
} else {
?>
<p><strong> Matches for <?= $_GET["name"] ?> </strong></p>
<?php
    for ($i = 0; $i < count($matches); $i++) {
        $single_info = explode(",", $matches[$i]);
?>
<div class="match">
    <img src="user.jpg" alt="Profile Picture">
    <!--Match info-->
    <div>
        <p> <?= $single_info[0] ?> </p>
        <ul>
            <li>
                <strong>gender: </strong> 
                <?= $single_info[1] ?>
            </li>
            <li>
                <strong>age: </strong> 
                <?= $single_info[2] ?>
            </li>
            <li>
                <strong>type: </strong> 
                <?= $single_info[3] ?>
            </li>
            <li>
                <strong>OS: </strong> 
                <?= $single_info[4] ?>
            </li>
        </ul>
    </div>
</div>
<?php
    }
}
include("bottom.html"); ?>