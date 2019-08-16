<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?> 
<?php  
	unset($_SESSION['user']);
	header('location:/');
	die();
?>

