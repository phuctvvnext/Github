<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/itshare/inc/header.php'; ?>
<!-- header_section_wrapper -->

<section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
html
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive top_static_article_img" src="/template/itshare/assest/img/feature-top.jpg"
                             alt="feature-top">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">Tin mới nhất</a></div>
                        <?php  
                            $queryNews1 = "select * from news where active = '1' ORDER BY date_create desc limit 1";
                            $result1 = $mysqli->query($queryNews1);
                            $arrNews1 = mysqli_fetch_assoc($result1);
                            $new_name = utf8ToLatin($arrNews1['name']);
                            $news_id = $arrNews1['id'];
                            $url = new LibraryString();
                            $str = $new_name.'-'.$news_id;
                            

                           // $url = '/ct/'.$new_name.'-'.$news_id.'.html'; 
                        ?>
                        <div class="feature_article_title">
                            <h1><a href="<?php echo $url->getUrlRewrite($str,'/ct','html') ?>" target="_self"><?php echo $arrNews1['name'] ?></a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self"><?php echo $arrNews1['created_by'] ?></a>,<a href="#"><?php echo $arrNews1['date_create'] ?></a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            <?php echo $arrNews1['preview'] ?>
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-share-alt"></i><a href="#"><?php echo $arrNews1['view'] ?></a>lượt đọc</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">4</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_article_wrapper -->

            </div>
            <!-- col-md-7 -->
            <?php  
                $queryNewLD = "select * from news where active = '1' order by view DESC limit 2";
                $resultNewLD = $mysqli->query($queryNewLD);
                while($arrNewLD = mysqli_fetch_assoc($resultNewLD)){
                    $new_name = utf8ToLatin($arrNewLD['name']);
                    $news_id = $arrNewLD['id'];
                    $url = '/ct/'.$new_name.'-'.$news_id.'.html'; 
            ?>
            <div class="col-md-5">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive" src="/template/itshare/assest/img/feature-static1.jpg" alt="feature-top">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="category.html">Tin xem nhiều</a></div>
                        <div class="feature_article_title">
                            <h1><a href="<?php echo $url ?>" target="_self"><?php echo $arrNewLD['name'] ?></a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self"><?php echo $arrNewLD['created_by'] ?></a>,<a href="#"><?php echo $arrNewLD['date_create'] ?></a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            <?php echo $arrNewLD['preview'] ?>
                        </div>
                        <!-- feature_article_content -->
			<p> sua file index</p>
                        <div class="article_social">
                            <span><i class="fa fa-share-alt"></i><a href="#"><?php echo $arrNewLD['view'] ?></a>lượt đọc</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">4</a>fa-comments-o</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
		<p>hello </p>
            <?php  
                }
            ?>
            <!-- col-md-5 -->

           
            <!-- col-md-5 -->

        </div>
        <!-- Row -->

    </div>
    <!-- container -->

</section>
<!-- Feature News Section -->

