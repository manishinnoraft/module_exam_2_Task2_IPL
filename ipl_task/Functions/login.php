<?php

require '../Model/Database.php'; 

$db=new Connection();
// Login logic for the code
if(isset($_POST['login'])){
   
    $username=$_POST['username'];
    $password=$_POST['pass'];
    $role=$_POST['role'];
    if($role=="Admin"){
        $db->loginAdmin($username,$password,$role);
    }
    if($role=="User"){
        $db->loginUser($username,$password);
    }

}