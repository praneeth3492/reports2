<!-- edit_fields.php -->
<?php
session_start();
if (!isset($_SESSION['manager_id']) || !isset($_SESSION['manager_name'])) {
    header("Location: login.php");
    exit;
}
require_once "config.php";

$client_id = $_GET['client_id'];

// Fetch the client's data from the database
$sql = "SELECT * FROM client_performance WHERE client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();
$client_data = $result->fetch_assoc();
$stmt->close();

?>
<!-- ... -->
<!-- Add the necessary input fields for the client's data here with the pre-filled values -->
<!-- Number of Reviews -->
<input type="number" class="form-control" id="no_of_reviews" name="no_of_reviews" value="<?php echo isset($client_data['no_of_reviews']) ? $client_data['no_of_reviews'] : ''; ?>">

<!-- Calls -->
<input type="number" class="form-control" id="calls" name="calls" value="<?php echo isset($client_data['calls']) ? $client_data['calls'] : ''; ?>">

<!-- Directions -->
<input type="number" class="form-control" id="directions" name="directions" value="<?php echo isset($client_data['directions']) ? $client_data['directions'] : ''; ?>">

<!-- Facebook Likes -->
<input type="number" class="form-control" id="fb_likes" name="fb_likes" value="<?php echo isset($client_data['fb_likes']) ? $client_data['fb_likes'] : ''; ?>">

<!-- Facebook Shares -->
<input type="number" class="form-control" id="fb_shares" name="fb_shares" value="<?php echo isset($client_data['fb_shares']) ? $client_data['fb_shares'] : ''; ?>">

<!-- Facebook Reach -->
<input type="number" class="form-control" id="fb_reach" name="fb_reach" value="<?php echo isset($client_data['fb_reach']) ? $client_data['fb_reach'] : ''; ?>">

<!-- Calendar -->
<input type="date" class="form-control" id="calendar" name="calendar" value="<?php echo isset($client_data['calendar']) ? $client_data['calendar'] : ''; ?>">

<!-- Social Media Posts Date -->
<input type="date" class="form-control" id="sm_posts_date" name="sm_posts_date" value="<?php echo isset($client_data['sm_posts_date']) ? $client_data['sm_posts_date'] : ''; ?>">

<!-- Blueprint Date -->
<input type="date" class="form-control" id="blueprint_date" name="blueprint_date" value="<?php echo isset($client_data['blueprint_date']) ? $client_data['blueprint_date'] : ''; ?>">

<!-- Scheduling Date -->
<input type="date" class="form-control" id="scheduling_date" name="scheduling_date" value="<?php echo isset($client_data['scheduling_date']) ? $client_data['scheduling_date'] : ''; ?>">

<!-- Case Studies Date -->
<input type="date" class="form-control" id="case_studies_date" name="case_studies_date" value="<?php echo isset($client_data['case_studies_date']) ? $client_data['case_studies_date'] : ''; ?>">

<!-- Videos Date -->
<input type="date" class="form-control" id="videos_date" name="videos_date" value="<?php echo isset($client_data['videos_date']) ? $client_data['videos_date'] : ''; ?>">

<!-- ... -->
