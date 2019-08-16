<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/itshare/inc/header.php'; ?>
<!-- header_section_wrapper -->


<section id="entity_section" class="entity_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="entity_wrapper">
    <?php  
        $id = $_GET['id'];
        $queryCT = "select * from news where id = '{$id}'";
        $resultCT = $mysqli->query($queryCT);
        $arrCT = mysqli_fetch_assoc($resultCT);
        $newDate = date("m-d-Y", strtotime($arrCT['date_create']));
    ?>
    <div class="entity_title">
        <h1><a href="#"><?php echo $arrCT['name'] ?></a></h1>
    </div>
    <!-- entity_title -->

    <div class="entity_meta"><a href="#" target="_self"><?php echo $newDate ?></a>
    </div>
    <!-- entity_meta -->

    <div class="entity_rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-full"></i>
    </div>
    <!-- entity_rating -->

    <div class="entity_social">
        <a href="#" class="icons-sm sh-ic">
            <i class="fa fa-share-alt"></i>
            <b><?php echo $arrCT['view'] ?></b> <span class="share_ic">lượt đọc</span>
        </a>
        <a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
        <!--Twitter-->
        <a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
        <!--Google +-->
        <a href="#" class="icons-sm inst-ic"><i class="fa fa-google-plus"> </i></a>
        <!--Linkedin-->
        <a href="#" class="icons-sm tmb-ic"><i class="fa fa-ge"> </i></a>
        <!--Pinterest-->
        <a href="#" class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
    </div>
    <!-- entity_social -->

    <div class="entity_thumb" style="width: 500px!important;height: 200px!important;">
        <img class="img-responsive" src="/files/img/<?php echo $arrCT['picture'] ?>" alt="feature-top" >
    </div>
    <!-- entity_thumb -->

    <div class="entity_content">
        <?php echo $arrCT['detail'] ?>
    </div>
    <!-- entity_content -->

    <div class="entity_footer">
       
        <!-- entity_tag -->

        <div class="entity_social">
            <span><i class="fa fa-share-alt"></i><?php echo $arrCT['view'] ?> <a href="#">lượt đọc</a> </span>
            <?php  
                $queryCountCm = "select count(id) as tongbl from comment where news_id='{$id}' and active = '1'";
                $resultCountCm = $mysqli->query($queryCountCm);
                $arrCountCm = mysqli_fetch_assoc($resultCountCm);
                $TBL = $arrCountCm['tongbl'];
            ?>
            <span><i class="fa fa-comments-o"></i><?php echo  $TBL?> <a href="#">Comments</a> </span>
        </div>
        <!-- entity_social -->

    </div>
    <!-- entity_footer -->

</div>
<!-- entity_wrapper -->

<div class="related_news">
    <div class="entity_inner__title header_purple">
        <h2><a href="#">Tin tức liên quan</a></h2>
    </div>
    <!-- entity_title -->

    <div class="row">
        <?php  
          $queryLQ = "select * from news where id != '{$id}' AND cat_id = '{$arrCT['cat_id']}' order By date_create DESC limit 4";
          $resultLQ = $mysqli->query($queryLQ);
          while($arrLQ = mysqli_fetch_assoc($resultLQ)) {
            $new_name = utf8ToLatin($arrLQ['name']);
             $url1 = '/ct/'.$new_name.'-'.$arrLQ['id'].'.html';
        ?>
        <div class="col-md-6">
            <div class="media">
                <div class="media-left">
                    <?php  
                        if($arrLQ['picture'] != '') {
                    ?>
                    <a href="#"><img class="media-object" src="/files/img/<?php echo $arrLQ['picture'] ?>"
                                     alt="Generic placeholder image" style="width: 150px;height: 120px"></a>
                    <?php } ?>
                </div>
                <div class="media-body">
                    <span class="tag purple"><a href="category.html" target="_self"><?php echo $arrLQ['cat_id'] ?></a></span>

                    <h3 class="media-heading"><a href="<?php echo $url1 ?>" target="_self"><?php echo $arrLQ['name'] ?></a></h3>
                    <span class="media-date"><a href="#"><?php echo $arrLQ['date_create'] ?></a>,  by: <a href="#">Eric joan</a></span>

                    <div class="media_social">
                        <span><a href="#"><i class="fa fa-share-alt"></i><?php echo $arrLQ['view'] ?></a> lượt đọc</span>
                         <?php  
                            $queryCountCm = "select count(id) as tongbl from comment where news_id='{$arrLQ['id']}' and active = '1'";
                            $resultCountCm = $mysqli->query($queryCountCm);
                            $arrCountCm = mysqli_fetch_assoc($resultCountCm);
                            $TBL = $arrCountCm['tongbl'];
                        ?>

                        <span><a href="#"><i class="fa fa-comments-o"></i><?php echo $TBL ?></a> Comments</span>
                    </div>
                </div>
            </div>
          
        </div>
    <?php } ?>
        
    </div>
