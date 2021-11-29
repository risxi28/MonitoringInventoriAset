<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $issuing = find_by_id('issuing',(int)$_GET['id']);
  if(!$issuing){
    $session->msg("d","Missing sale id.");
    redirect('sales.php');
  }
?>
<?php
  $delete_id = delete_by_id('issuing',(int)$issuing['id']);
  if($delete_id){
      $session->msg("s","issuing deleted.");
      redirect('sales.php');
  } else {
      $session->msg("d","issuing deletion failed.");
      redirect('sales.php');
  }
?>
