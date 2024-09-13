<?php
if(isset($_SESSION['user_id'])){
    $active_user_id=$_SESSION['user_id'];
    $active_user_query="SELECT * FROM users WHERE user_id=$active_user_id ";
    $active_query_result=mysqli_query($conn,$active_user_query);
    while($row=mysqli_fetch_assoc($active_query_result)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_password=$row['user_password'];
        $user_role=$row['user_role'];
        $user_email=$row['user_email'];
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" name="update_profile_firstname" id="" class="form-control" value="<?php echo $user_firstname; ?>"/>
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" name="update_profile_lastname" id="" class="form-control" value="<?php echo $user_lastname; ?>" />
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="update_profile_username" id="" class="form-control" value="<?php echo $username; ?>" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="update_profile_email" id="" class="form-control" value="<?php echo $user_email; ?>" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="update_profile_password" id="" class="form-control" value="<?php echo $user_password; ?>" />
    </div>
    <!-- <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" name="update_profile_cnf_password" id="" class="form-control" />
    </div> -->
    <div class="form-group">
        <input type="submit" value="Update Profile" class="btn btn-primary" name="update_profile"/>
    </div>
</form>
<?php 
}
}
?>
<?php 
if(isset($_POST['update_profile'])){
    $update_profile_firstname=$_POST['update_profile_firstname'];
    $update_profile_lastname=$_POST['update_profile_lastname'];
    $update_profile_role=$_POST['update_profile_role'];
    $update_profile_username=$_POST['update_profile_username'];
    $update_profile_email=$_POST['update_profile_email'];
    $update_profile_password=$_POST['update_profile_password'];
    $update_profile_cnf_password=$_POST['update_profile_cnf_password'];
    //query
    $update_profile_query="UPDATE users SET ";
    $update_profile_query.="user_firstname='{$update_profile_firstname}', ";
    $update_profile_query.="user_lastname='{$update_profile_lastname}', ";
    $update_profile_query.="username='{$update_profile_username}', ";
    $update_profile_query.="user_email='{$update_profile_email}', ";
    $update_profile_query.="user_password='{$update_profile_password}' ";
    $update_profile_query.="WHERE user_id='{$user_id}' ";
    $update_profile_result=mysqli_query($conn,$update_profile_query);
    confirm($update_profile_result);
    header("location: admin_users.php");
}
?>