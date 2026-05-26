<?php
/**
 * Studio Arche — Remote JS Error Logger
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $log = "[" . date('Y-m-d H:i:s') . "] JS ERROR:\n";
        $log .= "Message: " . $data['message'] . "\n";
        $log .= "Source: " . $data['source'] . "\n";
        $log .= "Line: " . $data['lineno'] . " | Col: " . $data['colno'] . "\n";
        $log .= "Stack: " . $data['error'] . "\n";
        $log .= "--------------------------------------------------\n";
        file_put_contents('C:\Users\Aadinadh S M\Local Sites\studio-arche\app\public\wp-content\uploads\error_log.txt', $log, FILE_APPEND);
    }
    echo "logged";
    exit;
}
