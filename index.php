<?php include "includes/header.php" ?>

    <!-- Navigation -->
    <?php include "includes/navbar.php" ?>

    <!-- Page Content -->
    <div class="container">
        <!-- online counter of login user PHP -->
        <?php
        
        
        ?>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                    MAHARATRA TIMES
                    <small>News</small>
                </h1>
                <!-- pagination starts -->
                <?php 
                    $total_post_count_query="SELECT * FROM posts ";
                    $total_post_count_result=mysqli_query($conn,$total_post_count_query);
                    $post_count=mysqli_num_rows($total_post_count_result);
                    $post_count=ceil($post_count/3);

                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }else{
                        $page="";
                    }
                    
                    if($page=="" || $page==1){
                        $page_1=0;
                    }else{
                        $page_1=($page*3)-3;
                    }
                ?>
                <?php 
                    
                    $query="SELECT * FROM posts WHERE post_status='published' LIMIT $page_1,3 ";
                    $result=mysqli_query($conn,$query); //1st connection varibel //output
                    while($row=mysqli_fetch_assoc($result)){
                        $post_id = $row['post_id'];
                        $post_title = strtoupper($row['post_title']);
                        $post_author = strtoupper($row['post_author']);
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                     ?>
                        <!-- blog posts in loop -->
                    <h2>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author.php?u_name=<?php echo strtolower($post_author); ?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php 
                    }
                
                ?>


<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php
        for($i=1;$i<=$post_count;$i++){
            if($i==$page){
                $active='active';
            }else{
                $active="";
            }
            echo "<li class='$active'><a href='index.php?page=$i'>$i</a></li>";
        }
    ?>
  </ul>
</nav>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>