<section id="category_section" class="category_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="category_section mobile">
    <div class="article_title header_purple">
        <h2><a href="category.html" target="_self">Tin mới</a></h2>
    </div>
    <?php  
        $queryNews2 = "select * from news where active = '1' ORDER BY date_create desc limit 1,1";
        $result2 = $mysqli->query($queryNews2);
        $arrNews2 = mysqli_fetch_assoc($result2);
        $new_name = utf8ToLatin($arrNews2['name']);
        $news_id = $arrNews2['id'];
        $url = '/ct/'.$new_name.'-'.$news_id.'.html';  
    ?>
    <!----article_title------>
    <div class="category_article_wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="img">
                    <?php  
                            if($arrNews2['picture'] != ''){
                            ?>
                            <a href="<?php echo $url ?>" title="">
                            <img src="/files/img/<?php echo $picture ?>" width="161" height="192" alt="" class="fl" />
                            </a>
                          <?php } ?>
                </div>
                <!----top_article_img------>
            </div>
            <div class="col-md-6">
                <span class="tag purple"><?php echo $arrNews2['cat_id'] ?></span>

                <div class="category_article_title">
                    <h2><a href="<?php echo $url ?>" target="_self"><?php echo $arrNews2['name'] ?></a></h2>
                </div>
                <!----category_article_title------>
                <div class="category_article_date"><a href="#"><?php echo $arrNews2['date_create'] ?></a>, by: <a href="#"><?php echo $arrNews2['created_by'] ?></a></div>
                <!----category_article_date------>
                <div class="category_article_content">
                    <?php echo $arrNews2['preview'] ?>
                </div>
                <!----category_article_content------>
                <div class="media_social">
                    <span><a href="#"><i class="fa fa-share-alt"></i><?php echo $arrNews2['view'] ?></a> lượt đọc</span>
                    <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                </div>
                <!----media_social------>
            </div>
        </div>
    </div>
    <div class="category_article_wrapper">
        <div class="row">
            <?php  
                $queryNews3 = "select * from news where active = '1' ORDER BY date_create desc limit 2,4";
                $result3 = $mysqli->query($queryNews3);
                while($arrNews3 = mysqli_fetch_assoc($result3)){
                $new_name = utf8ToLatin($arrNews3['name']);
                $news_id = $arrNews3['id'];
                $url = '/ct/'.$new_name.'-'.$news_id.'.html';   
            ?>
            <div class="col-md-6">
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="/files/img/<?php echo $arrNews3['picture'] ?>" alt="Generic placeholder image" width="125px" height = "125px"></a>
                    </div>
                    <div class="media-body">
                        <span class="tag purple"><?php echo $arrNews3['cat_id'] ?></span>

                        <h3 class="media-heading"><a href="<?php echo $url ?>" target="_self"><?php echo $arrNews3['name'] ?></a></h3>
                        <span class="media-date"><a href="#"><?php echo $arrNews3['date_create'] ?></a>,  by: <a href="#"><?php echo $arrNews3['created_by'] ?></a></span>

                        <div class="media_social">
                            <span><a href="#"><i class="fa fa-share-alt"></i><?php echo $arrNews3['view'] ?></a> lượt đọc</span>
                            <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                        </div>
                    </div>

                </div>
            </div>
        
            <?php } ?>
        </div>
    </div>
    <p class="divider"><a href="">More News&nbsp;&raquo;</a></p>
</div>
<!-- Mobile News Section -->

<div class="category_section tablet">
    <div class="article_title header_pink">
        <h2><a href="category.html" target="_self">Lập trình</a></h2>
    </div>
    <!-- Mobile News Section -->

    <div class="category_article_wrapper">
        <div class="row">
            <?php  
                $queryNews4 = "select * from news where cat_id = 4 or cat_id =5 or cat_id = 6 and active = '1' ORDER BY date_create desc limit 2";
                $result4 = $mysqli->query($queryNews4);
                while($arrNews4 = mysqli_fetch_assoc($result4)){
                $new_name = utf8ToLatin($arrNews4['name']);
                $news_id = $arrNews4['id'];
                $url = '/ct/'.$new_name.'-'.$news_id.'.html';  
            ?>
            <div class="col-md-6">
                <div class="category_article_body">
                    <div class="top_article_img">
                        <a href="single.html" target="_self">
                            <?php  
                                if($arrNews4['picture'] != ''){
                            ?>
                            <img class="img-responsive" src="/files/img/<?php echo $arrNews4['picture'] ?>" alt="feature-top" width = "250px" height = "250px">
                                 <?php } ?>                                  
                        </a>
                    </div>
                    <!-- top_article_img -->

                    <span class="tag pink"><a href="category.html" target="_self"><?php echo $arrNews4['cat_id'] ?></a></span>

                    <div class="category_article_title">
                        <h2><a href="<?php echo $url ?>" target="_self"><?php echo $arrNews4['name'] ?></a></h2>
                    </div>
                    <!-- category_article_title -->

                    <div class="article_date"><a href="#"><?php echo $arrNews4['date_create'] ?></a>, by: <a href="#"><?php echo $arrNews4['created_by'] ?></a></div>
                    <!----article_date------>
                    <!-- article_date -->

                    <div class="category_article_content">
                        <?php echo $arrNews4['preview'] ?>
                    </div>
                    <!-- category_article_content -->

                    <div class="media_social">
                        <span><a href="#"><i class="fa fa-share-alt"></i><?php echo $arrNews4['view'] ?> </a> lượt đọc</span>
                        <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                    </div>
                    <!-- media_social -->

                </div>
                <!-- category_article_body -->

            </div>
        <?php } ?>
            
            <!-- col-md-6 -->

            
            <!-- col-md-6 -->

        </div>
        <!-- row -->
    </div>
    <!-- category_article_wrapper -->

    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
