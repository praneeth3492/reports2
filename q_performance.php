<!-- PHP Script Output Here -->
<?php
// Include your database configuration file
include 'config.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Map quarters to month_id
$quarterToMonthIdMap = [
    1 => 13, // Q1
    2 => 14, // Q2
    3 => 15, // Q3
    4 => 16  // Q4
];
// Check if client_id is passed
$client_id = isset($_GET['client_id']) ? $_GET['client_id'] : (isset($_POST['client_id']) ? $_POST['client_id'] : null);
$selectedQuarter = isset($_GET['quarter']) ? (int)$_GET['quarter'] : 1; // Default to Q1 if not specified
if (!$client_id) {
    die("Client ID is required.");
}
// Fetch client creation date
$sql = "SELECT client_creation_date FROM clients WHERE client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("No client found with the specified ID.");
}
$row = $result->fetch_assoc();
$client_creation_date = new DateTime($row['client_creation_date']);
// Determine the year from the client creation date
$year = (int)$client_creation_date->format('Y');
// Calculate start and end dates of the selected quarter
$quarterStartMonth = ($selectedQuarter - 1) * 3 + 1;
$quarterStartDate = new DateTime("$year-$quarterStartMonth-01");
$quarterEndDate = clone $quarterStartDate;
$quarterEndDate->modify('+3 months -1 day');
// Format dates for SQL query
$quarterStart = $quarterStartDate->format('Y-m-d');
$quarterEnd = $quarterEndDate->format('Y-m-d');
// Fetch performance data for the selected quarter
$sql = "SELECT 
    SUM(calls) AS total_calls, 
    SUM(directions) AS total_directions, 
    SUM(fb_likes) AS total_fb_likes, 
    SUM(fb_shares) AS total_fb_shares, 
    SUM(fb_reach) AS total_fb_reach, 
    SUM(search_views) AS total_search_views, 
    SUM(google_reviews) AS total_google_reviews, 
    AVG(average_ratings) AS avg_ratings, 
    SUM(review_responses) AS total_review_responses, 
    SUM(geo_grid_rankings) AS total_geo_grid_rankings, 
    SUM(online_authority) AS total_online_authority, 
    SUM(instagram_followers) AS total_instagram_followers, 
    SUM(instagram_engagement) AS total_instagram_engagement, 
    SUM(instagram_reach) AS total_instagram_reach, 
    SUM(monthly_posts) AS total_monthly_posts, 
    SUM(citations) AS total_citations, 
    SUM(medical_blogs) AS total_medical_blogs, 
    SUM(animation_videos) AS total_animation_videos, 
    SUM(testimonial_videos) AS total_testimonial_videos, 
    SUM(educational_videos) AS total_educational_videos, 
    SUM(case_studies) AS total_case_studies, 
    SUM(website_performance) AS total_website_performance, 
    SUM(website_accessibility) AS total_website_accessibility, 
    SUM(website_best_practices) AS total_website_best_practices, 
    SUM(website_seo) AS total_website_seo, 
    SUM(keyword_rankings) AS total_keyword_rankings 
    FROM client_performance 
    WHERE client_id = ? AND report_creation_date BETWEEN ? AND ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $client_id, $quarterStart, $quarterEnd);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "No performance data found for the specified client and date range.";
} else {
    $data = $result->fetch_assoc();
    // Display the data
    echo "<h1>Quarterly Report for Client ID: $client_id</h1>";
    echo "<p>Quarter: $selectedQuarter</p>";
    echo "<p>Date Range: $quarterStart to $quarterEnd</p>";
    echo "<p>Performance Data:</p>";
    echo "<ul>";
    foreach ($data as $key => $value) {
        echo "<li>$key: $value</li>";
    }
    echo "</ul>";
}

$quarterData = [];

// Get the month_id based on the selected quarter
$monthId = $quarterToMonthIdMap[$selectedQuarter];

$sql = "SELECT 
    calls, directions, fb_likes, fb_shares, fb_reach, search_views, 
    google_reviews, average_ratings, review_responses, geo_grid_rankings, 
    online_authority, instagram_followers, instagram_engagement, instagram_reach, 
    monthly_posts, citations, medical_blogs, animation_videos, 
    testimonial_videos, educational_videos, case_studies, 
    website_performance, website_accessibility, website_best_practices, 
    website_seo, keyword_rankings 
    FROM client_performance 
    WHERE client_id = ? AND month_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $client_id, $monthId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $quarterData = $result->fetch_assoc();
}

if (!empty($quarterData)) {
    echo "<h2>Quarter $selectedQuarter Specific Data:</h2>";
    echo "<ul>";
    foreach ($quarterData as $key => $value) {
        echo "<li>$key: $value</li>";
    }
    echo "</ul>";
}


