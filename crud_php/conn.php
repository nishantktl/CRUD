<?php
$Server="localhost";
$Username="root";
$Password="";
$DBname="mydata";
$conn=new mysqli($Server,$Username,$Password,$DBname);

if($conn->connect_error){
           die("not succesfull" . $conn->connect_error);
}
else{
    //echo "done";
}

?>