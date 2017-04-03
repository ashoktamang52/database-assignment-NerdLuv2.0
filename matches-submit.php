<?php 
include("top.html");

include_once("database_connection.php");

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
$owner_name = $db->quote($_GET["name"]);
$owner_query = $db->query("SELECT * FROM user_info where name=$owner_name;");

if ($owner_query -> rowCount() > 0) {
    $owner = $owner_query->fetch();
    $owner_id = (int) $owner["id"];
    $owner_gender = $owner["gender"];
    $owner_age = (int) $owner["age"];

    // Get user_personality
    $query = "SELECT personality_type from user_personality where id=$owner_id;";
    $owner_personality = $db->query($query)->fetch()["personality_type"];

    // Get user_fav_os
    $query = "SELECT os from user_fav_os where id=$owner_id;";
    $owner_os = $db->query($query)->fetch()["os"];
    $owner_os = $db->quote($owner_os);

    // Get user_seeking_age 
    $query = "SELECT min_seeking_age, max_seeking_age from user_seeking_age where id=$owner_id;";
    $seeking_age = $db->query($query)->fetch();
    $owner_min_seek = (int)$seeking_age["min_seeking_age"];
    $owner_max_seek = (int)$seeking_age["max_seeking_age"];
}


// get match 



// get opposite gender
$opposite_gender = '';
if (strcmp($owner_gender, 'M') === 0) {
    $opposite_gender = 'F';
} else {
    $opposite_gender = 'M';
}

$opposite_gender = $db->quote($opposite_gender);

$matches = array();

$query = "
    SELECT user.*, os.os, pt.personality_type, seek.min_seeking_age, seek.max_seeking_age
    FROM user_info user
    JOIN user_fav_os os ON user.id = os.id 
    JOIN user_personality pt ON user.id = pt.id 
    JOIN user_seeking_age seek ON user.id = seek.id 
    WHERE user.gender = $opposite_gender
    and user.age >= $owner_min_seek
    and user.age <= $owner_max_seek
    and seek.min_seeking_age <= $owner_age
    and seek.max_seeking_age >= $owner_age
    and os.os = $owner_os;
";

$potential_matches = $db->query($query);
if ($potential_matches->rowCount() > 0) {
    $rows = $potential_matches->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $potential_match) {
        $pattern = "/[".$owner_personality."]/";
        if (preg_match($pattern, $potential_match["personality_type"]) === 1) {
            $matches[] = $potential_match;
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
    foreach($matches as $single_info) {
?>
<div class="match">
    <img src="user.jpg" alt="Profile Picture">
    <!--Match info-->
    <div>
        <p> <?= $single_info["name"] ?> </p>
        <ul>
            <li>
                <strong>gender: </strong> 
                <?= $single_info["gender"] ?>
            </li>
            <li>
                <strong>age: </strong> 
                <?= $single_info["age"] ?>
            </li>
            <li>
                <strong>type: </strong> 
                <?= $single_info["personality_type"] ?>
            </li>
            <li>
                <strong>OS: </strong> 
                <?= $single_info["os"] ?>
            </li>
        </ul>
    </div>
</div>
<?php
    }
}
include("bottom.html"); ?>