<?php

//db bağlantı
include "connect.php";
// db baglantı son
//resim yükleme

$uyari = "";
$baslik ="";

function kontrol1($tur)
{
    if($tur == "image/jpeg" || $tur == "image/pjpeg" || $tur == "image/png" || $tur == "image/gif" )
    {
        return true;        
    }
    else
    {
        return false;
    }   
}
//------------------------------------------------------
function kontrol2($boyut)
{
    if($boyut <=2097152)
    {
        return true;
        }
    else
    {
        return false;
    }
}



if(isset($_POST["image-update"]))
{
  
  

  
  if(kontrol1($_FILES['dosya']['type']))
  {
      if(kontrol2($_FILES['dosya']['size']))
      {
         // Kontoller tamam
         
         copy($_FILES['dosya']['tmp_name'] , "../image/upload/" . $_FILES['dosya']['name']); 
         
         $resim = "../image/upload/" . $_FILES['dosya']['name'];
         
    
        $uyari = "<div class='alert alert-success'>Resim Yükleme Başarılı</div>"; 
              
          
          }
          else
          {
         $uyari .= "<div class='alert alert-danger'>Resim boyutu 2Mb'dan büyük olamaz!<br></div>"; 
              }
      
      
      
  }
  else
  {
     $uyari .= "<div class='alert alert-danger'>Resim dosyası seçilmeli!<br></div>"; 
  }
  
  
  
  
    
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
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
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
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="mainsettings.php"><i class="fa fa-wrench  fa-fw"></i> Main Page Settings</a>
                            
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
                        <h1 class="page-header">Main Page Settings</h1>
                        <div> <?php echo $uyari; ?></div>
                    </div>
                    <form method="POST" action="#" enctype="multipart/form-data">

                    <div class="col-lg-12">
                        <h2 class="page-header">Title Set</h2>
                        <div class="input-group custom-search-form">
                        <?php
                        // başlık içerik çektik------------------------------------------------
                          $query = $db->query("select * from mainpage", PDO::FETCH_ASSOC);
                          if($query->rowCount()){
                            foreach ($query as $row) {
                                $title = $row["Title"];
                                $description = $row["Description"];

                            }
                          }
                          // başlık içerik çekme bitti-----------------------------------------



                          //başlık içerik güncelleme-------------------------------------------
                          if(isset($_POST["title-update"]))
                          {
                          $title = $_POST["title"];
                          
                          $sql = "UPDATE mainpage SET Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($title));
                            }
                          //başlık içerik güncelle bitti---------------------------------------
                        ?>
                                <input type="text" name="title" class="form-control" placeholder="<?php echo $title; ?>">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="title-update" id="title-update">
                                    <b>Update</b>
                                </button>
                            </span>
                            </div>
                            </form>
                         <br>
						 <h2 class="page-header">Description Set</h2>
                         <form method="POST" action="#" enctype="multipart/form-data">
                        <textarea name="editor" class="ckeditor"><?php echo $description; ?></textarea> <br>
                        <button class="btn btn-default" type="sumbit" name="desp-update" id="desp-update"><b>Update</b></button> <br> <br>
                        </form>
						 <h2 class="page-header">Profile-Picture Set</h2>
                        <input name="dosya" type="file"> <br>
                        <input type="submit" class="btn btn-primary" name="image-update" id="gonder"><br><br>
						 <h2 class="page-header">Button Add</h2>
						 <h3 class="page-header">Button title</h3>
						 <input type="text" class="form-control" placeholder="Title">
						 <h3 class="page-header">Button Link</h3>
						 <input type="text" class="form-control" placeholder="Link"><br><br>
						 <input type="submit" class="btn btn-primary" name="button-add" id="gonder">
						 <h2 class="page-header">Social Link Set</h2>
						 <h2 class="page-header">Twitter</h2>
						 <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Twitter_Link">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="sumbit" name="twitter-update">
                                    <b>Update</b>
                                </button>
                            </span>
                            </div>
						 <h2 class="page-header">Facebook</h2>
						 <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Facebook_Link">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="sumbit" name="facebook-update">
                                    <b>Update</b>
                                </button>
                            </span>
                            </div>
						 <h2 class="page-header">Instagram</h2>
						 <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Instagram_Link">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="sumbit" name="insta-update">
                                    <b>Update</b>
                                </button>
                            </span>
                            </div>
							<br><br>
						 
						 
                       
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
