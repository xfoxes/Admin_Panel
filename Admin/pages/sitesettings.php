<?php 

include "connect.php";


$uyari = "";
$baslik ="";


if(isset($_POST["about2_pp_u"]))
{

         copy($_FILES['about2_pp']['tmp_name'] , "../image/upload/" . $_FILES['about2_pp']['name']); 
         
         $resim = "../image/upload/" . $_FILES['about2_pp']['name'];
         
    
        $uyari = "<div class='alert alert-success'>Resim Yükleme Başarılı</div>"; 
              
			  $sql = "UPDATE sitepage SET About2_PP=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_FILES["about2_pp"]["name"]));
          
}
  

//------POST İŞLEMLERİ --------------------
if(isset($_POST["logo-title-update"]))
{
	$logotitletxt = $_POST["logo-title"];
	$sql = "UPDATE sitepage SET Logo_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($logotitletxt));
}
if(isset($_POST["about_title_u"]))
{
	$about_title = $_POST["about_title"];
	$sql = "UPDATE sitepage SET About_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($about_title));
}
if(isset($_POST["about_article1_u"]))
{
	$sql = "UPDATE sitepage SET About_Article1=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["about_article1"]));
}
if(isset($_POST["about_article2_u"]))
{
	$sql = "UPDATE sitepage SET About_Article2=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["about_article2"]));
}
if(isset($_POST["about2_title_u"]))
{
	$sql = "UPDATE sitepage SET About2_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["about2_title"]));
}

if(isset($_POST["about2_article_u"]))
{
	$sql = "UPDATE sitepage SET About2_Article=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["about2_article"]));
}
if(isset($_POST["about2_button_title_u"]))
{
	$sql = "UPDATE sitepage SET About2_Button_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["about2_button_title"]));
}
if(isset($_POST["about2_button_link_u"]))
{
	$sql = "UPDATE sitepage SET About2_Button_Link=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["about2_button_link"]));
}
if(isset($_POST["services_title_u"]))
{
	$sql = "UPDATE sitepage SET Services_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["services_title"]));
}
if(isset($_POST["services_article_u"]))
{
	$sql = "UPDATE sitepage SET Services_Article=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["services_article"]));
}
if(isset($_POST["projects_title_u"]))
{
	$sql = "UPDATE sitepage SET Projects_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["projects_title"]));
}
if(isset($_POST["projects_article_u"]))
{
	$sql = "UPDATE sitepage SET Projects_Article=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["projects_article"]));
}


if(isset($_POST["menu-add"]))
{
	$menutitletxt = $_POST["menu-title"];
	$menulinktxt = $_POST["menu-link"];
}


