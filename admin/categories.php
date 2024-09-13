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
                        Categories
                        <small>Page</small>
                    </h1>
                    <div class="col-lg-6">
                        <!-- add new category -->
                        <?php addcat();?>
                        <form action="" method="post">
                            <label for="cat-title">Add Category</label>
                            <div class="form-group">
                                <input type="text" name="cat_title" id="" class="form-control" >
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add Category" class="btn btn-primary" name="add_cat">
                            </div>
                        </form>
                        <!-- #add new category -->

                        <!-- update categories -->
                        <?php include "includes/update_cat.php" ?>
                        <!-- #update categories -->
                        
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Title</th>
                                    <th colspan="2" class="text-center">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- displaying data into table format -->
                                <?php displydata();?>
                                <!-- #displaying data into table format -->

                            <!-- delete categories from table -->
                            <?php deldata(); ?>
                            <!-- #delete categories from table -->

                            </tbody>
                        </table>
                    </div>
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