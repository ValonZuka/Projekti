<?php
session_start();
// Include database connection
require_once 'db/conn.php';
// Query to fetch stage details
$sql = 'SELECT * FROM stages WHERE available = 1';

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valon & Rijad Studios</title>
    <link rel="stylesheet" href="stagesstyle.css">

</head>

<body>
    <div style="">
        <p
            style="text-align: left;position:absolute; margin-left:25px;padding-left: 23px;padding-right: 23px; background-color: antiquewhite; padding-top: 10px;padding-bottom: 10px; border-radius: 20px;">
            <a href="index.php" style="color: darkgrey; text-decoration: none;">go back</a></p>
    </div>
    <div class="content">
        <h1>Welcome to V&R Studios</h1>


        <p>
             loTwelve purpose-built sound stages, each with wooden perms, catwalks, and silent HVAC systems.
            Ranging in size from 10,000-38,500 square feet and equipped with 4000A 3ph 120/208v, the stages
            are designed to meet the demands of today and tomorrow’s content creators.
        </p>


        <h3>Experience the Future of Content Creation</h3>


        <?php if ($result->num_rows > 0): ?>
            <table class="stage-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Stage</th>
                        <th>SQ/FT</th>
                        <th>Dimensions</th>
                        <th>Grid Height</th>
                        <th>Power</th>
                        <th>Office Support</th>
                        <th>Specifications</th>
                            <th>Rent</th>

                        <!-- <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?> -->
                            <!-- <?php endif; ?> -->

                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['Stage']) ?></td>
                            <td><?= htmlspecialchars($row['SQ_FT']) ?></td>
                            <td><?= htmlspecialchars($row['Dimensions']) ?></td>
                            <td><?= htmlspecialchars($row['Grid_Height']) ?></td>
                            <td><?= htmlspecialchars($row['Power']) ?></td>
                            <td><?= htmlspecialchars($row['Office_Support']) ?></td>
                            <td><?= htmlspecialchars($row['Specifications']) ?></td>
                             <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                                <td>
                                    <form action="rent_stage.php" method="post">
                                        <input type="hidden" name="stage_id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="rent-button">Rent</button>
                                    </form>
                                </td>

                            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No available stages.</p>
        <?php endif; ?>
        </div>


    <img src="projekt.jpg" alt="Tyler Perry Studios" class="background-image">
    <div style="background-color: grey; padding-top: 30px; padding-bottom: 10px; ">
        <h3>
            <p style="text-align: left; padding-left: 30px;color: darkseagreen; font-family:Cursive;">Instrested , email us at <a
                    href="mailto:loni11toni@gmail.com" style="color: darkseagreen; font-family:Cursive;">@vrstudios.com </a>!!</p>
        </h3>
    </div>
</body>

</html>