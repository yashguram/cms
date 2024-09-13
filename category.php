<?php include "includes/header.php" ?>

    <!-- Navigation -->
    <?php include "includes/navbar.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->
                <?php 
                if(isset($_GET['cat_id'])){
                    $cat_id=$_GET['cat_id'];
                    $category_query="SELECT * FROM posts WHERE post_cat_id=$cat_id ";
                    $category_result=mysqli_query($conn,$category_query);
                    $count = mysqli_num_rows($category_result);
                    if($count == 0){
                        echo "<h1>No data Found!</h1>";
                    }else{
                    while($row=mysqli_fetch_assoc($category_result)){
                        $post_id = $row['post_id'];
                        $post_title =  strtoupper($row['post_title']);
                        $post_author = strtoupper($row['post_author']);
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'],0,200);
                     ?>
                        <!-- blog posts in loop -->
                    <h2>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php 
                    }
                }
            }
                ?>


                <!-- First Blog Post -->

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>