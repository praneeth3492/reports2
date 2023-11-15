<?php
// Include your database configuration file
include 'config.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Map months to quarters
$monthToQuarterMap = [
    1 => 1, 2 => 1, 3 => 1, // Q1
    4 => 2, 5 => 2, 6 => 2, // Q2
    7 => 3, 8 => 3, 9 => 3, // Q3
    10 => 4, 11 => 4, 12 => 4 // Q4
];

// Check if client_id is passed
$client_id = isset($_GET['client_id']) ? $_GET['client_id'] : null;
$selectedMonth = isset($_GET['month']) ? (int)$_GET['month'] : null;

$monthData = null;
$quarterData = null;

if ($client_id && $selectedMonth) {
    // Determine the corresponding quarter
    $selectedQuarter = $monthToQuarterMap[$selectedMonth] ?? null;

    // Fetch data for the selected month
    $monthData = fetchDataForMonth($client_id, $selectedMonth);

    // Fetch data for the corresponding quarter
    $quarterData = fetchDataForQuarter($client_id, $selectedQuarter);
}

// Function to fetch data for a specific month
// Function to fetch data for a specific month
function fetchDataForMonth($conn, $clientId, $month) {
    $sql = "SELECT 
                calls, directions, fb_likes, fb_shares, fb_reach, search_views, 
                google_reviews, average_ratings, review_responses, geo_grid_rankings, 
                online_authority, instagram_followers, instagram_engagement, instagram_reach, 
                monthly_posts, citations, medical_blogs, animation_videos, 
                testimonial_videos, educational_videos, case_studies, 
                website_performance, website_accessibility, website_best_practices, 
                website_seo, keyword_rankings 
            FROM client_performance 
            WHERE client_id = ? AND MONTH(report_creation_date) = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $clientId, $month);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Function to fetch aggregated data for a specific quarter
function fetchDataForQuarter($conn, $clientId, $quarter) {
    // Assuming quarterToMonthIdMap is defined globally or accessible within this function
    global $quarterToMonthIdMap;
    $monthId = $quarterToMonthIdMap[$quarter];

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
    $stmt->bind_param("ii", $clientId, $monthId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly vs Quarterly Report</title>
</head>
<body>
    <!-- Form for selecting month and client_id -->
    <form action="" method="get">
        <label for="client_id">Client ID:</label>
        <input type="text" id="client_id" name="client_id" value="<?php echo htmlspecialchars($client_id); ?>">

        <label for="month">Select Month:</label>
        <select name="month" id="month">
            <option value="">--Select Month--</option>
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?php echo $i; ?>" <?php echo $selectedMonth == $i ? 'selected' : ''; ?>>
                    <?php echo DateTime::createFromFormat('!m', $i)->format('F'); ?>
                </option>
            <?php endfor; ?>
        </select>

        <button type="submit">Compare</button>
    </form>

    <!-- Display the comparison -->
    <?php if ($monthData && $quarterData): ?>
        <h2>Comparison for Month <?php echo DateTime::createFromFormat('!m', $selectedMonth)->format('F'); ?> and Quarter <?php echo $selectedQuarter; ?></h2>
        <!-- Display the data comparison -->
        <!-- Example: -->
        <p>Month Data: <?php echo htmlspecialchars(json_encode($monthData)); ?></p>
        <p>Quarter Data: <?php echo htmlspecialchars(json_encode($quarterData)); ?></p>
        <!-- You can format this section as needed -->
    <?php endif; ?>
</body>
</html>
