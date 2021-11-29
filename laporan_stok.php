<?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan Stock Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <div class="card">
               <a href="cetak_stok.php" ><button type="button" class="btn btn-block bg-gradient-success"><i class="fa fa-print"></i>Cetak Stok</button></a>
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
                <th class="text-center" style="width: 50px;">#</th>
                <th> Photo</th>
                <th> Product Title </th>
                <th class="text-center" style="width: 10%;"> Kategori </th>
                <th class="text-center" style="width: 10%;"> Stock </th>
                <th class="text-center" style="width: 10%;"> Keterangan </th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td class="text-center">
                    <?php if($product['media_id'] === '0'): ?>
                        <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" style="width: 100px;"  alt="">
                    <?php else: ?>
                    <img  src="uploads/products/<?php echo $product['image']; ?>"  style="width: 100px;" alt="">
                    <?php endif; ?>
                    </td>
                    <td class="text-center"> <?php echo remove_junk($product['name']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($product['keterangan']); ?></td>
                    
                </tr>
                <?php endforeach; ?>
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