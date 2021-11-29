<?php
  $page_title = 'Edit pertahun';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $a_p_t = find_by_id('penyusutan_t',(int)$_GET['id']);
  if(!$a_p_t){
    $session->msg("d","Missing id.");
    redirect('pertahun.php');
  }
?>

<?php
if(isset($_POST['edit_pertahun'])){
  $req_field = array('tahun','penyusutan');
  validate_fields($req_field);
  $t = remove_junk($db->escape($_POST['tahun']));
  $pen = remove_junk($db->escape($_POST['penyusutan']));
  if(empty($errors)){
        $sql = "UPDATE penyusutan_t SET ";
        $sql .="tahun='{$t}',penyusutan ='{$pen}'";
       $sql .= " WHERE id='{$a_p_t['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated");
       redirect('pertahun.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('pertahun.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('pertahun.php',false);
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
                <h3 class="card-title">Editing </h3>
              </div>
              <!-- /.card-header -->
              
              <!-- form start -->
              <form  method="post" action="edit_pertahun.php?id=<?php echo (int)$a_p_t['id'];?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tahun</label>
                    <input type="text" class="form-control" name="tahun" value="<?php echo remove_junk(ucfirst($a_p_t['tahun']));?>">
                    </div>
                  <div class="form-group">
                    <label for="ket">Penyusutan</label>
                    <input type="text" name="penyusutan" class="form-control" value="<?php echo remove_junk(ucfirst($a_p_t['penyusutan']));?>"id="penyusutan" placeholder="input penyusutan" required/>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="edit_pertahun" class="btn btn-primary">Submit</button>
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
