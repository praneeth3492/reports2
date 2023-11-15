<?php
session_start();
require_once "config.php";

if (!isset($_SESSION["manager_id"])) {
    header("Location: login.php");
    exit;
}

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

        <!-- Plugins css -->
        <link href="../plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />

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

                <!--- Sidemenu -->
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
                             
                            <h2 class="header-title">Overview</h2>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        
                        <button type="button" class="btn btn-primary d-none d-lg-block ml-2">
                            <i class="mdi mdi-pencil-outline mr-1"></i> Create Reports
                        </button>

                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-danger badge-pill">6</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-notifications-dropdown">
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
                                            <img src="assets/images/users/avatar-2.jpg"
                                                class="mr-3 rounded-circle avatar-xs" alt="user-pic">
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
                                            <img src="assets/images/users/avatar-3.jpg"
                                                class="mr-3 rounded-circle avatar-xs" alt="user-pic">
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
                            <button type="button" class="btn header-item" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1">Henry</span>
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

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
 
        <div class="main">
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
            <div class="container-fluid">
                <!-- /# row -->
                <div id="main-content">
                <h2 class="mt-5">Edit Fields for Client <?php echo $name; ?></h2>
        <hr>

        <form action="update_fields.php" method="post" id="add-fields-form">
            <input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id; ?>">

            <!-- Add the necessary input fields for the client's data here with the pre-filled values -->
            <div class="row">

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
              <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Month</label>
             <select name="month" id="month" class="form-control">
            <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<option value = '".$row['id']."'>".$row['name']."</option>";
                }

            $stmt->close();
            ?>
             </select>
            
        </div>
  </div>

                <div class="col-md-4">
                <div class="form-group">
                        <label for="report_creation_date">Report Creation Date:</label>
                        <input type="date" class="form-control" id="report_creation_date" name="report_creation_date" value="<?php echo isset($client_data['report_creation_date']) ? $client_data['report_creation_date'] : ''; ?>">
                    </div>
                </div>

                

                <!-- Add the rest of the new fields here -->
                <div class="col-md-4">
                <div class="form-group">
                        <label for="search_views">Search Views:</label>
                        <input type="number" class="form-control" id="search_views" name="search_views" value="<?php echo isset($client_data['search_views']) ? $client_data['search_views'] : ''; ?>">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="calls">Calls:</label>
                        <input type="number" class="form-control" id="calls" name="calls" value="<?php echo isset($client_data['calls']) ? $client_data['calls'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="directions">Directions:</label>
                        <input type="number" class="form-control" id="directions" name="directions" value="<?php echo isset($client_data['directions']) ? $client_data['directions'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="google_reviews">Google Reviews:</label>
                        <input type="number" class="form-control" id="google_reviews" name="google_reviews" value="<?php echo isset($client_data['google_reviews']) ? $client_data['google_reviews'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="average_ratings">Average Ratings:</label>
                        <input type="number" class="form-control" id="average_ratings" name="average_ratings" value="<?php echo isset($client_data['average_ratings']) ? $client_data['average_ratings'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="review_responses">Review Responses:</label>
                        <input type="number" class="form-control" id="review_responses" name="review_responses" value="<?php echo isset($client_data['review_responses']) ? $client_data['review_responses'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="geo_grid_rankings">Geo Grid Rankings:</label>
                        <input type="number" class="form-control" id="geo_grid_rankings" name="geo_grid_rankings" value="<?php echo isset($client_data['geo_grid_rankings']) ? $client_data['geo_grid_rankings'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="online_authority">Online Authority:</label>
                        <input type="number" class="form-control" id="online_authority" name="online_authority" value="<?php echo isset($client_data['online_authority']) ? $client_data['online_authority'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fb_likes">Facebook Likes:</label>
                        <input type="number" class="form-control" id="fb_likes" name="fb_likes" value="<?php echo isset($client_data['fb_likes']) ? $client_data['fb_likes'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fb_shares">Facebook Shares:</label>
                        <input type="number" class="form-control" id="fb_shares" name="fb_shares" value="<?php echo isset($client_data['fb_shares']) ? $client_data['fb_shares'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fb_reach">Facebook Reach:</label>
                        <input type="number" class="form-control" id="fb_reach" name="fb_reach" value="<?php echo isset($client_data['fb_reach']) ? $client_data['fb_reach'] : ''; ?>">
                    </div>
                </div>
 

                 

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="instagram_followers">Instagram Followers:</label>
                        <input type="number" class="form-control" id="instagram_followers" name="instagram_followers" value="<?php echo isset($client_data['instagram_followers']) ? $client_data['instagram_followers'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="instagram_engagement">Instagram Engagement:</label>
                        <input type="number" class="form-control" id="instagram_engagement" name="instagram_engagement" value="<?php echo isset($client_data['instagram_engagement']) ? $client_data['instagram_engagement'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="instagram_reach">Instagram Reach:</label>
                        <input type="number" class="form-control" id="instagram_reach" name="instagram_reach" value="<?php echo isset($client_data['instagram_reach']) ? $client_data['instagram_reach'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="monthly_posts">Monthly Posts:</label>
                        <input type="number" class="form-control" id="monthly_posts" name="monthly_posts" value="<?php echo isset($client_data['monthly_posts']) ? $client_data['monthly_posts'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="citations">Citations:</label>
                        <input type="number" class="form-control" id="citations" name="citations" value="<?php echo isset($client_data['citations']) ? $client_data['citations'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="medical_blogs">Medical Blogs:</label>
                        <input type="number" class="form-control" id="medical_blogs" name="medical_blogs" value="<?php echo isset($client_data['medical_blogs']) ? $client_data['medical_blogs'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="animation_videos">Animation Videos:</label>
                        <input type="number" class="form-control" id="animation_videos" name="animation_videos" value="<?php echo isset($client_data['animation_videos']) ? $client_data['animation_videos'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="testimonial_videos">Testimonial Videos:</label>
                        <input type="number" class="form-control" id="testimonial_videos" name="testimonial_videos" value="<?php echo isset($client_data['testimonial_videos']) ? $client_data['testimonial_videos'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="educational_videos">Educational Videos:</label>
                        <input type="number" class="form-control" id="educational_videos" name="educational_videos" value="<?php echo isset($client_data['educational_videos']) ? $client_data['educational_videos'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="case_studies">Case Studies:</label>
                        <input type="number" class="form-control" id="case_studies" name="case_studies" value="<?php echo isset($client_data['case_studies']) ? $client_data['case_studies'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="website_performance">Website Performance:</label>
                        <input type="number" class="form-control" id="website_performance" name="website_performance" value="<?php echo isset($client_data['website_performance']) ? $client_data['website_performance'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="website_accessibility">Website Accessibility:</label>
                        <input type="number" class="form-control" id="website_accessibility" name="website_accessibility" value="<?php echo isset($client_data['website_accessibility']) ? $client_data['website_accessibility'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="website_best_practices">Website Best Practices:</label>
                        <input type="number" class="form-control" id="website_best_practices" name="website_best_practices" value="<?php echo isset($client_data['website_best_practices']) ? $client_data['website_best_practices'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="website_seo">Website SEO:</label>
                        <input type="number" class="form-control" id="website_seo" name="website_seo" value="<?php echo isset($client_data['website_seo']) ? $client_data['website_seo'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="keyword_rankings">Keyword Rankings:</label>
                        <input type="number" class="form-control" id="keyword_rankings" name="keyword_rankings" value="<?php echo isset($client_data['keyword_rankings']) ? $client_data['keyword_rankings'] : ''; ?>">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="manager_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </form>

                   
                  

                </div>
            </div>
        </div>
    </div></div> 
                        
                   

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2019 © DrSmart.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by Myra
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

