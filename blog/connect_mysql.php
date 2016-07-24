<?php
$db = mysqli_connect("localhost" , "root", "","personal_website");

if (!mysqli_set_charset($db, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($db));
    exit();
} else {
    printf("", mysqli_character_set_name($db));
}


?>