<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $uom = find_by_id('uom',(int)$_GET['id']);
  if(!$uom){
    $session->msg("d","Missing Categorie id.");
    redirect('uom.php');
  }
?>
<?php
  $delete_id = delete_by_id('uom',(int)$uom['id']);
  if($delete_id){
      $session->msg("s","uom deleted.");
      redirect('uom.php');
  } else {
      $session->msg("d","uom deletion failed.");
      redirect('uom.php');
  }
?>
