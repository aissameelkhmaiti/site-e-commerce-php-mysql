<?php
include('include/connect.php'); 
if(isset($_POST['message'])){
    $email=$_POST['email_i'];
    $pass=$_POST['password_i'];
  $select_query="select *from `inscription` where email='$email'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
    if($number>0){
        echo " <script>alert('ce client exist ')</script>";
        exit();
     }else{
         
         //insertion 
         $insert_client="insert into `inscription` (email,mot_passe) values ('$email','$pass')";
   
         $result_query=mysqli_query($con,$insert_client);
         if($result_query){
             echo "<script>alert('inscription successufly  ')</script>";
         }
 
     }
 
 

}



    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!---font css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-3" id="contact">
        <h1 class="text-center fs-1">se connecter :</h1>

        
         <form action="" method="POST" enctype="multipart/form-data">
             <!-- titre -->
            <div class="form-outline mb-4 p-3 ">
            <label for="" class="form-label fs-4">votre email:</label>
                <input type="email" class="form-control fs-5" placeholder="email" name="email_i"  >
            </div>
            <div class="form-outline mb-4 p-3">
            <label for="" class="form-label fs-4">mot de passe:</label>
                <input type="password" class="form-control fs-5" placeholder="password" name="password_i"  >
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="message" class="btn btn-info mb-3 px-5 p-3 fs-4" value="s'inscrer" id="./admin">
                </div>
                </div>
                <!---bostrab js link-->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>