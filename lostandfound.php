<?php
session_start(); // Start the session

// Check if the session variable is set
if(isset($_SESSION['user_id'])) {
    // Include the database connection file
    include 'connect.php';

    // Fetch lost items from the database
    $lost_items_query = "SELECT id, item_name, description, question, item_type, image_url FROM lost_and_found WHERE item_type = 'lost'";
    $lost_items_result = mysqli_query($con, $lost_items_query);
    $lost_items = mysqli_fetch_all($lost_items_result, MYSQLI_ASSOC);

    // Fetch found items from the database
    // $found_items_query = "SELECT id, item_name, description, question, item_type, image_url FROM lost_and_found WHERE item_type = 'found'";
    // $found_items_result = mysqli_query($con, $found_items_query);
    // $found_items = mysqli_fetch_all($found_items_result, MYSQLI_ASSOC);
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data when form is submitted
        $itemName = $_POST['itemName'];
        $description = $_POST['description'];
        $itemType = $_POST['itemType'];
        $question = $_POST['question'];
        $image = $_FILES['imageInput']['name'];
        $userId = $_SESSION['user_id']; // Get the user ID from the session

        // File upload path
        $targetDir = "uploads/";
        $targetFilePath = $targetDir . basename($image);
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["imageInput"]["tmp_name"], $targetFilePath)) {
                // Insert item details into database along with user_id
                $sql = "INSERT INTO lost_and_found (user_id, item_name, description, item_type, question, image_url) VALUES ('$userId', '$itemName', '$description', '$itemType', '$question', '$targetFilePath')";

                if (mysqli_query($con, $sql)) {
                    echo "Item posted successfully.";
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
        }
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // If user is not logged in, redirect to the sign-in page
    header("Location: signin.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>
    Black Dashboard by Creative Tim
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
  .card-img-top {
    height: 200px; /* Adjust this value as needed */
    object-fit: cover;
  }
</style>
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <div class="d-flex align-items-center">
            <a href="javascript:void(0)" class="simple-text logo-normal ml-2">
              LBSITW COLLEGE UNION
            </a>
          </div>
        </div>
        <ul class="nav">
          <li>
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active ">
            <a href="./lostandfound.php">
              <i class="tim-icons icon-atom"></i>
              <p>Lost And Found</p>
            </a>
          </li>
          <li>
            <a href="./notifications.php">
              <i class="tim-icons icon-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
          <!-- <li>
            <a href="./user.php">
              <i class="tim-icons icon-single-02"></i>
              <p>User Profile</p>
            </a>
          </li> -->
          <li>
            <a href="./events.php">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Events</p>
            </a>
          </li>
          <li>
            <a href="./complaint.php">
              <i class="tim-icons icon-align-center"></i>
              <p>Complaint and Query</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">
              <img src="assets/img/logo.png" alt="College Union Logo" width="auto" height="90">
          </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <!-- Buttons in the right side -->
            <div class="text-right mb-3">
              <button class="btn btn-info" onclick="redirectToHome()">Home</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postItemModal">Post Item</button>
              <button class="btn btn-info" id="myListingsButton" onclick="redirectToMyListings()">My Listings</button>
              <button class="btn btn-info" onclick="redirectToResponses()">Responses</button>
              <!-- <button class="btn btn-success" onclick="redirectToFeed()">Feed</button> -->
            </div>
            <!-- Card with headings -->
            <div class="card">
        <div class="card-header">
          <h5 class="title">Lost Items</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <?php foreach ($lost_items as $lost_item) : ?>
              <div class="col-md-4 mb-4">
                <div class="card">
                <?php if (!empty($lost_item['image_url'])) : ?>
                          <img src="<?php echo $lost_item['image_url']; ?>" class="card-img-top">
                      <?php endif; ?>
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $lost_item['item_name']; ?></h5>
                          <p class="card-text">Description: <?php echo $lost_item['description']; ?></p>
                          <?php if (!empty($lost_item['question'])) : ?>
                              <p class="card-text">Question: <?php echo $lost_item['question']; ?></p>
                          <?php endif; ?>
                          <?php if ($lost_item['item_type'] == 'lost') : ?>
                              <button class="btn btn-primary" data-toggle="modal" data-target="#claimItemModal" data-item-id="<?php echo $lost_item['id']; ?>">Found It</button>
                          <?php endif; ?>
                      </div>

                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="modal fade" id="claimItemModal" tabindex="-1" role="dialog" aria-labelledby="claimItemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="claimItemModalLabel">Claim Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="claimItemForm" method="post" action="claim_item.php">
                <div class="modal-body">
                    <input type="hidden"  id="itemId" name="itemId" value="">
                    <p id="itemQuestion"></p>
                    <div class="form-group">
                        <label for="answer">Your Answer</label>
                        <input type="text" style="color: black;"class="form-control" id="answer" name="answer" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit Answer</button>
                </div>
            </form>
        </div>
    </div>
</div>
                <!-- Content of the card goes here -->
                <div class="modal fade" id="postItemModal" tabindex="-1" role="dialog" aria-labelledby="postItemModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="postItemModalLabel">Post Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Form for posting a new item -->
                        <form id="postItemForm" method="post" action="lostandfound.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="itemName" style="color: black;">Item Name</label>
                            <input type="text" style="color: black;" class="form-control" id="itemName" name="itemName" required>
                          </div>
                          <div class="form-group">
                            <label for="description" style="color: black;">Description</label>
                            <input type="text" style="color: black;" class="form-control" id="description" name="description" required>
                          </div>
                          <div class="form-group">
                            <label for="question" style="color: black;" >Enter Question based on Item</label>
                            <input type="text" style="color: black;" class="form-control" id="question" name="question" required>
                          </div>
                          <div class="form-group">
                            <label for="itemType" style="color: black;">Item Type</label>
                            <input type="hidden" id="itemType" name="itemType" value="lost">
                            <p style="color: black;">Lost Item</p>
                          </div>
                          <div class="form-group">
                            <label for="imageInput"style="color: black;" >Upload Image</label>
                            <input type="file" style="color: black;" class="form-control-file" id="imageInput" name="imageInput">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="postItemForm">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>                


              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                UNION
              </a>
            </li>
          </ul>
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>made with <i class="tim-icons icon-heart-2"></i> by
            <a href="javascript:void(0)" target="_blank">Team Avenir</a> for College Union LBSITW.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
        function redirectToMyListings() {
            window.location.href = "mylistings.php";
        }

        function redirectToHome() {
            window.location.href = "./lostandfound.php";
        }

        function redirectToResponses() {
            window.location.href = "responses.php";
        }

        // function redirectToFeed() {
        //     window.location.href = "feed.php";
        // }
    </script>
    <script>
$(document).ready(function() {
    $('#claimItemModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var itemId = button.data('item-id'); // Get the item ID from the data-item-id attribute
        var modal = $(this);
        
        // Fetch the item question from the server using AJAX or fetch the question from the markup
        var question = button.closest('.card').find('.card-text:contains("Question:")').text().replace('Question: ', '');
        
        modal.find('#itemId').val(itemId);
        modal.find('#itemQuestion').text(question);
    });
});
</script>
<!-- Add this script to your lostandfound.php file -->
<script>
$(document).ready(function() {
    $('#claimItemForm').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        // Serialize form data
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: 'claim_item.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Item claimed successfully
                    $('#claimItemModal').modal('hide'); // Hide modal
                    // Display success message in alert
                    showAlert('Item claimed successfully.', 'success');
                    // Automatically close modal after 3 seconds
                    setTimeout(function() {
                        $('#claimItemModal').modal('hide');
                    }, 3000);
                } else {
                    // Error occurred
                    showAlert(response.message, 'danger');
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                showAlert('An error occurred while processing your request.', 'danger');
            }
        });
    });

    // Function to show Bootstrap alert
    function showAlert(message, type) {
        var alert = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + message +
            '</div>';
        $('#claimItemModal .modal-body').prepend(alert);
    }
});
</script>
<script>
document.getElementById('imageInput').addEventListener('change', function(e) {
  var fileName = e.target.files[0].name;
  var fileNameDisplay = document.createElement('p');
  fileNameDisplay.textContent = 'Selected file: ' + fileName;
  fileNameDisplay.style.color = 'black';
  
  var existingDisplay = this.nextElementSibling;
  if (existingDisplay && existingDisplay.tagName === 'P') {
    existingDisplay.remove();
  }
  
  this.parentNode.insertBefore(fileNameDisplay, this.nextSibling);
});
</script>

</body>

</html>