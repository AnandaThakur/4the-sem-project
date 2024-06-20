<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
    <h2 class="text-center mb-5">Admin Login</h2>
    <div class="row d-flex justify-content-center">
       <div class="col-lg-6 col-xl-5">
        <img src="../images/bulldog.jpg" alt="Admin Registration" class="image-fluid">
       </div>
       <div class="col-lg-6 col-xl-5">
      <form action="" method="post">
        <div class="form-outline mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your name" required="required" class="form-control">
        </div>


        <div class="form-outline mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
        </div>

        <div>
            <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
            <p class="small fw-bold mt-2 pt-1">Don't you have an account?<a href="admin_registration.php" class="link-danger">Register</a> </p>
        </div>
        
      </form>
       </div>
    </div>
  </div> 
  <?php
session_start();

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

if (isset($_POST['admin_login'])) {
    // Get form data
    $admin_name = $_POST['username'];
    $admin_password = $_POST['password'];

    // Prepare and bind
    $stmt = $con->prepare("SELECT admin_id, admin_password FROM admin_table WHERE admin_name = ?");
    $stmt->bind_param("s", $admin_name);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($admin_id, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($admin_password, $hashed_password)) {
            // Password is correct
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            echo "<script>alert('Login successful');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            // Invalid password
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        // Invalid username
        echo "<script>alert('Invalid username or password');</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$con->close();
?>

</body>
</html>