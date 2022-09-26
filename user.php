<?php
include "./connect.php";
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

.card {
        margin: 0 auto; 
        float: none; 
        margin-bottom: 10px; 
        margin-top:70px;
}
img{
  display: inline;
  margin:auto;
  margin-top:5%
}
</style>
</head>
<body>

<?php 



$id = $_GET['veiwid'];
  $sql = "SELECT * FROM employees where id=$id ";
  $result = mysqli_query($conn, $sql);

if($row=$result->fetch_assoc()){
$id=$row["id"];
?>

<!-- <a href="employeesInfo.php"><input id="submitBtn" class="signForm btn  btn-success" type="submit" value="Back " name="submit"/></a><br /> -->

<div class="card " style="width: 18rem;">
<img text-center  src="<?php echo 'images/'. $row['image']; ?>" width='100' height='100'> 
  <div class="card-body">
    <h5 class="card-title">Employee Data</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo"id : " .$row["id"] ?></li>
    <li class="list-group-item"><?php echo"name : " .$row["name"] ?></li>
    <li class="list-group-item"><?php echo"address : " .$row["address"] ?></li>
    <li class="list-group-item"><?php echo"position : " .$row["position"] ?></li>
  </ul>
  <div class="card-body">
    <a href="employeesInfo.php" class="card-link">Back</a>
    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div>
<?php

}?>