<?php
require '../Model/Database.php';
$db= new Connection();
if(isset($_POST['addplayer'])){
    $db->add_data($_POST);
}