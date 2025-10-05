<?php
session_start();

// Check session login
if (!isset($_SESSION['admin_email'])) {
    echo "<script>alert('Please login to access'); window.location.href='index.php';</script>";
    exit;
}

// Fetch existing WhatsApp group links
include 'db.php';

$links = [];
$result = $conn->query("SELECT course_name, group_link FROM whatsapp_links");
while ($row = $result->fetch_assoc()) {
    $links[$row['course_name']] = $row['group_link'];
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Whatsapp Link Edit</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">
      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">
      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Libraries Stylesheet -->
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
      <!-- Customized Bootstrap Stylesheet -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <div class="container-fluid position-relative bg-white d-flex p-0">
         <!-- Spinner Start -->
         <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
               <span class="sr-only">Loading...</span>
            </div>
         </div>
         <!-- Spinner End -->
         <!-- Sidebar Start -->
         <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
               <a href="index.html" class="navbar-brand mx-4 mb-3">
                  <h3 class="text-primary">Greens Admin</h3>
               </a>
               <div class="d-flex align-items-center ms-4 mb-4">
                  <div class="position-relative">
                     <img class="rounded-circle" src="img/greens-logo.png" alt="" style="width: 40px; height: 40px;">
                     <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                  </div>
                  <div class="ms-3">
                     <h6 class="mb-0">Greens Technology</h6>
                     <span>Admin</span>
                  </div>
               </div>
               <div class="navbar-nav w-100">
                  <a href="syllabus.php" class="nav-item nav-link"><i class="fa fa-book"></i>Syllabus Edit</a>
                  <a href="booking.php" class="nav-item nav-link"><i class="fa fa-check-square"></i>View Bookings</a>
                  <a href="whatsapp.php" class="nav-item nav-link active"><i class="fab fa-whatsapp"></i><b>Whatsapp Link</b></a>
                   <a href="payment.php" class="nav-item nav-link"><i class="fa fa-qrcode"></i>Payment Update</a>
                  <a href="index.php" class="nav-item nav-link"><i class="fa fa-sign-out-alt"></i>Logout</a>
               </div>
            </nav>
         </div>
         <!-- Sidebar End -->
         <!-- Content Start -->
         <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
               <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                  <h2 class="text-primary mb-0"></h2>
               </a>
               <a href="#" class="sidebar-toggler flex-shrink-0">
               <i class="fa fa-bars"></i>
               </a>
               <marquee scrollamount="15">
                  <h1 style="text-align: center; color: teal;">Welcome to Greens Technologies Admin Panel</h1>
               </marquee>
               <div class="navbar-nav align-items-center ms-auto">
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <img class="rounded-circle me-lg-2" src="img/greens-logo.png" alt="" style="width: 40px; height: 40px;">
                     <span class="d-none d-lg-inline-flex"><b>Greens Admin</b></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="index.php" class="dropdown-item">Log Out</a>
                     </div>
                  </div>
               </div>
            </nav>
            <!-- Navbar End -->
            <br>
            <!-- Edit Forms Row Start -->
             <div class="container py-5">
    <div class="card shadow p-4">
      <div style="background-color:#008080;" class="rounded h-100 p-4">
      <h2 class="mb-4 text-light text-center">Update WhatsApp Group Links</h2>
      <table style="color:#fff;" class="table table-responsive table-bordered align-middle text-center">
        <thead style="color:#f1e60b;">
          <tr>
            <th>S.No</th>
            <th>Course</th>
            <th>Group Link</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $courses = [
              "AWS DevOps",
              "AWS With Terraform",
              "Azure DevOps",
              "GCP DevOps",
              "Multi Cloud DevOps",
              "Data Analytics",
              "Data Science",
              "Machine Learning",
              "Python with AI",
              "Redhat Linux"
          ];

          $i = 1;
          foreach ($courses as $course) {
              $value = isset($links[$course]) ? $links[$course] : '';
              echo '
              <tr>
                <form action="update_links.php" method="POST">
                  <td>' . $i++ . '</td>
                  <td>' . htmlspecialchars($course) . '</td>
                  <td><input type="url" class="form-control" name="link_value" placeholder="Enter Group Link" value="' . htmlspecialchars($value) . '"  pattern="https?://.+" title="Enter a valid link starting with http:// or https://"><input type="hidden" name="course_name" value="' . htmlspecialchars($course) . '"></td>


                  <td>
                    <button type="submit" class="btn btn-warning">Update</button>
                  </td>
                </form>
              </tr>';
          }
          ?>

        </tbody>
      </table>
         </div>
    </div>
  </div>
         <!-- Content End -->
         <!-- Back to Top -->
         <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
      </div>
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="lib/chart/chart.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="lib/tempusdominus/js/moment.min.js"></script>
      <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
      <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Template Javascript -->
      <script src="js/main.js"></script>
      <!-- SweetAlert2 Script -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </body>
</html>