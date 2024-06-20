<?php
if(isset($_GET['delete_pet'])){
    $delete_id=$_GET['delete_pet'];
    //delete query
$delete_pet="Delete from `pets` where pet_id=$delete_id";
$result_pet=mysqli_query($con,$delete_pet);
if($result_pet){
    echo"<script>alert('pet deleted successfully')</script>";
    echo"<script>window.open('./index.php','_self')</script>";
}
}

?>