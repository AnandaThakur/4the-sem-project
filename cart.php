
<!--connect files-->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt Pets-cart details</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--css file-->
<link rel="stylesheet" href="style.css">
<style>
    .cart_img{
    width:50px;
    height:50px;
    object-fit:contain;
}
</style>
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
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item();?></sup></a>
        </li>
       
      </ul>
      
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
        echo" <li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
      </li>";
      }else{
        echo"<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>
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
<!--Fourth child-->
<div class="container">
    <div class="row">
        <form action="" method="post" >
        <table class="table table-bordered text-center">
           
                <!--php code for showing dynamic data-->
                <?php
              
                $get_ip_address = getIPAddress(); 
                $total_price=0;
                $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count> 0){
                  echo" <thead>
                  <tr>
                      <th>Pet Name</th>
                      <th>Pet Image</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Remove</th>
                      <th colspan='2'>Operations</th>
                  </tr>
              </thead>
              <tbody>";

                while($row=mysqli_fetch_array($result)){
                  $pet_id=$row['pet_id'];
                  $select_pets="select * from `pets` where pet_id='$pet_id'";
                  $result_pets=mysqli_query($con,$select_pets);
                  while($row_pets_price=mysqli_fetch_array($result_pets)){
                  $pet_price=array($row_pets_price['pet_price']);
                  $price_table=$row_pets_price['pet_price'];
                    $pet_title=$row_pets_price['pet_title'];
                    $pet_image1=$row_pets_price['pet_image1'];
                  $pet_values=array_sum($pet_price);
                    $total_price+=$pet_values;   
                
            
                ?>
                <tr>
                    <td><?php  echo $pet_title ?></td>
                    <td><img src="./admin_area/pet_images/<?php echo $pet_image1?>" alt=""
                    class="cart_img"></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50" ></td>
                    <?php
                     $get_ip_address = getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="update `cart_details` set quantity= $quantities where ip_address= '$get_ip_address'";
                        $result_pets_quantity=mysqli_query($con,$update_cart);
                        $total_price=$total_price* $quantities;

                    }
                    ?>

                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo 
                    $pet_id ?>"></td>
                    <td>
                    
                        <!-- <button class="bg-info px-3 py-2 border-0 " >Update</button> -->
                        <input type="submit" value="Update cart" class="bg-info px-3 py-2 border-0"
                        name="update_cart">
                        
                        <!-- <button class="bg-info px-3 py-2 border-0 ">Remove</button> -->
                        <input type="submit" value="Remove cart" class="bg-info px-3 py-2 border-0"
                        name="remove_cart">
                    </td>
                </tr>

                <?php }}}

                else{
                  echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                }

                ?>
            </tbody>
        </table>
        <!--Total-->
        <div class="d-flex mb-3">
        <?php
                $get_ip_address = getIPAddress(); 
                $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count> 0){
                  echo" <h4 class='px-3'>Total:<strong class='text-info'> $total_price /-</strong></h4>
                  <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0'
                        name='continue_shopping'>
                  <button class='bg-secondary px-3 py-2 border-0 text-light mx-3'><a href='./users_area/checkout.php'class='text-light text-decoration-none'>Checkout</a></button>";
                }else{
                  echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0'
                  name='continue_shopping'>";
                }
                if(isset($_POST['continue_shopping'])){
                  echo"<script>window.open('index.php','_self')</script>";
                }
                  ?>
              </div>

    </div>
</div>
</form>

<!--function to remove items  -->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
foreach($_POST['removeitem'] as $remove_id){
echo $remove_id;
$delete_query="Delete  from `cart_details` where pet_id=$remove_id";
$run_delete=mysqli_query($con,$delete_query);
if($run_delete){
  echo "<script>window.open*('cart.php','_self)</script>";
}
}
}
}
echo $remove_item=remove_cart_item();
?>


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