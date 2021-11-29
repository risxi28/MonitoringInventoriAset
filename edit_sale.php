<?php
  $page_title = 'Edit sale';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$issuing = find_by_id('issuing',(int)$_GET['id']);
if(!$issuing){
  $session->msg("d","Missing product id.");
  redirect('sales.php');
}
?>
<?php $product = find_by_id('products',$issuing['product_id']); ?>
<?php

  if(isset($_POST['update_issuing'])){
    $req_fields = array('title','quantity','price','total','keterangan', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$product['id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape($_POST['total']);
          $s_keterangan   = $db->escape($_POST['keterangan']);
          $date      = $db->escape($_POST['date']);
          $s_date    = date("Y-m-d", strtotime($date));

          $sql  = "UPDATE issuing SET";
          $sql .= " product_id= '{$p_id}',qty={$s_qty},price='{$s_total}',keterangan='{$s_keterangan}',date='{$s_date}'";
          $sql .= " WHERE id ='{$issuing['id']}'";
          $result = $db->query($sql);
          if( $result && $db->affected_rows() === 1){
                    update_product_qty($s_qty,$p_id);
                    $session->msg('s',"issuing updated.");
                    redirect('sales.php?id='.$issuing['id'], false);
                  } else {
                    $session->msg('d',' Sorry failed to updated!');
                    redirect('sales.php', false);
                  }
        } else {
           $session->msg("d", $errors);
           redirect('edit_sale.php?id='.(int)$issuing['id'],false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
  <div class="col-md-6">
    
  </div>
  <div class="col-md-4">
  
  </div>
  <div class="col-md-2">
  </div>
</div>
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
            <h3 class="card-title">Edit Issuing</h3>
          </div>
            <!-- /.card-header -->
          <div class="card-body">
          
        <table id="example2" class="table table-bordered table-striped" width="100%">
         <thead>
          <th> Product title </th>
          <th> Qty </th>
          <th> Price </th>
          <th> Total </th>
          <th> Keterangan </th>
          <th> Date</th>
          <th> Action</th>
         </thead>
           <tbody  id="product_info">
              <tr>
              <form method="post" action="edit_sale.php?id=<?php echo (int)$issuing['id']; ?>">
                <td id="s_name">
                  <input type="text" class="form-control" id="sug_input" name="title" value="<?php echo remove_junk($product['name']); ?>">
                  <div id="result" class="list-group"></div>
                </td>
                <td id="s_qty">
                  <input type="text" class="form-control" name="quantity" value="<?php echo (int)$issuing['qty']; ?>">
                </td>
                <td id="s_price">
                  <input type="text" class="form-control" name="price" value="<?php echo remove_junk($product['buy_price']); ?>" >
                </td>
                <td>
                  <input type="text" class="form-control" name="total" value="<?php echo remove_junk($issuing['price']); ?>">
                </td>
                <td id="s_keterangan">
                  <input type="text" class="form-control" name="keterangan" value="<?php echo remove_junk($issuing['keterangan']); ?>" >
                </td>
                <td id="s_date">
                  <input type="date" class="form-control datepicker" name="date" data-date-format="" value="<?php echo remove_junk($issuing['date']); ?>">
                </td>
                <td>
                  <button type="submit" name="update_issuing" class="btn btn-primary">Update Issuing</button>
                </td>
              </form>
              </tr>
           </tbody>
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