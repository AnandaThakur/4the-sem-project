<?php
//including connect file
include('./includes/connect.php');
//getting pets
function getpets(){
  global $con;
    $select_query="select * from `pets` order by rand() LIMIT 0,9";
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
                    <a href='#' class='btn btn-info'>Add to cart</a>
                    <a href='#' class='btn btn-secondary'>View more</a>
                  </div>
  </div>
  </div>";
}
}

?>