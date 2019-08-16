<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Danh mục tin</a></h2>
    </div>
    <div class="media">
        
       <?php  
            $queryCat = "select * from cat where parent_id = '0' ";
            $resultQRC = $mysqli->query($queryCat);
            while ($arrCat = mysqli_fetch_assoc($resultQRC)){
            $parent_id = $arrCat['id'];
            $new_cat_name = utf8ToLatin($arrCat['name']);
            $url = "/dm/".$new_cat_name."-".$arrCat['id'];
        ?>
        <li><a href="<?php echo $url ?>" ><?php echo $arrCat['name'] ?>
        <span><i></i></span></a>
        <ul>
            <li>
                <div class="m-menu-content">
                    <?php  
                    $queryCat2 = "select * from cat where parent_id = '{$parent_id}'";
                    $resultQRC2 = $mysqli->query($queryCat2);
                    while($arrCat2 = mysqli_fetch_assoc($resultQRC2)){
                        $new_cat_name1 = utf8ToLatin($arrCat2['name']);
                        $url1 = "/dm/".$new_cat_name1."-".$arrCat2['id'];
                        ?>
                        <ul style="list-style-type: circle;margin-left: 20px; ">
                            <li><a href="<?php echo $url1 ?>"><?php echo $arrCat2['name'] ?></a></li>
                        </ul>
                    <?php } ?>


                </div>
            </li>
        </ul>
    </li>
<?php } ?>
    </div>
    
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
</div>