<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>
<?php  
    $queryAllrow = "select count(*) as tsd from cat where parent_id = '0'";
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
                <h2>Quản lý danh mục</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <?php if(isset($_GET['msg'])) 
            echo $_GET['msg'];
        ?>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="/admin/cat/add.php" class="btn btn-success btn-md">Thêm</a>
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
                                        <th>Tên</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $list_cat="select id,name from cat where parent_id = '0' limit {$offset},{$row_count}";
                                $kqlist_cat=$mysqli->query($list_cat);
                                while ($kqarlist_cat = mysqli_fetch_assoc($kqlist_cat)) {
                                    $id_cat=$kqarlist_cat['id'];
                                    $name_cat=$kqarlist_cat['name'];
                                
                             ?>
                                    
                                    <tr class="gradeX">
                                        <td><?php echo $id_cat ?></td>
                                        <td><?php echo $name_cat ?>
                                        <?php  
                                            $queryCat = "select * from cat where parent_id = '{$kqarlist_cat['id']}'";
                                            $result  = $mysqli->query($queryCat);
                                            while($arrCat = mysqli_fetch_assoc($result)) {


                                        ?>
                                            <li>
                                                <?php echo $arrCat['name'] ?>
                                                
                                                <a href="edit.php?id=<?php echo $arrCat['id'] ?>" title="" ><i class="fa fa-edit "></i> Sửa</a>
                                                <a href="delete.php?id=<?php echo $arrCat['id'] ?>" title="" ><i class="fa fa-pencil"></i> Xóa</a>
                                        
                                            </li>
                                    <?php } ?>
                                    </td>
                                       
                                        <td class="center">
                                            <a href="edit.php?id=<?php echo $id_cat ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <a href="delete.php?id=<?php echo $id_cat ?>" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ <?php echo $offset+1 ?> đến <?php echo $row_count*$current_page ?> của <?php echo $tongsodong ?> truyện</div>
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