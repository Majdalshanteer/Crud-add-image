<?php
include "./connect.php";
?>

<?php 

  $id=$_GET['updateid'];
  $sql="SELECT * from employees where id=$id ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  // show input field with first values befor changes
  $name=$row["name"];
  $address=$row["address"];
  $salary=$row["salary"];
  $position=$row["position"];
 

  if(isset($_POST['submit'])){
  
    $username=stripslashes($_POST['name']);
    $nameField=$_POST ['name'];
    $addressField=$_POST ['address']; 
    $salaryField=$_POST['salary'];
    $positionField=$_POST ['position'];

    if(empty($_POST['image'])){
        $image="default.png";
    }  else{
      $image=$_POST['image']; 
    }

$sql="UPDATE employees set id=$id,name='$nameField', address='$addressField',
salary='$salaryField',position='$positionField'  , image='$image'
where id=$id";

$result=mysqli_query($conn,$sql);
if($result){
    echo"success";
    header('location: employeesInfo.php');

}else{
    die(musqli_error($conn));
}

  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="signup.css">
    <style>
     <?php include 'css/signup.css'; ?>
   </style>

</head>


<body>

    <div  class="containerc">
    <form  name="myForm" id="sign-up" method="post" >
       
        <h1 style="text-align:center ">Update Data</h1>
       
     
        <label for="name" class="form-label "><b>Name:</b></label>
        
        <input type="text"  name="name" id="name" value=<?php
        echo  $name;?> />
        <div id="zero" class="err"></div><br />

        <label for="file" class="form-label "><b>image:</b></label>
        <input type="file"  name="image" id="image"  accept=".jpg,.jpeg, .png "  />
        <div id="zero" class="err"></div><br />
     
        
        <label for="email" >Address </label>
        <input   autofocus id="email" name="address" value=<?php
        echo  $address;?>  />
        <div id="one" class="err"></div><br />
        
        <label for="phone">Salary </label>
        <input type="number"  name="salary" id="phone" value=<?php
        echo  $salary;?>>
        <div id="two" class="err"></div><br />

        <label for="position">Position:</label>
       <input type="text" id="birthday" name="position" value=<?php
        echo  $position;?>><br>
       <div id="four" class="err"></div><br />
       
        <input id="submitBtn" class="signForm" type="submit" value="Update " name="submit"/><br />
       

       </div>
      </form>
    </div>
  </div>

</body>
</html>