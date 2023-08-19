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
$query="DELETE FROM data WHERE id='$id'";
$data=mysqli_query($conn,$query);
if($data){
   // echo "<script>alert('Record deleted');</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url =http://localhost/crud_php/display.php " />
        
    <?php
}
else{
    echo "<script>alert('Failed to deleted');</script>";
}

?>