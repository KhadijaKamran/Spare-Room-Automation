<?php include "validate_session.php" ?>
<?php
//Global Page Variables
$pageName = "Statistics"
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
      var verifyAccount = function(){
          alert('User account has been successfully validated. \nYou can submit your details to the portal.');
      }
      var submitForm = function(){
          alert('Data successfully updated in the database!');
          window.location = 'index.php';
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
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rooms to rent ratio</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="ratioTable" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Area</th>
                      <th>Rooms to rent ratio</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!--Card-->

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Ad Clicks</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
              </div>
              <!-- /.card-body -->
            </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php echo "<script> var user_id=".$_SESSION["id"]."; </script>"; ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
     var settings = {
  "url": "http://18.188.235.143:5000/user_area?user_id="+user_id,
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
  for(var x=0; x<response.length; x++)
  $("#ratioTable").append("<tr><td>"+response[x].area_name+"</td><td>"+response[x].ratio+"</td></tr>");
});

</script>
<script>
  $(function () {
    var settings = {
      "url": "http://18.188.235.143:5000/user_stats?user_id="+user_id,
      "method": "GET",
      "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
      console.log(response);
      var points = [];
      for(var x=0; x<response.length; x++){
        points.push({x: response[x].timeStamp, y:response[x].clicks});
      }

      var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      theme: "light2",
      title:{
        text: "Ad clicks per hour"
      },
      data: [{        
        type: "line",
            indexLabelFontSize: 16,
        dataPoints: points
      }]
    });
    chart.render();

  });

    });



</script>
</body>
</html>