<?php 

if(isset($_POST['publish'])){
    $post_title=$_POST['title'];
    $post_title=strtolower($post_title);
    $post_cat_id=$_POST['post_category'];
    $post_author=$_POST['author'];
    $post_author=strtolower($post_author);
    $post_status=$_POST['status'];
    $post_image=$_FILES['image']['name'];
    $temp_image=$_FILES['image']['tmp_name'];//$_FILES['nameofimage']['tmp_name(fixed value)']
    //this function is used move a uploding image into the cms folder directly
    move_uploaded_file($temp_image, "../images/$post_image"); //move_uploaded_file(file_verible, '/location/where want to move/variblename');
    $post_tags=$_POST['tags'];
    $post_content=$_POST['content'];
    $post_date=date('d-m-y');
    insdata();
    header("Location: admin_post.php?source=view_all_post");
}
?>
<!-- enctype="multipart/form-data" this is mandetory becuse our form conatains file feild also -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" id="" class="form-control" />
    </div>
    <div class="form-group">
    <label for="title">Post Category</label>
        <select class="form-control" name="post_category" id="">
            <?php
            $add_post_cat="SELECT * FROM categories";
            $result_post_cat=mysqli_query($conn,$add_post_cat);
            while($row=mysqli_fetch_assoc($result_post_cat)){
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" name="author" id="" class="form-control" />
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <!-- <input type="text" name="status" id="" class="form-control" /> -->
        <select name="status" class="form-control" id="">
            <option value="published">Publish</option>
            <option value="draft">draft</option>
         </select>
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" id="" />
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" name="tags" id="" class="form-control" />
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea name="content" id="summernote" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Publish" class="btn btn-primary" name="publish">
    </div>
</form>