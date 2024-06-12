<?php
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract POST data
    $data = [
        'name' => $_POST['name'] ?? '',
        'reference' => $_POST['reference'] ?? '',
        'mobile_number' => $_POST['mobile_number'] ?? '',
        'address' => $_POST['address'] ?? '',
        'time_of_classes' => $_POST['time_of_classes'] ?? '',
        'profession' => $_POST['profession'] ?? 'Other',
        'date' => $_POST['inquire_date'] ?? ''
    ];

    // Check for empty required fields
    if (in_array('', $data, true)) {
        ajaxResponse(false, [], 'All fields are required.');
        exit;
    }

    // Insert data into the database
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
