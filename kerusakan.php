<?php
  $page_title = 'All kerusakan';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
  $all_kerusakan = find_all('kerusakan');
?>
<?php include_once('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
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
             <div class="card">
               <a href="add_kerusakan.php" ><button type="button" class="btn btn-block bg-gradient-success"><i class="fa fa-plus"></i>Tambah Data</button></a>
             </div>
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
        <!-- mulai table -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
            <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th class="text-center" style="width: 50px">#</th>
                  <th class="text-center" style="width: 20%;">Jenis Kerusakan</th>
                  <th class="text-center" style="width: 15%;">Penyusutan</th>
                  <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($all_kerusakan as $a_k): ?>
                <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"><?php echo remove_junk(ucwords($a_k['jenis_kerusakan']))?></td>
                <td class="text-center">
                  <?php echo remove_junk(ucwords($a_k['pengurangan']))?>
                </td>

                <td class="text-center">
                  <div class="btn-group">
                      <a href="edit_kerusakan.php?id=<?php echo (int)$a_k['id'];?>" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit">
                        <i class="nav-icon fa fa-pen"></i>
                    </a>
                      <a href="delete_kerusakan.php?id=<?php echo (int)$a_k['id'];?>" class="btn btn-sm btn-danger" data-toggle="tooltip" title="" onclick="return confirm('Yakin Hapus')">
                        <i class="nav-icon fa fa-times"></i>
                      </a>
                      </div>
                </td>
                </tr>
              <?php endforeach;?>
            </tbody>
              <tfoot>
              </tfoot>
            </table>
          </div>
        </div>
        <!-- /.selesai table --> 
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include_once('layouts/footer.php'); ?>