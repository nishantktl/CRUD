


<?php
  include 'conn.php';
 $id=$_GET['id'];
 session_start();
$userprofile=$_SESSION['user_name'];
if($userprofile == true){

}
else{
    header('location: index.php');
}
  $query="SELECT * FROM data WHERE Id='$id'";
  $data=mysqli_query($conn,$query);
  
  $total=mysqli_num_rows($data);
  $result=mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    
</head>
<body>
    <h2>Update Form</h2>
    <div>
        <form action="#" method="POST" >
            <div>
                <label>name</label>
                <input type="text" name="sname" value="<?php echo $result['Name']; ?>"><br><br>
            </div>

            <div>
                <label>email</label>
                <input type="email" name="email"  value="<?php echo $result['email'];?>" required><br><br>
            </div>

            <div>
                <label>phone</label>
                <input type="number" name="phone" value="<?php echo $result['phone'];?>"><br><br>
            </div>
            <div>
  <label>gender</label>
<select name="gender" required>
<option value="">Select</option>
<option value="Male"
<?php
if($result['gender']=='Male'){
    echo "selected";
}
?>
>Male</option>
<option value="Female"
<?php
if($result['gender']=='Fale'){
    echo "selected";
}
?>
>Female</option>
</select>
            </div><br>

            <input type="submit" value="Update" name="submit"><br>
        </form>
    </div>
</body>
</html>


<?php 

if (isset($_POST['submit'])) {
    // Get the form input values
    $Name = $_POST['sname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Gender = $_POST['gender'];
    

    // Create the SQL query and wrap the values with single quotes
    
    $query = "UPDATE data SET Name='$Name',email='$Email',phone='$Phone',gender='$Gender' WHERE Id='$id'";

    // Execute the query
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record Updated');</script>";
        ?>
        <meta http-equiv = "refresh" content = "0; url =http://localhost/crud_php/display.php " />
        <?php
    } else {
        echo "Failed to insert data";
    }

  
    
}



?>