<?php
// Logout logic for the code

session_unset();
 session_destroy(); // Session has been destoryed 
header("Location: ../index.php");