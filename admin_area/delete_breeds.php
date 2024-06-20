<?php
if(isset($_GET['delete_breeds'])){
    $delete_breeds=$_GET['delete_breeds'];

    $delete_query="Delete from `breeds` where breed_id=$delete_breeds";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo"<script>alert('Breed is been deleted successfully')</script>";
        echo"<script>window.open('./index.php?view_breeds.php,_self')</script>";
}
    }

?>