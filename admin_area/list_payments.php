
<h3 class="text-center text-success">List Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
<?php
$get_payments="select * from `user_payments`";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);
echo"    <tr class=text-center>
            <th>Slno.</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Payment mode</th>
            <th>Order Date</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>No Payments received Yet</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;
        echo" <tr class=text-center>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>
            <td><a href='' class='text-light'> <i class='fa-solid fa-trash'></i></a></td>
        </tr>";
    }
}

?>

    </tbody>
</table> 