<?php
  $page_title = 'All UOM';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
  $all_uom = find_all('uom');
?>
<?php include_once('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Uom</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <div class="card">
               <a href="add_uom.php" ><button type="button" class="btn btn-block bg-gradient-success"><i class="fa fa-plus"></i>Tambah Data</button></a>
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
                  <th class="text-center" style="width: 20%;">Nama Uom</th>
                  <th class="text-center" style="width: 15%;">Keterangan</th>
                  <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($all_uom as $a_uom): ?>
                <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"><?php echo remove_junk(ucwords($a_uom['satuan']))?></td>
                <td class="text-center">
                  <?php echo remove_junk(ucwords($a_uom['keterangan']))?>
                </td>

                <td class="text-center">
                  <div class="btn-group">
                      <a href="edit_uom.php?id=<?php echo (int)$a_uom['id'];?>" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit">
                        <i class="nav-icon fa fa-pen"></i>
                    </a>
                      <a href="delete_uom.php?id=<?php echo (int)$a_uom['id'];?>" class="btn btn-sm btn-danger" data-toggle="tooltip" title="" onclick="return confirm('Yakin Hapus')">
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