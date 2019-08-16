<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBconnect.php'; ?>
<?php  
			$id = $_POST['id1'];
			$idCm = $_POST['idCm1'];
    		$name = $_POST['name1'];
    		$noidung = $_POST['noidung1'];
    		$email = $_POST['email1'];
    		 $queryComment = "insert into comment(content,email_user,active,parent_id,news_id,name_user) values ('{$noidung}','{$email}','1','{$idCm}','{$id}','{$name}')";
   			 $result = $mysqli->query($queryComment);

                $queryCMC = "select * from comment where active = '1' and parent_id = '{$idCm}' and news_id = {$id} ";
                $resultCMC = $mysqli->query($queryCMC);
                while($arrCMC = mysqli_fetch_assoc($resultCMC)) {
                if($arrCMC != ''){
            ?>
            <div class = "media">
                
            
                <div class="media-left">
                    <a href="#">
                       
                    </a>
                </div>
                <div class="media-body">
                    <h2 class="media-heading"><a href="#"><?php echo $arrCMC['name_user'] ?></a></h2>
                    <?php echo $arrCMC['content'] ?>

                    
                </div>
            </div>
            
            <?php } }?>
