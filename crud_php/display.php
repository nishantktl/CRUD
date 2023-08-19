
<a href="logout.php"><input type="submit" value="logout" name="submit"></a>
<html>
    <head>
        <title>
            Display
        </title>
        <style>
            body{
               background-color:  #d079f9;
            }
            table{
               background-color: white;
            }
            .update{
                background-color: green;
                color: white;
            }
            .update:hover{
                background-color: lightblue;
                color:black;
            }
            .delete{
                background-color: red;
                color: white;
            }
            .delete:hover{
                background-color: lightblue;
                color:black;
            }
        </style>

    </head>
</html>
<?php
include 'conn.php';
session_start();
$userprofile=$_SESSION['user_name'];
if($userprofile == true){

}
else{
    header('location: index.php');
}
$query="SELECT * FROM data";
$data=mysqli_query($conn,$query);

$total=mysqli_num_rows($data);


if($total!=0){
   ?>
   <h2 align="center"><mark>Displaying All Records</mark></h2>
  <center> <table border="3px" cellspacing="7px" width="85%" >
   <tr>
   
   <th width="20%">Image</th>
    <th width="20%">Name</th>
   <th width="20%">Email</th>
   <th width="20%">Phone</th>
   <th width="20%">Gender</th>
   <th width="20%">Operation</th>
   
   
</tr>

   <?php
    while($result=mysqli_fetch_assoc($data)){
        echo "<tr>
                  
                  <td><img src='".$result['stdImg']."' height='200px' width='200px'></td>
                  <td>".$result['Name']."</td>
                  <td>".$result['email']."</td>
                  <td>".$result['phone']."</td>
                  <td>".$result['gender']."</td>
                  <td><a href='update.php?id=$result[Id]'><input type='submit' value='Update' class='update'></a>
                  <a href='delete.php?id=$result[Id]'><input type='submit' value='Delete' class='Delete' onclick='return checkdelete()'></a>
                  </td>
                  
              </tr>"
        ;
        
    }
    //echo "Table has records";
}
else{
    //echo "No records found";
}

?>
</table>
  </center>
  <script>
    function checkdelete(){
        return confirm('Are you shure ?');
    }
  </script>