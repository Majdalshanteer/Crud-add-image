<?php
include "./connect.php";
?>
<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
  th,td {
   text-align: center;   
}
</style>
</head>
<body style="margin:50px;">
<button class="btn btn-info my-2" ><a href="signup.php"class="text-light" >+ Add new employee</a></button><br>
<!-- <button class="btn btn- btn-secondary float-end ml-2 my-2" ><a href="index.php"class="text-light">Logout</a></button> -->
    <h1>List of employees</h1>
<table class="table table-striped table-hover border-danger ">
  <tr>
        <th>id</th>
        <th>image</th>
        <th>name</th>
        <th>address</th>
        <th>salary</th>
        <th>position</th>
        <th>action</th>
  </tr>
  <?php

    // delete user
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        mysqli_query($conn, "DELETE FROM employees WHERE id=".$id);
        header('location: employeesInfo.php');
    }


 //PRINT Table from data base
  $sql = "SELECT * FROM employees  ";
  $result = mysqli_query($conn, $sql);

  while($row=$result->fetch_assoc()){
$id=$row["id"];
    echo" <tr>
    <td>".$row["id"] ."</td>";?>
<td>
<img src="<?php echo 'images/'. $row['image']; ?>" width='90' height='90'> 
</td>
    <?php echo" 
    <td>".$row["name"] ."</td>
    <td>".$row["address"]."</td>
    <td>".$row["salary"]."</td>
    <td>".$row["position"]."</td>
    <td>
    <button class='btn btn-warning'><a href='user.php?veiwid=".$id."' class='text-light'><img src='eye.svg'></a></button>
    <button class='btn btn-info'><a href='update.php?updateid=".$id."' class='text-light'><img src='pen.svg'></a></button>"?>
    <button  class='btn btn-danger'><a onclick="return confirm('Do you want to delete this record?')" href=<?php echo"'employeesInfo.php?deleteid=".$id."' class='text-light remove'><img src='trash.svg'></a></button>
    </td>

   </tr>";
  }

 ?>



 <script src="js/signup.js"></script> 
 </body> 
 