<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Admission Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <?php include ('./header.php'); ?>
    <?php require_once ('function.php'); ?>
    <?php include ('db.php'); ?>

    <?php
    $inquiryData = null;
    $studentData = null;
    $isUpdate = false;
    $isFromInquiry = false;
    $batches = selectFromTable('batch_table', ['name', 'id'], []);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $inquiryData = selectFromTable('inquiryinfo', ['*'], ['id' => $id])[0] ?? null;
        if ($inquiryData) {
            $isFromInquiry = true;
        } else {
            $studentData = selectFromTable('studentinfo', ['*'], ['id' => $id])[0] ?? null;
            $isUpdate = true;
        }
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Admission Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Admission Form</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- General form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Admission Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" id="studentForm">
                                <!-- Include hidden field for ID if updating -->
                                <?php if ($isUpdate): ?>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <?php endif; ?>
                                <!-- Include hidden field for inquiryId if from inquiry -->
                                <?php if ($isFromInquiry): ?>
                                    <input type="hidden" name="inquiryId" value="<?php echo $inquiryData['id']; ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                    <div class="mb-4 h4">Personal Details:</div>
                                    <div class="form-group">
                                        <label for="studentName">Student Name *</label>
                                        <input type="text" class="form-control" id="studentName" name="studentName"
                                            placeholder="Enter Student Name"
                                            value="<?php echo htmlspecialchars($inquiryData['name'] ?? $studentData['name'] ?? ''); ?>" onkeypress="return onlyAlphabets(event)"
                                            required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dob">Date of birth *</label>
                                                <input type="date" class="form-control" id="dob" name="dob"
                                                    value="<?php echo htmlspecialchars($studentData['dob'] ?? ''); ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gender">Gender *</label>
                                                <select class="form-control" id="gender" name="gender" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="Male" <?php echo ($studentData && $studentData['gender'] == 'Male') ? 'selected' : ''; ?>>Male
                                                    </option>
                                                    <option value="Female" <?php echo ($studentData && $studentData['gender'] == 'Female') ? 'selected' : ''; ?>>Female
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mobileNumber">Mobile Number *</label>
                                                <input type="text" class="form-control" id="mobileNumber" maxlength="10"
                                                    minlength="10" name="mobileNumber" placeholder="Mobile Number"
                                                    value="<?php echo htmlspecialchars($inquiryData['mobile_number'] ?? $studentData['mobile_number'] ?? ''); ?>"
                                                    onkeypress="return onlyNumbers(event)" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="reference">References *</label>
                                                <select class="form-control" id="reference" name="reference" required>
                                                    <option value="">Select Reference</option>
                                                    <option value="Neighbors" <?php echo ($studentData && $studentData['reference'] == 'Neighbors') ? 'selected' : ''; ?>>
                                                        Neighbors</option>
                                                    <option value="Friends" <?php echo ($studentData && $studentData['reference'] == 'Friends') ? 'selected' : ''; ?>>
                                                        Friends</option>
                                                    <option value="Relatives" <?php echo ($studentData && $studentData['reference'] == 'Relatives') ? 'selected' : ''; ?>>
                                                        Relatives</option>
                                                    <option value="Parents" <?php echo ($studentData && $studentData['reference'] == 'Parents') ? 'selected' : ''; ?>>
                                                        Parents</option>
                                                    <option value="News Paper" <?php echo ($studentData && $studentData['reference'] == 'News Paper') ? 'selected' : ''; ?>>
                                                        News Paper</option>
                                                    <option value="Facebook" <?php echo ($studentData && $studentData['reference'] == 'Facebook') ? 'selected' : ''; ?>>
                                                        Facebook</option>
                                                    <option value="Google" <?php echo ($studentData && $studentData['reference'] == 'Google') ? 'selected' : ''; ?>>
                                                        Google</option>
                                                    <option value="Former Students" <?php echo ($studentData && $studentData['reference'] == 'Former Students') ? 'selected' : ''; ?>>Former Students</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="professionContainer">
                                            <div class="form-group">
                                                <label for="professionSelect">What Are You? *</label>
                                                <select class="form-control" id="professionSelect" name="profession"
                                                    required>
                                                    <option value="">Select Profession</option>
                                                    <option value="Student" <?php echo ($inquiryData && $inquiryData['profession'] == 'Student') || ($studentData && $studentData['profession'] == 'Student') ? 'selected' : ''; ?>>
                                                        Student
                                                    </option>
                                                    <option value="Housewife" <?php echo ($inquiryData && $inquiryData['profession'] == 'Housewife') || ($studentData && $studentData['profession'] == 'Housewife') ? 'selected' : ''; ?>>
                                                        Housewife
                                                    </option>
                                                    <option value="Working Professional" <?php echo ($inquiryData && $inquiryData['profession'] == 'Working Professional') || ($studentData && $studentData['profession'] == 'Working Professional') ? 'selected' : ''; ?>>
                                                        Working Professional</option>
                                                    <option value="Kids" <?php echo ($inquiryData && $inquiryData['profession'] == 'Kids') || ($studentData && $studentData['profession'] == 'Kids') ? 'selected' : ''; ?>>Kids
                                                    </option>
                                                    <option value="Other" <?php echo ($inquiryData && $inquiryData['profession'] == 'Other') || ($studentData && $studentData['profession'] == 'Other') ? 'selected' : ''; ?>>Other
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" id="otherProfessionInput" style="display: none;">
                                            <div class="form-group">
                                                <label for="otherProfession">Other Profession *</label>
                                                <input type="text" class="form-control" id="otherProfession"
                                                    name="otherProfession" placeholder="Enter profession"
                                                    value="<?php echo htmlspecialchars($studentData['profession'] ?? ''); ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="totalFees">Total Fees *</label>
                                                <input type="number" class="form-control" id="totalFees"
                                                    name="totalFees" placeholder="Enter Total Fees"
                                                    value="<?php echo htmlspecialchars($studentData['total_fees'] ?? ''); ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="discount">Scholarship *</label>
                                                <input type="number" class="form-control" id="discount" name="discount"
                                                    placeholder="Enter Scholarship"
                                                    value="<?php echo htmlspecialchars($studentData['discount'] ?? ''); ?>" oninput="validateDiscount()" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="selectPicker">Batch *</label>
                                                <select class="form-control select2" id="batch" name="batch" required>
                                                    <?php foreach ($batches as $batch): ?>
                                                        <option value="<?php echo htmlspecialchars($batch['id']); ?>" <?php echo (isset($studentData['batch']) && $studentData['batch'] == $batch['id']) ? 'selected' : ''; ?>>
                                                            <?php echo htmlspecialchars($batch['name']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="aadharcardNumber">Aadharcard Number *</label>
                                                <input type="text" class="form-control" id="aadharcardNumber"
                                                    name="aadharcardNumber" placeholder="Enter Aadhar Number"
                                                    maxlength="12" minlength="12"
                                                    value="<?php echo htmlspecialchars($studentData['aadharcard_number'] ?? ''); ?>"
                                                    onkeypress="return onlyNumbers(event)" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="joiningPurpose">Joining Purpose *</label>
                                                <input type="text" class="form-control" id="joiningPurpose"
                                                    name="joiningPurpose" placeholder="Enter Joining Purpose"
                                                    value="<?php echo htmlspecialchars($studentData['joining_purpose'] ?? ''); ?>"
                                                    onkeypress="return onlyAlphabets(event)"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="extraTimeDaily">Extra time you can give daily *</label>
                                                <input type="text" class="form-control" id="extraTimeDaily"
                                                    name="extraTimeDaily" placeholder="Enter Minimum half an hour"
                                                    value="<?php echo htmlspecialchars($studentData['extratime_daily'] ?? ''); ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="address">Address *</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    placeholder="Enter Address"
                                                    value="<?php echo htmlspecialchars($inquiryData['address'] ?? $studentData['address'] ?? ''); ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="gmailId">Gmail ID *</label>
                                                <input type="text" class="form-control" id="gmailId" name="gmailId"
                                                    placeholder="Enter Gmail ID"
                                                    value="<?php echo htmlspecialchars($studentData['gmail_id'] ?? ''); ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="dueDate">Due Date of Fees *</label>
                                                <input type="date" class="form-control" id="dueDate" name="dueDate"
                                                    placeholder="Enter Due Date of Fees"
                                                    value="<?php echo htmlspecialchars($studentData['due_date'] ?? ''); ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 mt-4 h4">Family Details:</div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fatherName">Father Name *</label>
                                                <input type="text" class="form-control" id="fatherName"
                                                    name="fatherName" placeholder="Father Name"
                                                    value="<?php echo htmlspecialchars($studentData['father_name'] ?? ''); ?>"
                                                    onkeypress="return onlyAlphabets(event)"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="motherName">Mother Name *</label>
                                                <input type="text" class="form-control" id="motherName"
                                                    name="motherName" placeholder="Mother Name"
                                                    value="<?php echo htmlspecialchars($studentData['mother_name'] ?? ''); ?>"
                                                    onkeypress="return onlyAlphabets(event)"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fatherNumber">Father Mobile Number *</label>
                                                <input type="text" class="form-control" id="fatherNumber" maxlength="10"
                                                    minlength="10" name="fatherNumber"
                                                    placeholder="Enter Father Mobile Number"
                                                    value="<?php echo htmlspecialchars($studentData['father_number'] ?? ''); ?>"
                                                    onkeypress="return onlyNumbers(event)" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="homeNumber">Home Mobile Number *</label>
                                                <input type="text" class="form-control" id="homeNumber"
                                                    name="homeNumber" placeholder="Enter Home Mobile Number"
                                                    maxlength="10" minlength="10"
                                                    value="<?php echo htmlspecialchars($studentData['home_number'] ?? ''); ?>"
                                                    onkeypress="return onlyNumbers(event)" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fatherProfession">Father Profession *</label>
                                                <select class="form-control" id="fatherProfession"
                                                    name="fatherProfession" required>
                                                    <option value="">Select Profession</option>
                                                    <option value="Work" <?php echo ($studentData && $studentData['father_profession'] == 'Work') ? 'selected' : ''; ?>>Work</option>
                                                    <option value="Job" <?php echo ($studentData && $studentData['father_profession'] == 'Job') ? 'selected' : ''; ?>>
                                                        Job</option>
                                                    <option value="Business" <?php echo ($studentData && $studentData['father_profession'] == 'Business') ? 'selected' : ''; ?>>Business</option>
                                                    <option value="Other" <?php echo ($studentData && $studentData['father_profession'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="workPlaceAddress">Name & Address of Work Place *</label>
                                                <input type="text" class="form-control" id="workPlaceAddress"
                                                    name="workPlaceAddress" placeholder="Work Place Address"
                                                    value="<?php echo htmlspecialchars($studentData['workplace_address'] ?? ''); ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </form>
                            <button class="btn btn-primary"
                                id="submitInquiry"><?php echo $isUpdate ? 'Update' : 'Submit'; ?></button>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: "Select a Batch",
                allowClear: true
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Function to toggle the visibility and class of profession input
            function toggleProfessionInput() {
                var selectedProfession = $('#professionSelect').val();
                if (selectedProfession === 'Other') {
                    $('#otherProfessionInput').show();
                    $('#professionContainer').removeClass('col-md-6').addClass('col-md-3');
                } else {
                    $('#otherProfessionInput').hide();
                    $('#professionContainer').removeClass('col-md-3').addClass('col-md-6');
                }
            }

            // Initialize the profession input visibility on page load
            toggleProfessionInput();

            // Set up event listener for changes on the profession select box
            $('#professionSelect').change(function () {
                toggleProfessionInput();
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#submitInquiry').click(function () {
                var formData = $('form').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'studentrequest.php',  // Ensure this URL is correct and accessible
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        alert(response.message);
                        if (response.success) {
                            window.location.href = 'studentsdetails.php';
                        } else {
                            // alert("Error submitting details: " + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        // alert("Please Fill Up the Form Completely!");
                        // console.log("An error occurred: " + xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        // Set the maximum date of birth to prevent future dates and limit to 5 years ago
        $(document).ready(function () {
            var today = new Date();
            var maxDate = new Date(today.getFullYear() - 5, today.getMonth(), today.getDate()).toISOString().split('T')[0];
            $('#dob').attr('max', maxDate);

            // Set the min and max attributes for the due date
            var minDueDate = today.toISOString().split('T')[0];
            var maxDueDate = new Date(today.setMonth(today.getMonth() + 2)).toISOString().split('T')[0];
            $('#dueDate').attr('min', minDueDate);
            $('#dueDate').attr('max', maxDueDate);
        });

        function onlyNumbers(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                evt.preventDefault();
                return false;
            }
            return true;
        }

        function onlyAlphabets(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (!((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 32)) {
                evt.preventDefault();
                // alert('Please enter only alphabets.');
                return false;
            }
            return true;
        }

        function validateDiscount() {
            var totalFees = document.getElementById('totalFees').value;
            var discount = document.getElementById('discount').value;

            if (parseInt(discount) > parseInt(totalFees)) {
                // alert('Scholarship cannot be greater than Total Fees.');
                document.getElementById('discount').value = totalFees; // Set discount to totalFees or clear it
            }
        }
    </script>

    <?php include ('./footer.php'); ?>