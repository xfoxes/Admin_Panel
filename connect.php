<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=personel_website;charset=utf8", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();

}
?>