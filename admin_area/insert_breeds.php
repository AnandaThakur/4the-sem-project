
<?php 
include('../includes/connect.php');
if(isset($_POST['insert_breed'])){
  $breed_title=$_POST['breed_title'];

//select data from database
$select_query="select * from `breeds` where breed_title='$breed_title'";
$result_select=mysqli_query($con,$select_query);
$numver=mysqli_num_rows($result_select);
if($numver>0){
  echo"<script>alert('This breed is present inside the database')</script>";
}else{

$insert_query="insert into `breeds` (breed_title)values('$breed_title')";
$result=mysqli_query($con,$insert_query);
if($result){
  echo"<script>alert('Breed has been inserted successfully')</script>";
}
}
}
?>
<h2 class="text-center">Insert Breeds</h2>

<form action=""method="post" class="mb-2">
<div class="input-group  w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1">@</span>
  <input type="text" class="form-control" name="breed_title" 
  placeholder="Insert Breeds" aria-label="Breeds" aria-describedby="basic-addon1">
</div>

<div class="input-group  w-10 mb-2 m-auto">
 
  <input type="Submit" class="bg-info border-0 p-2 my-3" name="insert_breed"
  value="Insert Breeds" >
 
</div>

</form>