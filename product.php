<?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
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
            <h1 class="m-0 text-dark">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <div class="card">
               <a href="add_product.php" ><button type="button" class="btn btn-block bg-gradient-success"><i class="fa fa-plus"></i>Tambah Data</button></a>
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
                <th> kode aset</th>
                <th> Photo</th>
                <th> Product Title </th>
                <th class="text-center" style="width: 10%;"> Kategori </th>
                <th class="text-center" style="width: 10%;"> Pemakai </th>
                <th class="text-center" style="width: 10%;"> Stock </th>
                <th class="text-center" style="width: 10%;"> satuan </th>
                <th class="text-center" style="width: 10%;"> Harga </th>
                <th class="text-center" style="width: 10%;"> Kerusakan </th>
                <th class="text-center" style="width: 10%;"> penyusutan Kerusakan </th>
                <th class="text-center" style="width: 10%;"> Lama Pemakaian </th>
                <th class="text-center" style="width: 10%;"> Penyusutan Pertahun </th>
                <th class="text-center" style="width: 10%;"> Keterangan </th>
                <th class="text-center" style="width: 10%;"> Product Added </th>
                <th class="text-center" style="width: 100px;"> Actions </th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td class="text-center">AST-<?php echo remove_junk($product['id']); ?></td>
                    <td>
                    <?php if($product['media_id'] === '0'): ?>
                        <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" style="width: 100px;"  alt="">
                    <?php else: ?>
                    <img  src="uploads/products/<?php echo $product['image']; ?>"  style="width: 100px;" alt="">
                    <?php endif; ?>
                    </td>
                    <td> <?php echo remove_junk($product['name']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($product['pemakai']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($product['satuan']); ?></td>
                    <td class="text-center"> Rp.<?php echo remove_junk($product['buy_price']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($product['kerusakan']); ?></td>
                    <td class="text-center"> Rp.<?php echo remove_junk($product['harga_k']); ?></td>
                    <td class="text-center"><?php echo remove_junk($product['bulan']); ?>Bulan</td>
                    <td class="text-center">
                    <?php if($product['tahun'] === '0'): ?>
                        0
                    <?php else: ?>
                    Rp.<?php echo remove_junk($product['harga_t']); ?>
                    <?php endif; ?>
                    </td>
                    <td class="text-center"> <?php echo remove_junk($product['keterangan']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($product['date']); ?></td>
                    <td class="text-center">
                    <div class="btn-group">
                        <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-info btn-sm"  title="Edit" data-toggle="tooltip">
                        <span class="fas fa-edit"></span>
                        </a>
                        <a href="delete_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus')" title="Delete" data-toggle="tooltip">
                        <span class="fas fa-trash"></span>
                        </a>
                    </div>
                    </td>
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