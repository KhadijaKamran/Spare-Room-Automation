<?php include "validate_session.php" ?>
<?php
//Global Page Variables
$pageName = "Renew Ads Settings"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HMO Flow | <?php echo $pageName ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <script>
      var verifyAccount = function(){
          alert('User account has been successfully validated. \nYou can submit your details to the portal.');
      }
      var submitForm = function(){
        var settings = {
            "url": "http://18.188.235.143:5000/user_messages?user_id="+user_id.toString(),
            "method": "PUT",
            "timeout": 0,
            "headers": {
              "Content-Type": "application/x-www-form-urlencoded"
            },
            "data": {
              "shortTermMessage": $("#message_short").val(),
              "midTermMessage": $("#message_medium").val(),
              "longTermMessage": $("#message_long").val(),
              "followUpMessage": $("#followup_message").val(),
              "followUpDuration": $("#followup_duration").val()
            }
          };

          $.ajax(settings).done(function (response) {
            alert('Data successfully updated in the database!');
            window.location = 'index.php';
          });
      }
  </script>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
<?php include "html_components/sidebars.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $pageName ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $pageName ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                <div class="form-group">
                        <label>Message for new people loooking for rooms in your area (short-term):</label>
                        <textarea class="form-control" rows="3" id="message_short" placeholder="Enter the message" spellcheck="false"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Message for new people loooking for rooms in your area (medium-term):</label>
                        <textarea class="form-control" rows="3" id="message_medium" placeholder="Enter the message" spellcheck="false"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Message for new people loooking for rooms in your area (long-term):</label>
                        <textarea class="form-control" rows="3" id="message_long" placeholder="Enter the message" spellcheck="false"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Follow-up message:</label>
                        <textarea class="form-control" rows="3" id="followup_message" placeholder="Enter the message" spellcheck="false"></textarea>
                      </div>
                      <div class="form-group">
                    <label for="exampleInputEmail1">Follow-up after (Hours)</label>
                    <input type="number" class="form-control" id="followup_duration" placeholder="Enter hours" value="1">
                  </div>
                </div>
                <!-- /.card-body -->
                </form>

                <div class="card-footer">
                  <button class="btn btn-primary" onclick="submitForm()">Update</button>
                </div>
            </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php echo "<script> var user_id=".$_SESSION["id"]."; </script>"; ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>

var settings = {
  "url": "http://18.188.235.143:5000/user_messages?user_id="+user_id.toString(),
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
  $("#message_short").val(response[1]);
  $("#message_medium").val(response[2]);
  $("#message_long").val(response[3]);
  $("#followup_message").val(response[4]);
  $("#followup_duration").val(response[5]);
});

</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>