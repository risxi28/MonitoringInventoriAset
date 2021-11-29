<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <div class="card">
               <a href="add_user.php" ><button type="button" class="btn btn-block bg-gradient-success"><i class="fa fa-plus"></i>Tambah Data</button></a>
             </div>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- mulai table -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"></h3>
            <?php echo display_msg($msg); ?>
          </div>
            <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" width="100%">
            <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Name </th>
                        <th>Username</th>
                        <th class="text-center" style="width: 15%;">User Role</th>
                        <th class="text-center" style="width: 10%;">Status</th>
                        <th style="width: 20%;">Last Login</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_users as $a_user): ?>
                    <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
                    <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
                    <td class="text-center"><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
                    <td class="text-center">
                    <?php if($a_user['status'] === '1'): ?>
                        <span class="btn btn-success"><?php echo "Active"; ?></span>
                    <?php else: ?>
                        <span class="btn btn-danger"><?php echo "Deactive"; ?></span>
                    <?php endif;?>
                    </td>
                    <td><?php echo read_date($a_user['last_login'])?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="edit_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit">
                            <i class="nav-icon fa fa-pen"></i>
                        </a>
                            <a href="delete_user.php?id=<?php echo (int)$a_user['id'];?>"onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove">
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