<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
	<?php  
        $uid = $_GET['id'];
        $queryUser  ="select * from user where id = {$uid}";
        $resultUser = $mysqli->query($queryUser);
        $user = mysqli_fetch_assoc($resultUser);
        $old_username=$user['email'];
        $old_password=$user['password'];
        $old_fullname=$user['fullname'];
        if($old_fullname == 'admin' ){
            header('location:index.php?msg=Bạn không có quyền xóa admin');
            die();
        }
		$query = "DELETE FROM user WHERE id = {$uid}";
		$result = $mysqli->query($query);
		if($result) {
            header('location: /admin/user/index.php?msg=Xóa thanh cong');
            die();
            }
            else {
                header('location: /admin/user/index.php?msg=Co loi xay ra');
                die();
            }
	?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/footer.php'; ?>