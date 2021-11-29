<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $a_k = find_by_id('kerusakan',(int)$_GET['id']);
  if(!$a_k){
    $session->msg("d","Missing Kerusakan id.");
    redirect('kerusakan.php');
  }
?>
<?php
  $delete_id = delete_by_id('kerusakan',(int)$a_k['id']);
  if($delete_id){
      $session->msg("s","kerusakan deleted.");
      redirect('kerusakan.php');
  } else {
      $session->msg("d","kerusakan deletion failed.");
      redirect('kerusakan.php');
  }
?>
