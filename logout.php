<?php
  session_start();

  session_destroy();

  header('location:teacher_login.php');
 ?>
