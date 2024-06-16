<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    
}



//getting total items and total price of  all pets
$get_ip_address=getIPAddress();
$total_price=0;
$cart_query_price=" select * from `cart_details` where ip_address='$get_ip_address'";
$invoice_number=mt_rand();
$status='pending';
$result_cart_price=mysqli_query($con,$cart_query_price);
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $pet_id=$row_price['pet_id'];
    $select_pet="select * from `pets` where pet_id=$pet_id";
    $run_price=mysqli_query($con,$select_pet);
    while($row_pet_price=mysqli_fetch_array($run_price)){
        $pet_price=array($row_pet_price['pet_price']);
        $pet_values=array_sum($pet_price);
        $total_price+= $pet_values;
    }
}
//getting quantity from cart
$get_carts="select * from `cart_details`";
$run_cart=mysqli_query($con,$get_carts);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity= 1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
   $subtotal=$total_price*$quantity;
}
$insert_orders="insert into `user_orders` (user_id,amount_due,invoice_number,total_pets,order_date,order_status)
values($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo" <script>alert('Orders are submitted successfully') </script>";
    echo" <script>window.open('../user_profile/profile.php','_self') </script>";
}
//orders pending
$insert_pending_orders="insert into `orders_pending` (user_id,invoice_number,pet_id,quantity,order_status)
values($user_id,$invoice_number,$pet_id,$quantity,'$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);  


//delete items from cart
$empty_cart="Delete from `cart_details` where ip_address='$get_ip_address'";
$result_delete=mysqli_query($con,$empty_cart); 




?>
