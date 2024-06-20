<?php
if(isset($_GET['edit_pets'])){
    $edit_id=$_GET['edit_pets'];
    //echo $edit_id;
    $get_data="SELECT * FROM `pets` WHERE pet_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $pet_title=$row['pet_title'];
    $pet_description=$row['pet_description'];
    $pet_keywords=$row['pet_keywords'];
    $category_id=$row['category_id'];
    $breed_id=$row['breed_id'];
    $pet_image1=$row['pet_image1'];
    $pet_image2=$row['pet_image2'];
    $pet_image3=$row['pet_image3'];
    $pet_price=$row['pet_price'];

    // Fetching category name
    $select_category="SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    //echo $category_title;

    // Fetching breed name
    $select_breed="SELECT * FROM `breeds` WHERE breed_id=$breed_id";
    $result_breed=mysqli_query($con,$select_breed);
    $row_breed=mysqli_fetch_assoc($result_breed);
    $breed_title=$row_breed['breed_title'];
    //echo $breed_title;
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Pet</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="pet_title" class="form-label">Pet Title</label>
            <input type="text" id="pet_title" value="<?php echo $pet_title ?>" name="pet_title" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="pet_desc" class="form-label">Pet Description</label>
            <input type="text" id="pet_desc" value="<?php echo $pet_description ?>" name="pet_desc" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="pet_keywords" class="form-label">Pet Keywords</label>
            <input type="text" id="pet_keywords" value="<?php echo $pet_keywords ?>" name="pet_keywords" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="pet_category" class="form-label">Pet Category</label>
            <select name="pet_category" class="form-select">
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                <?php
                // Fetching all categories
                $select_category_all="SELECT * FROM `categories`";
                $result_category_all=mysqli_query($con,$select_category_all);
                while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo"<option value='$category_id'>$category_title</option>";
                };
                ?>
            </select>        
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="pet_breed" class="form-label">Pet Breed</label>
            <select name="pet_breed" class="form-select">
                <option value="<?php echo $breed_title ?>"><?php echo $breed_title ?></option>
                <?php
                // Fetching all breeds
                $select_breed_all="SELECT * FROM `breeds`";
                $result_breed_all=mysqli_query($con,$select_breed_all);
                while($row_breed_all=mysqli_fetch_assoc($result_breed_all)){
                    $breed_title=$row_breed_all['breed_title'];
                    $breed_id=$row_breed_all['breed_id'];
                    echo"<option value='$breed_id'>$breed_title</option>";
                };
                ?>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="pet_image1" class="form-label">Pet Image 1</label>
            <div class="d-flex">
                <input type="file" id="pet_image1" name="pet_image1" class="form-control w-90 m-auto" required="required">
                <img src="./pet_images/<?php echo $pet_image1 ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="pet_image2" class="form-label">Pet Image 2</label>
            <div class="d-flex">
                <input type="file" id="pet_image2" name="pet_image2" class="form-control w-90 m-auto" required="required">
                <img src="./pet_images/<?php echo $pet_image2 ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="pet_image3" class="form-label">Pet Image 3</label>
            <div class="d-flex">
                <input type="file" id="pet_image3" name="pet_image3" class="form-control w-90 m-auto" required="required">
                <img src="./pet_images/<?php echo $pet_image3 ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="pet_price" class="form-label">Pet Price</label>
            <input type="text" id="pet_price" value="<?php echo $pet_price ?>" name="pet_price" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_pet" value="Update Pet" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- Editing Pets -->
<?php
if(isset($_POST['edit_pet'])){
    $pet_title=$_POST['pet_title'];
    $pet_desc=$_POST['pet_desc'];
    $pet_keywords=$_POST['pet_keywords'];
    $pet_category=$_POST['pet_category'];
    $pet_breed=$_POST['pet_breed'];
    $pet_price=$_POST['pet_price'];
    echo $pet_title;

    $pet_image1=$_FILES['pet_image1']['name'];
    $pet_image2=$_FILES['pet_image2']['name'];
    $pet_image3=$_FILES['pet_image3']['name'];
    echo $pet_image1;

    $tmp_image1=$_FILES['pet_image1']['tmp_name'];
    $tmp_image2=$_FILES['pet_image2']['tmp_name'];
    $tmp_image3=$_FILES['pet_image3']['tmp_name'];

    // Checking for empty fields
    if($pet_title=='' || $pet_desc=='' || $pet_keywords=='' || $pet_category=='' || $pet_breed=='' || $pet_image1=='' || $pet_image2=='' || $pet_image3=='' || $pet_price==''){
        echo"<script>alert('Please fill all the fields and continue')</script>";
    } else {
        move_uploaded_file($tmp_image1,"./pet_images/$pet_image1");
        move_uploaded_file($tmp_image2,"./pet_images/$pet_image2");
        move_uploaded_file($tmp_image3,"./pet_images/$pet_image3");

        // Query to update pets
        $update_pet="UPDATE `pets` SET pet_title='$pet_title', pet_description='$pet_desc', pet_keywords='$pet_keywords', pet_image1='$pet_image1', pet_image2='$pet_image2', pet_image3='$pet_image3', pet_price='$pet_price', date=NOW() WHERE pet_id=$edit_id";
        $result_update=mysqli_query($con,$update_pet);
        if($result_update){
            echo"<script>alert('Pet updated successfully')</script>";
            echo"<script>window.open('./insert_pet.php','_self')</script>";
        }
    }
}
?>


