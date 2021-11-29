<?php
  $page_title = 'Add Group';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  if(isset($_POST['add'])){

   $req_fields = array('tahun','penyusutan');
   validate_fields($req_fields);

   if(empty($errors)){
           $t = remove_junk($db->escape($_POST['tahun']));
          $pen = remove_junk($db->escape($_POST['penyusutan']));

        $query  = "INSERT INTO penyusutan_t (";
        $query .="tahun,penyusutan";
        $query .=") VALUES (";
        $query .=" '{$t}', '{$pen}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," has been creted! ");
          redirect('pertahun.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create!');
          redirect('add_pertahun.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_pertahun.php',false);
   }
 }
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
            </ol>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php echo display_msg($msg); ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data Penyusutan pertahun</h3>
              </div>
              <!-- /.card-header -->
              
              <!-- form start -->
              <form  method="post" action="add_pertahun.php" class="clearfix">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tahun</label>
                    <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Input Tahun" required/>
                  </div>
                  <div class="form-group">
                    <label for="ket">penyusutan</label>
                    <input type="decimal" name="penyusutan" class="form-control" id="penyusutan" placeholder="Input Penyusutan" required/>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="add" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include_once('layouts/footer.php'); ?>
