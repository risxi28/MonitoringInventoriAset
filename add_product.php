<?php
  $page_title = 'Add Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
  $all_uom = find_all('uom');
  $all_kerusakan = find_all('kerusakan');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title','product-categorie','pemakai','product-quantity','nama-uom','buying-price', 'keterangan' );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_uom   = remove_junk($db->escape($_POST['nama-uom']));
     $p_ker   = remove_junk($db->escape($_POST['nama-ker']));
     $p_pemakai   = remove_junk($db->escape($_POST['pemakai']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));
     $p_ket  = remove_junk($db->escape($_POST['keterangan']));
     if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }
     $date    = make_date();
     $query  = "INSERT INTO products (";
     $query .=" name,pemakai,quantity,uom_id,buy_price,keterangan,categorie_id,media_id,kerusakan_id,date";
     $query .=") VALUES (";
     $query .=" '{$p_name}','{$p_pemakai}', '{$p_qty}','{$p_uom}', '{$p_buy}', '{$p_ket}', '{$p_cat}', '{$media_id}','{$p_ker}', '{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Product added ");
       redirect('product.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
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
                <h3 class="card-title">Add New Product</h3>
              </div>
              <!-- /.card-header -->
              
              <!-- form start -->
              <form  method="post" action="add_product.php" class="clearfix">
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control" name="product-title" placeholder="Product Title" required/>
                  </div>

                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                            <select class="form-control" name="product-categorie">
                            <option value="">Select Product Category</option>
                            <?php  foreach ($all_categories as $cat): ?>
                            <option value="<?php echo (int)$cat['id'] ?>">
                                <?php echo $cat['name'] ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="product-photo">
                            <option value="">Select Product Photo</option>
                            <?php  foreach ($all_photo as $photo): ?>
                            <option value="<?php echo (int)$photo['id'] ?>">
                                <?php echo $photo['file_name'] ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        </div>
                    </div>
                  
                    <div class="form-group">
               <div class="row">
                 <div class="col-md-5">
                   <div class="input-group">
                   <div class="input-group-prepend">
                     <span class="input-group-text">
                      <i class="fas fa-shopping-cart"></i>
                     </span>
                    </div>
                     <input type="number" class="form-control" name="product-quantity" placeholder="Product Quantity">
                   </div>
                 </div>
                 <div class="col-md-2">
                 <select class="form-control" name="nama-uom">
                            <option value="">Select UoM</option>
                            <?php  foreach ($all_uom as $uom): ?>
                            <option value="<?php echo (int)$uom['id'] ?>">
                                <?php echo $uom['satuan'] ?></option>
                            <?php endforeach; ?>
                 </select> 
                 </div>
                  <div class="col-md-5">
                  <div class="input-group">
                    <span class="input-group-text">
                       Rp.
                    </span>
                     <input type="number" class="form-control" name="buying-price" placeholder="harga">
                </div>
                  </div>
               </div>
              </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="pemakai" placeholder="pemakai">
                  </div>

                  <div class="form-group">
                  <select class="form-control" name="nama-ker">
                            <option value="">Select Kerusakan</option>
                            <?php  foreach ($all_kerusakan as $ker): ?>
                            <option value="<?php echo (int)$ker['id'] ?>">
                                <?php echo $ker['jenis_kerusakan'] ?></option>
                            <?php endforeach; ?>
                 </select> 
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" name="keterangan" placeholder="keterangan">
                  </div>
              
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
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
