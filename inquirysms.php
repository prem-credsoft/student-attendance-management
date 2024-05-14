<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Inquiry SMS</title>
</head>
<style>
  #the-count {
    float: right;
    padding: 0.1rem 0 0 0;
    font-size: 0.875rem;
  }
</style>

<?php include ('./header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Inquiry SMS</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Inquiry SMS</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Left column -->
        <div class="col-md-6">
          <!-- General form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Bulk Inquiry Message</h3>
            </div>
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="messageText">Message Text</label>
                  <textarea class="form-control" id="messageText" rows="3" placeholder="Enter message..."
                    maxlength="160"></textarea>
                  <div id="the-count">
                    <span id="current">0</span>
                    <span id="maximum">/ 160</span>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Right column -->
        <div class="col-md-6">
          <!-- Inquiry List -->
          <div class="card">
            <div class="card-body card-list-custom">
              <form method="GET" class="card-tools mb-3" align="center">
                <label>Filter:</label>
                <input type="date" id="start_date" name="start_date">
                <b>TO</b>
                <input class="mb-2" type="date" id="end_date" name="end_date">
                <button type="button" id="filterButton" class="btn btn-primary">Filter</button>
              </form>
              <table class="table table-bordered" id="inquiryTable">
                <thead>
                  <tr>
                    <th><input type='checkbox' id='selectAll'></th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Date of Inquiry</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Data will be loaded here dynamically -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<?php include ('./footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    // Function to update inquiry list based on date filter
    function updateInquiryList() {
      var startDate = $('#start_date').val();
      var endDate = $('#end_date').val();
      $.ajax({
        url: 'inquiries_fetch.php',
        type: 'GET',
        data: { start_date: startDate, end_date: endDate },
        success: function (data) {
          $('#inquiryTable tbody').html(data);
          // Reattach event listeners to new checkboxes
          $('#inquiryTable').on('change', 'input[type="checkbox"][name="selectedInquiries[]"]', function () {
            logSelectedInquiries();
          });
        },
        error: function () {
          alert('Error fetching data.');
        }
      });
    }

    // Attach the updateInquiryList to the filter button
    $('#filterButton').click(updateInquiryList);

    // Function to log selected inquiries
    function logSelectedInquiries() {
      var selectedInquiries = [];
      $('#inquiryTable tbody tr').find('td:first :checkbox:checked').each(function () {
        var row = $(this).closest('tr');
        var id = $(this).val();
        var name = row.find('td:nth-child(2)').text(); // Assuming name is in the second column
        var mobileNumber = row.find('td:nth-child(3)').text(); // Assuming mobile number is in the third column
        selectedInquiries.push({ id: id, name: name, mobileNumber: mobileNumber });
      });
      console.log(selectedInquiries);
    }

    // Capture and log the message text when the form is submitted
    $('form').submit(function (event) {
      event.preventDefault(); // Prevent the form from submitting normally
      var messageText = $('#messageText').val();
      console.log("Message to send:", messageText);
      logSelectedInquiries(); // Log selected inquiries on send
      // Here you can also add AJAX to send the data to the server if needed
    });

    // Master checkbox functionality
    $('#selectAll').click(function () {
      var checkedStatus = this.checked;
      $('#inquiryTable tbody tr').find('td:first :checkbox').each(function () {
        $(this).prop('checked', checkedStatus);
      });
      logSelectedInquiries(); // Log all selected inquiries when select all is clicked
    });

    // Log individual checkbox selections
    $('#inquiryTable').on('change', 'input[type="checkbox"][name="selectedInquiries[]"]', function () {
      logSelectedInquiries();
    });

    //Character Count of a Textarea
    $('textarea').keyup(function () {
      var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');

      current.text(characterCount);

      if (characterCount < 70) {
        current.css('color', '#666');
      } else if (characterCount < 90) {
        current.css('color', '#6d5555');
      } else if (characterCount < 100) {
        current.css('color', '#793535');
      } else if (characterCount < 120) {
        current.css('color', '#841c1c');
      } else if (characterCount < 139) {
        current.css('color', '#8f0001');
      } else {
        maximum.css('color', '#ff0000');
        current.css('color', '#ff0000');
        theCount.css('font-weight', 'bold');
      }
    });
  });
</script>