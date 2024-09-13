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
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <?php 
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source='';
                        }
                        switch($source){
                            default:
                                include "includes/user_edit_profile.php";
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