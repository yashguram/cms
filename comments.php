<?php 
    if(isset($_GET['post_id'])){
        $post_id=$_GET['post_id'];
    if(isset($_POST['send'])){
        $author=$_POST['author'];
        $email=$_POST['email'];
        $content=$_POST['content'];
        if(!empty($author) && !empty($email) && !empty($content)){
        $comment_query="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ({$post_id},'{$author}','{$email}','{$content}','unapproved',now()) ";
        $comment_result=mysqli_query($conn,$comment_query);
        confirm($comment_result);
        $update_comment_count="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$post_id ";
        $count_result=mysqli_query($conn,$update_comment_count);
        confirm($comment_result);
        header("Location: post.php?post_id=$post_id");
        }else{
            echo "<script>alert('The Feilds Cannot be Empty!')</script>";
        }
    }
}
?>
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" method="post">
        <div class="form-group">
            <label for="comment-author">Author</label>
            <input type="text" class="form-control" name="author" id=""/>
        </div>
        <div class="form-group">
            <label for="comment-author">Email</label>
            <input type="email" class="form-control" name="email" id=""/>
        </div>
        <div class="form-group">
            <label for="comment-author">Content</label>
            <textarea class="form-control" rows="3" name="content"></textarea>
        </div>
        <input type="submit" value="submit" class="btn btn-primary" name="send">
    </form>
</div>

<hr>

<!-- Posted Comments -->

<!-- Comment -->
<?php 
$comment_display_query="SELECT * FROM comments WHERE comment_post_id=$post_id AND comment_status='approved' ORDER BY comment_id DESC ";
$comment_display_result=mysqli_query($conn,$comment_display_query);
confirm($comment_display_result);
while($row=mysqli_fetch_assoc($comment_display_result)){
    $comment_author=$row['comment_author'];
    $comment_content=$row['comment_content'];
    $comment_date=$row['comment_date'];
?>
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $comment_author; ?>
            <small><?php echo $comment_date; ?></small>
        </h4>
        <?php echo $comment_content; ?>
    </div>
</div>
<?php } ?>