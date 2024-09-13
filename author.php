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
                if(isset($_GET['u_name'])){
                    $u_name=$_GET['u_name'];
                    $author_posts_query="SELECT * FROM posts WHERE post_author LIKE '%$u_name%' AND post_status='published' ";
                    $perti_po_result=mysqli_query($conn, $author_posts_query);
                    confirm($author_posts_query);
                    $perti_po_count=mysqli_num_rows($perti_po_result);
                    if($perti_po_count === 0){
                        echo "<h1>No Result</h1>";
                    }else{
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
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php } } }?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>
        <!-- Footer -->
        <?php include "includes/footer.php" ?>
