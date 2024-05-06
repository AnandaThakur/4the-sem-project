<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
     <!--bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>
<body>
    
<div class="container-fluid my-3">
   <h2 class="text-center">User Login</h2> 
   <div class="row d-flex align-items-center justify-content-center mt-5">
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