<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="../Functions/add_employee_data.php">
    <label for="employeeId">Employee ID:</label>
    <input type="text" name="employeeId" id="employeeId" required><br>

    <label for="employeeName">Employee Name:</label>
    <input type="text" name="employeeName" id="employeeName" required><br>

    <label for="employeeType">Employee Type:</label>
    <select name="employeeType" id="employeeType" required>
      <option value="">Select type</option>
      <option value="batsman">Batsman</option>
      <option value="bowler">Bowler</option>
      <option value="all-rounder">All-rounder</option>
    </select><br>

    <label for="points">Points:</label>
    <input type="number"   name="points" id="points" min="2" max="10" required><br>

    <input type="submit" value="Add Player" name="addplayer">
  </form>
  <a href="../Functions/logout.php">Logout</a>
</body>
</html>
</body>
</html>