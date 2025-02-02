<?php 
session_start();
require_once 'db/conn.php';

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Check if the user role is not admin
if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin') {
    header("Location: user.php");
    exit();
}

// Fetch available stages (where available = TRUE)
$availableResult = $conn->query("SELECT * FROM stages WHERE available = 1");

// Fetch rented stages by joining with the rentals table
$rentedResult = $conn->query("SELECT s.*, u.name AS user_name 
                              FROM stages s 
                              JOIN rentals r ON s.id = r.stage_id 
                              JOIN users u ON r.user_id = u.id 
                              WHERE s.available = FALSE");

// Fetch available cars
$availableCarsResult = $conn->query("SELECT * FROM cars WHERE available = TRUE");

// Fetch rented cars by joining with the rentals table
$rentedCarsResult = $conn->query("SELECT c.*, u.name AS user_name 
                                  FROM cars c 
                                  JOIN rentals r ON c.id = r.car_id 
                                  JOIN users u ON r.user_id = u.id 
                                  WHERE c.available = FALSE");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dash.css"> <!-- Link to the updated CSS -->
</head>
<body>
    <header>
        <h2>Admin Dashboard</h2>
    </header>

    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <!-- Stage Management Section -->
        <h3>Add New Stage</h3>
        <?php if (isset($success_message)) echo "<p style='color:green;'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>

        <form method="POST">
            <label>Stage Number:</label>
            <input type="number" name="stage" required><br>

            <label>Square Feet:</label>
            <input type="number" name="sq_ft" required><br>

            <label>Dimensions:</label>
            <input type="text" name="dimensions" required><br>

            <label>Grid Height:</label>
            <input type="text" name="grid_height"><br>

            <label>Power:</label>
            <input type="text" name="power" required><br>

            <label>Office Support:</label>
            <input type="text" name="office_support"><br>

            <label>Specifications:</label>
            <input type="text" name="specifications" required><br>

            <button type="submit">Add Stage</button>
        </form>

        <h3>Available Stages</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Stage</th>
                <th>SQ/FT</th>
                <th>Dimensions</th>
                <th>Grid Height</th>
                <th>Power</th>
                <th>Office Support</th>
                <th>Specifications</th>
            </tr>
            <?php while ($row = $availableResult->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['Stage']) ?></td>
                <td><?= htmlspecialchars($row['SQ_FT']) ?></td>
                <td><?= htmlspecialchars($row['Dimensions']) ?></td>
                <td><?= htmlspecialchars($row['Grid_Height']) ?></td>
                <td><?= htmlspecialchars($row['Power']) ?></td>
                <td><?= htmlspecialchars($row['Office_Support']) ?></td>
                <td><?= htmlspecialchars($row['Specifications']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h3>Rented Stages</h3>
        <div class="rented-stages">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Stage</th>
                    <th>User</th>
                    <th>SQ/FT</th>
                    <th>Dimensions</th>
                    <th>Grid Height</th>
                    <th>Power</th>
                    <th>Office Support</th>
                    <th>Specifications</th>
                </tr>
                <?php while ($row = $rentedResult->fetch_assoc()): ?>
                <tr style="background-color: #f8d7da;"> <!-- Light red background for rented stages -->
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['Stage']) ?></td>
                    <td><?= htmlspecialchars($row['user_name']) ?></td>
                    <td><?= htmlspecialchars($row['SQ_FT']) ?></td>
                    <td><?= htmlspecialchars($row['Dimensions']) ?></td>
                    <td><?= htmlspecialchars($row['Grid_Height']) ?></td>
                    <td><?= htmlspecialchars($row['Power']) ?></td>
                    <td><?= htmlspecialchars($row['Office_Support']) ?></td>
                    <td><?= htmlspecialchars($row['Specifications']) ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <!-- Car Management Section -->
        <h3>Available Cars</h3>
        <table>
            <tr>
                <th>Car ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Image</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $availableCarsResult->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['make']) ?></td>
                <td><?= htmlspecialchars($row['model']) ?></td>
                <td><?= htmlspecialchars($row['year']) ?></td>
                <td><img src="<?= htmlspecialchars($row['image']) ?>" alt="Car Image" style="width: 100px;"></td>
                <td><?= $row['available'] ? 'Available' : 'Not Available' ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h3>Rented Cars</h3>
        <table>
            <tr>
                <th>Car ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>User</th>
                <th>Year</th>
                <th>Image</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $rentedCarsResult->fetch_assoc()): ?>
            <tr style="background-color: #f8d7da;"> <!-- Light red background for rented cars -->
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['make']) ?></td>
                <td><?= htmlspecialchars($row['model']) ?></td>
                <td><?= htmlspecialchars($row['user_name']) ?></td>
                <td><?= htmlspecialchars($row['year']) ?></td>
                <td><img src="<?= htmlspecialchars($row['image']) ?>" alt="Car Image" style="width: 100px;"></td>
                <td>Rented</td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>
