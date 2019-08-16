<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa truyện</h2>
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

                                    $truyenID=$_GET['id'];  
                                    $queryTruyen = "select ne.cat_id,ne.id,ne.name,ne.preview,ne.detail,ne.picture,ne.view,ne.date_create,ca.name as name_cat  from news as ne join cat as ca on ne.cat_id = ca.id where ne.id = '{$truyenID}'";
                                    $kqqr = $mysqli->query($queryTruyen);
                                    $arrTruyen = mysqli_fetch_assoc($kqqr);
                                    
                               
                                    if(isset($_POST['submit'])) {
                                        $name = $_POST['tentruyen'];
                                        $cat_id = $_POST['danhmuctruyen'];
                                        $picture = $_FILES['hinhanh']['name'];
                                        $preview_text = $_POST['mota'];
                                        $detail_text = $_POST['chitiet'];
                                        if($picture==''){
                                            $queryAdd = "update news 
                                            set name='{$name}',cat_id='{$cat_id}',preview='{$preview_text}',detail='{$detail_text}' 
                                            where id='{$_GET['id']}'";
                                            $kq=$mysqli->query($queryAdd);
                                            if($kq){
                                                header('location:index.php?msg=Sửa thanh cong');
                                            } else {
                                                header('location:index.php?msg=Sửa khong thanh cong');
                                            }
                                        } else {
                                            if($arrTruyen['picture'] != ''){
                                                unlink($_SERVER['DOCUMENT_ROOT'].'/files/img/' .$arrTruyen['picture']);    
                                            }
                                            $tmp = explode('.', $picture);
                                            $duoifile = end($tmp);
                                            $tenFileMoi = 'VNE-'.time().'.'.$duoifile;
                                            $tmp_name = $_FILES['hinhanh']['tmp_name'];
                                            $patch_upload = $_SERVER['DOCUMENT_ROOT'].'/files/img/'.$tenFileMoi;
                                            move_uploaded_file($tmp_name, $patch_upload);
                                             $queryAdd = "update news set name='{$name}',cat_id='{$cat_id}',preview='{$preview_text}',detail='{$detail_text}',picture='{$tenFileMoi}' where id='{$_GET['id']}'";
                                            $kq=$mysqli->query($queryAdd);
                                            if($kq){
                                                header('location:index.php?msg=Sua thanh cong');
                                            } else {
                                                header('location:index.php?msg=Sua khong thanh cong');
                                            }
                                        }
                                    }

                                ?>
                               
                                <form role="form" method="POST" name="frmLogin" id="frmLogin" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên truyện</label>
                                        <input type="text" name="tentruyen" class="form-control"
                                        value="<?php echo $arrTruyen['name'] ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Danh mục truyện</label>
                                        <select class="form-control" name = "danhmuctruyen">
                                            <?php  
                                                $queryCat = "select * from cat ";
                                                $kq = $mysqli->query($queryCat);
                                                while ($arrCat = mysqli_fetch_assoc($kq)) {
                                            ?>
                                            <option 
                                            <?php  
                                                if($arrTruyen['cat_id']==$arrCat['id']){
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
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <img src="/files/img/<?php echo $arrTruyen['picture'] ?>">
                                        <input type="file" name="hinhanh" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="ckeditor" rows="3" name="mota" ><?php echo $arrTruyen['preview'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea class="ckeditor" rows="5" name="chitiet"><?php echo $arrTruyen['detail'] ?></textarea>
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