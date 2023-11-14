

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Client Performance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/print-style.css" media="print">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>

        /* print-style.css */

/* Hide unnecessary elements when printing */
body {
    background-color: white;
}

#add-fields-form {
    display: none;
}

/* Show the logo when printing */
.print-logo {
    display: block;
    text-align: center;
}

.print-logo img {
    width: 150px; /* Adjust the logo size as needed */
}

/* Customize form layout when printing */
.form-group {
    margin-bottom: 10px;
}

/* Add any other custom styles for printing as needed */
print-style.css

#print-button {
    display: none;
}
        body {
            padding-top: 30px;
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .col-lg-6 {
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .card-header {
            background-color: #f2f2f2;
        }

        .card-header-right-icon ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .card-header-right-icon li {
            display: inline-block;
            margin-right: 5px;
            cursor: pointer;
        }

        .card-header-right-icon i {
            font-size: 18px;
        }

        .media-stats-content .row {
            margin-top: 10px;
        }

        .border-bottom {
            border-bottom: 1px solid #ccc;
        }

        .border-left {
            border-left: 1px solid #ccc;
        }

        .stats-content {
            padding: 10px;
            text-align: center;
        }

        .stats-digit {
            font-size: 28px;
            font-weight: bold;
        }

        .stats-text {
            font-size: 14px;
        }

        .table-responsive {
            max-height: 250px;
            overflow-y: auto;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container">

<div class="print-logo">
            <img src="path/to/your/logo.png" alt="Your Logo">
        </div>
        <h1>View Client Performance</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                <div class="col-lg-12">
            <div class="card alert">
                <div class="card-header">
                    <h4 class="m-l-5">Additional Stats </h4>
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
                                    <div class="stats-digit"><span id="search-views"></span></div>
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
                                    <div class="stats-digit"><span id="directions"></span></div>
                                    <div class="stats-text">Direction Requests</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="google-reviews"></span></div>
                                    <div class="stats-text">Google Reviews</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="average-ratings"></span></div>
                                    <div class="stats-text">Average Ratings</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="review-responses"></span></div>
                                    <div class="stats-text">Review Responses</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="geo-grid-rankings"></span></div>
                                    <div class="stats-text">Geo Grid Rankings</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="online-authority"></span></div>
                                    <div class="stats-text">Online Authority</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="fb_likes"></span></div>
                                    <div class="stats-text">FB Page Likes</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="fb_shares"></span></div>
                                    <div class="stats-text">FB Page Engagement</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="fb_reach"></span></div>
                                    <div class="stats-text">FB Page Reach</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="instagram-followers"></span></div>
                                    <div class="stats-text">Instagram Followers</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="instagram-engagement"></span></div>
                                    <div class="stats-text">Instagram Engagement</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="instagram-reach"></span></div>
                                    <div class="stats-text">Instagram Reach</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="monthly-posts"></span></div>
                                    <div class="stats-text">Monthly Posts</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="citations"></span></div>
                                    <div class="stats-text">Citations</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="medical-blogs"></span></div>
                                    <div class="stats-text">Medical Blogs</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="animation-videos"></span></div>
                                    <div class="stats-text">Animation Videos</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="testimonial-videos"></span></div>
                                    <div class="stats-text">Testimonial Videos</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="educational-videos"></span></div>
                                    <div class="stats-text">Educational Videos</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="case-studies"></span></div>
                                    <div class="stats-text">Case Studies</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="website-performance"></span></div>
                                    <div class="stats-text">Website Performance</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="website-accessibility"></span></div>
                                    <div class="stats-text">Website Accessibility</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="website-best-practices"></span></div>
                                    <div class="stats-text">Website Best Practices</div>
                                </div>
                            </div>
                            <div class="col-lg-4 border-left">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="website-seo"></span></div>
                                    <div class="stats-text">Website SEO</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="stats-content">
                                    <div class="stats-digit"><span id="keyword-rankings"></span></div>
                                    <div class="stats-text">Keyword Rankings</div>
                                </div>
                            </div>
                        </div>
                    </div>   <div class="text-center" id="print-button">
        <button type="button" class="btn btn-primary" onclick="printPDF()">Print</button>
    </div>
                </div>
            </div>
        </div>

    </div>

    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function printPDF() {
            window.print();
        }
    </script>
    <script>
        function fetchClientPerformance() {
            $.ajax({
                type: "GET",
                url: "fetch_client_performance.php",
                dataType: "json",
                success: function(data) {
                    // Set the data in the corresponding spans
                    $("#client-id").text(data.clientId);
                    $("#report-creation-date").text(data.reportCreationDate);
                    $("#report-sent-date").text(data.reportSentDate);
                    $("#num-reviews").text(data.numReviews);
                    $("#calls").text(data.calls);
                    $("#directions").text(data.directions);
                    $("#fb-likes").text(data.fbLikes);
                    $("#fb-shares").text(data.fbShares);
                    $("#fb-reach").text(data.fbReach);
                    // Add the new fields here and update the corresponding span IDs
                    $("#search-views").text(data.searchViews);
                    $("#phone-calls").text(data.phoneCalls);
                    $("#direction-requests").text(data.directionRequests);
                    $("#google-reviews").text(data.googleReviews);
                    $("#average-ratings").text(data.averageRatings);
                    $("#review-responses").text(data.reviewResponses);
                    $("#geo-grid-rankings").text(data.geoGridRankings);
                    $("#online-authority").text(data.onlineAuthority);
                    $("#fb-page-likes").text(data.fbPageLikes);
                    $("#fb-page-engagement").text(data.fbPageEngagement);
                    $("#fb-page-reach").text(data.fbPageReach);
                    $("#instagram-followers").text(data.instagramFollowers);
                    $("#instagram-engagement").text(data.instagramEngagement);
                    $("#instagram-reach").text(data.instagramReach);
                    $("#monthly-posts").text(data.monthlyPosts);
                    $("#citations").text(data.citations);
                    $("#medical-blogs").text(data.medicalBlogs);
                    $("#animation-videos").text(data.animationVideos);
                    $("#testimonial-videos").text(data.testimonialVideos);
                    $("#educational-videos").text(data.educationalVideos);
                    $("#case-studies").text(data.caseStudies);
                    $("#website-performance").text(data.websitePerformance);
                    $("#website-accessibility").text(data.websiteAccessibility);
                    $("#website-best-practices").text(data.websiteBestPractices);
                    $("#website-seo").text(data.websiteSEO);
                    $("#keyword-rankings").text(data.keywordRankings);
                    // Add the rest of the new fields here and update the corresponding span IDs

                    // Create the pie chart and any other charts as needed
                    var ctx = document.getElementById("fb-chart").getContext("2d");
                    var fbChart = new Chart(ctx, {
                        type: "pie",
                        data: {
                            labels: ["FB Likes", "FB Shares", "FB Reach"],
                            datasets: [{
                                data: [data.fbLikes, data.fbShares, data.fbReach],
                                backgroundColor: ["#36A2EB", "#FF6384", "#FFCE56"],
                                hoverBackgroundColor: ["#36A2EB", "#FF6384", "#FFCE56"],
                            }],
                        },
                        options: {
                            responsive: true,
                        },
                    });

                    // Add other chart configurations as needed
                },
                error: function(xhr, status, error) {
                    console.log("Error fetching client performance data: " + error);
                }
            });
        }

        // Call the function to fetch and display client performance data on page load
        $(document).ready(function() {
            fetchClientPerformance();
        });
    </script>
</body>

                    <div class="col-md-6">
    <canvas id="fb-chart" width="400" height="400"></canvas>
</div>

                </div>
            </div>
        </div>
    </div>

    <script>
     function fetchClientPerformance() {
    $.ajax({
        type: "GET",
        url: "fetch_client_performance.php",
        dataType: "json",
        success: function(data) {
            if (data.error) {
                console.log(data.error);
            } else {
                // Set the data in the corresponding spans
                $("#client-id").text(data.client_id);
                $("#report-creation-date").text(data.report_creation_date);               
                $("#calls").text(data.calls);
                $("#directions").text(data.directions);
                $("#fb_likes").text(data.fb_likes);
                $("#fb_shares").text(data.fb_shares);
                $("#fb_reach").text(data.fb_reach);
                $("#fb_reach").text(data.fb_reach);
                $("#fb_reach").text(data.fb_reach);
                // Add the new fields here and update the corresponding span IDs
                $("#search-views").text(data.search_views);
                $("#phone-calls").text(data.phone_calls);
                $("#direction-requests").text(data.direction_requests);
                // Add the rest of the new fields here

                // Create a pie chart
                var ctx = document.getElementById("fb-chart").getContext("2d");
                var fbChart = new Chart(ctx, {
                    type: "pie",
                    data: {
                        labels: ["FB Likes", "FB Shares", "FB Reach"],
                        datasets: [{
                            data: [data.fb_likes, data.fb_shares, data.fb_reach],
                            backgroundColor: ["#36A2EB", "#FF6384", "#FFCE56"],
                            hoverBackgroundColor: ["#36A2EB", "#FF6384", "#FFCE56"],
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
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

$(document).ready(function() {
    fetchClientPerformance();
});

    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
