<table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Firstname</th>
                                    <th class="text-center">Lastname</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Views</th>
                                    <th colspan="4" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $user_table="SELECT * FROM users ORDER BY user_id DESC";
                                $table_result=mysqli_query($conn, $user_table);
                                while($row=mysqli_fetch_assoc($table_result)){
                                    $user_id=$row['user_id'];
                                    $username=$row['username'];
                                    $user_firstname=$row['user_firstname'];
                                    $user_lastname=$row['user_lastname'];
                                    $user_password=$row['user_password'];
                                    $user_email=$row['user_email'];
                                    $user_iamge=$row['user_image'];
                                    $user_role=$row['user_role'];
                                    //$randsalt=$row['randsalt'];
                                    echo "<tr>";
                                    echo "<td>{$username}</td>";
                                    echo "<td>{$user_firstname}</td>";
                                    echo "<td>{$user_lastname}</td>";
                                    echo "<td>{$user_email}</td>";
                                    echo "<td><img src='#' height='80vh' width='100'/></td>";
                                    echo "<td>{$user_role}</td>";
                                    echo "<td><a class='btn btn-success' href='admin_users.php?changeto_admin={$user_id}'>Admin</a></td> ";
                                    echo "<td><a class='btn btn-warning' href='admin_users.php?changeto_sub={$user_id}'>Subsciber</a></td>";
                                    echo "<td><a class='btn btn-primary' href='admin_users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
                                    echo "<td><a class='btn btn-danger' href='admin_users.php?delete_user={$user_id}'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                                <?php 
                                if(isset($_SESSION['user_id']) && $_SESSION['user_role']==='admin'){
                                if(isset($_GET['delete_user'])){
                                    $user_delete_id=$_GET['delete_user'];
                                    $user_delete_query="DELETE FROM users WHERE user_id=$user_delete_id ";
                                    $delete_query_result=mysqli_query($conn,$user_delete_query);
                                    confirm($delete_query_result);
                                    header("location: admin_users.php");
                                }
                                if(isset($_GET['changeto_admin'])){
                                    $user_update_id=$_GET['changeto_admin'];
                                    $user_update_query="UPDATE users SET user_role='admin' WHERE user_id=$user_update_id ";
                                    $user_update_result=mysqli_query($conn,$user_update_query);
                                    confirm($user_update_result);
                                    header("location: admin_users.php");
                                }
                                if(isset($_GET['changeto_sub'])){
                                    $user_update_id=$_GET['changeto_sub'];
                                    $user_update_query="UPDATE users SET user_role='subscriber' WHERE user_id=$user_update_id ";
                                    $user_update_result=mysqli_query($conn,$user_update_query);
                                    confirm($user_update_result);
                                    header("location: admin_users.php");
                                }
                            }//checking user_login
                                ?>
                            </tbody>
                        </table>