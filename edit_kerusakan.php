<?php
  $page_title = 'Edit Kerusakan';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $a_k = find_by_id('kerusakan',(int)$_GET['id']);
  if(!$a_k){
    $session->msg("d","Missing kerusakan id.");
    redirect('kerusakan.php');
  }
?>

<?php
if(isset($_POST['edit_kerusakan'])){
  $req_field = array('jenis-kerusakan','pengurangan');
  validate_fields($req_field);
  $jk = remove_junk($db->escape($_POST['jenis-kerusakan']));
  $peng = remove_junk($db->escape($_POST['pengurangan']));
  if(empty($errors)){
        $sql = "UPDATE kerusakan SET ";
        $sql .="jenis_kerusakan='{$jk}',pengurangan ='{$peng}'";
       $sql .= " WHERE id='{$a_k['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated kerusakan");
       redirect('kerusakan.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('kerusakan.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('kerusakan.php',false);
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
                <h3 class="card-title">Editing <?php echo remove_junk(ucfirst($a_k['jenis_kerusakan']));?></span>/h3>
              </div>
              <!-- /.card-header -->
              
              <!-- form start -->
              <form  method="post" action="edit_kerusakan.php?id=<?php echo (int)$a_k['id'];?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Jenis Kerusakan</label>
                    <input type="text" class="form-control" name="jenis-kerusakan" value="<?php echo remove_junk(ucfirst($a_k['jenis_kerusakan']));?>">
                    </div>
                  <div class="form-group">
                    <label for="ket">penyusutan</label>
                    <input type="text" name="pengurangan" class="form-control" value="<?php echo remove_junk(ucfirst($a_k['pengurangan']));?>"id="pengurangan" placeholder="input_pengurangan" required/>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="edit_kerusakan" class="btn btn-primary">Submit</button>
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
