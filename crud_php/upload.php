<?php
$target_dir="uploads/";

$target_file=$target_dir. uniqid() . "_" .basename($_FILES["fileToUpload"]["name"]);
$folder="uploads/".basename($target_file);
$uploadok=1;
$path=strTolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])){
  $check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check!=false){
    echo "This is an image".$check["mime"] . "<br>";
    $uploadok=1;
  }
  else{
    echo "This is not an image <br>";
    $uploadok=0;
  }

if($_FILES["fileToUpload"]["size"]>50000000){
  echo "File is under condition <br>";
  $uploadok=0;
}




if($path!="jpeg" && $path!="png" && $path!="jpg" && $path!="gif"){
  echo "Only jpg,jpeg,gif and png allow <br>";
  $uploadok=0;
} 

if($uploadok==0){
  echo "Sorry <br>";
}
  else
  {
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)) {
      echo "Your file".basename($_FILES["fileToUpload"]["name"])."is ulpaoded <br>";
      echo "<img src='$folder' height='200px' width='500px'>";
    }
    else {
      echo "Sorry, there was an error uploading the file.";
  }
  }
}


?>
