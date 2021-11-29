<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('issuing');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_issuing    = find_recent_issuing_added('5')
?>
<?php include_once('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>-->
            </ol>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
        <div class="alert alert-success alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Selamat datang di Aplikasi MIA MIC, Barang yang berada di sini merupakan aset milik MEDIA INFORMATIKA CENDEKIA 
    </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="ace-icon fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">
                    <?php  echo $c_user['total']; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-truck"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Issuing</span>
                <span class="info-box-number"><?php  echo $c_sale['total']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Product</span>
                <span class="info-box-number"><?php  echo $c_product['total']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-briefcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kategori</span>
                <span class="info-box-number"> <?php  echo $c_categorie['total']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- mulai table -->
        <div class="card">
          <div class="card-header">
          </div>
            <!-- /.card-header -->
          <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span>LATEST out</span>
                    </strong>
                    </div>
                    <div class="panel-body">
                <table id="example2" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Product Name</th>
                    <th>Date</th>
                    <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_issuing as  $recent_issuing): ?>
                    <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td>
                        <?php echo remove_junk(first_character($recent_issuing['name'])); ?>
                    </a>
                    </td>
                    <td><?php echo remove_junk(ucfirst($recent_issuing['date'])); ?></td>
                    <td><?php echo remove_junk(first_character($recent_issuing['keterangan'])); ?></td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
                </table>
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span>Recently Added Products</span>
                    </strong>
                    </div>
                    <div class="panel-body">
                <table id="example2" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                    <th>Photo</th>
                    <th>Produk Name</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($recent_products as  $recent_product): ?>
                    <tr>
                    <td class="text-center">
                    <?php if($recent_product['media_id'] === '0'): ?>
                        <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" style="width: 80px;" alt="">
                    <?php else: ?>
                        <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" style="width: 80px;" alt="" />
                    <?php endif;?>
                    </td>
                    <td>
                        <?php echo remove_junk(first_character($recent_product['name']));?>
                    </td>
                    <td> Rp.<?php echo (int)$recent_product['buy_price']; ?></td>
                    <td><?php echo remove_junk(first_character($recent_product['categorie'])); ?></td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
                </table>
                </div>
            </div>
            </div>
            <div class="row">

            </div>
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