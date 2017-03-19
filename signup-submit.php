<?php include("top.html"); ?>
<?php
// name should be letters only and every word should be started by upper
// case letter
// throw error if digits exist in the string.
if (preg_match("/[0-9]/", $_POST["name"]) === 1) {
    echo "Error";
}
// every unique word should start with upper case letter
$name_list = explode(" ", $_POST["name"]);
for ($i = 0; $i < count($name_list); $i++) {
    if(strcmp(ucfirst($name_list[$i]),$name_list[$i]) !== 0) {
        echo "Error";
        break;
    }
}

//validate age
if (!is_numeric($_POST["age"]))
    echo "Age is not a number";

//validate personality type
$personality = array("ESTJ", "ISTJ", "ENTJ", "INTJ", 
                    "ESTP", "ISTP", "ENTP", "INTP", 
                    "ESFJ", "ISFJ", "ENFJ", "INFJ", 
                    "ESFP", "ISFP", "ENFP", "INFP"
                );
if (!in_array($_POST["personality_type"], $personality)) {
    echo "Enter a valid Personality type";
}
echo $_POST["personality_type"];
echo $_POST["os"];
echo $_POST["min_seek_age"];
echo $_POST["max_seek_age"];
?>
<?php include("bottom.html"); ?>
