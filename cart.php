<?php
include('include/connect.php'); 
include('fonction/commn_fun.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-commerce website</title>
    <!---bostrab css link-->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!---font css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="style.css">
   <style>
   
.card{
  font-size:20px;
}
.card .card-img {
  padding:70px
}
.cart-img{
    width:80px;
    height: 80px;
}
     
   </style>
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
     <nav class="navbar navbar-expand-lg bg-info p-3">
  <div class="container-fluid">
    <a class="navbar-brand fs-4" href="index.php">Atlas Sport</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-4">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#products">products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contac.php" >contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup> <?php nbrcart(); ?> </sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
      
    </div>
  </div>
                      </nav>
    
                    <div class="bg-light  p-2 fs-4 my-1" id="home">
                        <h3 class="text-center">Atlas Sport</h3>
                        <p class="text-center">Matériel sportif pour Collectivités, Collèges, Lycées, Écoles, Clubs Sportifs et Entreprises</p>
                    </div>
                    <div class="container">
                        <div class="row">
                            <form action="" method="POST">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>nom de produits</th>
                                        <th>image de produit</th>
                                        <th>quantite</th>
                                        <th>prix</th>
                                        <th>supprimer</th>
                                        <th>operations</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                <?php
                                 
                                 global $con;
                                 $total=0;
                                 $ip=getIPAddress(); 
                                 $cart_query="select *from `cart` where ip_adress='$ip'";
                                 $result=mysqli_query($con,$cart_query);
                                 while($row=mysqli_fetch_array($result)){
                                     $id_produit=$row['id_produit'];
                                     $select_produit="select *from `produits` where id_produit=$id_produit";
                                     $result_produit=mysqli_query($con,$select_produit);
                                     while($row_produit_prix=mysqli_fetch_array($result_produit)){
                                   $prix_produit=array($row_produit_prix['prix_produit']);
                                   $prix_table=$row_produit_prix['prix_produit'];
                                   $produit_title=$row_produit_prix['nom_produits'];
                                   $produit_image=$row_produit_prix['image1_p'];

                                   $val_produit=array_sum($prix_produit);
                                   $total+=$val_produit;

                                     

                             ?>
                                    <tr>
                                        <td><?php echo $produit_title;?></td>
                                        <td> <img src="./images/<?php echo $produit_image;?>" class="cart-img" alt=""> </td>
                                        <td><input type="number" class="form-input w-50" name="qnt"></td>
                                        <?php
                                      
                                         $ip=getIPAddress(); 
                                         if(isset($_POST['update_c'])){
                                            $q=$_POST['qnt'];
                                            $update_p="update `cart` set quantite='$q' where ip_adress='$ip'";
                                            $result_update=mysqli_query($con,$update_p);
                                            
                                            $total = floatval($total) * intval($q);
                                         }
                                         ?>
                                        <td><?php echo $prix_table.'dh';?></td>
                                        <td><input type="checkbox"></td>
                                        <td>
                                           
                                       <input type="submit"  class="bg-info px-3 border-0" value="Modifie" name="update_c" >
                                            <button class="bg-info px-3 border-0"></button>
                                   
                                        </td>
                                    </tr>
                                    <?php
                                    }}
                                    ?>
                                </tbody>
                            </table>
                            <div class="d-flex" >
                                <h4 class="px-3">prix total: <strong class="text-info"><?php echo $total.'dh';?></strong></h4>
                              <button class="bg-info px-2 border-0 text-center"> <a href="validation.php" class="btn p-0 fs-4 border-1" >valider</a></button> 
                            </div>
                        </div>
                      </div>
                      </form>
                    
                     
                   
        
                          </div>
                            </div>
                           

<!---last child-->
<footer>
<div class="bg-info p-3 text-center my-5">
                <p>©Copyright 2010-2020</p>
             </div>



     </div> 
     </footer>
<!---bostrab js link-->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>