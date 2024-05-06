
<!--connect files-->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt Pets Website</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--css file-->
<link rel="stylesheet" href="style.css">

</head>
<body>

  <!--navbar-->
  <div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./images/real.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Pets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_pet.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
       <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_pet">
      </form>
    </div>
  </div>
</nav>

<!--calling cart function-->
<?php
cart();
?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">
<li class="nav-item">
          <a class="nav-link" href="#">welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_login.php">Login</a>
        </li>
</ul>
</nav>

        
<!--third child-->
<div class="bg-light">
    <h3 class="text-center">Pets List</h3>
    <p class="text-center">Get Your Pet Now</p>
</div>

<!--fourth child-->
<div class="row px-1">
  <div class="col-md-10">
      <!--Pets-->
<div class="row">

<!--Fetching pets-->
<?php
//calling functions
view_detais();
get_unique_categories();
get_unique_breeds();
?>

<!--row end-->
</div>
<!--Col end-->
</div>
<!-- sideNav-->
  <div class="col-md-2 bg-secondary p-0">
    <!--types to be displayed-->
     <ul class="navbar-nav me-auto text-center">
      <li class="nav-pet bg-info">
      <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
      
  <?php
$select_categories="select * from `categories`";
$result_categories=mysqli_query($con,$select_categories);
//$row_data=mysqli_fetch_assoc($result_breeds);
//echo $row_data['breed_title'];
while($row_data=mysqli_fetch_assoc($result_categories)){
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
  echo"
  <li class='nav-pet ''>
    <a href='index.php?category=$category_id' class='nav-link text-light'> $category_title</a>
  </li>";
}
?>
      
     </ul>

    <!--Categories to be displayed-->

     <ul class="navbar-nav me-auto text-center">
      <li class="nav-pet bg-info">
      <a href="#" class="nav-link text-light"><h4>We Have</h4></a>
      </li>

  <?php
getbreeds();
?>
       
     
     </ul>


  </div>
</div>






<!--last child-->
<!--Include footer-->
<?php
include("./includes/footer.php")
?>

</div>


<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>