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
                <div class="card-header">
                  <select class="form-control" id="dateFilter" onchange="updateInquiryList()">
                    <option value="today" selected>Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="3days">Past 3 Days</option>
                    <option value="week">Past Week</option>
                  </select>
                </div>
                <div class="card-body">
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
                      <?php
                      require_once 'function.php';
                      $today = date('Y-m-d');
                      $rows = selectFromTable('inquiryinfo', ['id', 'name', 'mobile_number', 'date'], ['date' => $today]);
                      foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='selectedInquiries[]' value='" . $row['id'] . "'></td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mobile_number']) . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "</tr>";
                      }
                      ?>
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

        // Master checkbox functionality
        $('#selectAll').click(function () {
          var checkedStatus = this.checked;
          $('#inquiryTable tbody tr').find('td:first :checkbox').each(function () {
            $(this).prop('checked', checkedStatus);
          });
        });

        //Character Count of a Textarea
        $('textarea').keyup(function () {

          var characterCount = $(this).val().length,
            current = $('#current'),
            maximum = $('#maximum'),
            theCount = $('#the-count');

          current.text(characterCount);

          /*This isn't entirely necessary, just playin around*/
          if (characterCount < 70) {
            current.css('color', '#666');
          }
          if (characterCount > 70 && characterCount < 90) {
            current.css('color', '#6d5555');
          }
          if (characterCount > 90 && characterCount < 100) {
            current.css('color', '#793535');
          }
          if (characterCount > 100 && characterCount < 120) {
            current.css('color', '#841c1c');
          }
          if (characterCount > 120 && characterCount < 139) {
            current.css('color', '#8f0001');
          }

          if (characterCount >= 160) {
            maximum.css('color', '#ff0000');
            current.css('color', '#ff0000');
            theCount.css('font-weight', 'bold');
          } else {
            maximum.css('color', '#666');
            theCount.css('font-weight', 'normal');
          }
        });

        function updateInquiryList() {
          var dateFilter = $('#dateFilter').val();
          console.log("Filter changed to: ", dateFilter); // Check if this logs correctly when you change the dropdown
          $.ajax({
            url: 'inquiries_fetch.php',
            type: 'GET',
            data: {dateFilter: dateFilter},
            success: function(data) {
              $('#inquiryTable tbody').html(data);
            },
            error: function() {
              alert('Error fetching data.');
            }
          });
        }
    </script>
  </div>
</body>

</html>
