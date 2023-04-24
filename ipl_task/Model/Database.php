<?php 
class Connection{
    
    public $host = "localhost"; // Database host name
    public $username = "Manishvj02"; // Database username
    public $password = "Manish123#"; // Database password
    public $database = "IPL_DB"; // Database name
    public $connect; // Variable to store the database connection
    
    public function __construct(){
        // Constructor method that is called when a new object is created from the Connection class
    
        $this->connect = new mysqli($this->host,$this->username,$this->password,$this->database);
        // Create a new mysqli object and store it in the $connect variable. Pass in the host name, username, password, and database name as arguments.
        
        if ($this->connect->connect_error) {
            // If there is an error connecting to the database, display an error message
            echo "No conncection";
        }
        
       
    }
   
    public function loginUser($username,$password){
        $query="select * from users where Username='$username' and password='$password'";
        $res=mysqli_query($this->connect,$query);
        if(mysqli_num_rows($res)==1){
            header("Location: ../Views/UserProfile.php");
        }
        else{
            echo "User not exist";
            
        }

    }
    // Function to Login as Admin
    public function loginAdmin($username,$password,$role){
       
        $query="select * from users where Username='$username' and password='$password' and role='$role'";
        $res=mysqli_query($this->connect,$query);
        $ans=mysqli_fetch_assoc($res);
        if(mysqli_num_rows($res)==1){
            header("Location: ../Views/AdminProfile.php");
        }else{
            
            echo "Admin Not exist";
            
        }
    

    }
    // Function to add data to employee table
    public function add_data($data=[]){
        $id=$data['employeeId'];
        $name=$data['employeeName'];
        $type=$data['employeeType'];
        $points=$data['points'];
        $query="Insert into employee values ('$id','$name','$type','$points')";
        if($res=mysqli_query($this->connect,$query)){
            echo "Data is inserted";
            header("Location: ../Views/AdminProfile.php");
        }
        else{
            echo "data not isnert";
        }
    }
    // Function to fetch data to employee table
    public function fetchdata(){
        $query="select * from employee";
        $res=mysqli_query($this->connect,$query);
        $employeelistArray = array();
        while ($employeelists = mysqli_fetch_assoc($res)) {
            array_push($employeelistArray, $employeelists);
        }
        
       
        return $employeelistArray;
    }
    // Function to add team to the user list
    public function addtoTeam($curr_id){
        $query="select * from employee where id='$curr_id'";
        $res=mysqli_query($this->connect,$query);
        $ans=mysqli_fetch_assoc($res);
        $id=$ans['id'];
        $name=$ans['name'];
        $employee_type=$ans['employee_type'];
        $points=$ans['points'];
        $querynew="insert into team values ('$id','$name','$employee_type','$points')";
        $res=mysqli_query($this->connect,$querynew);

    }
    // Function to display Team of user
    public function displayTeam(){
        $query="select * from team";
        $res=mysqli_query($this->connect,$query);
        $teamArray = array();
        while ($teamlist = mysqli_fetch_assoc($res)) {
            array_push($teamArray, $teamlist);
        }
        
       
        return $teamArray;
    }
    public function removeFromTeam($curr_id){
        $delete_query="delete from team where id='$curr_id'";
        $res=mysqli_query($this->connect,$delete_query);
        header("Location : ../Views/UserProfile.php");
    }

    // Function to count Points
    public function countPoints(){
        $count_query="SELECT SUM(points) FROM team";
        $res=mysqli_query($this->connect,$count_query);
        $ans=mysqli_fetch_assoc($res);
        return $ans['SUM(points)'];
    }
}


?>