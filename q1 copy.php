<?php
// Include your database configuration file
include 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

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
     

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quarterly Report</title>
</head>
<body>
    <form action="" method="get">
        <label for="quarter">Select Quarter:</label>
        <select name="quarter" id="quarter">
            <option value="1" <?php echo $selectedQuarter == 1 ? 'selected' : ''; ?>>Q1 (Jan - Mar)</option>
            <option value="2" <?php echo $selectedQuarter == 2 ? 'selected' : ''; ?>>Q2 (Apr - Jun)</option>
            <option value="3" <?php echo $selectedQuarter == 3 ? 'selected' : ''; ?>>Q3 (Jul - Sep)</option>
            <option value="4" <?php echo $selectedQuarter == 4 ? 'selected' : ''; ?>>Q4 (Oct - Dec)</option>
        </select>
        <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
        <button type="submit">Generate Report</button>
    </form>
</body>
</html>
