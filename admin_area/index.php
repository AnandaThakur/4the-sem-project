

<!--connect files-->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard </title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--Css file link-->
<link rel="stylesheet" href="../style.css">
<style>
.admin_image {
width: 100px;
object-fit:contain;
}
.body{
    overflow-x:hidden;
    
}
.product_img{
    width:100px;
    height:70px;
    object-fit:contain;
}
</style>
</head>
<body>


    <!--navbar-->
    <div class="container-fluid p-0">
        <!--First Child-->
       <nav class="navbar navbar-expand-lg navbar-light bg-info">
       <div class="container-fluid">
        <img src="../images/real.png" alt="" class="logo">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <ul class="navbar-nav">
             <li class="nav-pets">
            
             </li>
            </ul>
        </nav>
       </div>
       </nav> 

<!--Second Child-->

<div class="bglight">
    <h3 class="text-center" class="body">Manage Details</h3>
</div>

<!--third Child-->
<div class="row">
    <div class="col-md12 bg-secondary p--3 d-flex align-items-center">
        <div class="p-3">
            <a href="#"><img src="../images/bulldog.jpg"
             alt=""class="admin_image"></a>
             <p class="text-light text-center">Admin </p>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="insert_pet.php" class="nav-link text-light bg-info my-1">Insert Pets</a></button>
                <button><a href="index.php?view_pets" class="nav-link text-light bg-info my-1">View Pets</a></button>
                <button><a href="index.php?insert_breeds" class="nav-link text-light bg-info my-1">Insert Breeds</a></button>
                <button><a href="index.php?view_breeds" class="nav-link text-light bg-info my-1">View Breeds</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                 <button><a href="" class="nav-link text-light bg-info my-1">Logut</a></button>
            
            </div>
    </div>


</div>
<!--fourth child-->
<div class="container my-3">
    <?php
    if(isset($_GET['insert_category'])){
        include('insert_categories.php');
    }
    if(isset($_GET['insert_breeds'])){
        include('insert_breeds.php');
    }
    if(isset($_GET['view_pets'])){
        include('view_pets.php');
    }
    if(isset($_GET['edit_pets'])){
        include('edit_pets.php');
    }
    if(isset($_GET['delete_pet'])){
        include('delete_pet.php');
    }
    if(isset($_GET['view_categories'])){
        include('view_categories.php');
    }
    if(isset($_GET['view_breeds'])){
        include('view_breeds.php');
    }
    if(isset($_GET['edit_category'])){
        include('edit_category.php');
    }
    if(isset($_GET['edit_breeds'])){
        include('edit_breeds.php');
    }
    if(isset($_GET['delete_category'])){
        include('delete_category.php');
    }
    if(isset($_GET['delete_breeds'])){
        include('delete_breeds.php');
    }
    if(isset($_GET['list_orders'])){
        include('list_orders.php');
    }
    if(isset($_GET['list_payments'])){
        include('list_payments.php');
    }
    if(isset($_GET['list_users'])){
        include('list_users.php');
    }



    ?>
</div>










    </div>
  
    <!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
include("../includes/footer.php")
?>

</body>
</html>