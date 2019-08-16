<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm truyện</h2>
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
                                    $tentruyen = $_POST['tentruyen'];
                                    $chitiet = $_POST['chitiet'];
                                    $mota =$_POST['mota'];
                                    if(empty($tentruyen)){
                                        $error['tentruyen']='<p style = "color:red">Bạn chưa nhập tên</p>';
                                    }
                                    if(empty($mota)){
                                        $error['mota']='<p style = "color:red">Bạn chưa nhập mô tả</p>';
                                    }
                                    if(empty($chitiet)){
                                        $error['chitiet']='<p style = "color:red">Bạn chưa nhập chi tiết</p>';
                                    }
                                    if(!$error){


                                    $name = $_POST['tentruyen'];
                                    
                                        $queryNameStory = "select name from news where name = '{$name}'";
                                        $resultNameStory = $mysqli->query($queryNameStory);
                                        if(mysqli_num_rows($resultNameStory)>0){
                                            echo "<p style = 'color:red'>Tên tin tức đã tồn tại</p>";
                                        } else{

                                            $cat_id = $_POST['danhmuctruyen'];
                                            $picture = $_FILES['hinhanh']['name'];
                                            $preview_text = $_POST['mota'];
                                            


                                                $detail_text = $_POST['chitiet'];
                                                
                                                    if($picture==''){
                                                        $queryAdd = "insert into news(name,preview,detail,cat_id,active) values('{$name}','{$preview_text}','{$detail_text}','{$cat_id}','0')";
                                                        $kq=$mysqli->query($queryAdd);
                                                        if($kq){
                                                            header('location:index.php?msg=Them thanh cong');
                                                        } else {
                                                            header('location:index.php?msg=Them khong thanh cong');
                                                        }
                                                    } else {
                                                        $tmp = explode('.', $picture);
                                                        $duoifile = end($tmp);
                                                        $tenFileMoi = 'VNE-'.time().'.'.$duoifile;
                                                        $tmp_name = $_FILES['hinhanh']['tmp_name'];
                                                        $patch_upload = $_SERVER['DOCUMENT_ROOT'].'/files/img/'.$tenFileMoi;
                                                        move_uploaded_file($tmp_name, $patch_upload);
                                                        $queryAdd = "insert into news(name,preview,detail,cat_id,picture,active) values('{$name}','{$preview_text}','{$detail_text}','{$cat_id}','{$tenFileMoi}','0')";
                                                        $kq=$mysqli->query($queryAdd);
                                                        if($kq){
                                                            header('location:index.php?msg=Them thanh cong');
                                                        } else {
                                                            header('location:index.php?msg=Them khong thanh cong');
                                                        }
                                                    }
                                                
                                            
                                        }
                                    } else {
                                        
                                    }
                                }

                                ?>
                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên truyện</label>
                                        <input type="text" name="tentruyen" class="form-control" />
                                        <?php if(isset($error['tentruyen'])){
                                            echo $error['tentruyen'];
                                        } ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Danh mục truyện</label>
                                        <select class="form-control" name = "danhmuctruyen">
                                            <?php  
                                                $queryCat = "select * from cat ";
                                                $kq = $mysqli->query($queryCat);
                                                while ($arrCat = mysqli_fetch_assoc($kq)) {
                                            ?>
                                            <option value="<?php echo $arrCat['id'] ?>">
                                                <?php echo $arrCat['name'] ?>
                                            </option>}
                                        <?php } ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="hinhanh" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="ckeditor" rows="3" name="mota"></textarea>
                                        <?php if(isset($error['mota'])){
                                            echo $error['mota'];
                                        } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea class="ckeditor" rows="5" name="chitiet"></textarea>
                                        <?php if(isset($error['chitiet'])){
                                            echo $error['chitiet'];
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
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/doanvinaenter/bstory/template/admin/inc/footer.php'; ?>