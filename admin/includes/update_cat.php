<!-- edit category -->
<!-- before edit we want to connect id through anchor tag to db -->
<?php 
                          //edit categoty button
                          if(isset($_GET['edit'])){
                            $dsply_id=$_GET['edit']; //to fetch id from db
                            $tbl_query="SELECT * FROM categories WHERE cat_id=$dsply_id ";
                            $tbl_result=mysqli_query($conn,$tbl_query);
                            while($row=mysqli_fetch_assoc($tbl_result)){
                                $tbl_id=$row["cat_id"];
                                $tbl_name=$row["cat_title"];
                          ?>
<form action="" method="post">
    <label for="cat-title">Edit Category</label>
    <div class="form-group">
        <!-- display data from db not url -->
        <input type="text" name="update_title" id="" class="form-control"
            value="<?php if(isset($tbl_name)){echo $tbl_name;}?>">
        <!-- # -->
    </div>
    <div class="form-group">
        <input type="submit" value="Edit Category" class="btn btn-primary" name="update_cat">
    </div>
</form>
<?php }}?>

<!-- update query start from here -->
<?php updatedata(); ?>
<!-- #update end -->
<!-- #edit category -->