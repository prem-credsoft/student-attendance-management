<?php
require_once 'function.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    // Process form data
    $name = $_POST['name'];
    $reference = $_POST['reference'];
    $mobile_number = $_POST['mobile_number'];
    $address = $_POST['address'];
    $time_of_classes = $_POST['time_of_classes'];
    $profession = $_POST['profession'];

    // Insert data into the database
    $data = [
        'name' => $name,
        'reference' => $reference,
        'mobile_number' => $mobile_number,
        'address' => $address,
        'time_of_classes' => $time_of_classes,
        'profession' => $profession,
        'date' => date('Y-m-d')
    ];

    $inserted_id = insertIntoTable('inquiryinfo', $data);

    if ($inserted_id) {
        // Send back a success response
        ajaxResponse(true, ['inserted_id' => $inserted_id], 'Inquiry submitted successfully.');
    } else {
        // Send back an error response
        ajaxResponse(false, [], 'Failed to submit Inquiry.');
    }
} else {
    // If it's not an AJAX request, return an error
    ajaxResponse(false, [], 'Invalid request.');
}
?>
