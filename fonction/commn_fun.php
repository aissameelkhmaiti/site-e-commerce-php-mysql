<?php
include('./include/connect.php'); 
//get products
function get_producs(){
    global $con;
    
        if(!isset($_GET['categorie'])){
        $select_query="select * from `produits` order by rand() LIMIT 0,9";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['nom_produits'];
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['id_produit'];
$product_title=$row['nom_produits'];
$product_description=$row['description_produit'];
$product_image1=$row['image1_p'];
$product_keyword=$row['produit_keyword'];
$prix_pr=$row['prix_produit'];
$category_id =$row['id_categories'];

echo "<div class='col-md-4 mb-2' >
<div class='card'>
<img src='./admin/images_produits/$product_image1' class='card-img' alt='...'>
<div class='card-body'>
 <h5 class='card-title'>$product_title</h5>
 <h5 class='card-title'>$prix_pr dh</h5>
 <p class='card-text'>$product_description</p>

   <a href='index.php?Add_to_catre=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='details.php?id_produits=$product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div>";
}}}
function get_uniq_categories(){
    global $con;
    
        if(isset($_GET['categorie'])){
            $category_id=$_GET['categorie'];
        $select_query="select * from `produits` where id_categories=$category_id ";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>categorie est vide</h2>";
    
}
 
 
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
 <a href='index.php?Add_to_catre=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='#' class='btn btn-secondary'>view more</a>
</div>
</div>
</div>";
}}}
 function get_categories(){      global $con;
                                $select_brands="select * from `categories`";
                                $result_brands=mysqli_query($con,$select_brands);
                                
                                while($row_data=mysqli_fetch_assoc($result_brands)){
                                  $category_title=$row_data['nom_categories'];
                                  $category_id=$row_data['id_categories'];
                                  echo " <li class='nav-item'>
                                  <a href='index.php?categorie=$category_id' class='nav-link text-light fs-5'>$category_title</a>
                              </li>";
                                }} 
                                //search products
                                function search_producs(){
                                    global $con;
                                    
                                        if(isset($_GET['search_data_produit'])){
                                            $search_data=$_GET['search_data'];

                                        $select_query="select * from `produits` where produit_keyword like '%$search_data%'";
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
                                
                                 <a href='index.php?Add_to_catre=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='#' class='btn btn-secondary'>view more</a>
                                </div>
                                </div>
                                </div>";
                                }}}
                                function contact(){
                                if(isset($_POST['message'])){
                                    $nom=$_POST['name'];
                                    $email=$_POST['email'];
                                    $num=$_POST['number'];
                                    $message=$_POST['message'];
                                
                                  $select_query="select *from `contacts`";
                                  $result_select=mysqli_query($con,$select_query);
                                  $number=mysqli_num_rows($result_select);
                                    if($number>0){
                                        echo " <script>alert('deja envoye le message ')</script>";
                                        exit();
                                     }else{
                                         
                                         //insertion 
                                         $insert_contacts="insert into `contacts` (nom_ct,email_c,number_c,message	) values ('$nom','$email','$num','$message')";
                                   
                                         $result_query=mysqli_query($con,$insert_contacts);
                                         if($result_query){
                                             echo "<script>alert('message envoye  ')</script>";
                                         }}
                                 
                                     }
                                 
                                 
                                
                                }
                                //get ip adress
                                function getIPAddress() {  
                                    //whether ip is from the share internet  
                                     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                                                $ip = $_SERVER['HTTP_CLIENT_IP'];  
                                        }  
                                    //whether ip is from the proxy  
                                    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                                                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
                                     }  
                                //whether ip is from the remote address  
                                    else{  
                                             $ip = $_SERVER['REMOTE_ADDR'];  
                                     }  
                                     return $ip;  
                                    }

                                function cart(){
                                   if(isset(($_GET['Add_to_catre']))){

                                        global $con;
                                        $ip = getIPAddress();  
                                     
                                        $get_id_produit=$_GET['Add_to_catre'];
                                        $select_query="select *from `cart` where id_produit=$get_id_produit and ip_adress='$ip'";
                                        $result_query=mysqli_query($con,$select_query);
                                        $num_of_rows=mysqli_num_rows($result_query);
                                        if($num_of_rows>0){
                                            echo "<script>alert('this alreadi present inside cart')<script>";
                                            echo "<script>window.open('index.php','_self')<script>";
                                        }
                                        else{
                                            $insert_query="insert into `cart` (id_produit,ip_adress,quantite) values ($get_id_produit,'$ip',0)";
                                            $result_query=mysqli_query($con,$insert_query);
                                            echo "<script>window.open('index.php','_self')<script>";
                                        }
                                    }
                                }
                                function nbrcart(){
                                    if(isset(($_GET['Add_to_catre']))){

                                        global $con;
                                        $ip = getIPAddress();  
                                     
                                     
                                        $select_query="select *from `cart` where ip_adress='$ip'";
                                        $result_query=mysqli_query($con,$select_query);
                                        $nbr_cart=mysqli_num_rows($result_query);
                                    }
                                        else{
                                           
                                        global $con;
                                        $ip = getIPAddress();  
                                     
                                     
                                        $select_query="select *from `cart` where ip_adress='$ip'";
                                        $result_query=mysqli_query($con,$select_query);
                                        $nbr_cart=mysqli_num_rows($result_query);
                                         
                                        }
                                        echo $nbr_cart;
                                    }
                               
                                    function prixtotal(){
                                        global $con;
                                        $total=0;
                                        $ip=getIPAddress(); 
                                        $cart_query="select *from `cart` where ip_adress='$ip'";
                                        $result=mysqli_query($con,$cart_query);
                                        while($row=maysqli_fetch_array($result)){
                                            $id_produit=$row['id_produit'];
                                            $select_produit="select *from `produit` where id_produits=$id_produit";
                                            $result_produit=mysqli_query($con,$select_produit);
                                            while($row_produit_prix==mysqli_fetch_array($result)){
                                          $prix_produit=array($row_produit_prix['prix_produit']);
                                          $val_produit=array_sum($prix_produit);
                                          $total+=$val_produit;

                                            }

                                        }
                                        echo $total;
                                    }
                                
                             


?>