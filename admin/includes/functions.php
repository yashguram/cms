<?php
//Query to display data in tabel structure
function displydata()
{
    global $conn;
    $tbl_query = "SELECT * FROM categories";
    $tbl_result = mysqli_query($conn, $tbl_query);
    while ($row = mysqli_fetch_assoc($tbl_result)) {
        $tbl_id = $row["cat_id"];
        $tbl_name = $row["cat_title"];
        echo "<tr>";
        echo "<td> $tbl_id</td>";
        echo "<td>$tbl_name</td>";
        echo "<td><a href='categories.php?edit=$tbl_id '><button class='btn btn-primary'>Edit</button></a></td>";
        echo "<td><a href='categories.php?delete=$tbl_id'><button class='btn btn-danger'>Delete</button></a>";
        echo "</tr>";
    }
}

function confirm($result)
{
    global $conn;
    if (!$result) {
        die("query feild " . mysqli_error($conn));
    }
    return $result;
}

function datadd($result)
{
    global $conn;
    if ($result) {
        echo "<label class='text-success'>Data Added Successfully</label>";
    }
}

//Query to add data
function addcat()
{
    global $conn;
    if (isset($_POST['add_cat'])) {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title)) {
            echo "<label class='text-primary'>The feild should not empty</label>";
        } else {
            $cat_title = strtoupper($cat_title);
            $add_query = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '$cat_title') ";
            $result = mysqli_query($conn, $add_query);
            if ($result) {
                echo "<label class='text-success'>Category added sucessfully</label>";
            }
            header("Location: ./categories.php");
        }
    }
}

function deldata()
{
    global $conn;
    if (isset($_GET['delete'])) {
        $del_id = $_GET['delete'];
        $del_query = "DELETE FROM categories WHERE cat_id=$del_id ";
        $del_result = mysqli_query($conn, $del_query);
        header("location: categories.php");
    }
}

function updatedata()
{
    global $conn;
    global $tbl_id;
    if (isset($_POST['update_cat'])) {
        $update_title = $_POST['update_title'];
        $update_title = strtoupper($update_title);
        $update_query = "UPDATE categories SET cat_title = '{$update_title}' WHERE cat_id='{$tbl_id}' ";
        $update_result = mysqli_query($conn, $update_query);
    }
}

function insdata()
{
    global $conn;
    global $post_cat_id;
    global $post_title;
    global $post_author;
    global $post_image;
    global $post_content;
    global $post_tags;
    global $post_comment_count;
    global $post_date;
    global $post_status;
    $ins_query = "INSERT INTO posts(post_cat_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";
    $ins_query .= "VALUES({$post_cat_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
    $ins_result = mysqli_query($conn, $ins_query);
    confirm($ins_result);
    if ($ins_result) {
    }
}

function online_users()
{
    if (isset($_GET['onlineusers']))   
    {
        echo "";
        global $conn;
        if (!$conn) {
            session_start();
            include "../includes/db.php";
            $session = session_id();
            $time = time();
            $time_out_in_sec = 60;
            $time_out = $time - $time_out_in_sec;

            //to check logged in user are there in table or not
            $to_chk_user_query = "SELECT * FROM user_online WHERE session_id='{$session}' ";
            $to_chk_user_result = mysqli_query($conn, $to_chk_user_query);
            $to_chk_count = mysqli_num_rows($to_chk_user_result);

            if ($to_chk_count === NULL || $to_chk_count === 0) {
                mysqli_query($conn, "INSERT INTO user_online(session_id,time_info) VALUES ('{$session}','{$time}') ");
            } else {
                mysqli_query($conn, "UPDATE user_online SET time_info='{$time}' WHERE session_id='{$session}' ");
            }


            //After completing user_online table we take data from user_online table whose current time is less than last time_out
            $user_online_query = "SELECT * FROM user_online WHERE time_info > '{$time_out}' ";
            $user_online_result = mysqli_query($conn, $user_online_query);
            $user_online_count = mysqli_num_rows($user_online_result);
            echo $user_online_count;
        } //checking connection of db
    }// isset get onlineusers 
}

online_users();

//mysqli_injection_code
function escape($data){
    global $conn;
    $msg=$data; //where post data comes from input type=text
    mysqli_real_escape_string($conn,trim($msg))
}
?>