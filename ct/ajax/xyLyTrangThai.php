<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBconnect.php'; ?>
    <?php  
    $id = $_POST['id'];
    $name = $_POST['name'];
    $noidung = $_POST['noidung'];
    $email = $_POST['email'];


    $queryComment = "insert into comment(content,email_user,active,parent_id,news_id,name_user) values ('{$noidung}','{$email}','1','0','{$id}','{$name}')";
    $result = $mysqli->query($queryComment);

    ?>
    
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
        $queryBL = "select * from comment where news_id = '{$id}' and active = '1'";
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
            <h2 class="media-heading"><a href="#"><?php echo $arrBL['name_user'] ?></a></h2>
            <?php echo $arrBL['content'] ?>

            <div class="entity_vote">
                
                <a href="#"><span class="reply_ic">Reply </span></a>
            </div>
            <?php  
                $queryCMC = "select * from comment where active = '1' and parent_id = '{$id_BL}'";
                $resultCMC = $mysqli->query($queryCMC);
                $arrCMC = mysqli_fetch_assoc($resultCMC);
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

                    <div class="entity_vote">
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                        <a href="#"><span class="reply_ic">Reply </span></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>

    </div>
    <?php  
        }
    ?>
    <!-- media end -->

   
    <!-- media end -->

