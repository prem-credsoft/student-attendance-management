<?php
// Include database connection
include('db.php');

// Check if the 'id' GET variable is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the batch data from the database
    $query = $db->prepare("SELECT * FROM batch_table WHERE id = ?");
    $query->execute([$id]);
    $batch = $query->fetch(PDO::FETCH_ASSOC);

    if (!$batch) {
        die('Batch not found!');
    }

    // Check if the form data is posted
    if (isset($_POST['id'], $_POST['name'], $_POST['facultyName'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $facultyName = $_POST['facultyName'];

        // Prepare and execute the update statement
        $updateQuery = $db->prepare("UPDATE batch_table SET name = ?, FacultyName = ? WHERE id = ?");
        $result = $updateQuery->execute([$name, $facultyName, $id]);

        if ($result) {
            echo "Batch updated successfully.";
        } else {
            echo "Error updating batch.";
        }

        // Redirect back to the batch list or another appropriate page
        header('Location: batch.php');
        exit();
    }
} else {
    die('ID not provided!');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Batch</title>
    <!-- Ensure to include CSS links for consistent styling -->
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css"> <!-- Example path -->
    <link rel="stylesheet" href="path/to/your/css/custom.css"> <!-- Your custom styles if any -->
</head>
<body>
<?php
include('./header.php');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edit Batch Details</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Batch</h3>
                        </div>
                        <form id="updateBatchForm" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Batch Name:</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($batch['name']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="facultyName">Faculty Name:</label>
                                    <input type="text" class="form-control" name="facultyName" value="<?php echo htmlspecialchars($batch['FacultyName']); ?>" required>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $batch['id']; ?>">
                            </div>
                            <div class="card-footer">   
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to update this batch?')">Update Batch</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('./footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#updateBatchForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission
        var confirmUpdate = confirm("Are you sure you want to update this batch?"); // Confirmation dialog
        if (confirmUpdate) { // Check if the user confirmed the update
            $.ajax({
                type: 'POST',
                url: 'editbatch.php?id=<?php echo $batch['id']; ?>',
                data: $(this).serialize(),
                success: function(response) {
                    alert(response); // Display response message
                    window.location.href = 'batch.php'; // Redirect to batch list
                },
                error: function() {
                    alert('Error updating batch. Please try again.');
                }
            });
        }
    });
});
</script>
</body>     
</html>
