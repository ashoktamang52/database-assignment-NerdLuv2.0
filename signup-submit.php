<?php include("top.html"); ?>
<?php
include_once("database_connection.php");

// name should be letters only and every word should be started by upper
// case letter
// throw error if digits exist in the string.

// Bool to store any error during validation. 
$any_error = FALSE;

if (isset($_POST["name"]) and preg_match("/[0-9]/", $_POST["name"]) === 1) {
    $any_error = TRUE;
?>
<div> Error: Name contains digits in it. </div>
<?php } 

// every unique word should start with upper case letter
$name_list = explode(" ", $_POST["name"]);
for ($i = 0; $i < count($name_list); $i++) {
    if(strcmp(ucfirst($name_list[$i]),$name_list[$i]) !== 0) {
        $any_error = TRUE;
?>
<div> Error: Every first letter of the word should be UpperCase. </div>
<?php
        break;
    }
}

//validate age
if (isset($_POST["age"]) and !is_numeric($_POST["age"])) {
    $any_error = TRUE;
?>
<div> Error: Age is not a number. </div>
<?php }

//validate personality type
$personality = array("ESTJ", "ISTJ", "ENTJ", "INTJ", 
                    "ESTP", "ISTP", "ENTP", "INTP", 
                    "ESFJ", "ISFJ", "ENFJ", "INFJ", 
                    "ESFP", "ISFP", "ENFP", "INFP"
                );
if (isset($_POST["personality_type"]) and !in_array($_POST["personality_type"], $personality)) {
    $any_error = TRUE;
?>
<div> Error: Enter a valid Personality type. </div>
<?php
}

// validate min/max seeking age.
if (isset($_POST["min_seek_age"]) and !is_numeric($_POST["min_seek_age"])) {
    $any_error = TRUE;
?>
<div> Error: Min seeking age is not a number. </div>
<?php
}

if (isset($_POST["max_seek_age"]) and !is_numeric($_POST["max_seek_age"])) {
    $any_error = TRUE;
?>
<div> Error: Max seeking age is not a number. </div>
<?php
}
// Write to database after validation. 
if (!$any_error) {
    //parse form details into a one line
    $user_info = array(
                    $db->quote($_POST["name"]),
                    $db->quote($_POST["gender"]),
                    $_POST["age"]
                );
    // Insert into table 'user_info'. 
    $user_info_to_write = implode(",", $user_info);
    try {
        $insert = $db->exec("INSERT INTO user_info (name, gender, age) values
                        ($user_info_to_write);");
        print("Inserted $insert rows.\n");
    } catch (PDOException $ex) {
        // the record already exists in the database.
    }
    
    
?>
    <div> Thank you </div>
    <div>Welcome to NerdLuv, <?= $_POST["name"] ?>! </div>
    <div>
    Now <a href="matches.php"> log in to see your matches!</a>
    </div>
<?php } ?>
<?php include("bottom.html"); ?>