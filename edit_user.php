<?php
  $page_title = 'Edit User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_user = find_by_id('users',(int)$_GET['id']);
  $groups  = find_all('user_groups');
  if(!$e_user){
    $session->msg("d","Missing user id.");
    redirect('users.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    $req_fields = array('name','username','level');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_user['id'];
           $name = remove_junk($db->escape($_POST['name']));
       $username = remove_junk($db->escape($_POST['username']));
          $level = (int)$db->escape($_POST['level']);
       $status   = remove_junk($db->escape($_POST['status']));
            $sql = "UPDATE users SET name ='{$name}', username ='{$username}',user_level='{$level}',status='{$status}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_user.php?id='.(int)$e_user['id'],false);
    }
  }
?>
<?php
// Update user password
if(isset($_POST['update-pass'])) {
  $req_fields = array('password');
  validate_fields($req_fields);
  if(empty($errors)){
           $id = (int)$e_user['id'];
     $password = remove_junk($db->escape($_POST['password']));
     $h_pass   = sha1($password);
          $sql = "UPDATE users SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
       $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
          $session->msg('s',"User password has been updated ");
          redirect('edit_user.php?id='.(int)$e_user['id'], false);
        } else {
          $session->msg('d',' Sorry failed to updated user password!');
          redirect('edit_user.php?id='.(int)$e_user['id'], false);
        }
  } else {
    $session->msg("d", $errors);
    redirect('edit_user.php?id='.(int)$e_user['id'],false);
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
        <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
                <strong>
                Update <?php echo remove_junk(ucwords($e_user['name'])); ?> Account
                </strong>
            </h3>
          </div>    
            <!-- /.card-header -->
        <div class="card-body login-card-body">
            <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <form method="post" action="edit_user.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($e_user['name'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($e_user['username'])); ?>">
                    </div>
                    <div class="form-group">
                    <label for="level">User Role</label>
                        <select class="form-control" name="level">
                        <?php foreach ($groups as $group ):?>
                        <option <?php if($group['group_level'] === $e_user['user_level']) echo 'selected="selected"';?> value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="status">Status</label>
                        <select class="form-control" name="status">
                        <option <?php if($e_user['status'] === '1') echo 'selected="selected"';?>value="1">Active</option>
                        <option <?php if($e_user['status'] === '0') echo 'selected="selected"';?> value="0">Deactive</option>
                        </select>
                    </div>
                    <div class="form-group clearfix">
                            <button type="submit" name="update" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Change password form -->
        <div class="col-md-6">
        <div class="card">  
          <div class="card-header">
            <h3 class="card-title">
                <strong>
                Change <?php echo remove_junk(ucwords($e_user['name'])); ?> password
                </strong>
            </h3>
          </div>
            <!-- /.card-header -->
        <div class="card-body login-card-body">
            <div class="panel panel-default">
            <div class="panel-heading">
                
            </div>
            <div class="panel-body">
                <form action="edit_user.php?id=<?php echo (int)$e_user['id'];?>" method="post" class="clearfix">
                <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Type user new password">
                </div>
                <div class="form-group clearfix">
                        <button type="submit" name="update-pass" class="btn btn-danger pull-right">Change</button>
                </div>
                </form>
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
