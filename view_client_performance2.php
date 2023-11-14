<?php
session_start();
require_once "config.php";

?>
<!-- add_manager.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Client Performance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
</head>

<body class="">


    <div class="sidebar sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <li class="label">Main</li>
                    <li><a href="client_dashboard.php" class=""><i class="ti-home"></i> Dashboard </a></li>
                    <li class="active"><a href="view_client_performance2.php" class=""><i class="ti-home"></i> Client
                            Performance </a></li>

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
            
        </div>
    </div>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid col-md-8" style="left: 350px;">
                <!-- /# row -->
                <div id="main-content">
                    
                <?php
                    $clientSql = "SELECT * from clients WHERE client_id = ?";
                    $client_id = $_SESSION['client_id'];
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
                                    <h2 class="m-l-5">Performance of <?php echo $name;?></h2>

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
                            echo "<option value = '".$row['id']."'>".$row['name']."</option>";
                        }

                    $stmt->close();
                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-right" id="print-button" style="margin-top: 13px;">
                                        <button type="button" class="btn btn-primary"
                                            onclick="printPDF()">Print</button>
                                    </div>
                                    </div>
                                    <input type="hidden" id="client_id" value="<?php $client_id?>">
                                    
                                    <div class="col-md-6">
                                        <div class="card alert">
                                            <div class="card-header">
                                                <h4 class="m-l-5">Facebook Stats </h4>
                                                <div class="card-header-right-icon">
                                                    <ul>
                                                        <li><i class="ti-reload"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="media-stats-content text-center">
                                                    <div class="row">
                                                        <div class="col-lg-4 border-bottom border-left" >
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="fb_likes"></span>
                                                                </div>
                                                                <div class="stats-text">FB Page Likes</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left" style="height: 124px;">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="fb_shares"></span>
                                                                </div>
                                                                <div class="stats-text">FB Page Engagement</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left" >
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span id="fb_reach"></span>
                                                                </div>
                                                                <div class="stats-text">FB Page Reach</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="online_authority"></span></div>
                                                                <div class="stats-text">Online Authority
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
                                                                <div class="stats-digit"><span
                                                                        id="instagram_followers"></span></div>
                                                                <div class="stats-text">Instagram Followers</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="instagram_engagement"></span></div>
                                                                <div class="stats-text">Instagram Engagement</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="instagram_reach"></span></div>
                                                                <div class="stats-text">Instagram Reach</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="monthly_posts"></span></div>
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
                                                                <div class="stats-digit"><span
                                                                        id="google-reviews">0</span></div>
                                                                <div class="stats-text">Google Reviews</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="average_ratings"></span></div>
                                                                <div class="stats-text">Average Ratings
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="review_responses"></span></div>
                                                                <div class="stats-text">Review Responses
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="geo_grid_rankings"></span></div>
                                                                <div class="stats-text">Geo Grid Rankings
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-4 border-bottom border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="medical_blogs"></span></div>
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
                                                                <div class="stats-digit"><span
                                                                        id="keyword_rankings"></span></div>
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
                                                                <div class="stats-digit"><span
                                                                        id="animation_videos"></span></div>
                                                                <div class="stats-text">Animation Videos
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="testimonial_videos"></span>
                                                                </div>
                                                                <div class="stats-text">Testimonial Videos
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="educational_videos"></span>
                                                                </div>
                                                                <div class="stats-text">Educational Videos
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 border-bottom  border-left border-right">
                                                            <div class="stats-content">
                                                                <div class="stats-content">
                                                                    <div class="stats-digit"><span
                                                                            id="case_studies"></span></div>
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
                                                                <div class="stats-digit"><span
                                                                        id="website_performance"></span>
                                                                </div>
                                                                <div class="stats-text">Website Performance
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="website_accessibility"></span>
                                                                </div>
                                                                <div class="stats-text">Website
                                                                    Accessibility</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 border-bottom  border-left">
                                                            <div class="stats-content">
                                                                <div class="stats-digit"><span
                                                                        id="website_best_practices"></span>
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
            function printPDF() {
                window.print();
            }
        </script>
        <script>
            $(document).ready(function () {

                $("#month").change(function(event) {
            event.preventDefault();

            const month = $("#month").val();
            const clientId = $("#client_id").val();

            $.ajax({
                type: "POST",
                url: "fetch_client_performance_by_month.php",
                data: {month: month, client_id: clientId},
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
                    }
                   
                },
                error: function(jqXHR, valStatus, errorThrown) {
                    console.log("test");
                    console.log(valStatus, errorThrown);
                }
            });
        }); 

                function fetchClientPerformance() {
                    $.ajax({
                        type: "GET",
                        url: "fetch_client_performance.php",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            if (data.error) {
                                console.log(data.error);
                            } else {
                                // Set the data in the corresponding spans
                                $("#client-id").text(data.clientId);
                                $("#report-creation-date").text(data
                                    .reportCreationDate);

                                $("#search_views").text(data.search_views);
                                $("#calls").text(data.calls);
                                $("#directions").text(data.directions);
                                $("#google_reviews").text(data.google_reviews);
                                $("#average_ratings").text(data.average_ratings);
                                $("#review_responses").text(data.review_responses);
                                $("#geo_grid_rankings").text(data
                                    .geo_grid_rankings);
                                $("#online_authority").text(data.online_authority);
                                $("#fb_likes").text(data.fb_likes);
                                $("#fb_shares").text(data.fb_shares);
                                $("#fb_reach").text(data.fb_reach);
                                $("#instagram_followers").text(data
                                    .instagram_followers);
                                $("#instagram_engagement").text(data
                                    .instagram_engagement);
                                $("#instagram_reach").text(data.instagram_reach);
                                $("#monthly_posts").text(data.monthly_posts);
                                $("#citations").text(data.citations);
                                $("#medical_blogs").text(data.medical_blogs);
                                $("#animation_videos").text(data.animation_videos);
                                $("#testimonial_videos").text(data
                                    .testimonial_videos);
                                $("#educational_videos").text(data
                                    .educational_videos);
                                $("#case_studies").text(data.case_studies);
                                $("#website_performance").text(data
                                    .website_performance);
                                $("#website_accessibility").text(data
                                    .website_accessibility);
                                $("#website_best_practices").text(data
                                    .website_best_practices);
                                $("#website_seo").text(data.website_seo);
                                $("#keyword_rankings").text(data.keyword_rankings);
                                // Add the rest of the new fields here

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
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }

                fetchClientPerformance();
            });
        </script>
</body>

</html>