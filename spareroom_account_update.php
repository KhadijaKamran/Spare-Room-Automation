<?php include "validate_session.php" ?>
<?php
//Global Page Variables
$pageName = "Update SpareRoom Account"
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
            "url": "http://18.188.235.143:5000/update_site",
            "method": "POST",
            "timeout": 0,
            "headers": {
              "Content-Type": "application/x-www-form-urlencoded"
            },
            "data": {
              "site_username": $("#spareroom_email").val(),
              "site_password": $("#spareroom_password").val(),
              "id": user_id.toString()
            }
          };
          console.log("settings");

          $.ajax(settings).done(function (response) {
            //console.log(response);
            alert('Data successfully updated in the database!');
            window.location = 'index.php';
          });
          return false;
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
                <h3 class="card-title">Account Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="mainForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="spareroom_email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="spareroom_password" placeholder="Password">
                  </div>
                  <!--<button style="width:100%;" class="btn btn-primary" onclick="verifyAccount()">Verify account</button>-->
                </div>
                <!-- /.card-body -->
                </form>

                <div class="card-footer">
                  <button class="btn btn-primary" onclick="submitForm()">Submit</button>
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
  "url": "http://18.188.235.143:5000/user?id=1",
  "method": "GET",
  "timeout": 0,
  "headers": {
    "Authorization": "Basic S2hhZGlqYSBLYW1yYW46S2hhZGlqYT85"
  },
};

$.ajax(settings).done(function (response) {
  $("#spareroom_email").val(response.site_username);
  $("#spareroom_password").val(response.site_password);
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