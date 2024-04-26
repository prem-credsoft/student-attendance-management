<?php
require_once 'function.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['studentName'])) {
    // Process form data
    $student_name = $_POST['studentName'];
    $batch = $_POST['batch'];
    $father_name = $_POST['fatherName'];
    $mother_name = $_POST['motherName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile_number = $_POST['mobileNumber'];
    $fee_status = $_POST['feeStatus'];
    $profession = $_POST['profession'];
    $address = $_POST['address'];

    // Insert data into the database
    $data = [
        'student_name' => $_POST['studentName'],
        'batch' => $_POST['batch'],
        'father_name' => $_POST['fatherName'],
        'mother_name' => $_POST['motherName'],
        'dob' => $_POST['dob'],
        'gender' => $_POST['gender'],
        'mobile_number' => $_POST['mobileNumber'],
        'fee_status' => $_POST['feeStatus'],
        'profession' => $_POST['profession'],
        'address' => $_POST['address'],
        'admission_time' => date('Y-m-d'),
    ];

    $inserted_id = insertIntoTable('studentinfo', $data);

    if ($inserted_id) {
        // Send back a success response
        ajaxResponse(true, ['inserted_id' => $inserted_id], 'Enquiry submitted successfully.');
    } else {
        // Send back an error response
        ajaxResponse(false, [], 'Failed to submit enquiry.');
    }
} else {
    // If it's not an AJAX request, return an error
    ajaxResponse(false, [], 'Invalid request.');
}
?>
