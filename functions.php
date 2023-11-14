<?php
require_once 'config.php';

function getClients() {
  global $conn;
  $sql = "SELECT * FROM clients";
  $result = $conn->query($sql);
  return $result;
}

function getManagerClients($manager_id) {
  global $conn;
  $sql = "SELECT clients.* FROM clients JOIN client_manager_relation ON clients.id = client_manager_relation.client_id WHERE client_manager_relation.manager_id = $manager_id";
  $result = $conn->query($sql);
  return $result;
}

function getClientPerformance($client_id) {
  global $conn;
  $sql = "SELECT * FROM performance WHERE client_id = $client_id";
  $result = $conn->query($sql);
  return $result;
}

function updateClientPerformance($client_id, $fb_posts, $reports_sent, $scheduled, $blueprint, $date) {
  global $conn;
  $sql = "INSERT INTO performance (client_id, fb_posts, reports_sent, scheduled, blueprint, date) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iiiiis", $client_id, $fb_posts, $reports_sent, $scheduled, $blueprint, $date);
  $stmt->execute();
}

function checkLogin($username, $password) {
  global $conn;
  $sql = "SELECT * FROM managers WHERE username = ? AND password = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result;
}

function getManagerById($manager_id) {
  global $conn;
  $sql = "SELECT * FROM managers WHERE id = $manager_id";
  $result = $conn->query($sql);
  return $result;
}
?>
