<?php
session_start();
require_once 'db/conn.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rental_id = $_POST['rental_id'];
    $stage_id = isset($_POST['stage_id']) ? $_POST['stage_id'] : null;
    $car_id = isset($_POST['car_id']) ? $_POST['car_id'] : null;

    // Handle stage unrent
    if ($stage_id) {
        // Update the stage to make it available again
        $sql = "UPDATE stages SET available = 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $stage_id);
        $stmt->execute();
        $stmt->close();
    }

    // Handle car unrent
    if ($car_id) {
        // Update the car to make it available again
        $sql = "UPDATE cars SET available = 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $car_id);
        $stmt->execute();
        $stmt->close();
    }

    // Optionally, remove the rental record (or keep it for history tracking)
    $sql = "DELETE FROM rentals WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rental_id);
    $stmt->execute();
    $stmt->close();

    // Redirect back to rentals page
    header("Location: user.php");
    exit();
}

$conn->close();
?>
