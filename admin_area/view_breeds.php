<h3 class="text-center text-success"></h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info ">
        <tr class="text-center">
            <th>Slno.</th>
            <th>Breed title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat="select * from `breeds`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $breed_id=$row['breed_id'];
            $breed_title=$row['breed_title'];
            $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $breed_title ?></td>
            <td><a href='index.php?edit_breeds=<?php echo $breed_id?>' class='text-light'> <i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_breeds=<?php echo $breed_id?>' class='text-light'> <i class='fa-solid fa-trash'></i></a></td></td>
            
        </tr>
        <?php
        }?>
    </tbody>
</table>