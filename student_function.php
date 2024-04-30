<?php
require_once 'db.php';
require_once 'function.php';

//delete
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Start transaction
    $db->beginTransaction();
    
    try {
        // Delete associated fee records first
        deleteFromTable('receipt', ['student_id' => $id]);
        
        // Then delete the student record
        deleteFromTable('studentinfo', ['id' => $id]);
        
        // Commit transaction
        $db->commit();
        
        header('Location: studentsdetails.php?msg=Student and related fees details deleted successfully');
    } catch (Exception $e) {
        // Rollback transaction on error
        $db->rollBack();
        header('Location: studentsdetails.php?error=Failed to delete student and related fees details');
    }
} else {
    echo "Invalid request.";
}