<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
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
            color: #2e7d32; /* Dark green */
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
        .gif-container {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        require_once 'db/conn.php';
        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];
            $car_id = $_POST['car_id'];
            $sql = "SELECT available FROM cars WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $car_id);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($available);
            $stmt->fetch();
            if ($available == 0) {
                echo '<p class="message" style="color: red;">Sorry, this car is already rented.</p>';
            } else {
                $sql = "INSERT INTO rentals (user_id, car_id, rental_date) VALUES (?, ?, NOW())";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $user_id, $car_id);
                if ($stmt->execute()) {
                    $update_sql = "UPDATE cars SET available = 0 WHERE id = ?";
                    $update_stmt = $conn->prepare($update_sql);
                    $update_stmt->bind_param("i", $car_id);
                    $update_stmt->execute();
                    $update_stmt->close();
                    echo '<p class="message" style="color: #28a745;">Car rented successfully!</p>';
                    echo '<div class="gif-container" id="celebrationGif">
                            <img src="https://media.giphy.com/media/3o7abldj0b3rxrZUxW/giphy.gif" alt="Celebration" width="100%">
                          </div>';
                } else {
                    echo "Error renting car: " . htmlspecialchars($stmt->error);
                }
            }
            $stmt->close();
        }
        $conn->close();
        ?>
        <div class="btn-container">
            <a href="cars/Cars.php" class="btn btn-primary">Go back to Cars</a>
            <a href="user.php" class="btn btn-primary">Watch your rentals?</a>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var gifContainer = document.getElementById("celebrationGif");
            if (gifContainer) {
                gifContainer.style.display = "block";
            }
        });
    </script>
</body>
</html>
