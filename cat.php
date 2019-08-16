<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/itshare/inc/header.php'; ?>

<?php
$cat_id = $_GET['id'];

?>
<?php  
    //tong so dòng
  $queryAllrow = "select count(*) as tsd from news where cat_id = '{$cat_id}' and active = '1' ";
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

  <?php  
  $queryCat = "select * from cat where id = '{$cat_id}' " ;
  $result = $mysqli->query($queryCat);
  $arrCat = mysqli_fetch_assoc($result);
  
?>


<!-- header_section_wrapper -->
<p>test git</p>
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Tech</a></li>
                <li class="active"><a href="#"></a></li>
            </ol>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8">

            <!-- entity_wrapper -->

            <div class="row">
                <?php

                $queryNews1 = "select * from news where cat_id = '{$cat_id}' and active = '1' limit {$offset},{$row_count}";
                $resultQR1 = $mysqli->query($queryNews1);
                while($arrNews1 = mysqli_fetch_assoc($resultQR1)){
                    $new_name = utf8ToLatin($arrNews1['name']);
                    $news_id = $arrNews1['id'];
                    $url = '/ct/'.$new_name.'-'.$news_id.'.html';
                    ?>
                    <div class="col-md-6">
                        
                            <div class="top_article_img" >
                                <img class="img-fluid" src="/files/img/<?php echo $arrNews1['picture'] ?>" alt="feature-top" style="width: 300px; height: 200px;">
                            </div>
                            <!-- top_article_img -->

                            <div class="category_article_title">
                                <h5><a href="<?php echo $url ?>" target="_blank"><?php echo $arrNews1['name'] ?></a></h5>
                            </div>
                            <!-- category_article_title -->

                            <div class="article_date">
                                <a href="#">10Aug- 2015</a>, by: <a href="#">Eric joan</a>
                            </div>
                            <!-- article_date -->

                            <div class="category_article_content">
                                <?php echo $arrNews1['preview'] ?>
                            </div>
                            <!-- category_article_content -->

                            <div class="article_social">
                                <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
                            </div>
                            <!-- article_social -->

                       
                        <!-- category_article_body -->

                    </div>

                <?php } ?>
                <!-- col-md-6 -->


                <!-- col-md-6 -->

            </div>
            <!-- row -->

            
            <!-- col-md-6 -->


            <!-- row -->
            <nav aria-label="Page navigation" class="pagination_section">
                <ul class="pagination">
                    <?php  
                        $phanTrangLibrary = new LibraryString();
                        
                    ?>
                    <?php for($i=1;$i<=$tongsotrang;$i++){ 
                      //  $urlPT =  '/dmuc/'.utf8ToLatin($arrCat['name']).'-'.$arrCat['id'].'/page/'.$i ; 
                      $str = utf8ToLatin($arrCat['name']).'-'.$arrCat['id'].'/page/'.$i;
                      $urlPT =  $phanTrangLibrary->getUrlRewrite($str,'/dmuc','html');  
                        ?>

                        <?php if($i==$current_page) {?>
                            <li><a style="background-color: #0000ff" aria-hidden="true"><?php echo $i ?></a></li>
                        <?php } else {?>

                          

                          <li><a  href="<?php echo $urlPT  ?>" title="" ><?php echo $i ?></a></li>

                      <?php } ?>
                  <?php } ?>


              </ul>
          </nav>


           


            <!-- navigation -->

        </div>
        <!-- col-md-8 -->

        <div class="col-md-4">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/template/itshare/inc/right_bar.php'; 
            ?>
            <!-- Popular News -->

            <div class="widget hidden-xs m30">
                <img class="img-responsive adv_img" src="assets/img/right_add1.jpg" alt="add_one">
                <img class="img-responsive adv_img" src="assets/img/right_add2.jpg" alt="add_one">
                <img class="img-responsive adv_img" src="assets/img/right_add3.jpg" alt="add_one">
                <img class="img-responsive adv_img" src="assets/img/right_add4.jpg" alt="add_one">
            </div>
            <!-- Advertisement -->


            <!-- Advertisement -->
            <div class="widget">
                <?php 
                $queryNameCat = "select * from cat where id = '{$cat_id}'";
                $resultNameCat = $mysqli->query($queryNameCat);
                $arrNamCat = mysqli_fetch_assoc($resultNameCat); 

                ?>
                <div class="widget_title widget_black">
                    <h2><a href="#">5 tin <?php echo $arrNamCat['name'] ?> đọc nhiều</a></h2>
                </div>
                <?php  
                $queryNews = "select * from news where cat_id = '{$cat_id}' ORDER BY view desc limit 5";
                $result = $mysqli->query($queryNews);
                while($arrNews = mysqli_fetch_assoc($result)){
                $new_name = utf8ToLatin($arrNews['name']);
                $news_id = $arrNews['id'];
                $url = '/ct/'.$new_name.'-'.$news_id.'.html';  
                    ?>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="/files/img/<?php echo $arrNews['picture'] ?>" alt="Generic placeholder image" style = "width: 100px;height: 100px"></a>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="<?php echo $url ?>" target="_self"><?php echo $arrNews['name'] ?></a>
                            </h3> <span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a href="#">Eric joan</a></span>

                            <div class="widget_article_social">
                                <span>
                                    <a href="single.html" target="_self"> <i class="fa fa-share-alt"></i><?php echo $arrNews['view'] ?></a> lượt đọc
                                </span> 
                                <span>
                                    <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>4</a> Comments
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php  
                }
                ?>

                <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
            </div>

            <!-- Reviews News -->


            <!-- Advertisement -->


            <!-- Most Commented News -->


            <!-- Editor News -->


            <!--Advertisement -->


            <!--  Readers Corner News -->


            <!--Advertisement-->
        </div>
        <!-- col-md-4 -->

    </div>
    <!-- row -->

</div>
<!-- container -->


<!-- Subscriber Section -->



<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/itshare/inc/footer.php'; ?>