<?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();
?>
<!doctype html>
<html lang="en-US">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>STMIK MEDIA INFORMATIKA CENDEKIA</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
   <style>
   @media print {
     html,body{
        font-size: 9.5pt;
        margin: 0;
        padding: 0;
     }.page-break {
       page-break-before:always;
       width: auto;
       margin: auto;
      }
    }
    .page-break{
      width: 980px;
      margin: 0 auto;
    }
     .sale-head{
       margin: 40px 0;
       text-align: center;
     }.sale-head h1,.sale-head strong{
       padding: 10px 20px;
       display: block;
     }.sale-head h1{
       margin: 0;
       border-bottom: 1px solid #212121;
     }.table>thead:first-child>tr:first-child>th{
       border-top: 1px solid #000;
      }
      table thead tr th {
       text-align: center;
       border: 1px solid #ededed;
     }table tbody tr td{
       vertical-align: middle;
     }.sale-head,table.table thead tr th,table tbody tr td,table tfoot tr td{
       border: 1px solid #212121;
       white-space: nowrap;
     }.sale-head h1,table thead tr th,table tfoot tr td{
       background-color: #f8f8f8;
     }tfoot{
       color:#000;
       text-transform: uppercase;
       font-weight: 500;
     }
   </style>
</head>
<body>
 
    <div class="page-break">
       <div class="sale-head pull-right">
           <h1>Stock Report</h1>
       </div>
      <table class="table table-border">
        <thead>
          <tr>
          <tr>
                <th> No</th>
                <th> Photo</th>
                <th> Product Title </th>
                <th> Kategori </th>
                <th> Stock </th>
                <th> Keterangan </th>
              </tr>
          </tr>
        </thead>
        <tbody>
                <?php foreach ($products as $product):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td class="text-center">
                    <?php if($product['media_id'] === '0'): ?>
                        <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" style="width: 80px;"  alt="">
                    <?php else: ?>
                    <img  src="uploads/products/<?php echo $product['image']; ?>"  style="width: 80px;" alt="">
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
  
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
