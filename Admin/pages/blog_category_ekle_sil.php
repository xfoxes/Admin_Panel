<?php
include "../../blog/connect_mysql.php";


if(isset($_GET['cgs']))
{
    $silid = $_GET['cgs'];
    $query = "DELETE FROM `blogcategory` WHERE `id` = $silid";
    $result = $db->query($query);
 
    
}
 if(isset($_POST["c_ekle"])){
                        
                        $c_title = $_POST["c_title"];
                        $c_desc = $_POST["c_desc"]; 
						
                        mysqli_query($db,"INSERT INTO blogcategory (Category_Title,Category_Desc)
                        VALUES ('".$c_title."','".$c_desc."')");

                    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

<script src="../plugins/ckeditor/ckeditor.js"></script>


<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="index.php">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="mainsettings.php"><i class="fa fa-wrench  fa-fw"></i> Main Page Settings</a>
                            
                        </li>
						<li>
                            <a href="sitesettings.php"><i class="fa fa-wrench  fa-fw"></i> Site Page Settings</a>
                            
                        </li>
						<li>
                            <a href="blogsettings.php"><i class="fa fa-wrench  fa-fw"></i> Blog Page Settings</a>
                            <ul class="nav nav-second-level">
                              <li>
                                    <a href="blog_yazi_ekle.php">Yazı Ekleme</a>
                                </li>
                                <li>
                                    <a href="blog_yazi_duzenle.php">Yazı Düzenleme ve Silme</a>
                                </li>
								<li>
                                    <a href="blog_admin_ekle.php">Admin ekle</a>
                                </li>
								<li>
								<a href ="#" >Kategori Ekle Sil </a>
								</li>
								<li>
                                    <a href="#">Üye Silme</a>
                                </li>
								<li>
                                    <a href="#">Yorum Silme</a>
                                </li>
								<li>
                                    <a href="#">Anasayfa Ayarları</a>
                                </li>
                            </ul>
                        </li>
                       
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
                        <h1 style="color:#327ab7; font-weight:bold;" class="page-header">Blog Kategori Ekle & Sil</h1>
						
						<div class="col-lg-12">
                        <h1 style="color:#327ab7; font-weight:bold;" class="page-header">Category Add</h1>
                        
                    </div>
                    <form action="" method="POST" >
                    <input type="text" class="form-control" name="c_title" placeholder="Title"><br>        
                    <input type="text" class="form-control" name="c_desc" placeholder="Desc"><br>
                    <button class="btn btn-default" type="submit" name="c_ekle" type="button">Ekle</button>
                    </form>
					<br>
                    <?php
                    if(isset($_POST["yazi_ekle"])){
                        
                        $title = $_POST["title"];
                        $desc = $_POST["editor"];
                        $article_PP = $_FILES['dosya']['name'];
                        $category = $_POST["s_kategori"];
                        $tags = $_POST["tags"];

                        mysqli_query($db,"INSERT INTO blogyazilar (Article_Title,Article_Desc,Article_PP,Admin_id,Category_id,Tags,Post_View)
                        VALUES ('".$title."','".$desc."','".$article_PP."','".$_SESSION["adminid"]."','".$kategori_id."','".$tags."',0)");




                    }

                     ?>
                    </div>
						
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Kategori Delete</h2>
                                <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                     <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Category Title</th>
											<th>Category Description</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                    <?php
                    $sqlcategory = "select * from blogcategory order by id DESC";
                    $querycategory = mysqli_query($db,$sqlcategory);
                    while( $rowcat = mysqli_fetch_array( $querycategory,MYSQLI_ASSOC ) ) {
                        $category_id = $rowcat["id"];
                        $category_title = $rowcat["Category_Title"];
						$category_desc = $rowcat["Category_Desc"];
						

                    ?>
                    
                                    <tbody>
                                        <tr>
                                            <td><?php echo $category_id ?></td>
                                            <td><?php echo $category_title ?></td>
											<td><?php echo $category_desc ?></td>
                                            <td><a href="?cgs=<?php echo $category_id ?>">Delete</a></td>
                                        </tr>
                                    </tbody>
                                
                    <?php
                    }
                    ?>
                                    <tbody>   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        
                    </div>
                    
                    </div>
                    
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
