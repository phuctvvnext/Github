<?php session_start(); ?>
<?php ob_start() ?>
<?php  
    require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBconnect.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/util/ContantUtil.php';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdminCP | VinaEnter Edu</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="/template/admin/assest/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/template/admin/assest/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="/template/admin/assest/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="/template/bstory/css/coin-slider.css" />
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="/template/admin/assest/js/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type ="text/javascript" src="/template/admin/assest/js/jquery.validate.min.js" ></script>
    <script type ="text/javascript" src="/template/admin/assest/js/jquery-3.3.1.min.js" ></script>
    <style>
        .error{
                display:block;
                color:red;
            }
        </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">VinaEnter Edu</a>
            </div>
            <?php if(isset($_SESSION['user'])) 
                {
                    $fullname = $_SESSION['user']['fullname'];


            ?>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Xin chào, <b><?php echo $fullname ?></b> &nbsp; <a href="/auth/logout.php" class="btn btn-danger square-btn-adjust">Đăng xuất</a> </div>
<?php } else 
    { 
        ?>
    <div style="color: white;
        padding: 15px 50px 5px 50px;
        float: right;
        font-size: 16px;"> Xin chào, <b>Khách</b> &nbsp; </div>
<?php } ?>
        </nav>
        <!-- /. NAV TOP  -->