<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
     <!--bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
    overflow:hidden;

}
</style>
</head>

<body>
  <div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Registration</h2>
    <div class="row d-flex justify-content-center">
       <div class="col-lg-6 col-xl-5">
        <img src="../images/adminlogo1.jpg" alt="Admin Registration" class="image-fluid">
       </div>
       <div class="col-lg-6 col-xl-5">
      <form action="" method="post">
        <div class="form-outline mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your name" required="required" class="form-control">
        </div>

        <div class="form-outline mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
        </div>

        <div class="form-outline mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
        </div>

        <div class="form-outline mb-4">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="confirm_password" id="confirm_password" name="confirm_password" placeholder="Enter your password" required="required" class="form-control">
        </div>
        <div>
            <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
            <p class="small fw-bold mt-2 pt-1">Do you have an account?<a href="admin_login.php" class="link-danger">Login</a> </p>
        </div>
        
      </form>
       </div>
    </div>
  </div> 
  <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aanand";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['admin_registration'])) {
    // Get form data
    $admin_name = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if password and confirm password match
    if ($admin_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $con->prepare("INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $admin_name, $admin_email, $hashed_password);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Admin registered successfully');</script>";
            echo "<script>window.open('admin_login.php', '_self');</script>";
        } else {
            echo "<script>alert('Error: Could not register admin');</script>";
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$con->close();
?>

</body>
</html>