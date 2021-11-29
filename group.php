<?php
  $page_title = 'All Group';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $all_groups = find_all('user_groups');
?>
<?php include_once('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Group</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <div class="card">
               <a href="add_group.php" ><button type="button" class="btn btn-block bg-gradient-success"><i class="fa fa-plus"></i>Tambah Data</button></a>
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
          </div>
            <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th class="text-center" style="width: 50px;">#</th>
                  <th>Group Name</th>
                  <th class="text-center" style="width: 20%;">Group Level</th>
                  <th class="text-center" style="width: 15%;">Status</th>
                  <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($all_groups as $a_group): ?>
                <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td><?php echo remove_junk(ucwords($a_group['group_name']))?></td>
                <td class="text-center">
                  <?php echo remove_junk(ucwords($a_group['group_level']))?>
                </td>
                <td class="text-center">
                <?php if($a_group['group_status'] === '1'): ?>
                  <span class="btn btn-success"><?php echo "Active"; ?></span>
                <?php else: ?>
                  <span class="btn btn-danger"><?php echo "Deactive"; ?></span>
                <?php endif;?>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                      <a href="edit_group.php?id=<?php echo (int)$a_group['id'];?>" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit">
                        <i class="nav-icon fa fa-pen"></i>
                    </a>
                      <a href="delete_group.php?id=<?php echo (int)$a_group['id'];?>" onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove">
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