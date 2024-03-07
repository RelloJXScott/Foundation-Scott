<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    // Save user information to Discord channel using webhook
    $webhookURL = "YOUR_DISCORD_WEBHOOK_URL";
    $message = "New user signup:\nEmail: $email\nUsername: $username";
    
    $data = array('content' => $message);
    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json",
            'method' => 'POST',
            'content' => json_encode($data),
        ),
    );
    $context = stream_context_create($options);
    file_get_contents($webhookURL, false, $context);
    
    // Additional logic to save user data to your database or file
    // For example, you can use PDO to interact with a MySQL database
    // Insert the $email, $username, and $password into your users table
    
    // Return success message to the client
    echo json_encode(['success' => true]);
} else {
    // Redirect or handle unauthorized access
    header("Location: index.php");
    exit();
}
?>