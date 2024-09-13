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
                                case 'add_user':
                                    echo "ADD USER";
                                break;
    
                                case 'edit_user':
                                    echo "EDIT USER";
                                break;
    
                                default:
                                    echo "VIEW All USERS";
                                break;
    
                            }
                            ?>
                            <small><?php echo strtoupper($_SESSION['firstname']); ?>
                            <?php echo strtoupper($_SESSION['lastname']); ?></small>
                        </h1>
                        <?php 
                        
                        switch($source){
                            case 'add_user':
                            include "includes/add_user.php";
                            break;

                            case 'edit_user':
                                include "includes/edit_user.php";
                            break;

                            default:
                                include "includes/view_all_users.php";
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