<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="center">
        <h2>Login</h2>
     <div>
        
          <div class="form">
          <form action="#" method="POST">
          <input type="text" name="username" placeholder="username/email">
            <input type="password" name="password" placeholder="password"><br>
             <div class="for"><a href="#" onclick="message()">Forget Password?</a></div>
            <input type="submit" name="submit" value="Login">
            <br>
            <p class="new">New User? <a href="register.php">Sign Up</a></p>
            
          </div>
        </form>
    </div>
    </div>
</body>
</html>
<script>
  function message(){
    return alert("Forget password");
  }
</script>
<?php
include 'conn.php';


if(isset($_POST['submit'])){
  $Username=$_POST['username'];
  $pwd=$_POST['password'];

  

  $query="SELECT * FROM data WHERE (Name='$Username' || email='$Username' ) && phone='$pwd'";
  $data=mysqli_query($conn,$query);
  $total=mysqli_num_rows($data);
  
  //echo $total;
  if($total == 1){
    //echo "<script>alert('Login Done');</script>";
    $_SESSION['user_name']=$Username;
    header("location: display.php");
  }
  else{
    echo "<script>alert('wrong email/password');</script>";
  }
}

?>