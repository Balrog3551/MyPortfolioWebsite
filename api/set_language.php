<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['lang']) && in_array($data['lang'], ['tr', 'en'])) {
        $_SESSION['lang'] = $data['lang'];
        
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'lang' => $_SESSION['lang']]);
        exit;
    }
}

header('Content-Type: application/json');
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
?>