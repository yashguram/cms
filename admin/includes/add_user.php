<?php 
    if(isset($_POST['add_user'])){
        $firstname=$_POST['user_firstname'];
        $lastname=$_POST['user_lastname'];
        $role=$_POST['user_role'];
        $username=$_POST['username'];
        $email=$_POST['user_email'];
        $password=$_POST['user_password'];
        $cnf_password=$_POST['cnf_user_password'];
        if($password !== $cnf_password){
            echo "<script type=text/javascript>alert('password does not matches')</script>";
        }else{
        $cnf_password=password_hash($cnf_password,PASSWORD_DEFAULT); //encrytption
        $user_push_query="INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_role) VALUES ('{$username}','{$cnf_password}','{$firstname}','{$lastname}','{$email}','{$role}') ";
        $user_push_result=mysqli_query($conn,$user_push_query);
        confirm($user_push_result);
        datadd($user_push_result);
        //header("location: ./admin_users.php");
        }
    }
?>
<!-- enctype="multipart/form-data" this is mandetory becuse our form conatains file feild also -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" name="user_firstname" id="" class="form-control" required/>
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" name="user_lastname" id="" class="form-control" required/>
    </div>
    <div class="form-group">
        <select name="user_role" id="">
            <option value="subscriber">Select Role</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="" class="form-control" required/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="user_email" id="" class="form-control" required/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="user_password" id="" class="form-control" required/>
    </div>
    <div class="form-group">
        <label for="cnf_password">Confirm Password</label>
        <input type="password" name="cnf_user_password" id="" class="form-control" required/>
    </div>

    <div class="form-group">
        <input type="submit" value="Add" class="btn btn-primary" name="add_user">
    </div>
</form>