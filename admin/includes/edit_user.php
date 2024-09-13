<?php 
if(isset($_GET['u_id'])){
     $edit_user_id=$_GET['u_id'];
     $fetch_user_query="SELECT * FROM users WHERE user_id=$edit_user_id ";
     $fetch_user_result=mysqli_query($conn,$fetch_user_query);
     while($row=mysqli_fetch_assoc($fetch_user_result)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_password=$row['user_password'];
        $user_email=$row['user_email'];
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" name="update_user_firstname" id="" class="form-control" value="<?php echo $user_firstname; ?>"/>
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" name="update_user_lastname" id="" class="form-control" value="<?php echo $user_lastname; ?>" />
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="update_username" id="" class="form-control" value="<?php echo $username; ?>" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="update_user_email" id="" class="form-control" value="<?php echo $user_email; ?>" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="update_user_password" id="" class="form-control" value="<?php echo $user_password; ?>" />
    </div>
    
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" name="update_user"/>
    </div>
</form>
<?php }
}
?>
<!-- update query for user -->
<?php 
if(isset($_POST['update_user'])){
    $update_user_firstname=$_POST['update_user_firstname'];
    $update_user_lastname=$_POST['update_user_lastname'];
    $update_user_role=$_POST['update_user_role'];
    $update_username=$_POST['update_username'];
    $update_user_email=$_POST['update_user_email'];
    $update_user_password=$_POST['update_user_password'];
    $update_user_password=password_hash($update_user_password,PASSWORD_DEFAULT);
    //query
    $update_user_query="UPDATE users SET ";
    $update_user_query.="user_firstname='{$update_user_firstname}', ";
    $update_user_query.="user_lastname='{$update_user_lastname}', ";
    $update_user_query.="username='{$update_username}', ";
    $update_user_query.="user_email='{$update_user_email}', ";
    $update_user_query.="user_password='{$update_user_password}' ";
    $update_user_query.="WHERE user_id='{$user_id}' ";
    $update_user_result=mysqli_query($conn,$update_user_query);
    confirm($update_user_result);
    header("location: admin_users.php");

}
?>