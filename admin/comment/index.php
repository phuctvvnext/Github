
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/header.php'; ?>
<?php      
   require_once $_SERVER['DOCUMENT_ROOT'].'/library/checkLogin.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/leftbar.php'; ?>

<?php  
    //tong so dòng
  $queryAllrow = "select count(*) as tsd from comment ";
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
                <h2>Quản lý comment</h2>
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
                                
                                
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID_comment</th>
                                        <th>Tên tin</th>
                                        <th>Người bình luận</th>
                                        <th>Nội dung</th>
                                        <th>Trạnh thái</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $queryBL = "select * from comment order by date_create DESC limit {$offset},{$row_count}";
                                        $kq = $mysqli->query($queryBL);
                                        //print_r($kq);
                                        while($arrBL = mysqli_fetch_assoc($kq)){
                                    ?>
                                    <tr class="<?php echo $cl?> gradeX">
                                        <td><?php echo $arrBL['id'] ?></td>
                                        <td><?php echo $arrBL['news_id'] ?></td>
                                        <td><?php echo $arrBL['name_user'] ?></td>
                                        <td><?php echo $arrBL['content'] ?></td>
                                       
                                        
                                        <td class = "item-<?php echo $arrBL['id'] ?>">
                            
                                            <?php if($arrBL['active']=='1' ) {?>

                                        <a href="javascript:void(0)" onclick="xyLyTrangThai(<?php echo $arrBL['id']?>,<?php echo $arrBL['active'] ?>) "><img src="/files/icon/active1.gif" alt="" /></a>
                                        <?php }else{ ?>
                                        <a href="javascript:void(0)" onclick="xyLyTrangThai(<?php echo $arrBL['id']?>,<?php echo $arrBL['active'] ?>)"><img src="/files/icon/deactive1.gif" alt="" /></a>
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
                        $('.abc123').html(data);
                        
                        
                        
                    
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