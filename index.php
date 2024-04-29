<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>
    College Union Website
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />

  <style>
    /* Custom CSS for this page */
    .login-form {
      position: absolute;
      top: 200px;
      left: 738px;
      background-color: rgba(255, 247, 255, 0.8);
      padding: 20px;
      max-width: 400px;
      width: 100%;
      border-radius: 10px;
      font-weight: bold; /* Make text bold */
    }

    .welcome-heading {
      position: absolute;
      top: 186px;
      left: 170px;
      color: #fff;
      font-size: 24px;
      font-weight: bold; /* Make text bold */
    }

    .main-heading {
      position: absolute;
      top: 220px;
      left: 170px;
      color: #fff;
      font-size: 45px;
      font-weight: bold; /* Make text bold */
    }
    .main-heading1 {
      position: absolute;
      top: 270px;
      left: 170px;
      color: #fff;
      font-size: 40px;
      font-weight: bold; /* Make text bold */
    }

    .sub-paragraph {
      position: absolute;
      top: 320px;
      left: 170px;
      color: #fff;
      font-size: 16px;
      font-weight: bold; /* Make text bold */
      width: 325px;
    }

    /* Adjustments for About Us section */
    .about-us-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .about-us-heading {
      font-size: 50px;
      font-weight: bold;
    }

    .about-us-content {
      max-width: 600px; /* Adjust width if needed */
      font-size: 16px;
    }

    /* Union Initiatives */
    .carousel-item img {
      max-height: 300px;
      object-fit: cover;
    }
  </style>
</head>

<body class="">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="assets/img/logo.png" alt="College Union Logo" width="auto" height="90">
      <span class="d-inline-block">College Union LBSITW</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#initiatives">Union Initiatives</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#union">Meet the Union</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary" href="signup.php">Sign Up</a>
        </li>

        <!-- Sign In button -->
        <li class="nav-item">
            <a class="nav-link btn btn-primary" href="signin.php">Sign In</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- End Navbar -->

    <!-- Welcome message -->
    <div class="welcome-heading">Welcome to</div>
    <div class="main-heading">LBSITW College Union</div>
    <div class="main-heading1">Web Portal</div>
    <div class="sub-paragraph">
      <p>This is the official web portal of the College Union at LBS Institute of Technology for Women.</p>
    </div>
    <!-- Image of college union members -->
    <div class="container-fluid" style="position: relative;">
      <img src="assets/img/lbs.jpg" alt="College Union Members" class="img-fluid" style="width: 100%; opacity: 0.4;">
    </div>

    <!-- Login form for union members -->
    <div class="container-fluid login-form">
      <form>
        <div class="mb-3" >
          <label  for="unionLogin" class="form-label">Union Login</label>
          <input type="text" class="form-control" id="unionLogin" placeholder="Enter username">
        </div>
        <div class="mb-3">
          <label for="unionPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="unionPassword" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>

    <!-- About Us -->
    <div class="container mt-5">
      <div class="about-us-container" id="about">
        <div class="about-us-heading">About Us</div>
        <div class="about-us-content">
          <p>
            Welcome to the College Union of LBS Institute of Technology for Women (LBSITW)! We're dedicated to cultivating a vibrant campus community by fostering student engagement, leadership development, and holistic growth. Through diverse events, initiatives, and advocacy efforts, we aim to create a sense of belonging and pride among students while enhancing their educational experience. Join us in making a positive impact and leaving a lasting legacy at LBSITW!</p>
        </div>
      </div>
    </div>

    <!-- Union Initiatives (Slider) -->
    <div class="container mt-5" id="initiatives">
      <h2 class="text-center mb-4">Union Initiatives</h2>
      <div id="initiativesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <img src="assets/img/1.jpg" class="card-img-top" alt="Initiative 1">
                  <div class="card-body">
                    <p class="card-text">Wesat</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <img src="assets/img/2.jpg" class="card-img-top" alt="Initiative 2">
                  <div class="card-body">
                    <p class="card-text">union meet</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <img src="assets/img/3.jpg" class="card-img-top" alt="Initiative 3">
                  <div class="card-body">
                    <p class="card-text">Shoba</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <img src="assets/img/4.jpeg" class="card-img-top" alt="Initiative 4">
                  <div class="card-body">
                    <p class="card-text">Holi.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <img src="assets/img/5.jpeg" class="card-img-top" alt="Initiative 5">
                  <div class="card-body">
                    <p class="card-text">YD</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <img src="assets/img/6.png" class="card-img-top" alt="Initiative 6">
                  <div class="card-body">
                    <p class="card-text">Proshow</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#initiativesCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#initiativesCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!-- Meet the Union -->
    <div class="container mt-5" id="union">
      <h2>Meet the Union</h2>
      <!-- Add cards for each union member here -->
      <!-- Each card could contain a picture of the member and some information -->
    </div>

    <!-- Footer -->
    <footer class="footer">
      <div class="container-fluid">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Creative Tim</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
        </ul>
        <div class="copyright">
          © <script>
            document.write(new Date().getFullYear())
          </script> 2018 made with <i class="tim-icons icon-heart-2"></i> by
          <a href="#">Team Avenir</a> for College Union LBSITW.
        </div>
      </div>
    </footer>
    <!-- End Footer -->
  </div>

  <!--   Core JS Files   -->
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