<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa danh mục</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <?php  
                    $id_cat=$_GET['id'];
                    $sql="select * from cat where id={$id_cat}";
                    $kqsql=$mysqli->query($sql);
                    $arrkqsql=mysqli_fetch_assoc($kqsql);
                    if(isset($_POST['submit'])){
                        $name=$_POST['tendanhmuc'];
                        $danhmuccha = $_POST['danhmuccha'];
                        $queryEdit="update cat set name='{$name}',parent_id = '{$danhmuccha}'
                                    where id='{$id_cat}'";
                        if($name!=''){
                            $queryEditCat=$mysqli->query($queryEdit);
                            if($queryEditCat){
                                header('location:index.php?msg=Sửa thành công');
                                die();
                            }
                            else{
                                echo "Có lỗi khi sửa danh mục";
                            }
                    }
                    else{
                        echo 'Bạn phải nhập tên danh mục';
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
                                        <label>Sửa danh muc</label>
                                        <input type="text" name="tendanhmuc" class="form-control" value="<?php echo $arrkqsql['name']; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục cha</label>
                                        <select class="form-control" name = "danhmuccha">
                                            <option value="0">Không</option>
                                            <?php  
                                                $queryCat = "select * from cat ";
                                                $kq = $mysqli->query($queryCat);
                                                while ($arrCat = mysqli_fetch_assoc($kq)) {
                                            ?>
                                            <option 
                                            <?php  
                                                if($arrkqsql['parent_id']==$arrCat['id']){
                                                    echo 'selected="selected"';
                                                } else{
                                                    echo '';
                                                }
                                            ?>
                                            value="<?php echo $arrCat['id'] ?>">
                                                <?php echo $arrCat['name'] ?>
                                            </option>}
                                        <?php } ?>
                                        </select>

                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
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