<?php
//including connect file
include('./includes/connect.php');
//getting pets
function getpets(){
  global $con;

//condition to set isset or not
if(!isset($_GET['category'])){
  if(!isset($_GET['breed'])){

    $select_query="select * from `pets` order by rand() LIMIT 0,4";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['pet_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $pet_id=$row['pet_id'];
  $pet_title=$row['pet_title'];
  $pet_description=$row['pet_description'];
  $pet_keywords=$row['pet_keywords'];
  $pet_image1=$row['pet_image1'];
  $pet_price=$row['pet_price'];
  $category_id=$row['category_id'];
  $breed_id=$row['breed_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
                  <img src='./admin_area/pet_images/$pet_image1' class='card-img-top' alt='$pet_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $pet_title</h5>
                    <p class='card-text'> $pet_description</p>
                    <p class='card-text'>Price:$pet_price</p>
                    <a href='index.php?add_to_cart=$pet_id' class='btn btn-info'>Add to cart</a>
                    <a href='pet_details.php?pet_id=$pet_id' class='btn btn-secondary'>View more</a>
                  </div>
  </div>
  </div>";
}
}
}
}
//getting all pets
function get_all_pets(){
  global $con;

  //condition to set isset or not
  if(!isset($_GET['category'])){
    if(!isset($_GET['breed'])){
  
      $select_query="select * from `pets` order by rand()";
  $result_query=mysqli_query($con,$select_query);
  //$row=mysqli_fetch_assoc($result_query);
  //echo $row['pet_title'];
  while($row=mysqli_fetch_assoc($result_query)){
    $pet_id=$row['pet_id'];
    $pet_title=$row['pet_title'];
    $pet_description=$row['pet_description'];
    $pet_keywords=$row['pet_keywords'];
    $pet_image1=$row['pet_image1'];
    $pet_price=$row['pet_price'];
    $category_id=$row['category_id'];
    $breed_id=$row['breed_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
                    <img src='./admin_area/pet_images/$pet_image1' class='card-img-top' alt='$pet_title'>
                    <div class='card-body'>
                      <h5 class='card-title'> $pet_title</h5>
                      <p class='card-text'> $pet_description</p>
                      <p class='card-text'>Price:$pet_price</p>
                      <a href='index.php?add_to_cart=$pet_id' class='btn btn-info'>Add to cart</a>
                      <a href='#' class='btn btn-secondary'>View more</a>
                    </div>
    </div>
    </div>";
  }
  }
  }
  }


//getting unique categories
function get_unique_categories(){
  global $con;

//condition to set isset or not
if(isset($_GET['category'])){
 $category_id=$_GET['category'];

    $select_query="select * from `pets` where category_id=$category_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
  echo "<h2 class='text-center text-danger'> No Pets for this category</h2>";
}
//$row=mysqli_fetch_assoc($result_query);
//echo $row['pet_title'];
while($row=mysqli_fetch_assoc($result_query)){
  $pet_id=$row['pet_id'];
  $pet_title=$row['pet_title'];
  $pet_description=$row['pet_description'];
  $pet_keywords=$row['pet_keywords'];
  $pet_image1=$row['pet_image1'];
  $pet_price=$row['pet_price'];
  $category_id=$row['category_id'];
  $breed_id=$row['breed_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
                  <img src='./admin_area/pet_images/$pet_image1' class='card-img-top' alt='$pet_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $pet_title</h5>
                    <p class='card-text'> $pet_description</p>
                    <p class='card-text'>Price:$pet_price</p>
                    <a href='index.php?add_to_cart=$pet_id' class='btn btn-info'>Add to cart</a>
                    <a href='#' class='btn btn-secondary'>View more</a>
                  </div>
  </div>
  </div>";
}
}
}



//getting unique breeds
function get_unique_breeds(){
  global $con;

//condition to set isset or not
if(isset($_GET['breed'])){
 $breed_id=$_GET['breed'];

    $select_query="select * from `pets` where breed_id=$breed_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
  echo "<h2 class='text-center text-danger'> This breed is not available currently</h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
  $pet_id=$row['pet_id'];
  $pet_title=$row['pet_title'];
  $pet_description=$row['pet_description'];
  $pet_keywords=$row['pet_keywords'];
  $pet_image1=$row['pet_image1'];
  $pet_price=$row['pet_price'];
  $category_id=$row['category_id'];
  $breed_id=$row['breed_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
                  <img src='./admin_area/pet_images/$pet_image1' class='card-img-top' alt='$pet_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $pet_title</h5>
                    <p class='card-text'> $pet_description</p>
                    <p class='card-text'>Price:$pet_price</p>
                    <a href='index.php?add_to_cart=$pet_id' class='btn btn-info'>Add to cart</a>
                    <a href='#' class='btn btn-secondary'>View more</a>
                  </div>
  </div>
  </div>";
}
}
}


//displaying breeds in sidenav
function getbreeds(){
  global $con;
$select_breeds="select * from `breeds`";
$result_breeds=mysqli_query($con,$select_breeds);
//$row_data=mysqli_fetch_assoc($result_breeds);
//echo $row_data['breed_title'];
while($row_data=mysqli_fetch_assoc($result_breeds)){
  $breed_title=$row_data['breed_title'];
  $breed_id=$row_data['breed_id'];
  echo"
  <li class='nav-pet ''>
    <a href='index.php?breed=$breed_id' class='nav-link text-light'> $breed_title</a>
  </li>";
}
}
//displaying categories in side nav
function getcategories(){
  global $con;
  $select_categories="select * from `categories`";
$result_categories=mysqli_query($con,$select_categories);

while($row_data=mysqli_fetch_assoc($result_categories)){
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
  echo"
  <li class='nav-pet ''>
    <a href='index.php?category=$category_id' class='nav-link text-light'> $category_title</a>
  </li>";
}
}

//Searching Pets
function search_pets(){
global $con;
if(isset($_GET['search_data_pet'])){
  $search_data_value=$_GET['search_data'];
  $search_query="select * from `pets` where pet_keywords like '%$search_data_value%'" ;
$result_query=mysqli_query($con,$search_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
  echo "<h2 class='text-center text-danger'> No results matched. No pets found</h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
  $pet_id=$row['pet_id'];
  $pet_title=$row['pet_title'];
  $pet_description=$row['pet_description'];
  $pet_keywords=$row['pet_keywords'];
  $pet_image1=$row['pet_image1'];
  $pet_price=$row['pet_price'];
  $category_id=$row['category_id'];
  $breed_id=$row['breed_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
                  <img src='./admin_area/pet_images/$pet_image1' class='card-img-top' alt='$pet_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $pet_title</h5>
                    <p class='card-text'> $pet_description</p>
                    <p class='card-text'>Price:$pet_price</p>
                    <a href='index.php?add_to_cart=$pet_id' class='btn btn-info'>Add to cart</a>
                    <a href='#' class='btn btn-secondary'>View more</a>
                  </div>
  </div>
  </div>";
}
}
}
//View details function
function view_detais(){
  global $con;

  //condition to set isset or not
  if(isset($_GET['pet_id'])){
  if(!isset($_GET['category'])){
    if(!isset($_GET['breed'])){
      $pet_id=$_GET['pet_id'];
  
      $select_query="select * from `pets` where pet_id=$pet_id";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $pet_id=$row['pet_id'];
    $pet_title=$row['pet_title'];
    $pet_description=$row['pet_description'];
    $pet_keywords=$row['pet_keywords'];
    $pet_image1=$row['pet_image1'];
    $pet_image2=$row['pet_image2'];
    $pet_image3=$row['pet_image3'];
    $pet_price=$row['pet_price'];
    $category_id=$row['category_id'];
    $breed_id=$row['breed_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
                    <img src='./admin_area/pet_images/$pet_image1' class='card-img-top' alt='$pet_title'>
                    <div class='card-body'>
                      <h5 class='card-title'> $pet_title</h5>
                      <p class='card-text'> $pet_description</p>
                      <p class='card-text'>Price:$pet_price</p>
                      <a href='index.php?add_to_cart=$pet_id' class='btn btn-info'>Add to cart</a>
                      <a href='index.php' class='btn btn-secondary'>Go Home</a>
                    </div>
    </div>
    </div>
    
    
<div class='col-md-8'>
<!--Related images-->
<div class='row'>
    <div class='col-mid-12'>
        <h4 class='text-center text-info mb-5'>Related Pets</h4>
    </div>
<div class='col-md-6'>
<img src='./admin_area/pet_images/$pet_image2' class='card-img-top' alt='$pet_title'>
                 
</div>
<div class='col-md-6'>
<img src='./admin_area/pet_images/$pet_image3' class='card-img-top' alt='$pet_title'>
                  
</div>

</div>

</div>";
  }
  }
  }
}
}
//get Ip adderss function

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
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

//cart function
function cart(){
if(isset($_GET['add_to_cart'])){
  global $con;
  $get_ip_address = getIPAddress();  
  $get_pet_id=$_GET['add_to_cart'];
  $select_query="select * from `cart_details` where ip_address='$get_ip_address' and pet_id=$get_pet_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows>0){
    echo "<script>alert('This pet is already present inside cart.')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }else{
    $insert_query="insert into `cart_details` (pet_id,ip_address,quantity) values($get_pet_id,'$get_ip_address',0)";
    $result_query=mysqli_query($con,$insert_query);
    echo "<script>alert('Pet is added to cart.')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
}
}
//function to get cart itwms numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();  
    $select_query="select * from `cart_details` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }else{
      global $con;
      $get_ip_address = getIPAddress();  
      $select_query="select * from `cart_details` where ip_address='$get_ip_address'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
      }
      echo $count_cart_items;
  }
  //total price function
  function total_cart_price(){
    global $con;
    $get_ip_address = getIPAddress(); 
    $total_price=0;
    $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $pet_id=$row['pet_id'];
      $select_pets="select * from `pets` where pet_id='$pet_id'";
      $result_pets=mysqli_query($con,$select_pets);
      while($row_pets_price=mysqli_fetch_array($result_pets)){
      $pet_price=array($row_pets_price['pet_price']);
      $pet_values=array_sum($pet_price);
        $total_price+=$pet_values;   
    }
  }
  echo $total_price;
  }

?>