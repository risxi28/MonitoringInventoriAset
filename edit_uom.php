<?php
  $page_title = 'Edit Uom';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $uom = find_by_id('uom',(int)$_GET['id']);
  if(!$uom){
    $session->msg("d","Missing uom id.");
    redirect('uom.php');
  }
?>

<?php
if(isset($_POST['edit_uom'])){
  $req_field = array('uom-satuan','uom-keterangan');
  validate_fields($req_field);
  $uom_satuan = remove_junk($db->escape($_POST['uom-satuan']));
  $uom_keterangan = remove_junk($db->escape($_POST['uom-keterangan']));
  if(empty($errors)){
        $sql = "UPDATE uom SET ";
        $sql .="satuan='{$uom_satuan}',keterangan ='{$uom_keterangan}'";
       $sql .= " WHERE id='{$uom['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated uom");
       redirect('uom.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('uom.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('uom.php',false);
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
                <h3 class="card-title">Editing <?php echo remove_junk(ucfirst($uom['satuan']));?></span>/h3>
              </div>
              <!-- /.card-header -->
              
              <!-- form start -->
              <form  method="post" action="edit_uom.php?id=<?php echo (int)$uom['id'];?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama satuan</label>
                    <input type="text" class="form-control" name="uom-satuan" value="<?php echo remove_junk(ucfirst($uom['satuan']));?>">
                    </div>
                  <div class="form-group">
                    <label for="ket">keterangan</label>
                    <input type="text" name="uom-keterangan" class="form-control" value="<?php echo remove_junk(ucfirst($uom['keterangan']));?>"id="keterangan" placeholder="Masukan Keterangan" required/>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="edit_uom" class="btn btn-primary">Submit</button>
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