</div>
<!-- Tablet News Section -->

<div class="category_section gadget">
    <div class="article_title header_black">
        <h2><a href="category.html" target="_self">Tâm sự coder</a></h2>
    </div>
    <div class="category_article_wrapper">
        <div class="row">
            
            <div class="col-md-6">
                <?php  
                    $queryNews5 = "select * from news where cat_id = 3 and  active = '1' ORDER BY date_create desc limit 1";
                    $result5 = $mysqli->query($queryNews5);
                    $arrNews5 = mysqli_fetch_assoc($result5);
                    $new_name = utf8ToLatin($arrNews5['name']);
                    $news_id = $arrNews5['id'];
                    $url = '/ct/'.$new_name.'-'.$news_id.'.html'; 
                ?>
                <div class="category_article_body">
                    <div class="top_article_img">
                        <a href="single.html" target="_self">
                            <img class="img-responsive" src="/files/img/<?php echo $arrNews5['picture'] ?>" alt="feature-top">
                        </a>
                    </div>
                    <!-- top_article_img -->

                    <span class="tag black"><a href="category.html" target="_self"><?php echo $arrNews5['cat_id'] ?></a></span>

                    <div class="category_article_title">
                        <h2><a href="<?php echo $url ?>" target="_self"><?php echo $arrNews5['name'] ?></a>
                        </h2>
                    </div>
                    <!-- category_article_title -->

                    <div class="article_date"><a href="#"><?php echo $arrNews5['date_create'] ?></a>, by: <a href="#"><?php echo $arrNews5['created_by'] ?></a></div>
                    <!----article_date------>
                    <div class="category_article_content">
                        <?php echo $arrNews5['preview'] ?>
                    </div>
                    <!-- category_article_content -->

                    <div class="media_social">
                        <span><a href="#"><i class="fa fa-share-alt"></i><?php echo $arrNews5['view'] ?> </a> lượt đọc</span>
                        <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                    </div>
                    <!-- media_social -->

                </div>
            
                <!-- category_article_body -->
                
                <div class="category_article_list">
                    <?php  
                        $queryNews6 = "select * from news where cat_id = 3 and active = '1' ORDER BY date_create desc limit 1,2";
                        $result6 = $mysqli->query($queryNews6);
                        while($arrNews6 = mysqli_fetch_assoc($result6)) {
                        $new_name = utf8ToLatin($arrNews6['name']);
                        $news_id = $arrNews6['id'];
                        $url = '/ct/'.$new_name.'-'.$news_id.'.html'; 
                     ?>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="/files/img/<?php echo $arrNews6['picture'] ?>"
                                             alt="Generic placeholder image" style = "width: 150px; height: 150px;"></a>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><a href="<?php echo $url ?>" target="_self"><?php echo $arrNews6['name'] ?></a></h3>
                            <span class="media-date"><a href="#"><?php echo $arrNews6['date_create'] ?></a>,  by: <a href="#"><?php echo $arrNews6['created_by'] ?></a></span>

                            <div class="media_social">
                                <span><a href="#"><i class="fa fa-share-alt"></i><?php echo $arrNews6['view'] ?></a> lượt đọc</span>
                                <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                            </div>
                        </div>
                    </div>
                   
                <?php } ?>
                </div>

                <!-- category_article_list -->

            </div>
            <!-- col-md-6 -->

            <div class="col-md-6">
                <?php  
                    $queryNews10 = "select * from news where cat_id = 3 and  active = '1' ORDER BY date_create desc limit 3,1";
                    $result10 = $mysqli->query($queryNews10);
                    $arrNews10 = mysqli_fetch_assoc($result10);
                    $new_name = utf8ToLatin($arrNews10['name']);
                        $news_id = $arrNews10['id'];
                        $url = '/ct/'.$new_name.'-'.$news_id.'.html'; 
                ?>
                <div class="category_article_body">
                    <div class="top_article_img">
                        <img class="img-responsive" src="/files/img/<?php echo $arrNews10['picture'] ?>" alt="feature-top">
                    </div>
                    <!-- top_article_img -->

                    <span class="tag black"><?php echo $arrNews10['cat_id'] ?></span>

                    <div class="category_article_title">
                        <h2><a href="<?php echo $url ?>" target="_self"><?php echo $arrNews10['name'] ?></a></h2>
                    </div>
                    <!-- category_article_title -->

                    <div class="article_date"><a href="#"><?php echo $arrNews10['date_create'] ?></a>, by: <a href="#"><?php echo $arrNews10['created_by'] ?></a></div>
                    <!-- article_date -->

                    <div class="category_article_content">
                        <?php echo $arrNews10['preview'] ?>
                    </div>
                    <!-- category_article_content -->

                    <div class="article_social">
                        <span><i class="fa fa-share-alt"></i><a href="#"><?php echo $arrNews10['view'] ?></a>lượt đọc</span>
                        <span><i class="fa fa-comments-o"></i><a href="#">4</a>Comments</span>
                    </div>
                    <!-- article_social -->

                </div>
                <!-- category_article_body -->
            </div>
        </div>
        <!-- row -->

    </div>
    <!-- category_article_wrapper -->

    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
