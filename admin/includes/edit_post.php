<?php 
if(isset($_GET['p_id'])){
    $post_edit_id=$_GET['p_id'];
}
    $post_edit_query="SELECT * FROM posts WHERE post_id={$post_edit_id}";
    $edit_result=mysqli_query($conn, $post_edit_query);
    while($row=mysqli_fetch_assoc($edit_result)){
        $post_id=$row['post_id'];
        $post_cat_id=$row['post_cat_id'];
        $post_title=$row['post_title'];
        $post_author=$row['post_author'];
        $post_date=$row['post_date'];
        $post_image=$row['post_image'];
        $post_content=$row['post_content'];
        $post_tags=$row['post_tags'];
        $post_comment_count=$row['post_comment_count'];
        $post_status=$row['post_status'];
    } 
     

if(isset($_POST['edit_post'])){
    $update_title=$_POST['new_title'];
    $update_cat=$_POST['post_category']; //error occured lests see
    $update_author=$_POST['new_author'];
    $update_status=$_POST['new_status'];
    $update_image=$_FILES['new_image']['name'];
    $update_image_temp=$_FILES['new_image']['tmp_name'];
    $update_tags=$_POST['new_tags'];
    $update_content=$_POST['new_content'];
    move_uploaded_file($update_image_temp, "../images/$update_image"); //moved image from any folder to htdocs images
    //image error after update which is solve by this code
    if(empty($update_image)){
        $query="SELECT * FROM posts WHERE post_id={$post_edit_id}";
        $result=mysqli_query($conn, $query);
        while($row=mysqli_fetch_assoc($result)){
            $update_image=$row['post_image'];
        }
    }
    $post_update_query="UPDATE posts SET ";
    $post_update_query.="post_title = '{$update_title}', ";
    $post_update_query.="post_author = '{$update_author}', ";
    $post_update_query.="post_cat_id = {$update_cat}, ";
    $post_update_query.="post_date = now(), ";
    $post_update_query.="post_image = '{$update_image}', ";
    $post_update_query.="post_status = '{$update_status}', ";
    $post_update_query.="post_content = '{$update_content}', ";
    $post_update_query.="post_tags = '{$update_tags}' ";
    $post_update_query.="WHERE post_id = {$post_id} ";
    $post_edit_result=mysqli_query($conn, $post_update_query);
    confirm($post_edit_result);
    if($post_edit_result){
        //header("Location: admin_post.php");
        echo "<div class='alert alert-success' role='alert'>Data Updated Successfully! <a href='../post.php?post_id={$post_id}'>View Post</a></div>";
        
    }
    
    

}

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php if(isset($post_title)){echo $post_title;} ?>" name="new_title" id="" class="form-control" />
        <select name="post_category" id="">
            <?php 
                $query_cat="SELECT * FROM categories";
                $query_cat_result=mysqli_query($conn,$query_cat);
                while($row=mysqli_fetch_assoc($query_cat_result)){
                    $cat_id=$row['cat_id'];
                    $cat_title=$row['cat_title'];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" value="<?php if(isset($post_author)){echo $post_author;} ?>" name="new_author" id="" class="form-control" />
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <!-- <input type="text" name="new_status" value="" id="" class="form-control" /> -->
         <select name="new_status" id="">
            <option value="<?php echo $post_status?>"><?php echo $post_status?></option>
            <?php
                if($post_status == 'published'){
                    echo "<option value='draft'>draft</option>";
                }else{
                    echo "<option value='published'>published</option>";
                }
            ?>
         </select>
    </div>
    <div class="form-group">
        <label for="image" style="display: block; ">Post Image</label>
        <img src="../images/<?php if(isset($post_image)){echo $post_image;} ?>" height='80vh' width='100' alt="" />
        <input type="file" name="new_image" id="" />
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" name="new_tags" value="<?php if(isset($post_tags)){echo $post_tags;} ?>" id="" class="form-control" />
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea name="new_content" id="summernote" cols="30" rows="10" class="form-control"><?php if(isset($post_content)){echo $post_content;} ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Update Post" class="btn btn-primary" name="edit_post">
    </div>
</form>

