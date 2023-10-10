<?php session_start();
include 'connect (1).php';
if(isset($_POST['login']))
{
        
        $Password = $_POST['pass'];
        $EmailAddress = $_POST['email'];
        
    //to prevent from mysqli injection  
    // $EmailAddress = stripslashes($EmailAddress);
    // $Password = stripslashes($Password);
    // $EmailAddress = mysqli_real_escape_string($conn, $EmailAddress);
    // $Password = mysqli_real_escape_string($conn, $Password);
    $sql = "select * from login_tbl where EmailAddress = '$EmailAddress' and Password = '$Password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['username'] = $EmailAddress;
        // echo "<h1><center> Login successful </center></h1>";
        echo "<script>document.location.href='main1.php'</script>";
        header('locaion:main1.php');
    } else {
        echo "<h1> Login failed. Invalid username or password.</h1>";
    }
}   


?>