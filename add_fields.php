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
    <style>
    </style>

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
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg"
                                            alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">5 members joined today </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg"
                                            alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">likes a photo of you</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg"
                                            alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg"
                                            alt="" />
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
                            <ul>
                                <li class="notification-unread">
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/1.jpg"
                                            alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-unread">
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg"
                                            alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg"
                                            alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr. Ajay</div>
                                            <div class="notification-val">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg"
                                            alt="" />
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
                <li class="header-icon dib"><img class="avatar-img" src="assets/images/avatar/1.jpg" alt="" /> <span
                        class="user-avatar"> Ajay <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                        <div class="dropdown-content-heading">
                            <span class="val-left">Upgrade Now</span>
                            <p class="trial-day">30 Days Trail</p>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>
                                <li><a href="#"><i class="ti-wallet"></i> <span>My Balance</span></a></li>
                                <li><a href="#"><i class="ti-write"></i> <span>My Task</span></a></li>
                                <li><a href="#"><i class="ti-calendar"></i> <span>My Calender</span></a></li>
                                <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                <li><a href="#"><i class="ti-settings"></i> <span>Setting</span></a></li>
                                <li><a href="#"><i class="ti-help-alt"></i> <span>Help</span></a></li>
                                <li><a href="#"><i class="ti-lock"></i> <span>Lock Screen</span></a></li>
                                <li><a href="#"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="content-wrap col-md-8" style="left: 300px;">
        <div class="main">
            <div class="container-fluid">
                <!-- /# row -->
                <div id="main-content">
                <h1 class="mt-5">Edit Fields for Client <?php echo $client_id; ?></h1>
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
    </div>

    <script src="assets/js/lib/jquery.min.js"></script>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->
</body>

    <script>
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