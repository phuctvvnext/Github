<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBconnect.php'; ?>
<?php  
	$id =$_POST['id'];
	
	$isActive=$_POST['isActive'];

	if($isActive== '1' ) {
                    $query = "select count(id) as cd from comment where active = '0'";
                    $result = $mysqli->query($query);
                    $arrCD = mysqli_fetch_assoc($result);
                    $tcd = $arrCD['cd']+1;
                    if($tcd != 0 ){ 
		?>

			<?php echo $tcd ?>
		
		<?php
		} 
			$query = "update comment set active = '0' where id = '{$id}' ";
			$result = $mysqli->query($query); 

		?>
		
	<?php } else {
				$query1 = "select count(id) as cd from comment where active = '0'";
                $result1 = $mysqli->query($query1);
                $arrCD1 = mysqli_fetch_assoc($result1);
                $tcd1 = $arrCD1['cd']-1;
                if($tcd1!=0) { 
					?>
					<?php echo $tcd1 ?>
		
		
		<?php
		} 
			$query2 = "update comment set active = '1' where id = '{$id}' ";
			$result2 = $mysqli->query($query2); 

		?>
<?php  }?>
