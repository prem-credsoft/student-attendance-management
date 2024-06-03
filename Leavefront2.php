<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leaves</title>
    <!-- Theme style -->
    <link rel="stylesheet" href="./asset/css/adminlte.min.css">
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 250vh;
            max-width: 1000px;
            margin: 0 auto;
        }

        .form-control {
            width: 100%;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .card {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
<?php
// Database connection setup
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $host = "localhost";
    $dbname = "student-attendance-management";
    $user = "root";
    $password = "";
} else {
    $host = "localhost";
    $dbname = "credsoft_rieportal";
    $user = "credsoft_rieportal";
    $password = "Balaji@1435";
}

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function selectFromTable($table, $columns, $conditions) {
    global $db;
    $cols = implode(", ", $columns);
    $query = "SELECT $cols FROM $table";
    if (!empty($conditions)) {
        $query .= " WHERE ";
        $clauses = [];
        foreach ($conditions as $key => $value) {
            $clauses[] = "$key = :$key";
        }
        $query .= implode(" AND ", $clauses);
    }
    $stmt = $db->prepare($query);
    foreach ($conditions as $key => &$value) {
        $stmt->bindParam(":$key", $value);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$editMode = false;
$studentId = '';
$Reason = '';
$startDate = '';
$endDate = '';

if (isset($_GET['id'])) {
    $editMode = true;
    $leaveDetails = selectFromTable('attendance', ['student_id', 'Reason', 'date', 'date'], ['id' => $_GET['id']]);
    if ($leaveDetails) {
        $studentId = $leaveDetails[0]['student_id'];
        $Reason = $leaveDetails[0]['Reason'];
        $startDate = $leaveDetails[0]['date'];
        $endDate = $leaveDetails[0]['date'];
    }
}

$students = selectFromTable('studentinfo', ['id', 'name'], []);
if (!$students) {
    die("Could not retrieve data from the database.");
}
?>

<div class="center-container">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- General form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Leaves Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="inquiryForm" method="POST" action="leavesrequest.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="selectPicker">Student Detail</label>
                                    <select class="form-control" id="selectPicker" name="student_id">
                                        <?php foreach ($students as $student): ?>
                                            <option value="<?php echo htmlspecialchars($student['id']); ?>"
                                                <?php echo $studentId == $student['id'] ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($student['name']); ?>,
                                                RIE - <?php echo htmlspecialchars($student['id']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Reason">Reason</label>
                                    <input type="text" class="form-control" id="Reason" name="Reason" value="<?php echo htmlspecialchars($Reason); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars($startDate); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="batch">Batch</label>
                                    <select class="form-control" id="batch" name="batch_id">
                                        <?php
                                        $batches = selectFromTable('batch_table', ['id', 'name'], []);
                                        foreach ($batches as $batch):
                                            $selected = (isset($studentData['batch_id']) && $studentData['batch_id'] == $batch['id']) ? 'selected' : '';
                                            echo "<option value='" . htmlspecialchars($batch['id']) . "' $selected>" . htmlspecialchars($batch['name']) . "</option>";
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <!-- Hidden input for status -->
                                <input type="hidden" name="status" value="2">
                            </div>
                            <!-- Add a hidden input to handle the ID when updating -->
                            <?php if ($editMode): ?>
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <?php endif; ?>
                            <button class="btn btn-primary" type="submit"><?php echo $editMode ? 'Update' : 'Submit'; ?></button>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>

