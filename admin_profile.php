<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>


 <!-- Select Course -->
 <?php
   $admin_username = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   $sql    = "SELECT * FROM tb_admin WHERE user_name = '$admin_username'";

   $result = $db->select($sql);

    while($getData = $result->fetch_assoc())
    {
      $user_name = $getData['user_name'];
      $email     = $getData['email'];
      $phone     = $getData['phone'];
      $password  = $getData['password'];
      $image     = $getData['image'];
    }
  ?>

  <!--Update Teacher -->
  <?php
    $admin_username = $_SESSION['user_name'];
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['update']))
   {

         $user_name     = $_POST['user_name'];
         $email         = $_POST['email'];
         $phone         = $_POST['phone'];
         $password       = $_POST['password'];

         $image = $_FILES["image"]["name"];
         $tmp = md5(time());

         if($image != "")
         {
           $dst    = "./admin_images/".$tmp.$image;
           $dst_db = "admin_images/".$tmp.$image;
           move_uploaded_file($_FILES["image"]["tmp_name"],$dst);

           $sql = "UPDATE tb_admin SET user_name='$user_name',email='$email',phone='$phone',password='$password',image='$dst_db',entry_time='$current_datetime' WHERE user_name = '$admin_username'";

           $update_row = $db->update($sql);
         }

          $sql = "UPDATE tb_admin SET user_name='$user_name',email='$email',phone='$phone',password='$password',entry_time='$current_datetime' WHERE user_name = '$admin_username'";

          $update_row = $db->update($sql);

         if($update_row)
         {
           ?>
           <script type="text/javascript">
             window.alert("Success. Your profile updated successfully. Thank You!");
             window.location.href = window.location.href;
           </script>
           <?php
         }
         else
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong!</div><br />';
           echo $msg;
           return false;
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
          <li>Admin Profile</li>
        </ol>
        <h2>Admin Profile</h2>

      </div>
    </section>

<!--- Profile Form-->
<section id="admin_profile" class="m-auto">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card w-75 m-auto">
          <h5 class="card-header">Profile Details</h5>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user_name; ?>" required>
                </div>
                <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
              </div>
              <div class="form-group">
                <label for="number">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
              </div>

                <div class="form-group">
                  <img src="<?php echo $image; ?>" height="100"><br>
                  <label for="image">Image</label>
                  <input type="file" class="form-control" id="image" name="image">
                </div>
              <input type="submit" class="btn btn-danger" name="update" value="Update">
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
