<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
     <!--bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>
<body>
    
<div class="container-fluid my-3">
   <h2 class="text-center">New User Registation</h2> 
   <div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data"></form>
<div class="form-outline mb-4">
    <!-- username field -->
    <label for="user_username" class="form-label">Username</label>
    <input type="text" id="user_username" class="form-control"
    placeholder="Enter your name" autocomplete="off" required="required"
    name="user_username"/>
</div>
<div class="form-outline mb-4">
    <!-- email field -->
    <label for="user_email" class="form-label">Email</label>
    <input type="email" id="user_email" class="form-control"
    placeholder="Enter your email" autocomplete="off" required="required"
    name="user_email"/>
</div>
<div class="form-outline mb-4">
    <!-- image field -->
    <label for="user_image" class="form-label">User Image</label>
    <input type="file" id="user_image" class="form-control"
     required="required"
    name="user_image"/>
</div>
<div class="form-outline mb-4">
    <!-- password field -->
    <label for="user_password" class="form-label">Password</label>
    <input type="password" id="user_password" class="form-control"
    placeholder="Enter your password" autocomplete="off" required="required"
    name="user_password"/>
</div>
<div class="form-outline mb-4">
    <!--confirm password field -->
    <label for="user_password" class="form-label">Confirm Password</label>
    <input type="password" id="confirm_user_password" class="form-control"
    placeholder="Confirm password" autocomplete="off" required="required"
    name="confirm_user_password"/>
</div>
<div class="form-outline mb-4">
    <!-- Address field -->
    <label for="user_address " class="form-label">Address </label>
    <input type="text" id="user_address " class="form-control"
    placeholder="Enter your Address " autocomplete="off" required="required"
    name="user_address "/>
</div>
<div class="form-outline mb-4">
    <!-- contact field -->
    <label for="user_contact" class="form-label">Contact </label>
    <input type="text" id="user_contact " class="form-control"
    placeholder="Enter your mobile number " autocomplete="off" required="required"
    name="user_contact "/>
</div>
<div class="mt-4 pt-2">
    <input type="submit" value="Register" class="bg-info py-2 px-3
    border-0" name="user_register">
    <p class="small fw-bold mt-2 pt-1 mb-0" >Already have an account ? <a href="user_login.php" class="text-danger" >  Login</a></p>
</div>

</form>
    </div>
   </div>
</div>

</body>
</html>
<!-- php code -->
<?php
if(isset($_POST['user_register'])) {
   $user_username=$_POST['user_username'];
   $user_email=$_POST['user_email'];
   $user_password=$_POST['user_password'];
   $user_confirm_user_password=$_POST['user_confirm_user_password'];
   $user_address=$_POST['user_address'];
   $user_contact=$_POST['user_contact'];
   $user_image=$_FILES['user_image']['name'];
   $user_image_tmp=$_FILES['user_image']['tmp_name'];
   $user_ip=getIPAddress();

}


?>