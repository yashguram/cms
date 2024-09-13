    <?php include "includes/admin_header.php"?>
    <div id="wrapper">

        <!-- Navigation link -->
        <?php include "includes/admin_navbar.php"?>
        <!-- #navigation -->


        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            DASHBOARD
                            <small><?php echo strtoupper($_SESSION['firstname']); ?>
                            <?php echo strtoupper($_SESSION['lastname']); ?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- page body -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $post_count_query="SELECT * FROM posts";
                                        $post_count_result=mysqli_query($conn,$post_count_query);
                                        $post_count=mysqli_num_rows($post_count_result);
                                        ?>
                                        <div class='huge'><?php echo $post_count;?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin_post.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $comments_count_query="SELECT * FROM comments";
                                        $comments_count_result=mysqli_query($conn,$comments_count_query);
                                        $comments_count=mysqli_num_rows($comments_count_result);
                                        ?>
                                        <div class='huge'><?php echo $comments_count;?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin_comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $users_count_query="SELECT * FROM users";
                                        $users_count_result=mysqli_query($conn,$users_count_query);
                                        $users_count=mysqli_num_rows($users_count_result);
                                        ?>
                                        <div class='huge'><?php echo $users_count;?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin_users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $categories_count_query="SELECT * FROM categories";
                                        $categories_count_result=mysqli_query($conn,$categories_count_query);
                                        $categories_count=mysqli_num_rows($categories_count_result);
                                        ?>
                                        <div class='huge'><?php echo $categories_count; ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                <!-- graph -->
                 <?php
                    
                    //query for inactive things
                    $graph_post_count_query="SELECT * FROM posts WHERE post_status='draft' ";
                    $graph_post_count_result=mysqli_query($conn,$graph_post_count_query);
                    $graph_post_count=mysqli_num_rows($graph_post_count_result);

                    $graph_comments_count_query="SELECT * FROM comments WHERE comment_status='unapproved' ";
                    $graph_comments_count_result=mysqli_query($conn,$graph_comments_count_query);
                    $graph_comments_count=mysqli_num_rows($graph_comments_count_result);

                    $graph_users_count_query="SELECT * FROM users WHERE user_role='subscriber' ";
                    $graph_users_count_result=mysqli_query($conn,$graph_users_count_query);
                    $graph_users_count=mysqli_num_rows($graph_users_count_result);

                    //query for active things
                    $graph_active_post_count_query="SELECT * FROM posts WHERE post_status='published' ";
                    $graph_active_post_count_result=mysqli_query($conn,$graph_active_post_count_query);
                    $graph_active_post_count=mysqli_num_rows($graph_active_post_count_result);

                    $graph_active_comments_count_query="SELECT * FROM comments WHERE comment_status='approved' ";
                    $graph_active_comments_count_result=mysqli_query($conn,$graph_active_comments_count_query);
                    $graph_active_comments_count=mysqli_num_rows($graph_active_comments_count_result);

                    $graph_active_users_count_query="SELECT * FROM users WHERE user_role='admin' ";
                    $graph_active_users_count_result=mysqli_query($conn,$graph_active_users_count_query);
                    $graph_active_users_count=mysqli_num_rows($graph_active_users_count_result);


                 ?>
                <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Data','Total','Active','Inactive'],
                        <?php 
                        $graph_text=['Posts','Comments','Users'];
                        $graph_data_total=[$post_count,$comments_count,$users_count];
                        $graph_data_active=[$graph_active_post_count,$graph_active_comments_count,$graph_active_users_count];
                        $graph_data_inactive=[$graph_post_count,$graph_comments_count,$graph_users_count,];
                        for($i=0; $i<=2; $i++){
                            echo "['{$graph_text[$i]}'".","."{$graph_data_total[$i]}".","."{$graph_data_active[$i]}".","."{$graph_data_inactive[$i]}], ";
                        }
                        ?>
                        //  ['2014', 1000, 400, 600],
                        //  ['2015', 100, 40000, 6000],
                        //  ['2016', 10, 40, 60000],
                        //  ['2017', 1000, 400, 600]
                    ]);

                    var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
                </script>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div id="columnchart_material" style="height: 500px;"></div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- footer link -->
    <?php include "includes/admin_footer.php"?>
    <!-- #footer -->