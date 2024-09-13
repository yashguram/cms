<!--Bulk Opration code -->
<?php 
if(isset($_POST['apply'])){
    if(isset($_POST['selectperticular'])){
        foreach($_POST['selectperticular'] as $checkboxpostid){
        $bulkoptions=$_POST['bulkoptions'];
            if(isset($bulkoptions)){
                switch($bulkoptions){
                case 'published':
                    $query="UPDATE posts SET post_status='{$bulkoptions}' WHERE post_id={$checkboxpostid} ";
                    $result=mysqli_query($conn,$query);
                    header("Location: admin_post.php");
                    break;
                case 'draft':
                    $query="UPDATE posts SET post_status='{$bulkoptions}' WHERE post_id={$checkboxpostid} ";
                    $result=mysqli_query($conn,$query);
                    header("Location: admin_post.php");
                    break;
                case 'delete':
                    $query="DELETE FROM posts WHERE post_id={$checkboxpostid} ";
                    $result=mysqli_query($conn,$query);
                    header("Location: admin_post.php");
                    break;
                case 'resetview':
                    $query="UPDATE posts SET post_view_count=0 WHERE post_id='{$checkboxpostid}' ";
                    $result=mysqli_query($conn,$query);
                    header("Location: admin_post.php");
                }
            }
        }
    }
}

?>
<!--End -->
<form action="" method="post">
    <table class="table table-bordered table-striped text-center">
        <div class="col-xs-4" style="padding: 0 0 0.2rem 0;">
            <select class="form-control" name="bulkoptions" id="bulkOprationContainer">
                <option selected>Select options</option>
                <option value="published">publish</option>
                <option value="draft">draft</option>
                <option value="delete">delete</option>
                <option value="resetview">reset view</option>
            </select>

        </div>
        <div class="col-xs-4">
            <input type="submit" class="btn btn-success" name="apply" value="Apply">&nbsp;<a class="btn btn-primary"
                href="admin_post.php?source=add_post">Add</a>
        </div>
        </div>
        <thead>
            <tr>
                <th class="text-center"><input type="checkbox" class="form-check-input " id="SelectAllCheckbox" name="selectall"></th>
                <!-- <th class="text-center">Sr</th> -->
                <th class="text-center">title</th>
                <th class="text-center">category</th>
                <th class="text-center">author</th>
                <th class="text-center">date</th>
                <th class="text-center">image</th>
                <!-- <th class="text-center">content</th> -->
                <th class="text-center">tags</th>
                <th class="text-center">comment count</th>
                <th>status</th>
                <th class="text-center">Views</th>
                <th colspan="3" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                                $post_table="SELECT * FROM posts ORDER BY post_id DESC ";
                                $table_result=mysqli_query($conn, $post_table);
                                while($row=mysqli_fetch_assoc($table_result)){
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
                                    $post_view_count=$row['post_view_count'];
                                    echo "<tr>";
                                    ?>
            <td><input type="checkbox" class="form-check-input CheckBoxes" id="" name="selectperticular[]" value="<?php echo $post_id?>">
            </td>


            <?php
                                    //echo "<td>{$post_id}</td>";
                                    echo "<td>{$post_title}</td>";
                                    $cat_query="SELECT * FROM categories WHERE cat_id={$post_cat_id} ";
                                    $cat_query_result=mysqli_query($conn, $cat_query); 
                                    while($row=mysqli_fetch_assoc($cat_query_result)){
                                        $cat_id=$row['cat_id'];
                                        $cat_title=$row['cat_title'];
                                        echo "<td>{$cat_title}</td>";
                                    }
                                    echo "<td>{$post_author}</td>";
                                    echo "<td>{$post_date}</td>";
                                    echo "<td><img src='../images/$post_image' height='80vh' width='100'/></td>";
                                    //echo "<td>{$post_content}</td>";
                                    echo "<td>{$post_tags}</td>";
                                    echo "<td>{$post_comment_count}</td>";
                                    echo "<td>{$post_status}</td>";
                                    echo "<td>{$post_view_count}</td>"; 
                                    echo "<td><a class='btn btn-danger' href='admin_post.php?delete={$post_id}'>Delete</a></td>";
                                    echo "<td><a class='btn btn-primary' href='admin_post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                    echo "<td><a class='btn btn-success' href='../post.php?post_id={$post_id}'>View</a></td>";
                                    echo "</tr>";
                                }
                                if(isset($_GET['delete'])){
                                    $del_id_admin=$_GET['delete'];
                                    $del_query_admin= "DELETE FROM posts WHERE post_id=$del_id_admin ";
                                    $del_result_admin=mysqli_query($conn,$del_query_admin);
                                    confirm($del_result_admin);
                                    header("location: admin_post.php");
                                }
                                ?>
        </tbody>
    </table>
</form>