$conn->close();

?>
     <?php
                
                ?>


 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>DrSmart - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="mycss/style.css" rel="stylesheet" type="text/css" />



</head>


<body>


    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="assets/images/logo-light.png" alt="" height="15">
                        </span>
                        <i>
                            <img src="assets/images/logo-small.png" alt="" height="24">
                        </i>
                    </a>
                </div>

                <?php include 'sidebar.php'; ?>

            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-sm mr-2 d-lg-none header-item" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <div class="header-breadcumb">
                   
                            <!-- <h6 class="header-pretitle d-none d-md-block">Pages <i class="dripicons-arrow-thin-right"></i> Dashboard</h6> -->
                            <h2 class="header-title">Performace of <?php echo $name; ?></h2>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">

                        <button type="button" class="btn btn-primary d-none d-lg-block ml-2">
                            <i class="mdi mdi-pencil-outline mr-1"></i> Create Reports
                        </button>

                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-danger badge-pill">6</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="" class="text-reset">
                                        <div class="media py-2 px-3">
                                            <img src="assets/images/users/avatar-2.jpg" class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Samuel Coverdale</h6>
                                                <p class="font-size-12 mb-1">You have new follower on Instagram</p>
                                                <p class="font-size-12 mb-0 text-muted"><i class="mdi mdi-clock-outline"></i> 2 min ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="" class="text-reset">
                                        <div class="media py-2 px-3">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-success rounded-circle">
                                                    <i class="mdi mdi-cloud-download-outline"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Download Available !</h6>
                                                <p class="font-size-12 mb-1">Latest version of admin is now available. Please download here.</p>
                                                <p class="font-size-12 mb-0 text-muted"><i class="mdi mdi-clock-outline"></i> 4 hours ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="" class="text-reset">
                                        <div class="media py-2 px-3">
                                            <img src="assets/images/users/avatar-3.jpg" class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Victoria Mendis</h6>
                                                <p class="font-size-12 mb-1">Just upgraded to premium account.</p>
                                                <p class="font-size-12 mb-0 text-muted"><i class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top">
                                    <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-down-circle mr-1"></i> Load More..
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn header-item" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo $manager_name; ?></span>

                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">

                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    <span>Inbox</span>
                                    <span>
                                        <span class="badge badge-pill badge-success">3</span>
                                    </span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    <span>Profile</span>
                                    <span>
                                        <span class="badge badge-pill badge-info">1</span>
                                    </span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    Settings
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    <span>Lock Account</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    <span>Log Out</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>



            <!-- Bar Graph -->
            <div class="page-content">    
                
                <div class="col-md-4">
                    <div class="form-group">
                        
                        <label for=""> Select Month</label>
                        <form action="" method="get" class="mb-4">
            <div class="form-group">
                <label for="quarter">Select Quarter:</label>
                <select name="quarter" id="quarter" class="form-control">
                    <option value="1" <?php echo $selectedQuarter == 1 ? 'selected' : ''; ?>>Q1 (Jan - Mar)</option>
                    <option value="2" <?php echo $selectedQuarter == 2 ? 'selected' : ''; ?>>Q2 (Apr - Jun)</option>
                    <option value="3" <?php echo $selectedQuarter == 3 ? 'selected' : ''; ?>>Q3 (Jul - Sep)</option>
                    <option value="4" <?php echo $selectedQuarter == 4 ? 'selected' : ''; ?>>Q4 (Oct - Dec)</option>
                </select>
            </div>
            <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
            <button type="submit" class="btn btn-primary">Generate Report</button>
        </form>

                      
                    </div>
 

                </div>

                <input type="hidden" id="client_id" value="<?php echo $client_id ?>">

                    <div class="row mt-4">
                    <div class="container-fluid">
                        <h2 class="card-title">Insights</h2>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Search Views</h6>
                                                <span class="h3 mb-0"> <span id="search_views"></span> <br>
                                            </span>
                                            </div>

                                            
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/search.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                            </div>
                                        </div> <!-- end row -->

                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Phone Calls</h6>
                                                <span class="h3 mb-0"> <span id="calls"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/phone_call2.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div>
                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Direction Requests</h6>
                                                <span class="h3 mb-0"><span id="directions"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/directions.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                            </div>
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->


                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Keyword Rankings</h6>
                                                <span class="h3 mb-0"><span id="keyword_rankings"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/keyword_ranking.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Citations</h6>
                                                <span class="h3 mb-0"><span id="citations"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/citation.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col--> 
                        </div>
                    </div>
                    </div>

                    <div class="container-fluid">
                        <h4 class="card-title">Google Stats</h4>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Google Reviews</h6>
                                                <span class="h3 mb-0"> <span id="google-reviews"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/google_reviews.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Average Ratings</h6>
                                                <span class="h3 mb-0"> <span id="average_ratings"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/rating.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col--> 
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Review Responses</h6>
                                                <span class="h3 mb-0"><span id="review_responses"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/google_reviews.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->


                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Geo Grid Rankings</h6>
                                                <span class="h3 mb-0"><span id="geo_grid_rankings"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/geo_grid.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Medical Blogs</h6>
                                                <span class="h3 mb-0"><span id="medical_blogs"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/blog.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                        </div>
                    </div>

                    <div class="container-fluid">
                        <h4 class="card-title">Facebook Stats  </h4>
                        <div class="row">
    
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Likes</h6>
                                                <span class="h3 mb-0"> <span id="fb_likes"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/likes.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                            </div>
                                        </div> <!-- end row -->

                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Engagement</h6>
                                                <span class="h3 mb-0"> <span id="fb_shares"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/facebook.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col--> 
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Reach</h6>
                                                <span class="h3 mb-0"><span id="fb_reach"></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/facebook.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                        </div>
                    </div>
    
                    <div class="container-fluid">
                        <h4 class="card-title">Instagram Stats</h4>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Followers</h6>
                                                <span class="h3 mb-0"><span id="instagram_followers"></span></span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/insta.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Engagement</h6>
                                                <span class="h3 mb-0"><span id="instagram_engagement"></span></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/insta_followers.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->

                                    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->



                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Reach</h6>
                                                <span class="h3 mb-0"><span id="instagram_reach"></span></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/insta.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                        
                                        </div> <!-- end row -->
                                        </div> <!-- end row -->
    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->


                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Monthly Posts</h6>
                                                <span class="h3 mb-0"><span id="monthly_posts"></span></span> </span>
                                            </div>
                                            <div class="col-auto">
                                            <div class="icon">
                                            <img src="assets/images/icons/monthly_posts.png" alt="Directions Icon" class="large-icon" />
                                            </div>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id="sparkline1" class="mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="container-fluid">
                        <h4 class="card-title">Video Stats</h4>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Animation<br> Videos</h6>
                                                <span class="h3 mb-0"><span id="animation_videos"></span></span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="badge badge-soft-success">+7.5%</span>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id="sparkline1" class="mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Testimonial <br>Videos</h6>
                                                <span class="h3 mb-0"><span id="testimonial_videos"></span></span> </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="badge badge-soft-success">+7.5%</span>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id="sparkline1" class="mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->



                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Educational <br>Videos</h6>
                                                <span class="h3 mb-0"><span id="educational_videos"></span></span> </span>
    
                                            </div>
                                            <div class="col-auto">
                                                <span class="badge badge-soft-success">+7.5%</span>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id="sparkline1" class="mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->


                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Case <br>Studies</h6>
                                                <span class="h3 mb-0"><span id="case_studies"></span></span> </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="badge badge-soft-success">+7.5%</span>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id="sparkline1" class="mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                        </div>
                    </div>

                    <div class="container-fluid">
                        <h4 class="card-title">Website Stats</h4>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Performance</h6>
                                                <span class="h3 mb-0"><span id="website_performance"></span></span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="badge badge-soft-success">+7.5%</span>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id="sparkline1" class="mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3"> Accessibility</h6>
                                                <span class="h3 mb-0"><span id="website_accessibility"></span></span> </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="badge badge-soft-success">+7.5%</span>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id="sparkline1" class="mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->



                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Best Practices</h6>
                                                <span class="h3 mb-0"><span id="website_best_practices"></span></span> </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="badge badge-soft-success">+7.5%</span>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id="sparkline1" class="mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->


                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="text-uppercase font-size-12 text-muted mb-3">SEO</h6>

                                                <span class="h3 mb-0"><span id="website_seo"></span></span> </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="badge badge-soft-success">+7.5%</span>
                                            </div>
                                        </div> <!-- end row -->

                                        <div id="sparkline1" class="mt-3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                        </div>
                    </div>

                <div class="text-right">
                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                    <a href="#" class="btn btn-info waves-effect waves-light">Submit</a>
                </div>
 

            </div> <!-- container-fluid -->
        </div>

        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        2023 © DrSmart.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Design & Develop by DrSmart
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>

  
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- Sparkline Js-->
    <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Morris Js-->
    <script src="../plugins/morris-js/morris.min.js"></script>
    <!-- Raphael Js-->
    <script src="../plugins/raphael/raphael.min.js"></script>

    <!-- Custom Js -->
    <script src="assets/pages/dashboard-demo.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>
    <!-- Google Charts js -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Google chart custom js-->
    <script src="assets/pages/google-chart-demo.js"></script>

    


</body>


</html>