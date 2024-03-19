<?php
include('../include/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title=$_POST['cat_title'];
  $select_query="select *from `categories` where nom_categories='$category_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('deja exist')</script>";
  }
  else{
  $insert_query="insert into `categories`(nom_categories) value ('$category_title') ";
  $result_insert=mysqli_query($con,$insert_query);
  if($result_insert){
    echo "<script>alert('categry has been insered successfaly')</script>";
  }
}
}

?>
<h2 class="text-center">insert categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1">
    <i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" 
  placeholder="insert_categories" aria-label="categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
   
<input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="insert_category" placeholder="insert_category">
</div> 

</div>
</form>