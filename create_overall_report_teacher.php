<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:teacher_login.php');
  }

 ?>

 <!-- SELECT SINGLE STUDENT ATTENDANCE DATA FROM ATTENDANCE TABLE -->
  <?php
   $db = new Database();
    if(isset($_GET['section']))
    {

      $section      = $_GET['section'];
      $trimester    = $_GET['trimester'];
      $course_title = $_GET['course_title'];
      $student_id   = $_GET['student_id'];

      $sql  = "SELECT a.name,b.* FROM tb_student AS a INNER JOIN tb_attendance AS b ON a.student_id=b.student_id WHERE b.section='$section' AND b.trimester='$trimester' AND b.course_title='$course_title' AND b.student_id='$student_id'";

      $read = $db->select($sql);

    }
   ?>


   <!--TOTAL CLASS COUNT-->
    <?php
      error_reporting( error_reporting() & ~E_NOTICE );
      $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
      date_default_timezone_set('Asia/Dhaka');

      if(isset($_GET['section']))
      {

      $section      = $_GET['section'];
      $trimester    = $_GET['trimester'];
      $course_title = $_GET['course_title'];
      $student_id   = $_GET['student_id'];

      $db   = new Database();
      $sql  = "SELECT * FROM tb_attendance WHERE section='$section' AND trimester='$trimester' AND course_title='$course_title' AND student_id='$student_id'";
      $read1 = $db->select($sql);


       if($read1)
       {
         $row = mysqli_num_rows($read1);
         if ($row)
         {
           $total_class = $row;
         }
       }
       else {
         $total_class = 0;
       }
     }

     ?>


    <!--TOTAL PRESENT COUNT-->
    <?php
      error_reporting( error_reporting() & ~E_NOTICE );
      $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
      date_default_timezone_set('Asia/Dhaka');

      if(isset($_GET['section']))
      {

      $section      = $_GET['section'];
      $trimester    = $_GET['trimester'];
      $course_title = $_GET['course_title'];
      $student_id   = $_GET['student_id'];

      $db   = new Database();
      $sql  = "SELECT * FROM tb_attendance WHERE section='$section' AND trimester='$trimester' AND course_title='$course_title' AND student_id='$student_id' AND attendance='present'";
      $read2 = $db->select($sql);


       if($read2)
       {
         $row = mysqli_num_rows($read2);
         if ($row)
         {
           $total_present = $row;
         }
       }
       else {
         $total_present = 0;
       }
     }

     ?>

     <!--TOTAL ABSENT COUNT-->
     <?php
       error_reporting( error_reporting() & ~E_NOTICE );
       $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
       date_default_timezone_set('Asia/Dhaka');

       if(isset($_GET['section']))
       {

       $section      = $_GET['section'];
       $trimester    = $_GET['trimester'];
       $course_title = $_GET['course_title'];
       $student_id   = $_GET['student_id'];

       $db   = new Database();
       $sql  = "SELECT * FROM tb_attendance WHERE section='$section' AND trimester='$trimester' AND course_title='$course_title' AND student_id='$student_id' AND attendance='absent'";
       $read3 = $db->select($sql);


        if($read3)
        {
          $row = mysqli_num_rows($read3);
          if ($row)
          {
            $total_absent = $row;
          }
        }
        else {
          $total_absent = 0;
        }
      }

      ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OAS | Create Overall Report</title>
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
        <i class="icofont-user"></i>Username : <?php echo $_SESSION['user_name']; ?>
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
        <h1 class="text-light"><a href="index.html"><span>OAS</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="teacher_home.php">Home</a></li>

          <li><a href="teacher_profile.php">Profile</a></li>
          <li><a href="attendance_date_list.php">Take Attendance</a></li>
          <li><a href="overall_attendance_list_teacher.php">Overall Attendance</a></li>
          <li><a href="logout.php" onclick="return confirm('Are You sure you want to logout?');"><i class="fa fa-sign-out"></i> Logout</a></li>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header>


  <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="teacher_home.php">Home</a></li>
          <li>Attendance Report</li>
        </ol>
        <h2>Report</h2>

      </div>
    </section>



    <section id="overll_attendance_list" class="m-auto">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card m-auto">
              <h5 class="card-header">Single Student Report</h5>
              <div class="card-body">
                <div class="text-center text-md-right text-lg-right">
                  <a href="overall_attendance_list_teacher.php" class="btn  btn-dark px-3"><i class="fa fa-arrow-left fa-fw"></i> Back</a>
                </div>

                <br>

                <p class="text-primary"><strong>Total Class: <?php echo $total_class; ?></strong></p>
                <p class="text-success"><strong>Total Present: <?php  echo $total_present;?></strong></p>
                <p class="text-danger"><strong>Total Absent: <?php echo $total_absent; ?></strong></p>

                <table id="overll_attendance_report_table" class="table table-bordered display nowrap" style="width:100%">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th>No</th>
                            <th>Student Name</th>
                            <th>Student Id</th>
                            <th>Section</th>
                            <th>Trimester</th>
                            <th>Course Title</th>
                            <th>Attendance Date</th>
                            <th style="width:5%">Attendance Status</th>
                        </tr>
                    </thead>
                    <tbody>

                      <?php if($read){ $i = 0; ?>
                      <?php while($result = $read->fetch_assoc()){ $i = $i + 1; ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $result['name']; ?></td>
                          <td><?php echo $result['student_id']; ?></td>
                          <td><?php echo $result['section']; ?></td>
                          <td><?php echo $result['trimester']; ?></td>
                          <td><?php echo $result['course_title']; ?></td>
                          <td><?php echo $result['attendance_date']; ?></td>
                          <td>
                            <?php

                              if($result['attendance'] == "present")
                              {
                                echo "<div class='bg-success text-light text-center' style='border-radius: 4px;'>Present</div>";
                              }
                              else if($result['attendance'] == "absent")
                              {
                                echo "<div class='bg-danger text-light text-center' style='border-radius: 4px;'>Absent</div>";
                              }

                             ?>
                          </td>
                        </tr>
                      <?php } ?>
                      <?php }else{ ?>
                      <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                        echo $msg; ?>
                      <?php } ?>

                    </tbody>
                  </table>

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
                <li><i class="bx bx-chevron-right"></i> <a href="attendance_date_list.php">Take Attendance</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="overall_attendance_list_teacher.php">Overall Attendance</a></li>
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



<script>

  $(document).ready(function() {
    $('#overll_attendance_report_table').DataTable( {
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },

            { "width": "10%", "targets": 0 }
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
  } );

</script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