</div>
<!-- Gadget News Section -->

<div class="category_section camera">
    <div class="article_title header_orange">
        <h2><a href="category.html" target="_self">Công nghệ</a></h2>
    </div>
    <!-- article_title -->
    <?php  
        $queryNews7 = "select * from news where cat_id = 1 and active = '1' ORDER BY date_create desc limit 3";
        $result7 = $mysqli->query($queryNews7);
        while($arrNews7 = mysqli_fetch_assoc($result7)){
         $new_name = utf8ToLatin($arrNews7['name']);
                        $news_id = $arrNews7['id'];
                        $url = '/ct/'.$new_name.'-'.$news_id.'.html';  
    ?>
    <div class="category_article_wrapper">
        <div class="row">
            <div class="col-md-5">
                <div class="top_article_img">
                    <?php  
                        if($arrNews7['picture'] != ''){
                    ?>
                    <a href="single.html" target="_self">
                        <img class="img-responsive" src="/files/img/<?php echo $arrNews7['picture'] ?>" alt="feature-top" >
                    </a>
                <?php } ?>
                </div>
                <!-- top_article_img -->

            </div>
            <div class="col-md-7">
                <span class="tag orange"><?php echo $arrNews7['cat_id'] ?></span>

                <div class="category_article_title">
                    <h2><a href="<?php echo $url ?>" target="_self"><?php echo $arrNews7['name'] ?></a></h2>
                </div>
                <!-- category_article_title -->

                <div class="article_date"><a href="#"><?php echo $arrNews7['date_create'] ?></a>, by: <a href="#"><?php echo $arrNews7['created_by'] ?></a></div>
                <!----article_date------>
                <!-- category_article_wrapper -->

                <div class="category_article_content">
                    <?php echo $arrNews7['preview'] ?>
                </div>
                <!-- category_article_content -->

                <div class="media_social">
                    <span><a href="#"><i class="fa fa-share-alt"></i><?php echo $arrNews7['view'] ?> </a> lượt đọc</span>
                    <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                </div>
                <!-- media_social -->

            </div>
            <!-- col-md-7 -->

        </div>
        <!-- row -->

    </div>
    <?php  
        }
    ?>
    <!-- category_article_wrapper -->

   
    <!-- category_article_wrapper -->

    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
</div>
<!-- Camera News Section -->


<!-- Design News Section -->
</div>
<!-- Left Section -->

<div class="col-md-4">

<!-- Popular News -->


<!-- Advertisement -->


<!-- Advertisement -->

<?php
     require_once $_SERVER['DOCUMENT_ROOT'].'/template/itshare/inc/right_bar.php'; 
?>
<!-- Reviews News -->


<!-- Advertisement -->


<!-- Most Commented News -->


<!-- Editor News -->


<!--Advertisement -->


<!--  Readers Corner News -->


<!--Advertisement-->
</div>
<!-- Right Section -->

</div>
<!-- Row -->

</div>
<!-- Container -->

</section>
<!-- Category News Section -->


<!-- Video News Section -->


<!-- Subscriber Section -->


<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/itshare/inc/footer.php'; ?>
