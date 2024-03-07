<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Assuming $userData is an associative array with user information
    $isValidLogin = password_verify($password, $userData['password']);
    
    if ($isValidLogin) {
        // Return success message to the client
        echo json_encode(['success' => true]);
    } else {
        // Return failure message to the client
        echo json_encode(['success' => false]);
    }
} else {
    // Redirect or handle unauthorized access
    header("Location: index.html");
    exit();
}
?>
