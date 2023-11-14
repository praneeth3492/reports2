<?php
// insert_fields.php
session_start();
if (!isset($_SESSION['manager_id']) || !isset($_SESSION['manager_name'])) {
    header("Location: login.php");
    exit;
}
require_once "config.php";

$client_id = $_POST['client_id'];
$no_of_reviews = $_POST['no_of_reviews'];
$calls = $_POST['calls'];
$directions = $_POST['directions'];
$fb_likes = $_POST['fb_likes'];
$fb_shares = $_POST['fb_shares'];
$fb_reach = $_POST['fb_reach'];
$calendar = $_POST['calendar'];
$sm_posts_date = $_POST['sm_posts_date'];
$blueprint_date = $_POST['blueprint_date'];
$scheduling_date = $_POST['scheduling_date'];
$case_studies_date = $_POST['case_studies_date'];
$videos_date = $_POST['videos_date'];

// Check if the client's data already exists in the database
$sql = "SELECT * FROM client_data WHERE client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update the existing record
    $sql = "UPDATE client_data SET no_of_reviews = ?, calls = ?, directions = ?, fb_likes = ?, fb_shares = ?, fb_reach = ?, calendar = ?, sm_posts_date = ?, blueprint_date = ?, scheduling_date = ?, case_studies_date = ?, videos_date = ? WHERE client_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiissssss",
    $client_id, $no_of_reviews, $calls, $directions, $fb_likes,
    $fb_shares, $fb_reach, $calendar, $sm_posts_date, $blueprint_date,
    $scheduling_date, $case_studies_date, $videos_date
);
} else {
    // Insert a new record
    $sql = "INSERT INTO client_performance (
        client_id, report_creation_date, no_of_reviews, calls, directions, fb_likes,
        fb_shares, fb_reach, calendar, sm_posts_date, blueprint_date,
        scheduling_date, case_studies_date, videos_date
    ) VALUES (
        ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii/*...*/", $client_id, $no_of_reviews, $calls, $directions, /*...*/);
}

$stmt->execute();
$stmt->close();
$conn->close();

header("Location: manager_dashboard.php");
exit;
?>
