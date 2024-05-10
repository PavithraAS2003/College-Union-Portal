


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Black Dashboard by Creative Tim
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <div class="sidebar-wrapper">
        <div class="logo">
          <div class="d-flex align-items-center">
            <img src="assets/img/logo.png" alt="Union Logo" width="30">
            <a href="javascript:void(0)" class="simple-text logo-normal ml-2">
              LBSITW COLLEGE UNION
            </a>
          </div>
        </div>
        <ul class="nav">
          <li>
            <a href="./dashboardunion.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./notificationsunion.php">
              <i class="tim-icons icon-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <a href="./eventsunion.php">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Events</p>
            </a>
          </li>
          <li class="active ">
            <a href="./complaintunion.php">
              <i class="tim-icons icon-align-center"></i>
              <p>Complaint and Query</p>
            </a>
          </li>
          <!-- Add sidebar headings here -->
          
          <!-- Add more headings as needed -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <!-- Navbar content -->
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header mb-5">
                <h5 class="card-category">Submit Complaint or Query</h5>
                <h3 class="card-title"></h3>
              </div>
              <div class="card-body">
              <?php
// Include database connection
include 'connect.php';

// Fetch complaints from database
$sql = "SELECT * FROM complaints";
$result = mysqli_query($con, $sql);

// Check if there are any complaints
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    $counter = 0; // Counter to track the number of complaints in a row
    while ($row = mysqli_fetch_assoc($result)) {
        // Start a new row if counter is a multiple of 3
        if ($counter % 3 == 0) {
            echo '<div class="row">';
        }
        ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                    <p class="card-category"><?php echo $row['semester'] . ', ' . $row['branch']; ?></p>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $row['complaint']; ?></p>
                </div>
                <div class="card-footer">
    <a href="https://api.whatsapp.com/send?phone=<?php echo $row['phone']; ?>" class="btn btn-primary">Address Complaint</a>
</div>
            </div>
        </div>
        <?php
        // End the row if counter is a multiple of 3 or if it's the last complaint
        if ($counter % 3 == 2 || $counter == mysqli_num_rows($result) - 1) {
            echo '</div>';
        }
        $counter++;
    }
} else {
    echo "No complaints found";
}

// Close database connection
mysqli_close($con);
?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <!-- Footer content -->
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <!-- Fixed plugin content -->
  </div>
  <!-- Core JS Files -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Google Maps Plugin -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!-- Notifications Plugin -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Your JavaScript code here
    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>
