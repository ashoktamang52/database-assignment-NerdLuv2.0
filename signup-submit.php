<?php include("top.html"); ?>
<?php
// name should be letters only and every word should be started by upper
// case letter
// throw error if digits exist in the string.

// Bool to store any error during validation. 
$any_error = FALSE;

if (preg_match("/[0-9]/", $_POST["name"]) === 1) {
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
if (!is_numeric($_POST["age"])) {
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
if (!in_array($_POST["personality_type"], $personality)) {
    $any_error = TRUE;
?>
<div> Error: Enter a valid Personality type. </div>
<?php
}

// validate min/max seeking age.
if (!is_numeric($_POST["min_seek_age"])) {
    $any_error = TRUE;
?>
<div> Error: Min seeking age is not a number. </div>
<?php
}

if (!is_numeric($_POST["max_seek_age"])) {
    $any_error = TRUE;
?>
<div> Error: Max seeking age is not a number. </div>
<?php
}
// Write to singles.txt after validation. 
if (!$any_error) {
    //parse form details into a one line
    $user_details = array($_POST["name"],
                        $_POST["gender"],
                        $_POST["age"],
                        $_POST["personality_type"],
                        $_POST["os"],
                        $_POST["min_seek_age"],
                        $_POST["max_seek_age"]
                    );
    $user_info_to_write = implode(",", $user_details);
    file_put_contents("singles.txt", PHP_EOL.$user_info_to_write, FILE_APPEND);
?>
    <div> Thank you </div>
    <div>Welcome to NerdLuv, <?= $_POST["name"] ?>! </div>
    <div>
    Now <a href="matches.php"> log in to see your matches!</a>
    </div>
<?php } ?>
<?php include("bottom.html"); ?>