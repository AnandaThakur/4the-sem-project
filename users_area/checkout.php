
<!--connect files-->
<?php
include('../includes/connect.php');
session_start();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt Pets Website- Checkout Page</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--css file-->
<link rel="stylesheet" href="style.css">
<style>
  .logo{
    width:3%;
    height:3%;
  }
</style>

</head>
<body>

  <!--navbar-->
  <div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../images/real.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Pets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
       
      </ul>
      <form class="d-flex" action="search_pet.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
       <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_pet">
      </form>
    </div>
  </div>
</nav>


<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">

        <?php
        if(!isset($_SESSION['username'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='#'>welcome Guest</a>
        </li>";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href=''>Welcome ".$_SESSION['username']."</a>
        </li>";
      }

      if(!isset($_SESSION['username'])){
        echo"<li class='nav-item'>
        <a class='nav-link' href='./user_login.php'>Login</a>
      </li>";
      }else{
        echo"<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
      </li>";
      }
        ?>
        
</ul>
</nav>

        
<!--third child-->
<div class="bg-light">
    <h3 class="text-center">Pets List</h3>
    <p class="text-center">Get Your Pet Now</p>
</div>
<!-- fourth child -->
<div class="row px-1">
<div class="col-md-12">
<div clas="row">
    <?php
if(!isset($_SESSION['username'])){
    include('../users_area/user_login.php');
}else{
    include('payment.php');
}
?>
</div>

<!-- col end -->
</div>
</div>







<!--last child-->
<!--Include footer-->
<?php
include("../includes/footer.php")
?>

</div>


<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>