<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>

 <!-- Add Course -->
 <?php
   $admin_username = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {
     if(checkCourseTitle())
     {
       if(checkCourseCode())
       {
         $course_title = $_POST['course_title'];
         $course_code = $_POST['course_code'];
         $user_name    = $admin_username;

         $sql = "INSERT INTO          tb_course(course_title,course_code,user_name,entry_time)values('$course_title','$course_code','$user_name','$current_datetime')";
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
         ?>

         <script type="text/javascript">

           window.location='course_list.php';

         </script>

         <?php
         }
         else
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
           echo $msg;
           return false;
         }
       }
     }
   }
   function checkCourseTitle()
   {
     $db     = new Database();
     $sql    = "SELECT * FROM tb_course WHERE course_title='".$_POST['course_title']."'";
     $result = $db->link->query($sql) or die($this->link->error.__LINE__);
     if($result->num_rows > 0)
     {
       ?>
        <script type="text/javascript">
          window.alert("Warning! Course already Exist.");
        </script>
       <?php
       return false;
     }
     else
     {
       return true;
     }
   }
   function checkCourseCode()
   {
     $db     = new Database();
     $sql    = "SELECT * FROM tb_course WHERE course_code='".$_POST['course_code']."'";
     $result = $db->link->query($sql) or die($this->link->error.__LINE__);
     if($result->num_rows > 0)
     {
       ?>
        <script type="text/javascript">
          window.alert("Warning! Course code already Exist.");
        </script>
       <?php
       return false;
     }
     else
     {
       return true;
     }
   }


  ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>online attendance system - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fontawsome -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v2.2.1
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-user"></i> Username : <?php echo $_SESSION['user_name']; ?>
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="admin_home.php"><span>OAS</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="admin_home.php">Home</a></li>

          <li><a href="admin_profile.php">Profile</a></li>
          <li><a href="section_list.php">Section</a></li>
          <li><a href="course_list.php">Course</a></li>
          <li><a href="student_list.php">Student</a></li>


          <li class="drop-down"><a href="#">Teacher</a>
            <ul>
              <li><a href="teacher_list.php">Teacher SingUp</a></li>
              <li><a href="assign_course_teacher_list.php">Assing Course Teacher</a></li>
            </ul>
          </li>
          <li><a href="attendance_date_list_admin.php">Attendance</a></li>
          <li><a href="admin_signup.php">Admin Singup</a></li>

          <li><a href="logout_admin.php" onclick="return confirm('Are You sure you want to logout?');"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Logout</a></li>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header>


  <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Add Course</li>
        </ol>
        <h2>Add Course</h2>

      </div>
    </section>

<!--- Profile Form-->
<section id="admin_profile" class="m-auto">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card w-75 m-auto">
          <h5 class="card-header">Course Details</h5>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <label for="name">Course Title</label>
                  <input type="text" class="form-control" name="course_title" id="name" required>
                </div>
                <div class="form-group">
                  <label for="name">Course Code</label>
                  <input type="text" class="form-control" id="name" name="course_code" required>
                </div>
              <input type="submit" class="btn btn-danger px-4" name="submit" value="Add">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h4>Online Attendance System</h4>
          <p>Department Of Computer Science & Engineering</p>
        </div>
        <div class="col-lg-6">
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="admin_home.php">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="admin_profile.php">Profile</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="section_list.php">Section</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="course_list.php">Course</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="student_list.php">Student</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="teacher_list.php">Teacher</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-contact">
          <h4>Contact Us</h4>
          <p>
            2 No Gate, Alfalah Goli <br>
            East Nasirabad, Chittagong<br>
            Bangladesh <br><br>
            <strong>Phone:</strong> +88 01876 565754<br>
            <strong>Email:</strong> mdbelalsayed04@gmail.com.com<br>
          </p>

        </div>

        <div class="col-lg-4 col-md-6 footer-info">
          <h3>About OAS</h3>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>OAS</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
      Developed by <a href="#">Md Belal Uddin</a>
    </div>
  </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
