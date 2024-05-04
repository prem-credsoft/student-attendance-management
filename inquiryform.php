<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Inquiry Form</title>
</head>

<?php include ('./header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inquiry Form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Inquiry Form</li>
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
                            <h3 class="card-title">Inquiry Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="inquiryForm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name" value="" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile_number">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile_number"
                                                name="mobile_number" placeholder="Enter Mobile Number" value=""
                                                maxlength="10" required onkeypress="return onlyNumbers(event)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profession">Profession</label>
                                            <select class="form-control" id="profession" name="profession" required>
                                                <option value="Student">Student</option>
                                                <option value="Housewife">Housewife</option>
                                                <option value="Working Professional">Working Professional</option>
                                                <option value="Kids">Kids</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reference">Reference</label>
                                    <input type="text" class="form-control" id="reference" name="reference"
                                        placeholder="Enter Reference" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="time_of_classes">Preference Time of Classes</label>
                                    <select class="form-control" id="time_of_classes" name="time_of_classes" required>
                                        <option value="7:30 AM To 8:30 AM">7:30 AM To 8:30 AM</option>
                                        <option value="8:30 AM To 9:30 AM">8:30 AM To 9:30 AM</option>
                                        <option value="3:00 PM To 4:00 PM">3:00 PM To 4:00 PM</option>
                                        <option value="4:00 PM To 5:00 PM">4:00 PM To 5:00 PM</option>
                                        <option value="5:00 PM To 6:00 PM">5:00 PM To 6:00 PM</option>
                                        <option value="6:00 PM To 7:00 PM">6:00 PM To 7:00 PM</option>
                                        <option value="7:00 PM To 8:00 PM">7:00 PM To 8:00 PM</option>
                                        <option value="8:00 PM To 9:00 PM">8:00 PM To 9:00 PM</option>
                                        <option value="9:00 PM To 10:00 PM">9:00 PM To 10:00 PM</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <button class="btn btn-primary" id="submitInquiry">Submit</button>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('button').click(function () {
            var formData = $('form').serialize();
            // console.log(formData);
            $.ajax({
                type: 'POST',
                url: 'inquiryrequest.php',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        // $('form')[0].reset();
                        alert("Inquiry submitted successfully.")
                        window.location.href = 'inquiry.php';
                    } else {
                        alert("error");
                    }
                },
            });
        });
    });
</script>

<script>
    function onlyNumbers(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            evt.preventDefault();
            return false;
        }
        return true;
    }
</script>

<?php include ('./footer.php'); ?>
