<div class="gadget">
  <h2 class="star">Danh mục truyện</h2>
  <div class="clr"></div>
  <ul class="sb_menu">
    <?php  
      $queryCat = "select * from cat";
      $resultQuery = $mysqli->query($queryCat);
      while ($arrCat = mysqli_fetch_assoc($resultQuery)) {
      
        $new_cat_name = utf8ToLatin($arrCat['name']);
        $url = "/dm/".$new_cat_name."-".$arrCat['cat_id'];
      
    ?>
    <li><a href="<?php echo $url ?>"><?php echo $arrCat['name'] ?></a></li>
   <?php  
    }
   ?>
  </ul>
</div>

<div class="gadget">
  <h2 class="star"><span>Truyện mới</span></h2>
  <div class="clr"></div>
  <ul class="ex_menu">
    <?php  
      $queryCatNew = "select * from story order By story_id DESC limit 3";
      $resultQueryCatNew = $mysqli->query($queryCatNew);
      while($arrCatNew = mysqli_fetch_assoc($resultQueryCatNew)) 
      {
        $new_name = utf8ToLatin($arrCatNew['name']);
        $url1 = '/ct/'.$new_name.'-'.$arrCatNew['story_id'].'.html';
    ?>
        <li><a href="<?php echo $url1 ?>"><?php echo $arrCatNew['name'] ?></a><br />
         <?php echo $arrCatNew['preview_text']?></li>
      <?php  
        }
      ?>
  </ul>
</div>