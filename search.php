
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
            if(isset($_POST['submit'])){
               $search = $_POST['search'];
               $s_query="SELECT * FROM posts WHERE post_tags LIKE '%$search%' AND post_status='published' "; /* SELECT * FROM tabel_name WHERE column_name LIKE(=) '%$search%' %=is used to clierfy the varibel */
               $s_result=mysqli_query($conn,$s_query);
               confirm($s_result);
               $count = mysqli_num_rows($s_result);
               if($count === 0){
                echo "<h1>No Result</h1>";
               }else{
                    while($row=mysqli_fetch_assoc($s_result)){  //this code is taken from index.php 
                        $post_title = strtoupper($row['post_title']);
                        $post_author = strtoupper($row['post_author']);
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'],0,200);
                        ?>


                        <!-- blog posts in loop -->
                    <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
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