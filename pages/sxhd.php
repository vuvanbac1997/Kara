<?php require_once('../model/khaibao.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sửa xóa hóa đơn</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <script src="../js/jquery.min.js"></script>  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand fa fa-home" href="index.php"> Trang quản trị</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><i class="fa fa-user fa-fw"></i>  
                         <?php 
                            echo $_SESSION['email'];
                         ?>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="../controller/logout.php"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất                       </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Thông báo</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Hóa đơn<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dshd.php">Thêm hóa đơn</a>
                                </li>
                                <li>
                                    <a href="sxhd.php">Sửa/Xóa hóa đơn</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="dskh.php"><i class="fa fa-male fa-fw"></i>Danh sách khách hàng</a>
                        </li>
                        <li>
                            <a href="thongke.php"><i class="fa fa-sitemap fa-fw"></i> Thống kê</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa / Xóa hóa đơn</h1>
                    </div>
                    <div class="col-lg-3">
                        <form method="POST">
                            <div class="form-group">
                                <label>Chọn khách hàng</label>
                                <select name='tenkh' id='tenkh' class="form-control">
                                    <option disabled="disabled" selected="selected">Chọn</option>
                                    <?php
                                        $sql="SELECT * FROM khachhang"; 
                                        $result = db_get_list($sql);
                                    ?>
                                    <?php
                                        for($i = 0; $i < count($result); $i++){
                                            $tenkh = htmlentities($result[$i]['ho_ten']) ;
                                            echo "<option value='".$result[$i]['khachhang_ID']."'>$tenkh</option>";
                                        }
                                    ?>
                                </select>
                            </div>   
                        
                            <div class="form-group">
                                <label>ID Hóa đơn</label>
                                <select name='idhd' id='idhd' class="form-control">
                                    
                                    <?php
                                        /*$id =$_POST['tenkh'];
                                        $sql="SELECT khachhang_ID FROM khachhang WHERE ho_ten='$id'"; 
                                        $result = db_get_row($sql);
                                        $idhd = $resu; 

                                        $sql="SELECT * FROM hoadon WHERE "; 
                                        $result = db_get_list($sql);
                                    ?>
                                    <?php
                                        for($i = 0; $i < count($result); $i++){
                                            $tenkh = htmlentities($result[$i]['thoi_gian_tao']) ;
                                            echo "<option>$tenkh</option>";
                                        }*/
                                    ?>
                                </select>
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-lg-9">
                         <div class="panel panel-default">
                                <div class="panel-heading">
                                    Sản phẩm của bạn
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                <div class="table-responsive">
                                    <table name='bhd' id='bhd' class='table table-striped table-bordered table-hover''>
                                        
                                    </table>
                                    <!-- <?php include('../controller/hienthisp.php'); ?> -->
                                </div>
                                
                                <!-- <script src="../js/sxhd.js"/> -->
                                <!-- /.panel-body -->
                            </div>
                        </div>
                        <!-- <div id="live_data"></div> -->
                        <!-- <script src="../js/sxhd.js"></script> -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/sxhd.js"/></script>
    
</body>

</html>
