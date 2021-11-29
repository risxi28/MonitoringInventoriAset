<?php
  $page_title = 'All Image';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php $media_files = find_all('media');?>
<?php
  if(isset($_POST['submit'])) {
  $photo = new Media();
  $photo->upload($_FILES['file_upload']);
    if($photo->process_media()){
        $session->msg('s','photo has been uploaded.');
        redirect('media.php');
    } else{
      $session->msg('d',join($photo->errors));
      redirect('media.php');
    }

  }

?>
<?php include_once('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Photo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <div class="card">
             <form class="form-inline" action="media.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-btn">
                    <input type="file" name="file_upload" multiple="multiple" class="btn btn-primary btn-file"/>
                 </span>

                 <button type="submit" name="submit" class="btn btn-default">Upload</button>
               </div>
              </div>
             </form>          
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
                    <th class="text-center">Photo</th>
                    <th class="text-center">Photo Name</th>
                    <th class="text-center" style="width: 20%;">Photo Type</th>
                    <th class="text-center" style="width: 50px;">Actions</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php foreach ($media_files as $media_file): ?>
                    <tr class="list-inline">
                    <td class="text-center"><?php echo count_id();?></td>
                    <td class="text-center">
                        <img src="uploads/products/<?php echo $media_file['file_name'];?>" class="img-thumbnail" />
                    </td>
                    <td class="text-center">
                    <?php echo $media_file['file_name'];?>
                    </td>
                    <td class="text-center">
                    <?php echo $media_file['file_type'];?>
                    </td>
                    <td class="text-center">
                    <a href="delete_media.php?id=<?php echo (int) $media_file['id'];?>"onclick="return confirm('Yakin Hapus')" class="btn btn-danger btn-sm"  title="Edit">
                        <span class="fas fa-trash"></span>
                    </a>
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