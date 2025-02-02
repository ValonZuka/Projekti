<!-- <?php
session_start();
// Check if admin is logged in
if (isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] === true) {
    header("Location: /Projekti/dashboard.php");
    exit();

}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));

    // Include database connection and queries
    require_once 'db/conn.php';
    // require_once 'db/queries.php';

    // Query to check if the email exists in the users table
    $sql = "SELECT * FROM users WHERE email = ?";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();


        // Verify password (assuming it's hashed in the database)
        if (password_verify($password, $user['password_hash'])) {
            // Store session data for the logged-in user
            $_SESSION['user_logged_in'] = true;   // Use this for general login session (not only admin)
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];  // Assuming 'role' is stored in the users table

            // Redirect based on role
            if ($_SESSION['role'] == 'admin') {
                // Redirect to admin dashboard
                header('Location: dashboard.php');
                exit();

            } else {
                // Redirect to user-specific page
                header('Location: user.php');
                exit();
            }
            
        } else {
            $error_message = "Invalid email or password!";
        }
    } else {
        $error_message = "No such admin found! ";
    }
}
?> -->

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/2efc16a506.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
    <title>Login Form | pbc-webdev</title>
</head>

<body>
    <h4><a href="index.php"
            style="font-size: 20px; text-decoration: none; color: white;padding: 4px; border: solid 3px; border-radius: 30px;margin: 40px;">Go
            Back</a></h4>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="register.php" method="POST">
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger show"><?= $error_message ?></div>
                <?php endif; ?>
                <h1>Regjistrohu Me</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <hr>
                <h1>Ose</h1>
                <hr>
                <span>Mbush hapsirat per tu Regjistruar!</span>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
           
            <form method="POST" action="login.php">
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger show"><?= $error_message ?></div>
            <?php endif; ?>
                <h1>Kycy Me </h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <hr>
                <h1>OSE</h1>
                <hr>
                <span>Ju lutem Kyquni per tu bere log in</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Jep te dhenat personale per te perdorur te gjitha veqorite</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello</h1>
                    <p>Regjistrohu per te perdorur te gjitha veqorite e faqes!</p>
                    <button class="hidden" id="register" type="submit">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>

</html>