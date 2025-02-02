<?php
session_start();
require_once 'db/conn.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Fetch rentals for the logged-in user
$sql = "SELECT rentals.id AS rental_id, rentals.stage_id, rentals.car_id, rentals.rental_date, 
        TIMESTAMPDIFF(HOUR, rentals.rental_date, NOW()) AS hours_rented,
        TIMESTAMPDIFF(MINUTE, rentals.rental_date, NOW()) % 60 AS minutes_rented,
        TIMESTAMPDIFF(SECOND, rentals.rental_date, NOW()) % 60 AS seconds_rented,
        stages.Stage, cars.make, cars.model
        FROM rentals
        LEFT JOIN stages ON rentals.stage_id = stages.id
        LEFT JOIN cars ON rentals.car_id = cars.id
        WHERE rentals.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Rentals</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .rental-summary {
            position: absolute;
            bottom: 30px;
            right: 30px;
            background-color: darkorange;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .rental-summary-table {
            width: 100%;
            border-collapse: collapse;
        }
        .rental-summary-table th, .rental-summary-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .rental-summary-table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Qirate Tuaja</h1>

        <?php if ($result->num_rows > 0): ?>
        
        <!-- Stage Rentals Section -->
        <h2>Rentals of Stages</h2>
        <table class="rentals-table">
            <thead>
                <tr>
                    <th>Rental ID</th>
                    <th>Stage</th>
                    <th>Rental Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php if ($row['stage_id'] !== null): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['rental_id']) ?></td>
                        <td><?= htmlspecialchars($row['Stage']) ?></td>
                        <td><?= htmlspecialchars($row['rental_date']) ?></td>
                        <td>
                            <form action="unrent-stage.php" method="post">
                                <input type="hidden" name="stage_id" value="<?= $row['stage_id'] ?>">
                                <input type="hidden" name="rental_id" value="<?= $row['rental_id'] ?>">
                                <button type="submit" class="unrent-btn">Un-Rent</button>
                            </form>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Car Rentals Section -->
        <h2>Rentals of Cars</h2>
        <table class="rentals-table">
            <thead>
                <tr>
                    <th>Rental ID</th>
                    <th>Car</th>
                    <th>Rental Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $result->data_seek(0); // Reset result pointer to loop through again
                while ($row = $result->fetch_assoc()): ?>
                    <?php if ($row['car_id'] !== null): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['rental_id']) ?></td>
                        <td><?= htmlspecialchars($row['make']) ?> <?= htmlspecialchars($row['model']) ?></td>
                        <td><?= htmlspecialchars($row['rental_date']) ?></td>
                        <td>
                            <form action="unrent-car.php" method="post">
                                <input type="hidden" name="car_id" value="<?= $row['car_id'] ?>">
                                <input type="hidden" name="rental_id" value="<?= $row['rental_id'] ?>">
                                <button type="submit" class="unrent-btn">Un-Rent</button>
                            </form>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Summary Table for Rental Time -->
        <div class="rental-summary">
            <h2>Permbledhja e Qerase</h2>
            <table class="rental-summary-table">
                <thead>
                    <tr>
                        <th>Stage / Car</th>
                        <th>Rental Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result->data_seek(0); // Reset result pointer for rental time summary
                    while ($row = $result->fetch_assoc()): ?>
                        <?php if ($row['stage_id'] !== null): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['Stage']) ?></td>
                            <td><?= htmlspecialchars($row['hours_rented']) ?>h <?= htmlspecialchars($row['minutes_rented']) ?>m <?= htmlspecialchars($row['seconds_rented']) ?>s</td>
                        </tr>
                        <?php elseif ($row['car_id'] !== null): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['make']) ?> <?= htmlspecialchars($row['model']) ?></td>
                            <td><?= htmlspecialchars($row['hours_rented']) ?>h <?= htmlspecialchars($row['minutes_rented']) ?>m <?= htmlspecialchars($row['seconds_rented']) ?>s</td>
                        </tr>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <?php else: ?>
            <p>You have no rentals yet.</p>
        <?php endif; ?>

        <a href="logout.php" class="logout-btn">Do you want to log out?</a> <br>
        <a href="index.php" class="homepage">Back to Home Page</a>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
