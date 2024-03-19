<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashbord</title>
    <link rel="stylesheet" href="style.css">
<style>

    .admin_image{ width: 100px; 
       object-fit:contain;

    }
</style>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!---font css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid p-0">
         <!-- 1 -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <div><h1 class="logo1">Atlas Shop</h1></div>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">welcome </a>
                </li>
            </ul>
        </nav>
     <!-- 2 -->
     <div class="bg-light p-3">
        <h3 class="text-center">partie manager</h3>
     </div>
     <!-- 3 -->
     <div class="row p-2">
        <div class="col-md-12 bg-secondary">
            <div>
                <a href="#"><img src="../images/Logo.png" alt="" class="admin_image p-2 my-3"></a>
                <p class="text-light text-center">Admin name</p>
            </div>
            <div class="button text-center p-5">
                <button  class=" text-light bg-info p-3  border-0">
                    <a href="insert_produits.php" class="nav-link ">insert produit</a></button>
                
                <button  class=" text-light bg-info p-3  border-0"><a href="index.php?insert_category" class="nav-link">insert categories</a>
                </button>
                
                <button  class=" text-light bg-info p-3  border-0">
                    <a href="order.php" class="nav-link">all orders</a>
                </button>
                <button  class=" text-light bg-info p-3  border-0"><a href="" class="nav-link">all payements</a>
                </button>
                <button class=" text-light bg-info p-3  border-0">
                    <a href="" class="nav-link">list users</a>
                </button><br><br>
                <button  class=" text-light bg-info p-3  border-0"><a href="" class="nav-link ">logout</a></button>
            </div>

        </div>
     </div>
    
    <!-- 4 -->
                      <div class="container my-3">
                        <?php
                        if(isset($_GET['insert_category'])){
                            include('insert_categories.php');

                        }
                        
                        ?>
                      </div></div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>