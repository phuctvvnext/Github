<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
	<?php 
		$id_story=$_GET['id']; 
		$query1 ="select picture from news where  id = {$id_story}";
		$kq= $mysqli->query($query1);
		$arNew=mysqli_fetch_assoc($kq);
		if($arNew['picture'] != ''){
			unlink($_SERVER['DOCUMENT_ROOT'].'/files/img/'.$arNew['picture']);
		}
		 $query="delete from news where id ={$id_story}";
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