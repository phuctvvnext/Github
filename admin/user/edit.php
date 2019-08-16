<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                <?php  
                                    $uid=$_GET['id'];
                                    $queryUser  ="select * from user where id = {$uid}";
                                    $resultUser = $mysqli->query($queryUser);
                                    $user = mysqli_fetch_assoc($resultUser);
                                    $old_username=$user['email'];
                                    $old_password=$user['password'];
                                    $old_fullname=$user['fullname'];
                                    if($old_fullname == 'admin' && $_SESSION['user']['username']!='admin'){
                                        header('location:index.php?msg=Bạn không có quyền sửa admin');
                                    }

                                    if(isset($_POST['submit'])) {
                                        $username = trim($_POST['username']);
                                        $password = md5(trim($_POST['password']));
                                        $fullname = trim($_POST['fullname']);
                                        if($password !='') {
                                            $query = "update users SET
                                                email  = '{$username}',
                                                password =  '{$password}',
                                                fullname =  '{$fullname}'
                                                where id = {$uid}
                                            ";
                                        } else{
                                            $query = "update users SET
                                                email  = '{$username}',
                                                fullname =  '{$fullname}'
                                                where id = {$uid}";
                                        }
                                           $result = $mysqli->query($query);
                                           if($result) {
                                            header('location: /admin/user/index.php?msg=Da sua thanh cong');
                                            die();
                                        }
                                        else {
                                            header('location: /admin/user/index.php?msg=Co loi xay ra');
                                            die();
                                        }
                                        
                                    }
                                ?>
                                <form action=""role="form" method="POST">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $old_username ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" value="<?php echo $old_fullname ?>" />
                                    </div>
                                   
                                    <button type="submit" name="submit" class="btn btn-success btn-md">sua</button>
                                </form>



                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/footer.php'; ?>