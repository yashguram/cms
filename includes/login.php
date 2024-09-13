<?php include "db.php"; ?>
<?php session_start(); ?>
<?php 
if(isset($_POST['login_user'])){
    $username_feild=$_POST['username_feild'];
    $password_feild=$_POST['password_feild'];
    $username_feild=mysqli_real_escape_string($conn,$username_feild);
    $password_feild=mysqli_real_escape_string($conn,$password_feild);
    if(empty($username_feild) || empty($password_feild)){
        header("Location: ../index.php");
    }else{
        $query_login="SELECT * FROM users WHERE username='{$username_feild}' ";
        $login_result=mysqli_query($conn,$query_login);
        while($row=mysqli_fetch_assoc($login_result)){
            $db_user_id=$row['user_id'];
            $db_username=$row['username'];
            $db_user_firstname=$row['user_firstname'];
            $db_user_lastname=$row['user_lastname'];
            $db_user_password=$row['user_password'];
            $db_user_role=$row['user_role'];
            $verify=password_verify($password_feild,$db_user_password);
        }
        
        if($username_feild === $db_username && $verify){
            $_SESSION['user_id']=$db_user_id;
            $_SESSION['username']=$db_username;
            $_SESSION['firstname']=$db_user_firstname;
            $_SESSION['lastname']=$db_user_lastname;
            $_SESSION['password']=$db_user_password;
            $_SESSION['user_role']=$db_user_role;
            if($db_user_role === 'admin'){
                header("Location: ../admin/index.php");
            }else if($db_user_role === 'subscriber'){
                header("Location: ../index.php");  
            }
        }else{
            header("Location: ../index.php");
        }
    }
}
?>