//------POST İŞLEMLERİ -------------------- BİTİŞ -------------------
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
                                    <button class="btn btn-primary" type="button">
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
                        <h1 style="color:#327ab7; font-weight:bold;" class="page-header">Site Page Settings</h1>
						
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Logo Title</h2>
						<form method="POST" action="#">
                                 <div class="input-group custom-search-form">
                                 <input type="text" name="logo-title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="logo-title-update" id="logo-title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						</form>
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Menu Add</h2>
                        <form method="POST" action="#">
                        <h3>Menu Title</h3>
                        <input type="text" name="menu-title" class="form-control" placeholder="">
                        <h3>Menu Link</h3>
                        <input type="text" name="menu-link" class="form-control" placeholder=""> <br>
                        <input type="submit" class="btn btn-primary" name="menu-add" id="menu-add" value="Add">
						</form>


						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Menu Update & Delete</h2>
                            <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Menu Title</th>
                                            <th>Menu Link</th>
                                            <th>Menu Delete</th>
                                            <th>Menu Update</th>                                        
                                        </tr>
										<tr>
						  <td>1</td>
						  <form method="POST" action="#">
						  <td><input name="menu-title-u" type="text" class="form-control" value=""></td>
						  <td><input name="menu_link-u" type="text" class="form-control" value=""></td>
						  <td><input type="submit" class="btn btn-primary" name="menu-update-u" value="Update" id="menu-update-u"></td>
						  </form>
						  </tr>
                                    </thead>
                                    <tbody>   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Slider Add</h2>
                                <h3>Slider Title</h3>
                                <input type="text" name="title" class="form-control" placeholder="">
                                <h3>Slider Description</h3>
                                <input type="text" name="title" class="form-control" placeholder=""> 
                                <h3>Slider İmage</h3>
                                <input type="file" name=""><br>
                                <input type="submit" class="btn btn-primary" name="">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Slider Update & Delete</h2>
                                <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Slider Title</th>
                                            <th>Slider Description</th>
                                            <th>Slider İmage</th>
                                            <th>Slider Delete</th>
                                            <th>Slider Update</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">About Section 1</h2>

						<h3 class="page-header">Title</h3>
						<form method="POST" action="#">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="about_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="about_title_u" id="about_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
								 </form>
						<h3 class="page-header">article 1</h3>
                        <form method="POST" action="#">
                                 <textarea class="ckeditor" name="about_article1"></textarea><br>
                                 <button class="btn btn-success" type="submit" name="about_article1_u" id="about_article2_u">
                                 <b>Update</b>
                                 </button>
								 </form>
                                  
                                 
						<h3 class="page-header">article 2</h3>
                        <form method="POST" action="#">
                                 <textarea class="ckeditor" name="about_article2"></textarea><br>
                                 <button class="btn btn-success" type="submit" name="about_article2_u" id="about_article2_u">
                                 <b>Update</b>
                                 </button>
								  </form>
                                  
                                 
                                 
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">About Section 2</h2>

						<h3 class="page-header">Title</h3>
						<form method="POST" action="#">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="about2_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="about2_title_u" id="about2_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
								 </form>
						<h3 class="page-header">article 1</h3>
						<form method="POST" action="#">
                        <textarea class="ckeditor" name="about2_article"></textarea><br>
                                 <button class="btn btn-success" type="submit" name="about2_article_u" id="about2_article_u">
                                 <b>Update</b>
                                 </button>
								 </form>
								 <form method="POST" action="#" enctype="multipart/form-data">
						<h3 class="page-header">Profile image 2</h3>
                                <input type="file" name="about2_pp"><br>
                                <input type="submit" class="btn btn-success" name="about2_pp_u">
								</form>
						<h3 class="page-header">Button Title</h3>
						<form method="POST" action="#">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="about2_button_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="about2_button_title_u" id="about2_button_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
								 </form>
								 <form method="POST" action="#">
						<h3 class="page-header">Button Link</h3>
                        <div class="input-group custom-search-form">
                                 <input type="text" name="about2_button_link" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="about2_button_link_u" id="about2_button_link_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
								 </form>
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Services </h2>

						<h3 class="page-header">Title</h3>
						<form method="POST" action="#">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="services_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="services_title_u" id="services_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
								 </form>
						<h3 class="page-header">article</h3>
						<form method="POST" action="#">
                                <textarea class="ckeditor" name="services_article"></textarea><br>
                                 <button class="btn btn-success" type="submit" name="services_article_u" id="services_article_u">
                                 <b>Update</b>
                                 </button>
								 </form>
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Section Services Add</h2>
                                
                                <h3 class="page-header">Services İmage</h3>
                                <input type="file" name="">
                                <h3>Services Title</h3>
                                <input type="text" name="title" class="form-control" placeholder="">
                                <h3>Services Description</h3>
                                <textarea class="ckeditor" name="editor"></textarea> <br>
                                <button class="btn btn-primary" type="submit" name="article2-update" id="title-update">
                                 <b>Update</b>
                                 </button>


						<h3 class="page-header">Section Services Update & Delete</h3>
                                <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Services Title</th>
                                            <th>Services Description</th>
                                            <th>Services İmage</th>
                                            <th>Services Delete</th>
                                            <th>Services Update</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->

						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Projects</h2>

						<h3 class="page-header">Title</h3>
						<form method="POST" action="#">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="projects_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="projects_title_u" id="projects_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
								 </form>
						<h3 class="page-header">article</h3>
						<form method="POST" action="#">
                        <textarea class="ckeditor" name="projects_article"></textarea> <br>
                                <button class="btn btn-success" type="submit" name="projects_article_u" id="projects_article_u">
                                 <b>Update</b>
                                 </button>
								 </form>
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Project Add</h2>
                        <h3 class="page-header">Project-Title</h3>
                            <input type="text" name="title" class="form-control" placeholder="">
                        <h3 class="page-header">Project-Article</h3>
                        <textarea class="ckeditor" name="editor"></textarea> <br>
                        <h3 class="page-header">Project-İmage</h3>
                        <input type="file" name="">
                        <h3 class="page-header">Project-link</h3>
                            <input type="text" name="title" class="form-control" placeholder=""> <br>
                            <button class="btn btn-primary" type="submit" name="article2-update" id="title-update">
                                 <b>Update</b>
                                 </button>


                                

						<h3 class="page-header">Project Update & Delete</h3>
                                <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Title</th>
                                            <th>Project Description</th>
                                            <th>Project İmage</th>
                                            <th>Project Link</th>
                                            <th>Project Delete</th>
                                            <th>Project Update</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">About me</h2>
						<h3 class="page-header">Main Title</h3>
                                <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                        <h3 class="page-header">Title</h3>
                                <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                
                        <h3 class="page-header">About me image</h3>
                                <input type="file" name=""><br>
                                <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>

						<h3 class="page-header">Article</h3>
                                <textarea class="ckeditor" name="editor"></textarea><br>
                                <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Social</h2>

						<h3 class="page-header">Title</h3>
                        <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						<h3 class="page-header">Article</h3>
                        <textarea class="ckeditor" name="editor"></textarea> <br>
                                <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
						<h3 class="page-header">Facebook</h3>
                        <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						<h3 class="page-header">Twitter</h3>
                        <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						<h3 class="page-header">İnstagram</h3>
                        <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						<h3 class="page-header">Youtube</h3>
                        <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Contact</h2>
						<h3 class="page-header">Title</h3>
                        <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						<h3 class="page-header">Article</h3>
                                <textarea class="ckeditor" name="editor"></textarea> <br>
                                <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
						<h3 class="page-header">Adress Title</h3>
                                <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						<h3 class="page-header">Adress</h3>
                                <textarea class="ckeditor" name="editor"></textarea> <br>
                                <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
						<h3 class="page-header">Phone</h3>
                                <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						<h3 class="page-header">Mail</h3>
                                <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						<h3 class="page-header">Main Mail</h3>
                                <div class="input-group custom-search-form">
                                 <input type="text" name="title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="title-update" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						
						
						
						
						
						
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
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
