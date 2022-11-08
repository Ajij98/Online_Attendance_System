<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>

 <!--SECTION DATA LOAD-->
  <?php
    $db      = new Database();
    $sql     = "SELECT section FROM tb_section";
    $section = $db->select($sql);
   ?>


   <!--COURSE DATA LOAD-->
   <?php
     $db     = new Database();
     $sql    = "SELECT course_title FROM tb_course";
     $course = $db->select($sql);
    ?>

    <!--TEACHER DATA LOAD-->
    <?php
      $db      = new Database();
      $sql     = "SELECT name FROM tb_teacher";
      $teacher = $db->select($sql);
     ?>

     <!--TEACEHR USERNAME DATA LOAD-->
     <?php
       $db      = new Database();
       $sql     = "SELECT user_name FROM tb_teacher";
       $teacher_username = $db->select($sql);
      ?>


      <!--ADD SECTION-->
     <?php
       $admin_username = $_SESSION['user_name'];
       error_reporting( error_reporting() & ~E_NOTICE );
       $db = new Database();
       $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
       date_default_timezone_set('Asia/Dhaka');

       if(isset($_POST['submit']))
       {

             $teacher_name      = $_POST['teacher_name'];
             $teacher_user_name = $_POST['teacher_user_name'];
             $email             = $_POST['email'];
             $phone             = $_POST['phone'];
             $section           = $_POST['section'];
             $trimester         = $_POST['trimester'];
             $course            = $_POST['course'];
             $dateOfAssign      = $_POST['dateOfAssign'];
             $added_by          = $admin_username;

             $sql = "INSERT INTO          tb_assign_course_teacher(teacher_name,teacher_user_name,email,phone,section,trimester,course,dateOfAssign,added_by,entry_time)values('$teacher_name','$teacher_user_name','$email','$phone','$section','$trimester','$course','$dateOfAssign','$added_by','$current_datetime')";

             $insert_row = $db->insert($sql);

             if($insert_row)
             {

               require 'phpmailer/PHPMailerAutoload.php';
               $mail = new PHPMailer();

               //Server settings
               $mail->isSMTP();
               $mail->Host       = 'smtp.gmail.com';
               $mail->SMTPAuth   = true;
               $mail->Username   = 'abdulajij.pciu@gmail.com';
               $mail->Password   = '!#12pciu';
               $mail->SMTPSecure = 'tls';
               $mail->Port       = 587;

                //Recipients Email
               $mail->setFrom('abdulajij.pciu@gmail.com');
               $mail->addAddress($_POST['email'], $_POST['teacher_name']);

               // Content
               $mail->isHTML(true);
               $mail->Subject = 'Online Attendance System Course Assign Email (PCIU).';
               $mail->Body    = "<br>You are assigned in- <br /><br /> Section: '".$_POST['section']."' <br /> Trimester: '".$_POST['trimester']."' <br /> Course Title: '".$_POST['course']."'";

               if(!$mail->send()) {
                 $msg = '<div class="alert alert-danger w-50 m-auto">Message could not be sent!</div>';
                 echo $msg;
                 echo 'Mailer Error: ' . $mail->ErrorInfo;
               }
               else {
                 ?>
                 <script type="text/javascript">
                   window.alert("Success! Course teacher assigned successfully. Need to check email, an email has been sent to given email address.");
                 </script>
                 <?php
               }

             ?>
             <script type="text/javascript">

               window.location='assign_course_teacher_list.php';

             </script>
             <?php
               $msg = '<div class="alert alert-success alert-dismissible fade show w-75 m-auto"><strong>Success!</strong> Data inserted successfully.</div><br />';
               echo $msg;
               return true;
             }
             else
             {
               $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
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

  <title>OAS | Manage_Course</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fontawsome -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

  <!-- jQuery Datatable Plugin -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

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
          <li>Course Teacher</li>
        </ol>
        <h2>Add Course Teacher</h2>

      </div>
    </section>



    <section id="assign_course_teacher" class="m-auto">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card m-auto">
              <h5 class="card-header">Course Teacher Detail</h5>
              <div class="card-body">


                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                        <label for="teacher_name">Teacher Name<span style="color:red;">*</span></label>
                        <select class="form-control" id="teacher_name" name="teacher_name" required>
                          <option selected>Choose...</option>
                          <?php while($getData = $teacher->fetch_assoc()){ ?>
                          <option><?php echo $getData['name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-row p-0 m-0">
                        <div class="form-group col-md-6">
                          <label for="teacher_user_name">User Name<span style="color:red;">*</span></label>
                          <select class="form-control" id="teacher_user_name" name="teacher_user_name" required>
                            <option selected>Choose...</option>
                            <?php while($getData = $teacher_username->fetch_assoc()){ ?>
                            <option><?php echo $getData['user_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Email<span style="color:red;">*</span></label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter teacher email" required>
                        </div>
                      </div>
                      <div class="form-row p-0 m-0">
                        <div class="form-group col-md-6">
                          <label for="phone">Mobile<span style="color:red;">*</span></label>
                          <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="section">Section<span style="color:red;">*</span></label>
                          <select class="form-control" id="section" name="section" required>
                            <option selected>Choose...</option>
                            <?php while($getData = $section->fetch_assoc()){ ?>
                            <option><?php echo $getData['section']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-row p-0 m-0">
                        <div class="form-group col-md-6">
                          <label for="trimester">Trimester<span style="color:red;">*</span></label>
                          <select class="form-control" id="trimester" name="trimester" required>
                            <option selected>Choose...</option>
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>
                            <option>5th</option>
                            <option>6th</option>
                            <option>7th</option>
                            <option>8th</option>
                            <option>9th</option>
                            <option>10th</option>
                            <option>11th</option>
                            <option>12th</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="course">Course<span style="color:red;">*</span></label>
                          <select class="form-control" id="course" name="course" required>
                            <option selected>Choose...</option>
                            <?php while($getData = $course->fetch_assoc()){ ?>
                            <option><?php echo $getData['course_title']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="dateOfAssign">Date of Assign<span style="color:red;">*</span></label>
                          <input type="date" class="form-control" id="dateOfAssign" name="dateOfAssign" required>
                      </div>
                      <input class="btn btn-danger px-4" type="submit" name="submit" value="Add">
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

  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

</body>

</html>
