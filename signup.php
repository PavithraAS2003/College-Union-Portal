<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';

    $name = $_POST['name'];
    $registerNumber = $_POST['registerNumber'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $semester = $_POST['semester'];
    $branch = $_POST['branch'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `users` (`id`, `name`, `register_number`, `email`, `phone`, `semester`, `branch`, `password`) 
            VALUES (NULL, '$name', '$registerNumber', '$email', '$phone', '$semester', '$branch', '$password')";
    
    $result = mysqli_query($con, $sql);
    if($result){
        header('location: signin.php');
        exit; // Add exit after header redirect to prevent further execution
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <!-- Navbar and other HTML content -->
    <!-- Same as in index.html -->

    <!-- Signup Form -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Sign Up</h3>
                    </div>
                    <div class="card-body">
                        <form action="signup.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerNumber" class="form-label">Register Number</label>
                                <input type="text" class="form-control" id="registerNumber" name="registerNumber" placeholder="lbt21cs091" pattern="^lbt\d{2}[a-zA-Z]{2}\d{3}$" title="Please enter a valid register number starting with 'lbt' followed by year, branch, and unique id" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number (10 digits)" pattern="[0-9]{10}" title="Please enter a 10-digit phone number" required>
                            </div>
                            <div class="mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <select class="form-control" id="semester" name="semester" required>
                                    <option value="">Select Semester</option>
                                    <option style="color: black;" value="S1">S1</option>
                                    <option style="color: black;" value="S2">S2</option>
                                    <option style="color: black;" value="S3">S3</option>
                                    <option style="color: black;" value="S4">S4</option>
                                    <option style="color: black;" value="S5">S5</option>
                                    <option style="color: black;" value="S6">S6</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="branch" class="form-label">Branch</label>
                                <select class="form-control" id="branch" name="branch" required>
                                    <option style="color: black;" value="">Select Branch</option>
                                    <option style="color: black;" value="CSE1">CSE1</option>
                                    <option style="color: black;" value="CSE2">CSE2</option>
                                    <option style="color: black;" value="IT">IT</option>
                                    <option style="color: black;" value="ECE">ECE</option>
                                    <option style="color: black;" value="ERE">ERE</option>
                                    <option style="color: black;" value="CIVIL">CIVIL</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password (at least 8 characters with uppercase, lowercase, number, and special character)" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character" required>

                            </div>
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap Bundle with Popper -->
<script src="assets/js/core/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>
</html>