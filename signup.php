<?php
include "./connect.php";
?>
<?php

if(isset($_POST['submit'])){
    $username=stripslashes($_POST['name']);
        $name=$_POST['name'];
   $address=$_POST['address'];
    $salary =$_POST['salary'];
    $position =$_POST['position'];
    //this is the name of the image that will be saved in the database
    
    $image=time() . '-' . $_FILES['image']['name'];

    //upload the image to a specific folder first and this folder for example called (images)

    $target_dir="images/";
    

    $target_file=$target_dir . basename($image);

    //now move the image to the folder (images)

    // move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    //now let we upload the image to the database

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
        $sql="INSERT INTO employees  (name,image,	address, salary ,position ) 
       VALUES('$name','$image','$address','$salary','$position')";

  
        if(mysqli_query($conn, $sql)){
            header('location:employeesInfo.php');
        }
    }
}

//let we select all the profiles from the database 

// $results=mysqli_query($conn, "SELECT * FROM employees");
// $user=mysqli_fetch_all($results, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add employee</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
   <style>
     <?php include 'css/signup.css'; ?>
   </style>
   
</head>

<body>
<a href="employeesInfo.php"><input  class="  btn  btn-light" type="submit" value="Back " name="submit"/><img src='skip-backward-fill.svg'></a><br />
<!-- <button class="btn btn-info"><a href="employeesInfo.php" class="card-link">Back</a></button> -->
<div  class="containerc">
    <form  name="myForm" id="sign-up" method="post" enctype="multipart/form-data" >
       
        <h1 style="text-align:center ">Add New Employee </h1>
       
     
        <label for="name" class="form-label "><b>Name:</b></label>
        
        <input type="text"  name="name" id="name"  />
        <div id="zero" class="err"></div><br />

        <label for="file" class="form-label "><b>image:</b></label>
        <input type="file"  name="image" id="image" accept=".jpg,.jpeg, .png "   />
        <div id="zero" class="err"></div><br />

        <label for="email" >Address </label>
        <input   autofocus id="email" name="address"   />
        <div id="one" class="err"></div><br />
        
        <label for="phone">Salary </label>
        <input type="number"  name="salary" id="phone">
        <div id="two" class="err"></div><br />

        <label for="position">Position:</label>
       <input type="text" id="birthday" name="position" ><br>
       <div id="four" class="err"></div><br />
       
        <input id="submitBtn" class="signForm" type="submit" value="ADD " name="submit"/><br />
       

       </div>
      </form>
    </div>
  </div>



</body>
</html>