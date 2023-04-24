<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="Functions/login.php" method="post">
        <label>Username</label> <br>
        <input type="text" name="username" required><br>
        <label>Password</label><br>
        <input type="password" name="pass" required><br>
        <p>Please select your Role:</p>
        <input type="radio" name="role" required value="Admin">
        <label for="html">Admin</label><br>
        <input type="radio" name="role" required value="User">
        <label for="css">User</label><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>