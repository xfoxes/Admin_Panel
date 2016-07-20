<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=personal_website;charset=utf8", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();

}
?>