</div>
<!-- Related news -->

<div class="widget_advertisement">
    <img class="img-responsive" src="assets/img/category_advertisement.jpg" alt="feature-top">
</div>
<!--Advertisement-->

<div class="readers_comment">
    <div class="entity_inner__title header_purple">
        <?php  
            $queryCountCm = "select count(id) as tongbl from comment where news_id='{$id}' and active = '1'";
            $resultCountCm = $mysqli->query($queryCountCm);
            $arrCountCm = mysqli_fetch_assoc($resultCountCm);
            $TBL = $arrCountCm['tongbl'];
        ?>
        <h2><?php echo $TBL ?> Bình luận</h2>
    </div>
    <!-- entity_title -->
    <?php  
        $queryBL = "select * from comment where news_id = '{$id}' and active = '1' and parent_id = '0'";
        $resultBL = $mysqli->query($queryBL);
        while($arrBL = mysqli_fetch_assoc($resultBL)) {
            $id_BL = $arrBL['id']; 
    ?>
    <div class="media">
        <div class="media-left">
            <a href="#">
                
            </a>
        </div>
        <div class="media-body">
            <h2 class="media-heading"><a href="#"><?php echo $arrBL['name_user'] ?></a><small> <?php echo 'Ngày đăng '.$arrBL['date_create'] ?></small></h2>

            <?php echo $arrBL['content']?>
            

           
            

            

        
            <?php  
                $queryCMC = "select * from comment where active = '1' and parent_id = '{$arrBL['id']}' and news_id = {$id}";
                $resultCMC = $mysqli->query($queryCMC);
                while($arrCMC = mysqli_fetch_assoc($resultCMC)) {
                if($arrCMC != ''){
            ?>
            <div class="media" style="margin-left: 40px;">
                <div class="media-left">
                    <a href="#">
                       
                    </a>
                </div>
                <div class="media-body">
                    <h2 class="media-heading"><a href="#"><?php echo $arrCMC['name_user'] ?></a></h2>
                    <?php echo $arrCMC['content'] ?>

                    
                </div>
            </div>
        <?php } ?>
    <?php } ?>
        </div>
        <div class="entity_comment_from-<?php  echo $arrBL['id'] ?>" style="margin-left: 40px;">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name ="name" id = "name1" class="form-control"  placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="text" name = "email" id="email1" class="form-control"  placeholder="Email">
                </div>
                <div class="form-group comment">
                    <textarea class="form-control" name= "noidung1" id="noidung1" placeholder="Comment"></textarea>
                </div>

                <a href="javascript:void(0)" title=""  onclick="postcomment(<?php echo $id ?>,<?php echo $arrBL['id'] ?>)" id = "comment"  class="btn btn-submit red">Submit</a>
            </form>
        </div>

    </div>
    <?php  
        }
    ?>
    <!-- media end -->

   
    <!-- media end -->
</div>
<!--Readers Comment-->

<div class="widget_advertisement">
    <img class="img-responsive" src="assets/img/category_advertisement.jpg" alt="feature-top">
</div>
<!--Advertisement-->

