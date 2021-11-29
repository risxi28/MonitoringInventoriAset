<?php
$page_title = 'issuing Report';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>-->
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
        <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
        <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
                <strong>
                Cetak Issuing
                </strong>
            </h3>
          </div>    
            <!-- /.card-header -->
        <div class="card-body login-card-body">
            <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
            <form class="clearfix" method="post" action="sale_report_process.php">
            <!-- Date -->
            
            <div class="form-group">
              <label class="form-label">Date Range</label>
                <div class="input-group">
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input"data-target="#reservationdate" name="start-date" placeholder="From">
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  </div>
                  <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input"data-target="#reservationdate" name="end-date" placeholder="To">
                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  </div>
                </div>
            </div>
            <div class="form-group">
                 <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
            </div>
          </form>
            </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Change password form -->
        <div class="col-md-7">
       
        
        </div>
        </div>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include_once('layouts/footer.php'); ?>
