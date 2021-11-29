<?php
  $page_title = 'All sale';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$issuing = find_all_issuing();
?>
<?php include_once('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Issuing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <div class="card">
               <a href="add_sale.php" ><button type="button" class="btn btn-block bg-gradient-success"><i class="fa fa-plus"></i>Tambah Data</button></a>
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
            <table id="example2" class="table table-bordered table-striped" width="100%">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Product name </th>
                <th class="text-center" style="width: 15%;"> Quantity</th>
                <th class="text-center" style="width: 15%;"> Total </th>
                <th class="text-center" style="width: 15%;"> keterangan </th>
                <th class="text-center" style="width: 15%;"> Date </th>
                <th class="text-center" style="width: 100px;"> Actions </th>
             </tr>
            </thead>
                <tbody>
                    <?php foreach ($issuing as $issuing):?>
                    <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk($issuing['name']); ?></td>
                    <td class="text-center"><?php echo (int)$issuing['qty']; ?></td>
                    <td class="text-center">Rp.<?php echo remove_junk($issuing['price']); ?></td>
                    <td class="text-center"><?php echo $issuing['keterangan']; ?></td>
                    <td class="text-center"><?php echo $issuing['date']; ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="edit_sale.php?id=<?php echo (int)$issuing['id'];?>" class="btn btn-warning btn-sm"   data-toggle="tooltip">
                            <span class="fas fa-edit"></span>
                            </a>
                            <a href="delete_sale.php?id=<?php echo (int)$issuing['id'];?>" onclick="return confirm('Yakin Hapus')"class="btn btn-danger btn-sm"   data-toggle="tooltip">
                            <span class="fas fa-trash"></span>
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