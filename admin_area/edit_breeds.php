<?php
if(isset($_GET['edit_breeds'])){
    $edit_breed=$_GET['edit_breeds'];
    //echo $edit_breed;
    $get_breeds="select * from `breeds` where breed_id=$edit_breed";
    $result=mysqli_query($con,$get_breeds);
    $row=mysqli_fetch_assoc($result);
    $breed_title=$row['breed_title'];
    //echo $breed_title;

}
if(isset($_POST['edit_breed'])){
$breed_title=$_POST['breed_title'];

$update_query="update `breeds` set breed_title='$breed_title' where  
breed_id=$edit_breed";
$result_breed=mysqli_query($con,$update_query);
if($result_breed){
    echo"<script>alert('breed is updated successfully')</script>";
    echo"<script>window.open('./index.php?view_breeds.php,_self')</script>";
}

}

?>
<div class="container mt-3">
   <h1 class="text-center">Edit breed</h1> 
   <form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="breed_title" class="form-label">breed Title</label>
    <input type="text" name="breed_title" id="breed_title" class="form-control" required="required"
    value="<?php echo $breed_title;?>">
    </div>
    <input type="submit" value="Update breed" class="btn btn-info px-3 mb-3" name="edit_breed" >
   </form>
</div>