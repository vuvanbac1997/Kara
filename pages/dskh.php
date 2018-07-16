<?php require_once('../model/khaibao.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Danh sách khách hàng</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                            <a href="dssp.php"><i class="fa fa-shopping-cart fa-fw"></i>Danh sách sản phẩm</a>
                        </li>
                        <li>
                            <a href="thongke.php"><i class="fa fa-sitemap fa-fw"></i> Thống kê</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="danhgia.php"><i class="fa fa-thumbs-o-up fa-fw"></i> Đánh giá</span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                            <!-- /.nav-second-level -->
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
                        <h1 class="page-header">Thông tin khách hàng</h1>
                    </div>
                    <div class="col-lg-9 pull-left">
                        
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                    </tr>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM khachhang";
                                         $result = db_get_list($sql);
                                            for($i = 0; $i < count($result); $i++){
                                                $ID = htmlentities($result[$i]['khachhang_ID']) ;
                                                $ten = htmlentities($result[$i]['ho_ten']) ;
                                                $sdt = htmlentities($result[$i]['so_dien_thoai']) ;
                                                $dc = htmlentities($result[$i]['dia_chi']) ;
                                                echo "<tr><td>$ID</td><td>$ten</td><td>$sdt</td><td>$dc</td></tr>";
                                            }
                                         ?>
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-3 pull-right">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Thêm khách hàng
                            </div>

                            <div class="panel-body">
                                <form role="form" method="POST">
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Tên khách hàng</label>
                                            <input name="tenkh" class="form-control" placeholder="VD: Vũ Văn Bắc" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input name="sdt" class="form-control"  required>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input name="dc" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="them_kh">Thêm</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    </div> <?php 
                                if (isset($_POST['them_kh'])){
                                    $tenkh=$_POST['tenkh'];
                                    $sdt=$_POST['sdt'];
                                    $dc=$_POST['dc'];
                                    $sql ="INSERT INTO `khachhang`(`ho_ten`,`so_dien_thoai`, `dia_chi`) VALUES ('$tenkh', '$sdt','$dc')";
                                    mysqli_query($conn, $sql);
                                    echo '
                                        <script>
                                        alert("Thêm sản phẩm thành công")
                                        </script>
                                    ';
                                    
                                }
                        ?>
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
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
