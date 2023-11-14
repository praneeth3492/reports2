<?php
session_start();
require_once "config.php";

// Check if the user is logged in
if (!isset($_SESSION["manager_id"])) {
    header("Location: login.php");
    exit;
}

// Get the submitted data
$client_id = $_POST['client_id'];
$month_id = $_POST['month'];
$report_creation_date = $_POST['report_creation_date'];
$search_views = $_POST['search_views']; 
$calls = $_POST['calls'];
$directions = $_POST['directions'];
$google_reviews = $_POST['google_reviews'];
$average_ratings = $_POST['average_ratings'];
$review_responses = $_POST['review_responses'];
$geo_grid_rankings = $_POST['geo_grid_rankings'];
$online_authority = $_POST['online_authority'];
$fb_likes = $_POST['fb_likes'];
$fb_shares = $_POST['fb_shares'];
$fb_reach = $_POST['fb_reach'];
$instagram_followers = $_POST['instagram_followers'];
$instagram_engagement = $_POST['instagram_engagement'];
$instagram_reach = $_POST['instagram_reach'];
$monthly_posts = $_POST['monthly_posts'];
$citations = $_POST['citations'];
$medical_blogs = $_POST['medical_blogs'];
$animation_videos = $_POST['animation_videos'];
$testimonial_videos = $_POST['testimonial_videos'];
$educational_videos = $_POST['educational_videos'];
$case_studies = $_POST['case_studies'];
$website_performance = $_POST['website_performance'];
$website_accessibility = $_POST['website_accessibility'];
$website_best_practices = $_POST['website_best_practices'];
$website_seo = $_POST['website_seo'];
$keyword_rankings = $_POST['keyword_rankings'];

// Check if a record with the given client_id exists
$sql = "SELECT * FROM client_performance WHERE client_id = ? and month_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $client_id, $month_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {



    // Update the record
    $sql = "UPDATE client_performance SET 
        report_creation_date = ?,
        search_views = ?,
        calls = ?,
        directions = ?,
        google_reviews = ?,
        average_ratings = ?,
        review_responses = ?,
        geo_grid_rankings = ?,
        online_authority = ?,
        fb_likes = ?,
        fb_shares = ?,
        fb_reach = ?,
        instagram_followers = ?,
        instagram_engagement = ?,
        instagram_reach = ?,
        monthly_posts = ?,
        citations = ?,
        medical_blogs = ?,
        animation_videos = ?,
        testimonial_videos = ?,
        educational_videos = ?,
        case_studies = ?,
        website_performance = ?,
        website_accessibility = ?,
        website_best_practices = ?,
        website_seo = ?,
        keyword_rankings = ?
        WHERE client_id = ? and month_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "siiiiiiiiiiiiiiiiiiiiiiiiiiii",
        $report_creation_date,
        $search_views,
        $calls,
        $directions,
        $google_reviews,
        $average_ratings,
        $review_responses,
        $geo_grid_rankings,
        $online_authority,
        $fb_likes,
        $fb_shares,
        $fb_reach,
        $instagram_followers,
        $instagram_engagement,
        $instagram_reach,
        $monthly_posts,
        $citations,
        $medical_blogs,
        $animation_videos,
        $testimonial_videos,
        $educational_videos,
        $case_studies,
        $website_performance,
        $website_accessibility,
        $website_best_practices,
        $website_seo,
        $keyword_rankings,
        $client_id,
        $month_id  // moved from first to last
    );
    
    
    
    
} else {
    // Insert a new record
    $sql = "INSERT INTO client_performance (
        client_id,
        month_id,
        report_creation_date,
search_views,
calls,
directions,
google_reviews,
average_ratings,
review_responses,
geo_grid_rankings,
online_authority,
fb_likes,
fb_shares,
fb_reach,
instagram_followers,
instagram_engagement,
instagram_reach,
monthly_posts,
citations,
medical_blogs,
animation_videos,
testimonial_videos,
educational_videos,
case_studies,
website_performance,
website_accessibility,
website_best_practices,
website_seo,
keyword_rankings
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "isiiiiiiiiiiiiiiiiiiiiiiiiiii",
        $client_id,
        $month_id,
        $report_creation_date,
        $search_views,
        $calls,
        $directions,
        $google_reviews,
        $average_ratings,
        $review_responses,
        $geo_grid_rankings,
        $online_authority,
        $fb_likes,
        $fb_shares,
        $fb_reach,
        $instagram_followers,
        $instagram_engagement,
        $instagram_reach,
        $monthly_posts,
        $citations,
        $medical_blogs,
        $animation_videos,
        $testimonial_videos,
        $educational_videos,
        $case_studies,
        $website_performance,
        $website_accessibility,
        $website_best_practices,
        $website_seo,
        $keyword_rankings
    );
    
    
    
}

$result = $stmt->execute();
if ($result === false) {
    echo "Error: " . $stmt->error;
} else {
    if ($stmt->affected_rows > 0) {
        header("Location: manager_dashboard.php");
    } else {
        echo "No rows were updated. Check if the submitted data is different from the existing data.";
    }
}

$stmt->close();
$conn->close();
