<?php session_start(); ?>
<?php 
    //unset all values in session
  session_unset();

  //destroy after session unset
  session_destroy();
    header("Location: ../index.php");
?>