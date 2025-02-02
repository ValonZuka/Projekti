<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Return</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5dc; /* Light wood color */
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #d32f2f; /* Red for return action */
        }
        .message {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
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
    $car_id = isset($_POST['car_id']) ? $_POST['car_id'] : null;

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

    // Redirect back to the user's rentals page
    header("Location: user.php");
    exit();
}

$conn->close();
?>

        <div class="btn-container">
            <a href="cars/Cars.php" class="btn btn-primary">Go back to Cars</a>
            <a href="user.php" class="btn btn-primary">Watch your rentals?</a>
        </div>
    </div>
</body>
</html>
