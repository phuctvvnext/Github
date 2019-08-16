<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
	<?php $id_cat=$_GET['id']; 
		 $query="delete from cat where id ={$id_cat}";
		 $kqquery=$mysqli->query($query);
		 if($kqquery){
		 	header("location:index.php?msg=Xóa thành công");
		 	die();
		 } else {
		 	echo 'Có lỗi khi xóa';
		 	die();
		 }
	?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/footer.php'; ?>