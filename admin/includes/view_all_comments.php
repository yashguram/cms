<table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">post title</th>
                                    <th class="text-center">author</th>
                                    <th class="text-center">email</th>
                                    <th class="text-center" >content</th>
                                    <th class="text-center">date</th>
                                    <th class="text-center">status</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $comment_table="SELECT * FROM comments";
                                $comment_result=mysqli_query($conn, $comment_table);
                                while($row=mysqli_fetch_assoc($comment_result)){
                                    $comment_id=$row['comment_id'];
                                    $comment_post_id=$row['comment_post_id'];
                                    $comment_author=$row['comment_author'];
                                    $comment_email=$row['comment_email'];
                                    $comment_content=$row['comment_content'];
                                    $comment_status=$row['comment_status'];
                                    $comment_date=$row['comment_date'];
                                    echo "<tr>";
                                    $po_name_query="SELECT * FROM posts WHERE post_id=$comment_post_id ";
                                    $name_result=mysqli_query($conn,$po_name_query);
                                    while($row=mysqli_fetch_assoc($name_result)){
                                        $comment_post_id=$row['post_id'];
                                        $comment_post_title=$row['post_title'];
                                        echo "<td><a href='../post.php?post_id=$comment_post_id'>{$comment_post_title}</a></td>";
                                    }
                                    echo "<td>{$comment_author}</td>";
                                    echo "<td>{$comment_email}</td>";
                                    echo "<td>{$comment_content}</td>";
                                    echo "<td>{$comment_date}</td>";
                                    echo "<td>{$comment_status}</td>"; 
                                    echo "<td><a href='admin_comments.php?approved={$comment_id}'><button class='btn btn-success'>Approve</button></a></td> ";
                                    echo "<td><a href='admin_comments.php?unapproved={$comment_id}'><button class='btn btn-warning'>Unapprove</button></a></td>";
                                    echo "<td><a href='admin_comments.php?delete={$comment_id}'><button class='btn btn-danger'>Delete</button></a></td>";
                                    echo "</tr>";
                                }
                                //CRUD Queries Start
                                if(isset($_GET['delete'])){
                                    $del_comment_id=$_GET['delete'];
                                    $del_query_comment= "DELETE FROM comments WHERE comment_id=$del_comment_id ";
                                    $del_comment=mysqli_query($conn,$del_query_comment);
                                    confirm($del_comment);
                                    header("location: admin_comments.php");
                                }
                                if(isset($_GET['approved'])){
                                    $approve_id=$_GET['approved'];
                                    $update_status="UPDATE comments SET comment_status='approved' WHERE comment_id=$approve_id ";
                                    $status_result=mysqli_query($conn,$update_status);
                                    confirm($status_result);
                                    header("location: admin_comments.php");
                                }
                                if(isset($_GET['unapproved'])){
                                    $approve_id=$_GET['unapproved'];
                                    $update_status="UPDATE comments SET comment_status='unapproved' WHERE comment_id=$approve_id ";
                                    $status_result=mysqli_query($conn,$update_status);
                                    confirm($status_result);
                                    header("location: admin_comments.php");
                                }
                                ?>
                            </tbody>
                        </table>