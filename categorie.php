<?php
  $page_title = 'All categories';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
  
  $all_categories = find_all('categories')
?>
<?php
 if(isset($_POST['add_cat'])){
   $req_field = array('categorie-name');
   validate_fields($req_field);
   $cat_name = remove_junk($db->escape($_POST['categorie-name']));
   if(empty($errors)){
      $sql  = "INSERT INTO categories (name)";
      $sql .= " VALUES ('{$cat_name}')";
      if($db->query($sql)){
        $session->msg("s", "Successfully Added Categorie");
        redirect('categorie.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('categorie.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('categorie.php',false);
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
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>-->
            </ol>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
        <div class="row">
        <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
        <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
                <strong>
                Add Kategori
                </strong>
            </h3>
          </div>    
            <!-- /.card-header -->
        <div class="card-body login-card-body">
            <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
            <form method="post" action="categorie.php">
                <div class="form-group">
                    <input type="text" class="form-control" name="categorie-name" placeholder="Categorie Name">
                </div>
                <button type="submit" name="add_cat" class="btn btn-primary">Add categorie</button>
            </form>
            </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Change password form -->
        <div class="col-md-7">
        <div class="card">  
          <div class="card-header">
            <h3 class="card-title">
                <strong>
                All Kategori
                </strong>
            </h3>
          </div>
            <!-- /.card-header -->
        <div class="card-body login-card-body">
            <div class="panel panel-default">
            <div class="panel-heading">
                
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Categories</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_categories as $cat):?>
                        <tr>
                            <td class="text-center"><?php echo count_id();?></td>
                            <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                            <td class="text-center">
                            <div class="btn-group">
                                <a href="edit_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit">
                                <span class="fas fa-edit"></span>
                                </a>
                                <a href="delete_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus')" data-toggle="tooltip" title="Remove">
                                <span class="fas fa-trash"></span>
                                </a>
                            </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>

        </div>
        
        </div>
        </div>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include_once('layouts/footer.php'); ?>
