<?php include "includes/header.php" ?>


    <!-- Navigation -->
    <?php include "includes/navbar.php" ?>
    
<?php
if(isset($_POST['register'])){
    //taking inputs
    $reg_firstname=$_POST['reg_firstname'];
    $reg_lastname=$_POST['reg_lastname'];
    $reg_username=$_POST['reg_username'];
    $reg_email=$_POST['reg_email'];
    $reg_password=$_POST['reg_password'];
    $reg_cnfpassword=$_POST['reg_cnfpassword'];

    //lowercasing registration data
    $reg_firstname=strtolower($reg_firstname);
    $reg_lastname=strtolower($reg_lastname);
    $reg_username=strtolower($reg_username);
    $reg_email=strtolower($reg_email);
    $reg_password=strtolower($reg_password);
    $reg_cnfpassword=strtolower($reg_cnfpassword);
    
    //escapig faulty string
    $reg_firstname=mysqli_real_escape_string($conn, $reg_firstname);
    $reg_lastname=mysqli_real_escape_string($conn,$reg_lastname);
    $reg_username=mysqli_real_escape_string($conn,$reg_username);
    $reg_email=mysqli_real_escape_string($conn,$reg_email);
    $reg_password=mysqli_real_escape_string($conn,$reg_password);
    $reg_cnfpassword=mysqli_real_escape_string($conn,$reg_cnfpassword);
    if(!empty($reg_firstname) && !empty($reg_lastname) && !empty($reg_username) && !empty($reg_email) && !empty($reg_password) && !empty($reg_cnfpassword)){
        if($reg_password === $reg_cnfpassword){
            //encrypting password
            $reg_cnfpassword=password_hash($reg_cnfpassword,PASSWORD_DEFAULT);

            //inserting data
            $reg_query="INSERT INTO users(user_firstname,user_lastname,username,user_password,user_email,user_role) VALUES ('{$reg_firstname}','{$reg_lastname}','{$reg_username}','{$reg_cnfpassword}','{$reg_email}','subscriber') ";
            $reg_result=mysqli_query($conn, $reg_query);
            confirm($reg_result);
            if($reg_result){
                echo "<script type=text/javascript>alert('Data Created Successfully!')</script>";
            }
        }else{
            echo "<script type=text/javascript>alert('password does not matches')</script>";
        }
    }else{
        echo "<script type=text/javascript>alert('Feilds Cannot Empty')</script>";
    }
    
}
?>
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="firstname" class="sr-only">Firstname</label>
                            <input type="text" name="reg_firstname" id="firstname" class="form-control" placeholder="Enter Firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Lastname</label>
                            <input type="text" name="reg_lastname" id="lastname" class="form-control" placeholder="Enter Lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="reg_username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="reg_email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="reg_password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="cnfpassword" class="sr-only">Confirm Password</label>
                            <input type="password" name="reg_cnfpassword" id="key" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register" required>
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>


        <!-- Footer -->
        <?php include "includes/footer.php" ?>