<div class="entity_comments">
    <div class="entity_inner__title header_black">
        <h2>Thêm bình luận</h2>
    </div>
    <!--Entity Title -->
    
    <div class="entity_comment_from">
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name ="name" id = "name" class="form-control" id="inputName" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" name = "email" id="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group comment">
                <textarea class="form-control" name= "noidung" id="noidung" placeholder="Comment"></textarea>
            </div>

            <a href="javascript:void(0)" title=""  onclick="comment(<?php echo $id ?>)" id = "comment"  class="btn btn-submit red">Submit</a>
        </form>
    </div>
    <!--Entity Comments From -->

</div>
<!--Entity Comments -->

</div>
<!--Left Section-->

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

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="assets/img/right_add5.jpg" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">5 tin có lượt xem cao nhất</a></h2>
    </div>
    <?php  
        $queryNews = "select * from news ORDER BY view desc limit 5";
        $result = $mysqli->query($queryNews);
        while($arrNews = mysqli_fetch_assoc($result)){
        $new_name = utf8ToLatin($arrNews['name']);
        $news_id = $arrNews['id'];
        $url = '/ct/'.$new_name.'-'.$news_id.'.html'; 
    ?>
    <div class="media">
        <div class="media-left">
            <?php if($arrNews['picture'] != '') {?>
            <a href="#"><img class="media-object" src="/files/img/<?php echo $arrNews['picture'] ?>" alt="Generic placeholder image" style = "width: 100px ; height: 100px"></a>
        <?php } ?>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="<?php echo $url ?>" target="_self"><?php echo $arrNews['name'] ?></a>
            </h3> <span class="media-date"><a href="#"><?php echo $arrNews['date_create'] ?></a>,  by: <a href="#">Eric joan</a></span>

            <div class="widget_article_social">
                <span>
                    <a href="single.html" target="_self"> <i class="fa fa-share-alt"></i><?php echo $arrNews['view'] ?></a> lượt đọc
                </span> 
                <?php  
                    $queryCountCm = "select count(id) as tongbl from comment where news_id='{$arrNews['id']}' and active = '1'";
                    $resultCountCm = $mysqli->query($queryCountCm);
                    $arrCountCm = mysqli_fetch_assoc($resultCountCm);
                    $TBL = $arrCountCm['tongbl'];
                ?>
                <span>
                    <a href="single.html" target="_self"><i class="fa fa-comments-o"></i><?php echo $TBL ?></a> Comments
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


<!--Advertisement -->


<!--  Readers Corner News -->


<!--Advertisement-->

<!-- container -->

</section>
<!-- Entity Section Wrapper -->
<script>
        
            function comment(id) {
                var email = $('#email').val();
               // alert(email);
               var name = $('#name').val();
               var noidung = $('#noidung').val();
              // alert (email+name+noidung);
            $.ajax({
                    url: 'ajax/xyLyTrangThai.php',
                    type: 'POST',
                    cache: false,
                    data: {
                        id : id,
                        email : email,
                        name : name,
                        noidung : noidung

                    },
                    
                    success: function(data){
                    //    alert(data);
                        $('.readers_comment').html(data);
                    
                    
                    },
                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                
                });
                return false;
            } 


             function postcomment(id1,idCm1) {
                var email1 = $('#email1').val();
               // alert(email);
               var name1 = $('#name1').val();
               var noidung1 = $('#noidung1').val();
              // alert(idCm);
               alert (email1+name1+noidung1);
            $.ajax({
                    url: 'ajax/postcomment.php',
                    type: 'POST',
                    cache: false,
                    data: {
                        id1 : id1,
                        idCm1 : idCm1,
                        email1 : email1,
                        name1 : name1,
                        noidung1 : noidung1

                    },
                    
                    success: function(data){
                    //    alert(data);
                        $('.entity_comment_from-'+idCm1).html(data);
                        //alert(idCm1);
                    
                    },
                    error: function (){
                        alert('Có lỗi xảy ra');
                    }
                
                });
                return false;
            } 
        
    </script>




<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/itshare/inc/footer.php'; ?>