
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>

<?php  
    //tong so dòng
  $queryAllrow = "select count(*) as tsd from news ";
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
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý truyện</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <?php if(isset($_GET['msg'])) {
                                    echo $_GET['msg'];
                                }?>
                                <div class="col-sm-6">
                                    <a href="/admin/tintuc/add.php" class="btn btn-success btn-md">Thêm</a>
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
                                        <th>Danh mục</th>
                                        <th>Lượt đọc</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạnh thái</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $queryBstory = "select * from news order by active,date_create DESC limit {$offset},{$row_count}";
                                        $kq = $mysqli->query($queryBstory);
                                        //print_r($kq);
                                        while($arrTintuc = mysqli_fetch_assoc($kq)){
                                    ?>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <td><?php echo $arrTintuc['id'] ?></td>
                                        <td><?php echo $arrTintuc['name'] ?></td>
                                        <td><?php echo $arrTintuc['cat_id'] ?></td>
                                        <td><?php echo $arrTintuc['view'] ?></td>
                                       
                                        <td class="center">
                                            <?php  
                                                if($arrTintuc['picture']=='') {
                                                    echo 'Không có hình ảnh';
                                                } else {
                                            ?>
                                            <img src="/files/img/<?php echo $arrTintuc['picture']?>" alt="" height="80px" width="100px" />
                                            <?php  
                                                }
                                            ?>
                                        </td>
                                        <td class = "item-<?php echo $arrTintuc['id'] ?>">
                            
                                            <?php if($arrTintuc['active']=='1' ) {?>

                                        <a href="javascript:void(0)" onclick="xyLyTrangThai(<?php echo $arrTintuc['id']?>,<?php echo $arrTintuc['active'] ?>) "><img src="/files/icon/active1.gif" alt="" /></a>
                                        <?php }else{ ?>
                                        <a href="javascript:void(0)" onclick="xyLyTrangThai(<?php echo $arrTintuc['id']?>,<?php echo $arrTintuc['active'] ?>)"><img src="/files/icon/deactive1.gif" alt="" /></a>
                                        <?php } ?>
                                </td>
                                        <td class="center">
                                            <a href="edit.php?id=<?php echo $arrTintuc['id'] ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <a href="delete.php?id=<?php echo $arrTintuc['id'] ?>" title="" class="btn btn-danger" ><i class="fa fa-pencil"></i> Xóa</a>
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
<script>
        
            function xyLyTrangThai(id,isActive) {
                //alert('id'+id,trangthai);
               
                

            $.ajax({
                    url: 'ajax/xyLyTrangThai.php',
                    type: 'POST',
                    cache: false,
                    data: {
                        id : id,
                        isActive : isActive

                    },
                    
                    success: function(data){
                        
                        //alert(data);
                        if(isActive == 1){
                            var ac = "<a id = 'ckeck' href='javascript:void(0)'  onclick='xyLyTrangThai("+id+",0);'><img src='/files/icon/deactive1.gif' /></a>";
                            $('.item-'+id).html(ac);

                        } else {
                            var uc = "<a id = 'ckeck' href='javascript:void(0)'   onclick='xyLyTrangThai("+id+",1);''><img src='/files/icon/active1.gif'/></a>";
                            $('.item-'+id).html(uc);
                        }
                        $('.abc').html(data);
                        
                        
                        
                    
                    },
                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                
                });
                return false;
            } 
        
    </script>
<!-- /. PAGE INNER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/footer.php'; ?>