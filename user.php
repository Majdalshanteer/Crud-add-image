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

</head>
<body>
    
<table class="table table-striped table-hover border-danger ">
  <tr>
        <th>id</th>
        <th>image</th>
        <th>name</th>
        <th>address</th>
        <th>salary</th>
        <th>position</th>
       
  </tr>


<?php 



$id = $_GET['veiwid'];
  $sql = "SELECT * FROM employees where id=$id ";
  $result = mysqli_query($conn, $sql);

if($row=$result->fetch_assoc()){
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
    </tr>"; }?>

