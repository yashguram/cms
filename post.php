<?php include "includes/header.php" ?>

    <!-- Navigation -->
    <?php include "includes/navbar.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                <?php 
                if(isset($_GET['post_id'])){
                    $p_id=$_GET['post_id'];

                    //view count for perticular post
                    $post_view_count_query="UPDATE posts SET post_view_count=post_view_count+1 WHERE post_id={$p_id} ";
                    $post_view_count_result=mysqli_query($conn, $post_view_count_query);
                    confirm($post_view_count_result);
                    //End post view for perticular post

                    
                    $perti_po_query="SELECT * FROM posts WHERE post_id={$p_id} ";
                    $perti_po_result=mysqli_query($conn, $perti_po_query);
                    confirm($perti_po_result);
                    while($row=mysqli_fetch_assoc($perti_po_result)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_title = strtoupper($post_title);
                        $post_author = $row['post_author'];
                        $post_author = strtoupper($post_author);
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                ?>
                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="author.php?u_name=<?php echo strtolower($post_author); ?>"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p><?php echo $post_content; ?></p>

                <hr>
                <?php } } ?>

               <!-- Blog Comments -->
                <?php include "comments.php"?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>
        <!-- Footer -->
        <?php include "includes/footer.php" ?>
