
<h3 class="text-center text-success ">All Pets</h3>
<table class="table table-bordered-mt-5">
    <thead class="bg-info">
        <tr class="text-center">
        <th>Pet Id</th>
        <th>Pet Title</th>
        <th>Pet Image</th>
        <th>Pet Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>

        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_pets="select * from `pets`";
        $result=mysqli_query($con,$get_pets);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
        $pet_id=$row['pet_id'];
        $pet_title=$row['pet_title'];
        $pet_image1=$row['pet_image1'];
        $pet_price=$row['pet_price'];
        $status=$row['status'];
        $number++;
        ?>
       <tr class='text-center'>
        <td><?php echo $number;?></td>
        <td><?php echo $pet_title;?></td>
        <td><img src='./pet_images/<?php echo $pet_image1;?>' class='product_img'/></td>
        <td><?php echo $pet_price;?>/-</td>
        <td><?php
        $get_count="select * from `orders_pending` where pet_id=$pet_id";
        $result_count=mysqli_query($con,$get_count);
        $rows_count=mysqli_num_rows($result_count);
        echo $rows_count;


        ?></td>
        <td><?php echo $status;?></php></td>
        <td><a href='index.php?edit_pets=<?php echo $pet_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_pet=<?php echo $pet_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
      

</table>
