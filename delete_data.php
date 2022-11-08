<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:admin_login.php');
  }
 ?>


          <!-- Delete Section -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['section_id']))
            {
              $section_id = $_GET['section_id'];

              $sql = "DELETE FROM tb_section WHERE section_id = $section_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.location='section_list.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>




            <!-- Delete Course -->
            <?php
              error_reporting( error_reporting() & ~E_NOTICE );
              $db = new Database();
              $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
              date_default_timezone_set('Asia/Dhaka');

              if(isset($_GET['course_id']))
              {
                $course_id = $_GET['course_id'];

                $sql = "DELETE FROM tb_course WHERE course_id = $course_id";
                $delete_row = $db->delete($sql);
                if($delete_row)
                {
                  ?>

                  <script type="text/javascript">

                    window.location='course_list.php';

                  </script>

                  <?php
                }
                else
                {
                  $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                  echo $msg;
                  return false;
                }
              }
              ?>



              <!-- Delete Student -->
              <?php
                error_reporting( error_reporting() & ~E_NOTICE );
                $db = new Database();
                $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
                date_default_timezone_set('Asia/Dhaka');

                if(isset($_GET['s_id']))
                {
                  $s_id = $_GET['s_id'];

                  $sql = "DELETE FROM tb_student WHERE s_id = $s_id";
                  $delete_row = $db->delete($sql);
                  if($delete_row)
                  {
                    ?>

                    <script type="text/javascript">

                      window.location='student_list.php';

                    </script>

                    <?php
                  }
                  else
                  {
                    $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                    echo $msg;
                    return false;
                  }
                }
                ?>


                <!-- Delete Teacher -->
                <?php
                  error_reporting( error_reporting() & ~E_NOTICE );
                  $db = new Database();
                  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
                  date_default_timezone_set('Asia/Dhaka');

                  if(isset($_GET['teacher_id']))
                  {
                    $teacher_id = $_GET['teacher_id'];

                    $sql = "DELETE FROM tb_teacher WHERE teacher_id = $teacher_id";
                    $delete_row = $db->delete($sql);
                    if($delete_row)
                    {
                      ?>

                      <script type="text/javascript">

                        window.location='teacher_list.php';

                      </script>

                      <?php
                    }
                    else
                    {
                      $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                      echo $msg;
                      return false;
                    }
                  }
                  ?>



                  <!-- Delete Assigned Teacher -->
                  <?php
                    error_reporting( error_reporting() & ~E_NOTICE );
                    $db = new Database();
                    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
                    date_default_timezone_set('Asia/Dhaka');

                    if(isset($_GET['course_teacher_id']))
                    {
                      $course_teacher_id = $_GET['course_teacher_id'];

                      $sql = "DELETE FROM tb_assign_course_teacher WHERE course_teacher_id = $course_teacher_id";
                      $delete_row = $db->delete($sql);
                      if($delete_row)
                      {
                        ?>

                        <script type="text/javascript">

                          window.location='assign_course_teacher_list.php';

                        </script>

                        <?php
                      }
                      else
                      {
                        $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                        echo $msg;
                        return false;
                      }
                    }
                    ?>



                    <!-- Delete Attendance Data -->
                    <?php
                      error_reporting( error_reporting() & ~E_NOTICE );
                      $db = new Database();
                      $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
                      date_default_timezone_set('Asia/Dhaka');

                      if(isset($_GET['date']))
                      {
                        $attendance_date = $_GET['date'];
                        $section         = $_GET['section'];
                        $trimester       = $_GET['trimester'];
                        $course_title    = $_GET['course_title'];

                        $sql = "DELETE FROM tb_attendance WHERE section = '$section' AND trimester = '$trimester' AND course_title = '$course_title' AND attendance_date = '$attendance_date'";
                        $delete_row = $db->delete($sql);
                        if($delete_row)
                        {
                          ?>

                          <script type="text/javascript">

                            window.location='attendance_date_list.php';

                          </script>

                          <?php
                        }
                        else
                        {
                          $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                          echo $msg;
                          return false;
                        }
                      }
                      ?>
