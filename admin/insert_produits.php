<?php
include('../include/connect.php'); 
if(isset($_POST['inserer'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $produit_keywor=$_POST['produit_keyword'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $statu='hey';

    //images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];


    //images tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    //condition
    if($product_title=='' or $description=='' or $produit_keywor=='' or $product_category=='' or  $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' ){
       echo " <script>alert('cette fichier n'exist pas )</script>";
       exit();
    }else{
        move_uploaded_file($temp_image1,"./images_produits/$product_image1");
        move_uploaded_file($temp_image2,"./images_produits/$product_image2");
        move_uploaded_file($temp_image3,"./images_produits/$product_image3");
        //insertion 
        $insert_products="insert into `produits` (nom_produits,description_produit,produit_keyword,id_categories,image1_p,image2_p,image3_p,prix_produit,date_p,statu) 
        values ('$product_title','$description','$produit_keywor','$product_category','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$statu')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('successufly insered products')</script>";
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
    <!---bostrab css link-->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!---font css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">inserer le produits</h1>

        
         <form action="" method="POST" enctype="multipart/form-data">
             <!-- titre -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">titre de produit</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="entrer produit" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">description de produit</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="entrer description produit" autocomplete="off" required="required">
            </div>
            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">produit keyword</label>
                <input type="text" name="produit_keyword" id="produit_keyword" class="form-control" placeholder="entrer keyword description produit" autocomplete="off" required="required">
            </div>
                <!-- categories -->
                <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_category" id="" class="form-select">
                <option value="">select a category</option>
                <?php
                $select_query="select * from `categories`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['nom_categories'];
                    $category_id=$row['id_categories'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
              <!--  <option value="">categorie 1</option>
                <option value=""> categorie2</option>
                <option value=""> categorie 3</option> -->
               </select>
            </div>
              <!-- image1 -->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">image 1 de produit </label>
                
                <input type="file" name="product_image1" id="product_image1" class="form-control" placeholder="entrer description produit" autocomplete="off" required="required">
            </div>
              <!-- image2 -->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">image 2 de produit </label>
                
                <input type="file" name="product_image2" id="product_image2" class="form-control" placeholder="entrer description produit" autocomplete="off" required="required">
            </div>
            <!-- image3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">image 3 de produit </label>
                
                <input type="file" name="product_image3" id="product_image3" class="form-control" placeholder="entrer description produit" autocomplete="off" required="required">
            </div>
            <!-- prix -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">prix de produit</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="entrer le peix de produit" autocomplete="off" required="required">
            </div>
            <!-- valider -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="inserer" class="btn btn-info mb-3 px-3" value="inserer produit">
                </div>

         </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>