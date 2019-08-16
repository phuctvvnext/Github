<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm người dùng</h2>
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
                                 $error = array();  
                                    if(isset($_POST['submit'])) {
                                        $username = trim($_POST['email']);
                                        $password1 = (trim($_POST['password']));
                                        $fullname = trim($_POST['fullname']);
                                            if(empty($username)){
                                                $error['username']='<p style = "color:red">Bạn chưa nhập username</p>';
                                            }
                                            if($password1==''){
                                                $error['password']='<p style = "color:red">Bạn chưa nhập password</p>';
                                            }
                                            if(empty($fullname)){
                                                $error['fullname']='<p style = "color:red">Bạn chưa nhập fullname</p>';
                                            }
                                            if(!$error){
                                                $queryNameUser = "select email from user where email = '{$username}'";
                                        $resultNameUser = $mysqli->query($queryNameUser);
                                        if(mysqli_num_rows($resultNameUser)>0){
                                            echo "<p style = 'color:red'>Tên người dùng đã tồn tại</p>";
                                        } else{
                                        $password = md5(trim($_POST['password']));
                                        $query = "insert into user(email,password,fullname) values('{$username}','{$password}','{$fullname}')";
                                        $result = $mysqli->query($query);
                                        if($result) {
                                            header('location: /admin/user/index.php?msg=Da them thanh cong');
                                            die();
                                        }
                                        else {
                                            header('location: /admin/user/index.php?msg=Co loi xay ra');
                                            die();
                                        }
                                    }
                                    } else {

                                    }
                                }
                                ?>
                                <form action=""role="form" method="POST">
                                    <div class="form-group">
                                        <label>email</label>
                                        <input type="text" name="email" class="form-control" />
                                         <?php if(isset($error['username'])){
                                            echo $error['username'];
                                        } ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" />
                                         <?php if(isset($error['password'])){
                                            echo $error['password'];
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" />
                                         <?php if(isset($error['fullname'])){
                                            echo $error['fullname'];
                                        } ?>
                                    </div>
                                   
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
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