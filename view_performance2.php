<?php
session_start();
require_once "config.php";

if (!isset($_SESSION["manager_id"])) {
    header("Location: login.php");
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$client_id = $_GET['client_id'];

// Fetch the client's data from the database if necessary
$sql = "SELECT * FROM client_performance WHERE client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();
$client_data = [];

if ($result->num_rows > 0) {
    $client_data = $result->fetch_assoc();
}

$stmt->close();
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>

body {
    background-color: #f4f4f4;
    font-family: 'Arial', sans-serif;
    color: #333;
}

.section-header {
    background-color: #007BFF;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.section-content {
    background-color: white;
    padding: 20px;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    margin-bottom: 20px;
}

.container {
    margin-top: 40px;
}

    </style>
    <script src="https://cdn.jsdelivr.net/npm/chartjs@2.9.4"></script>

</head>

<body>

    <div class="sidebar sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <li><a href="dashboard.html" class="sidebar-sub-toggle"><i class="ti-home"></i>
                            Dashboard </a></li>
                    <li class="active"><a href="clients.php" class=""><i class="ti-home"></i> Clients </a></li>

                    <li><a href="logout.php"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="index.html">
                    <!-- <img src="assets/images/logo.png" alt="" /> --><span>Webstrot Admin</span></a></div>
            <!-- <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div> -->
        </div>
        <div class="pull-right p-r-15">
            <ul>
                <li class="header-icon dib"><a href="#search"><i class="ti-search"></i></a></li>
                <li class="header-icon dib"><i class="ti-bell"></i>
                    <div class="drop-down">
                        <div class="dropdown-content-heading">
                            <span class="val-left">Recent Notifications</span>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">5 members joined today </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">likes a photo of you</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="val-center">
                                    <a href="#" class="more-link">See All</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="header-icon dib"><i class="ti-email"></i>
                    <div class="drop-down">
                        <div class="dropdown-content-heading">
                            <span class="val-left">2 New Messages</span>
                            <a href="email.html"><i class="ti-pencil-alt pull-right"></i></a>
                        </div>
                        <div class="dropdown-content-body">
                           
                        </div>
                    </div>
                </li>
                <li class="header-icon dib"><img class="avatar-img" src="assets/images/avatar/1.jpg" alt="" /> <span class="user-avatar"> Ajay <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                        <div class="dropdown-content-heading">
                            <span class="val-left">Upgrade Now</span>
                            <p class="trial-day">30 Days Trail</p>
                        </div>
                        <div class="dropdown-content-body">
                        
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid col-md-8" style="left: 350px;">
                <!-- /# row -->
                <div id="main-content">

                    <?php
                    $clientSql = "SELECT * from clients WHERE client_id = ?";
                    // $client_id = $_SESSION['client_id'];
                    $stmt1 = $conn->prepare($clientSql);
                    $stmt1->bind_param("i", $client_id);
                    $stmt1->execute();
                    $clientData = $stmt1->get_result();
                    $data =  $clientData->fetch_assoc();
                    $name = $data['client_name'];
                    ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <h2 class="m-l-5">Performance of <?php echo $name; ?></h2>

                                    <?php
                                    $sql = "SELECT * FROM months";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    $performanceSql = "SELECT * from client_performance WHERE client_id = ?";
                                    $stmt1 = $conn->prepare($performanceSql);
                                    $stmt1->bind_param("i", $client_id);
                                    $stmt1->execute();
                                    $resultPerformance = $stmt1->get_result();

                                    $disabled = '';

                                    if ($resultPerformance->num_rows > 0) {
                                        $disabled = 'disabled';
                                    }

                                    ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for=""> Select Month</label>
                                                <select name="month" id="month" class="form-control">
                                                    <?php
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<option value = '" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                    }

                                                    $stmt->close();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-right" id="print-button" style="margin-top: 13px;">
                                            <button type="button" class="btn btn-primary" onclick="printPDF()">Print</button>
                                        </div>
                                    </div>
                                    <input type="hidden" id="client_id" value="<?php echo $client_id ?>">

                                    <div class="row">
  <!-- Facebook Stats -->
  <div class="col-md-12">
            <div class="section-header">
        <h4 class="m-l-5">Facebook Stats</h4>
        <div class="card-header-right-icon">
          <ul>
            <li><i class="ti-reload"></i></li>
          </ul>
        </div>
      </div>   </div>
      <div class="card-body">
        <div class="media-stats-content text-center">
          <div class="row">
            <div class="col-lg-4 border-bottom border-left">
              <div class="stats-content">
                <div class="stats-digit"><span id="fb_likes"></span></div>
                <div class="stats-text">FB Page Likes</div>
              </div>
            </div>
            <div class="col-lg-4 border-bottom border-left">
              <div class="stats-content">
                <div class="stats-digit"><span id="fb_shares"></span></div>
                <div class="stats-text">FB Page Engagement</div>
              </div>
            </div>

            
            <div class="col-lg-4 border-bottom border-left border-right">
              <div class="stats-content">
                <div class="stats-digit"><span id="fb_reach"></span></div>
                <div class="stats-text">FB Page Reach</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bar Graph -->
  <div class="col-md-6">
    <div class="card alert">
      <div class="card-header">
        <h4 class="m-l-5">Facebook Performance</h4>
      </div>
      <div class="card-body">
        <div id="bar_graph" style="height: 300px;"></div> <!-- Bar Graph Container -->
      </div>
    </div>
  </div>
</div>


<div class="row mt-4">
        <div class="col-md-12">
            <div class="section-header">
                <h3>Instagram Stats</h3>
            </div>
            <div class="section-content">
                <!-- Instagram data/content goes here -->
            </div>
        </div>
    </div>
    

                                    <div class="col-md-6">
                                        <div class="card alert">
                                            <div class="card-header">
                                                <h4 class="m-l-5">Instagram Stats </h4>
                                                <div class="card-header-right-icon">
                                                    <ul>
                                                        <li><i class="ti-reload"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="media-stats-content text-center">
                                                    <div class="row">
                                                        <div class="col-lg-4 border-bottom border-left ">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="instagram_followers"></span></div>
                                                                <div class="stats-text">Instagram Followers</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="instagram_engagement"></span></div>
                                                                <div class="stats-text">Instagram Engagement</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="instagram_reach"></span></div>
                                                                <div class="stats-text">Instagram Reach</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="monthly_posts"></span></div>
                                                                <div class="stats-text">Monthly Posts</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="card alert">
                                            <div class="card-header">
                                                <h4 class="m-l-5">Google Stats </h4>
                                                <div class="card-header-right-icon">
                                                    <ul>
                                                        <li><i class="ti-reload"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="media-stats-content text-center">
                                                    <div class="row">
                                                        <div class="col-lg-4 border-bottom border-left ">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="google-reviews">0</span></div>
                                                                <div class="stats-text">Google Reviews</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="average_ratings"></span></div>
                                                                <div class="stats-text">Average Ratings
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="review_responses"></span></div>
                                                                <div class="stats-text">Review Responses
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="geo_grid_rankings"></span></div>
                                                                <div class="stats-text">Geo Grid Rankings
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-4 border-bottom border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="medical_blogs"></span></div>
                                                                <div class="stats-text">Medical Blogs</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="card alert">
                                            <div class="card-header">
                                                <h4 class="m-l-5">Phone Stats </h4>
                                                <div class="card-header-right-icon">
                                                    <ul>
                                                        <li><i class="ti-reload"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="media-stats-content text-center">
                                                    <div class="row">
                                                        <div class="col-lg-4 border-bottom">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="search_views"></span>
                                                                </div>
                                                                <div class="stats-text">Search Views</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="calls"></span></div>
                                                                <div class="stats-text">Phone Calls</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="directions"></span>
                                                                </div>
                                                                <div class="stats-text">Direction Requests
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="keyword_rankings"></span></div>
                                                                <div class="stats-text">Keyword Rankings
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="citations"></span>
                                                                </div>
                                                                <div class="stats-text">Citations</div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="card alert">
                                            <div class="card-header">
                                                <h4 class="m-l-5">Video Stats </h4>
                                                <div class="card-header-right-icon">
                                                    <ul>
                                                        <li><i class="ti-reload"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="media-stats-content text-center">
                                                    <div class="row">
                                                        <div class="col-lg-4 border-bottom">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="animation_videos"></span></div>
                                                                <div class="stats-text">Animation Videos
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="testimonial_videos"></span>
                                                                </div>
                                                                <div class="stats-text">Testimonial Videos
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="educational_videos"></span>
                                                                </div>
                                                                <div class="stats-text">Educational Videos
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-content">
                                                                    <div class="stats-digit"><span id="case_studies"></span></div>
                                                                    <div class="stats-text">Case Studies</div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="card alert">
                                            <div class="card-header">
                                                <h4 class="m-l-5">Website Stats </h4>
                                                <div class="card-header-right-icon">
                                                    <ul>
                                                        <li><i class="ti-reload"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="media-stats-content text-center">
                                                    <div class="row">
                                                        <div class="col-lg-4 border-bottom">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="website_performance"></span>
                                                                </div>
                                                                <div class="stats-text">Website Performance
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="website_accessibility"></span>
                                                                </div>
                                                                <div class="stats-text">Website
                                                                    Accessibility</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="website_best_practices"></span>
                                                                </div>
                                                                <div class="stats-text">Website Best
                                                                    Practices</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">

                                                                <div class="stats-digit"><span id="website_seo"></span>
                                                                </div>
                                                                <div class="stats-text">Website SEO</div>

                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>




                                </div>
                                <div class="col-md-6">
                                    <canvas id="fb-chart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {
  var fbLikes = document.getElementById('fb_likes').innerText || 0;
  var fbShares = document.getElementById('fb_shares').innerText || 0;
  var fbReach = document.getElementById('fb_reach').innerText || 0;

  var ctx = document.getElementById('bar_graph').getContext('2d');
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['FB Likes', 'FB Shares', 'FB Reach'],
      datasets: [{
        label: 'Facebook Stats',
        data: [fbLikes, fbShares, fbReach],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
});
</script>

    <script>
        $(document).ready(function() {

            $("#month").change(function(event) {
                fetchClientPerformanceByMonth();


            });

            function fetchClientPerformanceByMonth() {
                const month = $("#month").val();
                const clientId = $("#client_id").val();

                $.ajax({
                    type: "POST",
                    url: "fetch_client_performance_by_month.php",
                    data: {
                        month: month,
                        client_id: clientId
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.error == 'No data available for the logged-in client.') {
                            $("#report-creation-date").text(0);
                            $("#search_views").text(0);
                            $("#calls").text(0);
                            $("#directions").text(0);
                            $("#google-reviews").text(0);
                            $("#average_ratings").text(0);
                            $("#review_responses").text(0);
                            $("#geo_grid_rankings").text(0);
                            $("#online_authority").text(0);
                            $("#fb_likes").text(0);
                            $("#fb_shares").text(0);
                            $("#fb_reach").text(0);
                            $("#instagram_followers").text(0);
                            $("#instagram_engagement").text(0);
                            $("#instagram_reach").text(0);
                            $("#monthly_posts").text(0);
                            $("#citations").text(0);
                            $("#medical_blogs").text(0);
                            $("#animation_videos").text(0);
                            $("#testimonial_videos").text(0);
                            $("#educational_videos").text(0);
                            $("#case_studies").text(0);
                            $("#website_performance").text(0);
                            $("#website_accessibility").text(0);
                            $("#website_best_practices").text(0);
                            $("#website_seo").text(0);
                            $("#keyword_rankings").text(0);
                        } else {
                            $("#report-creation-date").text(data.reportCreationDate);
                            $("#search_views").text(data.search_views);
                            $("#calls").text(data.calls);
                            $("#directions").text(data.directions);
                            $("#google-reviews").text(data.google_reviews);
                            $("#average_ratings").text(data.average_ratings);
                            $("#review_responses").text(data.review_responses);
                            $("#geo_grid_rankings").text(data.geo_grid_rankings);
                            $("#online_authority").text(data.online_authority);
                            $("#fb_likes").text(data.fb_likes);
                            $("#fb_shares").text(data.fb_shares);
                            $("#fb_reach").text(data.fb_reach);
                            $("#instagram_followers").text(data.instagram_followers);
                            $("#instagram_engagement").text(data.instagram_engagement);
                            $("#instagram_reach").text(data.instagram_reach);
                            $("#monthly_posts").text(data.monthly_posts);
                            $("#citations").text(data.citations);
                            $("#medical_blogs").text(data.medical_blogs);
                            $("#animation_videos").text(data.animation_videos);
                            $("#testimonial_videos").text(data.testimonial_videos);
                            $("#educational_videos").text(data.educational_videos);
                            $("#case_studies").text(data.case_studies);
                            $("#website_performance").text(data.website_performance);
                            $("#website_accessibility").text(data.website_accessibility);
                            $("#website_best_practices").text(data.website_best_practices);
                            $("#website_seo").text(data.website_seo);
                            $("#keyword_rankings").text(data.keyword_rankings);

                            // Create a pie chart
                            var ctx = document.getElementById("fb-chart")
                                .getContext("2d");
                            var fbChart = new Chart(ctx, {
                                type: "pie",
                                data: {
                                    labels: ["FB Likes", "FB Shares",
                                        "FB Reach"
                                    ],
                                    datasets: [{
                                        data: [data.fb_likes,
                                            data.fb_shares,
                                            data
                                            .fb_reach
                                        ],
                                        backgroundColor: [
                                            "#36A2EB",
                                            "#FF6384",
                                            "#FFCE56"
                                        ],
                                        hoverBackgroundColor: [
                                            "#36A2EB",
                                            "#FF6384",
                                            "#FFCE56"
                                        ],
                                    }],
                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        position: "bottom",
                                    },
                                },
                            });
                        }

                    },
                    error: function(jqXHR, valStatus, errorThrown) {
                        console.log("test");
                        console.log(valStatus, errorThrown);
                    }
                });
            }

            fetchClientPerformanceByMonth();
        });
    </script>
    


</body>


</html>