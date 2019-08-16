<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="/template/admin/assets/img/find_user.png" class="user-image img-responsive" />
            </li>


            <li>
                <a class="active-menu" href="/admin"><i class="fa fa-dashboard fa-3x"></i> Trang chủ</a>
            </li>
            <li>
                <a href="/admin/cat/"><i class="fa fa-bar-chart-o fa-3x"></i> Quản lý danh mục</a>
            </li>
            <li>
                <?php  
                    $query = "select count(id) as cd from news where active = '0'";
                    $result = $mysqli->query($query);
                    $arrCD = mysqli_fetch_assoc($result);
                    $tcd = $arrCD['cd'];

                ?>
                <a href="/admin/tintuc/"><i class="fa fa-qrcode fa-3x"></i> Quản lý tin tức
                    <?php  
                        if($tcd != '0') {
                    ?>
                    <span title="Tin tức chưa được duyệt" class="badge abc" style="background-color: red;"><?php echo $tcd ?></span>
                <?php } else { 

                 ?>

                <span title="Tin tức chưa được duyệt" class="badge abc" style="background-color: red;"></span>
            <?php } ?>
                </a>
            </li>
            <li>
                <a href="/admin/user/"><i class="fa fa-sitemap fa-3x"></i> Quản lý người dùng</a>
            </li>
            <li>
                <?php  
                    $query1 = "select count(id) as cm from comment where active = '0'";
                    $result1 = $mysqli->query($query1);
                    $arrCD1 = mysqli_fetch_assoc($result1);
                    $tcd1 = $arrCD1['cm'];

                ?>
                <a href="/admin/comment/"><i class="fa fa-qrcode fa-3x"></i> Quản lý bình luận
                    <?php  
                        if($tcd1 != '0') {
                    ?>
                    <span title="Comment chưa được duyệt" class="badge abc123" style="background-color: red;"><?php echo $tcd1 ?></span>
                <?php } else { ?>
                    <span title="Comment chưa được duyệt" class="badge abc123" style="background-color: red;"></span>
                <?php } ?>
                </a>
            </li>

        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->