</body>

<script>
            $("#month").change(function(event) {
            event.preventDefault();

            const month = $("#month").val();
            const clientId = $("#client_id").val();

            $.ajax({
                type: "POST",
                url: "fetch_client_performance_by_month2.php",
                data: {month: month, client_id: clientId},
                dataType: "json",
                success: function(data) {
                    $("#report-creation-date").val(data.reportCreationDate);
                    $("#search_views").val(data.search_views);
                    $("#calls").val(data.calls);
                    $("#directions").val(data.directions);
                    $("#google_reviews").val(data.google_reviews);
                    $("#average_ratings").val(data.average_ratings);
                    $("#review_responses").val(data.review_responses);
                    $("#geo_grid_rankings").val(data.geo_grid_rankings);
                    $("#online_authority").val(data.online_authority);
                    $("#fb_likes").val(data.fb_likes);
                    $("#fb_shares").val(data.fb_shares);
                    $("#fb_reach").val(data.fb_reach);
                    $("#instagram_followers").val(data.instagram_followers);
                    $("#instagram_engagement").val(data.instagram_engagement);
                    $("#instagram_reach").val(data.instagram_reach);
                    $("#monthly_posts").val(data.monthly_posts);
                    $("#citations").val(data.citations);
                    $("#medical_blogs").val(data.medical_blogs);
                    $("#animation_videos").val(data.animation_videos);
                    $("#testimonial_videos").val(data.testimonial_videos);
                    $("#educational_videos").val(data.educational_videos);
                    $("#case_studies").val(data.case_studies);
                    $("#website_performance").val(data.website_performance);
                    $("#website_accessibility").val(data.website_accessibility);
                    $("#website_best_practices").val(data.website_best_practices);
                    $("#website_seo").val(data.website_seo);
                    $("#keyword_rankings").val(data.keyword_rankings);
                },
                error: function(jqXHR, valStatus, errorThrown) {
                    console.log(valStatus, errorThrown);
                }
            });
        }); 
    </script>

</html>