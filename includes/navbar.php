<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">Start Bootstrap</a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse d-flex " id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php 
                    $query="SELECT * FROM categories";
                    $cat_result=mysqli_query($conn,$query); //syntax:- mysqli_query($connection,$cat_result);
                    while($row=mysqli_fetch_assoc($cat_result)){
                        $cat_title=$row['cat_title']; //imp line to display perticular colum through loop $row['cloum_name (which is assign in db)']
                        echo "<li><a href='#'>{$cat_title}</a></li>";
                    }
                    ?>
                    <li><a href="./Registration.php">Registration</a></li>
                    <?php
                    if(isset($_SESSION['user_role'])==='admin'){
                        if(isset($_GET['post_id'])){
                            $post_id=$_GET['post_id'];
                            echo "<li><a href='admin/admin_post.php?source=edit_post&p_id={$post_id}'>Fast Edit</a></li>";
                        }
                    }
                    ?>
                    
                </ul>


                <?php
                if(!isset($_SESSION['user_id'])){
                    $disp_none="display: none;";
                 }else{
                    $disp_none="";
                ?>
                <ul class="nav navbar-right navbar-nav" style='<?php $disp_none?>'>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if(isset($_SESSION["firstname"])){echo $_SESSION["firstname"];}?>&nbsp;<?php if(isset($_SESSION["lastname"])){echo $_SESSION["lastname"];}?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=""><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li> -->
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php }
            ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>