<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['lang']) && in_array($data['lang'], ['tr', 'en'])) {
        $_SESSION['lang'] = $data['lang'];
        
        $lang_file = __DIR__ . '/../lang/' . $_SESSION['lang'] . '.php';
        if (file_exists($lang_file)) {
            require $lang_file;
        } else {
            require __DIR__ . '/../lang/en.php'; 
        }

        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'lang' => $_SESSION['lang'], 'translations' => $lang]);
        exit;
    }
}

header('Content-Type: application/json');
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
?>