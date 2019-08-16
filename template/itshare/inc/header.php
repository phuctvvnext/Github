<?php  
    require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBconnect.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/util/ContantUtil.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/util/utf8tolatinutil.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/util/LibraryString.php';
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shareit</title>

    <!-- favicon -->
    <link href="/template/itshare/assest/img/favicon.png" rel=icon>

    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="/template/itshare/assest/css/bootstrap.min.css" rel="stylesheet">

    <!-- font-awesome -->
    <link href="/template/itshare/assest/fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
    <!-- Mobile Menu Style -->
    <link href="/template/itshare/assest/css/mobile-menu.css" rel="stylesheet">

    <!-- Owl carousel -->
    <link href="/template/itshare/assest/css/owl.carousel.css" rel="stylesheet">
    <link href="/template/itshare/assest/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- Theme Style -->
    <link href="/template/itshare/assest/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
    <div id="main-wrapper">
        <!-- Page Preloader -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- preloader -->

        <div class="uc-mobile-menu-pusher">
            <div class="content-wrapper">
                <section id="header_section_wrapper" class="header_section_wrapper">
                    <div class="container">
                        

                        <div class="navigation-section">
                            <nav class="navbar m-menu navbar-default">
                                <div class="container">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                                    <ul class="nav navbar-nav main-nav">
                                        <li class="active"><a href="/trang-chu.html">Trang chủ</a></li>
                                        <?php  
                                            $queryCat = "select * from cat where parent_id = '0' ";
                                            $resultQRC = $mysqli->query($queryCat);
                                            while ($arrCat = mysqli_fetch_assoc($resultQRC)){
                                                $parent_id = $arrCat['id'];
                                                $new_cat_name = utf8ToLatin($arrCat['name']);
                                                $url = "/dm/".$new_cat_name."-".$arrCat['id'];
                                        ?>
                                        <li class="dropdown m-menu-fw"><a href="<?php echo $url ?>" ><?php echo $arrCat['name'] ?>
                                            <span><i class="fa fa-angle-down"></i></span></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="m-menu-content">
                                                        <?php  
                                                            $queryCat2 = "select * from cat where parent_id = '{$parent_id}'";
                                                            $resultQRC2 = $mysqli->query($queryCat2);
                                                            while($arrCat2 = mysqli_fetch_assoc($resultQRC2)){
                                                                $new_cat_name = utf8ToLatin($arrCat2['name']);
                                                                $url = "/dm/".$new_cat_name."-".$arrCat2['id'];
                                                        ?>
                                                        <ul class="col-sm-3">
                                                            
                                                            <li><a href="<?php echo $url ?>"><?php echo $arrCat2['name'] ?></a></li>
                                                            
                                                        </ul>
                                                    <?php } ?>
                                                        
                                                       
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                        
                                         <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i
                                                class="fa fa-search"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <div class="head-search">
                                                            <form role="form">
                                                                <!-- Input Group -->
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                    placeholder="Type Something"> <span class="input-group-btn">
                                                                        <button type="submit"
                                                                        class="btn btn-primary">Search
                                                                    </button>
                                                                </span></div>
                                                            </form>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>


                                    </ul>
                                </div>
                                <!-- .navbar-collapse -->
                            </div>
                            <!-- .container -->
                        </nav>
                        <!-- .nav -->
                    </div>
                    <!-- .navigation-section -->
                </div>
                <!-- .container -->
            </section>