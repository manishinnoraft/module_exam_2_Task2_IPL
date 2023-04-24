<?php 
session_start();
?>
<?php
require '../Model/Database.php';
$db=new Connection();
$list1=$db->fetchdata();
$list2=$db->displayTeam();
$pointsused=$db->countPoints();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
</body>
<div>
<table>
        <tr>
            <th>
              Points Remaining
            </th>
        </tr>
        <tr>
            <td>
            <?php echo 100-$pointsused;  //This will display the Points remaining   ?>    
            </td>
        </tr>
</table>
<a href="../Functions/logout.php">LogOut</a>
</div>
</html>
<h2>All Employee List</h2>
<?php
$srno=0;
foreach($list1 as $list){
    $srno+=1;
    ?>
    <div class="home_page">
       
    <div class="playercard">
        <p><b>Serial No.</b> : <?php echo $srno ?></p>
        <p><b>Employee Id</b> : <?php echo $list['id']; ?> </p>
        <p><b>Employee Name</b> : <?php echo $list['name']; ?> </p>
        <p><b>Employee Type</b> : <?php echo $list['employee_type']; ?> </p>
        <p><b>Employee Points</b> : <?php echo $list['points']; ?> </p>
        <form action="" class="add_card_form" method="post">
        <input type="text" hidden value="<?php echo $list['id'] ?>" name="curr_id" >
        <input type="submit" value="Add" name="add_it" id="">
        </form>
    </div>
    
    <?php
    
}
?>
<div class="teamlist">
    <h2>Team List</h2>
    <?php
        $srno=0;
        foreach($list2 as $list){
            $srno+=1;
            ?>
            <div class="teamcard">
                <p><b>Serial No.</b> : <?php echo $srno ?></p>
                <p><b>Employee Id</b> : <?php echo $list['id']; ?> </p>
                <p><b>Employee Name</b> : <?php echo $list['name']; ?> </p>
                <p><b>Employee Type</b> : <?php echo $list['employee_type']; ?> </p>
                <p><b>Employee Points</b> : <?php echo $list['points']; ?> </p>
                <form action="" class="add_card_form" method="post">
                <input type="text" hidden  value="<?php echo $list['id'] ?>" name="curr_id" >
                <input type="submit" value="Remove" name="remove_it" id="">
                </form>
            </div>
            <?php
        }
    ?>

</div>
</div>

<?php
// When click on add, the team is added to the team list
if(isset($_POST['add_it'])){
   $curr_id=$_POST['curr_id'];
   $db->addToTeam($curr_id);
}
// When click on add, the team is added to the from the team list
if(isset($_POST['remove_it'])){
    $curr_id=$_POST['curr_id'];
    $db->removeFromTeam($curr_id);
}

?>