<?php  include 'conn.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        body {
            background-image: url(uploads/photo-1527489377706-5bf97e608852.jpeg); /* Replace with your image URL */
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            
        }

        .container {
            background-color: #eee;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding-right: 1px;
        }
        input:hover { 
           background-color: #666;
           color: white;
        }
        select:hover{
          background-color: #666;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
        <div>
            <label>Image</label>
            <input type="file" name="fileToUpload">
           
        </div>    <br>

        <div>
                <label>Name</label>
                <input type="text" name="sname" required><br><br>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" required><br><br>
            </div>

            <div>
                <label>Phone</label>
                <input type="number" name="phone" required><br><br>
            </div>
            <div>
  <label>Gender</label>
<select name="gender" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
            </div><br>
            <div>

          
            <input type="submit" value="submit" name="submit"><br>
        </form>
    </div>
</body>
</html>


<?php 

if (isset($_POST['submit'])) {

$target_dir="uploads/";
$target_file=$target_dir.basename($_FILES["fileToUpload"]["name"]);
$folder="uploads/".basename($target_file);
$uploadok=1;
$path=strTolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check!=false){
   // echo "This is an image".$check["mime"] . "<br>";
    $uploadok=1;
  }
  else{
    //echo "This is not an image <br>";
    $uploadok=0;
  }

if($_FILES["fileToUpload"]["size"]>50000000){
  echo "File is not under condition <br>";
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
     // echo "Your file".basename($_FILES["fileToUpload"]["name"])."is ulpaoded <br>";
    }
    else {
      echo "Sorry, there was an error uploading the file.";
  }
  }



    // Get the form input values
    $Name = $_POST['sname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Gender = $_POST['gender'];
    

    // Create the SQL query and wrap the values with single quotes
    
    $query = "INSERT INTO data (stdImg,Name, email, phone, gender) VALUES ('$folder','$Name', '$Email', '$Phone', '$Gender')";

    // Execute the query
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "Data insert successful";
        ?>
        <meta http-equiv = "refresh" content = "0; url =http://localhost/crud_php/display.php " />
        <?php
    } else {
        echo "Failed to insert data";
    }

  
    
}



?>