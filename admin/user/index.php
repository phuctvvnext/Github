<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>
<?php  
    $queryAllrow = "select count(*) as tsd from user";
    $resultAllrow = $mysqli->query($queryAllrow);
    $arrAllrow = mysqli_fetch_assoc($resultAllrow);
    $tongsodong = $arrAllrow['tsd'];
  //so truyen tren 1 trang
    $row_count = ROW_COUNT;
  //tong so trang
     $tongsotrang = ceil($tongsodong/$row_count);
  //trang hien tai
    $current_page =1;
    if(isset($_GET['page'])){
        $current_page=$_GET['page'];
  }
  $offset = ($current_page - 1) * $row_count; 
  ?>
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <?php  
                    if(isset($_GET['msg'])) {
                        echo "<p>{$_GET['msg']}</p>";
                    }
                ?>
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="/admin/user/add.php" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Fullname</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $query = "select * from user order by id desc limit {$offset} , {$row_count}";
                                        $result = $mysqli->query($query);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            $username =$row['email'];
                                            $password = $row['password'];
                                            $fullname= $row['fullname'];
                                            //tao link
                                            $urlEdit = "/admin/user/edit.php?id={$id}";
                                            $urlDel = "/admin/user/delete.php?id={$id}";

                                    ?>
                                    <tr class="">
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $fullname ?></td>
                                        <td class="center">
                                            <?php  
                                                if($fullname != 'admin' || $_SESSION['user']['fullname']=='admin') {
                                            ?>
                                            <a href="<?php echo $urlEdit ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <?php } ?>
                                            <?php if($fullname != 'admin') {?>
                                            <a href="<?php echo $urlDel ?>" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến 5 của 24 truyện</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                       <ul class="pagination">

                                            <?php for($i=1;$i<=$tongsotrang;$i++){
                                                $active='';
                                                if($i==$current_page){
                                                    $active='active';
                                                }
                                            ?>

                                            <li class="paginate_button <?php echo $active ?>" ><a href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                        <?php } ?>
                                           
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/footer.php'; ?>