<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>



    <!-- Blog Categories Well -->
    <div class="well">

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php 
                $blog_query="SELECT * FROM categories LIMIT 4";
                $blog_result=mysqli_query($conn,$blog_query);
                while($row=mysqli_fetch_assoc($blog_result)){
                    $cat_title=$row['cat_title'];
                    $cat_id=$row['cat_id'];
                    echo "<li><a href='./category.php?cat_id={$cat_id}'>{$cat_title}</a></li>";
                }
                ?>
                    <!-- <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li> -->
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- login well -->
     <?php
     if(isset($_SESSION['user_id'])){
        $disp_none="display: none;";
     }else{
        $disp_none="";
     ?>
    <div class="well" style='<?php $disp_none?>'>
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input name="username_feild" type="text" class="form-control" placeholder="Enter Username" />
            </div>
            <div class="input-group">
                <input name="password_feild" type="password" class="form-control" placeholder="Enter Username" />
                <span class="input-group-btn">
                    <button name="login_user" type="submit" class="btn btn-primary">Login</button>
                </span>
            </div>
        </form>
        
        <!-- /.input-group -->
    </div>
<?php } ?>
     
    <!-- Side Widget Well -->
    <?php include "sidewall.php"?>

</div>