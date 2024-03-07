<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    // Save user information to Discord channel using webhook
    $webhookURL = "https://discord.com/api/webhooks/1214681961323565067/iAHsNoCSrBAtxHCwBryAPlG2VicENLRlJOgX2U2wNMotI0C8ei95JObDTGUqF8ZrrWW2";
    $message = "New user signup:\nEmail: $email\nUsername: $username\nPassword: $password";
    
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
    
    // Return success message to the client
    echo json_encode(['success' => true]);
} else {
    // Redirect or handle unauthorized access
    header("Location: index.html");
    exit();
}
?>
