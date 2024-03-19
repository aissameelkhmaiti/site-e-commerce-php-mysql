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
     
   </style>
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
     <nav class="navbar navbar-expand-lg bg-info p-3">
  <div class="container-fluid">
    <a class="navbar-brand fs-4" href="#">Atlas Sport</a>
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
          <a class="nav-link" href="seconnect.php">register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup> <?php nbrcart(); ?> </sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
      <form class="d-flex" action="search.php" method="GET">
        <input class="form-control me-2 fs-4" type="search" placeholder="Search" aria-label="Search" name="search_data">
       <!-- <button class="btn btn-outline-light" type="submit">Search</button>-->
          <input type="submit" value="search" name="search_data_produit" class="btn btn-outline-light fs-4">
      </form>
    </div>
  </div>
                      </nav>
                      <?php
                      //call cart function
                      cart();
                      ?>
    <!---2eme child-->
                    
                    <!---3eme child-->
                     
                    
                    <div class="bg-light  p-2 fs-4 my-1" id="home">
                        <h3 class="text-center">Atlas Sport</h3>
                        <p class="text-center">Matériel sportif pour Collectivités, Collèges, Lycées, Écoles, Clubs Sportifs et Entreprises</p>
                    </div>
                     
                    
                     <!---3eme child-->
                     <div class="row" id="produithome">
                       
                    
                          
                        <div class="col-md-2 bg-secondary p-0">

                            
                     
                        <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                                    <a href="#" class="nav-link text-light"><h4>Categories</h4></a>

                                </li>
                                <?php
                                get_categories();
                              
                                 
                                /*
                                $select_brands="select * from `categories`";
                                $result_brands=mysqli_query($con,$select_brands);
                                
                                while($row_data=mysqli_fetch_assoc($result_brands)){
                                  $category_title=$row_data['nom_categories'];
                                  $category_id=$row_data['id_categories'];
                                  echo " <li class='nav-item'>
                                  <a href='index.php?categorie=$category_id' class='nav-link text-light'>$category_title</a>
                              </li>";
                                }*/
                                
                              
                                ?>
                        </ul>
                        <!---sidenav-->
                     </div> 
                     
                     <div class="col-md-10"> 
                        <!---product-->
        <div class="row px-5" id="products">
          <!--fetching products-->
          <?php
           get_producs();
           get_uniq_categories();
           
           $ip = getIPAddress();
           /*  
           echo 'User Real IP Address - '.$ip;  */
           
         
       /*   $select_query="select * from `produits` order by rand() LIMIT 0,9";
          $result_query=mysqli_query($con,$select_query);
          //$row=mysqli_fetch_assoc($result_query);
          //echo $row['nom_produits'];
          while($row=mysqli_fetch_assoc($result_query)){
         $product_id=$row['id_produit'];
         $product_title=$row['nom_produits'];
         $product_description=$row['description_produit'];
         $product_image1=$row['image1_p'];
         $product_keyword=$row['produit_keyword'];
         $category_id =$row['id_categories'];
         echo "<div class='col-md-4 mb-2'>
         <div class='card'>
         <img src='./admin/images_produits/$product_image1' class='card-img' alt='...'>
          <div class='card-body'>
           <h5 class='card-title'>$product_title</h5>
           <p class='card-text'>$product_description</p>

             <a href='#' class='btn btn-info'>Add to cart</a>
              <a href='#' class='btn btn-secondary'>view more</a>
   </div>
       </div>
          </div>";
          }*/
          ?>
         
                        </div>
                          </div>
                            </div>
                           

<!---last child-->
<div class="bg-info p-3 text-center">
                <p>©Copyright 2010-2020</p>
             </div>



     </div> 
<!---bostrab js link-->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>