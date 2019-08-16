<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/bstory/inc/header.php'; ?> 
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h2><span>Đăng nhập</span></h2>
      <div class="clr"></div>
     
    </div>
    <div class="article">
      <?php  
        {
          if(isset($_POST['submit'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $password = md5($password);
            $query = "select * from user where email = '{$username}' && password = '{$password}'";
            $result = $mysqli->query($query);
            $user = mysqli_fetch_assoc($result);
            var_dump($user);

            if(is_null($user)) {
              echo "<p style='color:red'>Sai username hoặc password</p>";
            } else {
              $_SESSION['user'] = $user;
              var_dump($_SESSION['user']);
              header('location:/admin');
            }
          }
        }
      ?>
      <form action="" method="post" id="sendemail">
        <ol>
          <li>
            <label for="name">Username</label>
            <input type = "text" id="name" name="username" class="text" />
          </li>
          <li>
            <label for="email">Password</label>
            <input type="password" id="" name="password" class="text" />
          </li>
          <li>
            <br>
            <input type="submit" name="submit" value="Đăng nhập">
          </li>
         
        </ol>
      </form>
    </div>
  </div>
  <div class="sidebar">

  </div>
  <div class="clr"></div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/template/admin/inc/footer.php'; ?>

