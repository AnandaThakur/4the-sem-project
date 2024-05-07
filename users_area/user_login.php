<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
     <!--bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>



<style>
    body{
        overflow-x:hidden;
    }
</style>
<body>
    
<div class="container-fluid my-3">
   <h2 class="text-center">User Login</h2> 
   <div class="row d-flex align-items-center justify-content-center mt-5">
    <div class="col-lg-12 col-xl-6">
<form action="" method="post">
<div class="form-outline mb-4">
    <!-- username field -->
    <label for="user_username" class="form-label">Username</label>
    <input type="text" id="user_username" class="form-control"
    placeholder="Enter your name" autocomplete="off" required="required"
    name="user_username"/>
</div>

<div class="form-outline mb-4">
    <!-- password field -->
    <label for="user_password" class="form-label">Password</label>
    <input type="password" id="user_password" class="form-control"
    placeholder="Enter your password" autocomplete="off" required="required"
    name="user_password"/>
</div>

<div class="mt-4 pt-2">
    <input type="submit" value="Login" class="bg-info py-2 px-3
    border-0" name="user_login">
    
</div><p class="small fw-bold mt-2 pt-1 mb-0" >Don't have an account? <a href="user_registration.php" class="text-danger" >  Register</a></p>

</form>
    </div>
   </div>
</div>

</body>
</html>
<?php
if(isset($_POST['user_login'])){
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];

$select_query="select * from `user_table` where username='$user_username'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();



//cart items 
$select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);
if($row_count> 0){
    $_SESSION['username']=$user_username;
if(password_verify($user_password,$row_data['user_password'])){
    // echo "<script>alert('Login Successfull')</script>";
    if($row_count==1 and $row_count_cart==0){
        $_SESSION['username']=$user_username;
         echo "<script>alert('Login Successfull')</script>";
          echo "<script>window.open('profile.php','_self')</script>"; 
    }else{
        $_SESSION['username']=$user_username;
        echo "<script>alert('Login Successfull')</script>";
        echo "<script>window.open('payment.php','_self')</script>"; 
    }
}else{
    echo "<script>alert('Invalid details')</script>";
}

}else{
    echo "<script>alert('Invalid details')</script>";
}
}
?>