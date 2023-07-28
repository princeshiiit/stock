<?php
// Function to send a message to the serial port
function sendToSerialPort($port, $message) {
    // Open the serial port for writing
    $fp = fopen($port, 'w');

    if (!$fp) {
        return "Error opening the serial port.";
    }

    // Write the message to the serial port
    fwrite($fp, $message);

    // Close the serial port
    fclose($fp);

    return "Message sent successfully.";
}

// Check if the request is an AJAX POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $messageToSend = $_POST['message'];
    echo "<script>console.log('HEYYYYYY')</script>";

    // Replace 'COM9' with the actual COM port name on Windows
    $comPort = '/dev/ttyp1';

    // Send the message to the serial port
    $result = sendToSerialPort($comPort, $messageToSend);

    // Prepare the response as JSON
    $response = array('status' => 'success', 'message' => $result);
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
