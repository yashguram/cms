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
                            <?php 
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                            }else{
                                $source='';
                            }
                            switch($source){
                                case 'add_post':
                                    echo 'ADD POST';
                                    break;
                                case 'edit_post':
                                    echo 'EDIT POST';
                                    break;
                                default:
                                    echo 'VIEW ALL POST';
                                    break;
                            }
                            ?>
                            <small><?php echo strtoupper($_SESSION['firstname']); ?>
                            <?php echo strtoupper($_SESSION['lastname']); ?></small>
                        </h1>
                        <?php 
                        switch($source){
                            case 'add_post':
                            include "includes/add_post.php";
                            break;

                            case 'edit_post':
                                include "includes/edit_post.php";
                            break;

                            default:
                                include "includes/view_all_post.php";
                            break;

                        }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- footer link -->
     <?php include "includes/admin_footer.php"?>
     <!-- #footer -->