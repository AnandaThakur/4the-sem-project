<?php
include('../includes/connect.php');

if(isset($_POST['insert_pet'])) {
    $pet_title = $_POST['pet_title'];
    $pet_description = $_POST['pet_description'];
    $pet_keywords = $_POST['pet_keywords'];
    $pet_category = $_POST['pet_category'];
    $pet_breeds = $_POST['pet_breeds'];
    $pet_price = $_POST['pet_price'];
    $pet_status = 'true';

    //Accessing images
    $pet_image1 = $_FILES['pet_image1']['name'];
    $pet_image2 = $_FILES['pet_image2']['name'];
    $pet_image3 = $_FILES['pet_image3']['name'];

    //Accessing image temp name
    $temp_image1 = $_FILES['pet_image1']['tmp_name'];
    $temp_image2 = $_FILES['pet_image2']['tmp_name'];
    $temp_image3 = $_FILES['pet_image3']['tmp_name'];

    //Checking empty fields
    if($pet_title == '' or $pet_description == '' or $pet_keywords== '' or $pet_category == '' 
    or  $pet_breeds == '' or $pet_price == '' or $pet_image1 == '' or $pet_image2 == '' or $pet_image3 == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit(); // Exit if any field is empty
    } else {
        // Move uploaded images to desired directory
        move_uploaded_file($temp_image1, "./pet_images/$pet_image1");
        move_uploaded_file($temp_image2, "./pet_images/$pet_image2");
        move_uploaded_file($temp_image3, "./pet_images/$pet_image3");

        //Insert query
        $insert_pets = "insert into `pets` (pet_title,pet_description,pet_keywords,category_id,breed_id,
        pet_image1,pet_image2,pet_image3,pet_price,date,status)
                        values ('$pet_title','$pet_description', '$pet_keywords', '$pet_category', '$pet_breeds',
                         '$pet_image1', '$pet_image2', '$pet_image3', '$pet_price', NOW(), '$pet_status')";

        $result_query = mysqli_query($con, $insert_pets);
        
        if($result_query) {
            echo "<script>alert('Successfully inserted the pet')</script>";
        } 
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product-Admin Dashboard</title>
     <!--bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--css file-->
<link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Pets</h1>
        <!--Form-->
        <form action=""method="post"enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pet_title" class="form-label">Pet title</label>
                <input type="text" name="pet_title"
                id="pet_description" class="form-control" placeholder="Enter Pet description" autocomplete="off" required="required">
            </div>
                <!--description-->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="pet_description" class="form-label">Pet description</label>
                <input type="text" name="pet_description"
                id="pet_description" class="form-control" placeholder="Enter Pet description" autocomplete="off" required="required">
            </div>
                <!--keywords-->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="pet_keywords" class="form-label">Pet keywords</label>
                <input type="text" name="pet_keywords"
                id="pet_keywords" class="form-control" placeholder="Enter Pet keywords" autocomplete="off" required="required">
            </div>
            <!--Breeds-->
            <div class="form-outline mb-4 w-50 m-auto">
               <select name="pet_breeds" id="" class="form_select">
                <option value="">Select a breed</option>
                <?php
                $select_query = "SELECT * FROM `breeds`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                $breed_title = $row['breed_title']; // Corrected access to breed_title
                $breed_id = $row['breed_id']; // Corrected access tobreed_id
                echo "<option value='$breed_id'>$breed_title</option>"; // Set option value to breed_id
                }
                ?>
             
                
            </select>
               
            </div>
            <!--categories-->
            <div class="form-outline mb-4 w-50 m-auto">
               <select name="pet_category" id="" class="form_select">
                <option value="">Select a Category</option>
                <?php
                $select_query = "SELECT * FROM `categories`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                $category_title = $row['category_title']; // Corrected access to category_title
                $category_id = $row['category_id']; // Corrected access to category_id
                echo "<option value='$category_id'>$category_title</option>"; // Set option value to category_id
                }
                ?>

                <!--<option value="">Category1</option>
                <option value="">Category2</option>
                <option value="">Category3</option>
                <option value="">Category4</option>-->
               
                
            </select>
             <!--Image 1-->
             <div class="form-outline mb-4 w-50 m-center">
                <label for="pet_image1" class="form-label">Pet image 1</label>
                <input type="file" name="pet_image1"
                id="pet_image1" class="form-control" required="required">
            </div>
              
            
            <!--Image 2-->
            <div class="form-outline mb-4 w-50 m-center">
                <label for="pet_image2" class="form-label">Pet image 2</label>
                <input type="file" name="pet_image2"
                id="pet_image2" class="form-control" required="required">
            </div>

            <!--Image3-->
            <div class="form-outline mb-4 w-50 m-center">
                <label for="pet_image3" class="form-label">Pet image 3</label>
                <input type="file" name="pet_image3"
                id="pet_image3" class="form-control" required="required">
            </div>
              <!--price-->
              <div class="form-outline mb-4 w-50 m-center">
                <label for="pet_price" class="form-label">Pet price</label>
                <input type="text" name="pet_price"
                id="pet_price" class="form-control" placeholder="Enter Pet price" autocomplete="off" required="required">
            </div>
              <!--button-->
              <div class="form-outline mb-4 w-50 m-center">
               <input type="submit" name="insert_pet" class="btn btn-info mb-3"value="Insert pet">
            </div>




        </form>

    </div>
    
</body>
</html>