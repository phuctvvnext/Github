<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm danh mục</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <?php  
                    if(isset($_POST['submit'])){
                        $name=$_POST['tendanhmuc'];
                        $danhmuccha = $_POST['danhmuccha'];
                        if($name!=''){
                            $queryNameCat = "select name from cat where name = '{$name}'";
                            $resultNameCat = $mysqli->query($queryNameCat);
                                if(mysqli_num_rows($resultNameCat)>0){
                                    echo "<p style = 'color:red'>Danh mục tin tức đã tồn tại</p>";
                            } else {
                            $addCat="INSERT INTO cat(name,parent_id) VALUES ('{$name}','{$danhmuccha}')";
                            $queryaddCat=$mysqli->query($addCat);
                            if($queryaddCat){
                                header('location:index.php?msg=Thêm thành công');
                                die();
                            }
                            else{
                                echo "Có lỗi khi thêm danh mục";
                            }
                        }
                    }
                    else{
                        $error = '<p style="color:red">Bạn phải nhập tên danh mục</p>';
                    }
                }

                ?>
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                <form role="form" method="POST">
                                    <div class="form-group">
                                        <label>Tên danh muc</label>
                                        <input type="text" name="tendanhmuc" class="form-control" />
                                        <?php  
                                            if(isset($error)){
                                                echo $error;
                                            }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục cha</label>
                                        <select class="form-control" name = "danhmuccha">
                                            <option value="0">Không</option>
                                            <?php  
                                                $queryCat = "select * from cat where parent_id = '0' ";
                                                $kq = $mysqli->query($queryCat);
                                                while ($arrCat = mysqli_fetch_assoc($kq)) {
                                            ?>

                                            <option value="<?php echo $arrCat['id'] ?>">
                                                <?php echo $arrCat['name'] ?>
                                            </option>}
                                        <?php } ?>
                                        </select>

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