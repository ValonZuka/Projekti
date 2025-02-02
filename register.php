<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
     // Include database connection
    require_once 'db/conn.php';

 
        // Hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        // Check if username already exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error_message = "Email already exists!";
        } else {
            // Insert new user into database
            $sql = "INSERT INTO users (name,email, password_hash) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name,$email, $password_hash);
            
            if ($stmt->execute()) {
                $user_id = $conn->insert_id;
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $name;
                $_SESSION['user_id'] = $user_id;  // Store user_id in session

                header('Location: dashboard.php'); 
                exit();
            } else {
                $error_message = "Registration failed. Please try again!";
            }
        }
    
}
?>