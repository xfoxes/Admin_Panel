<?php
include "../../blog/connect_mysql.php";

$uyari = "";




function kontrol1($tur)
{
    if($tur == "image/jpeg" || $tur == "image/jpg" || $tur == "image/png" || $tur == "image/gif" )
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
    if($boyut <=999999999999)
    {
        return true;
        }
    else
    {
        return false;
    }
}
if(isset($_POST["blog_guncelle"])){
if(kontrol1($_FILES['dosya']['type']))
  {
      if(kontrol2($_FILES['dosya']['size']))
      {
         // Kontoller tamam
         
         copy($_FILES['dosya']['tmp_name'] , "../image/upload/" . $_FILES['dosya']['name']); 
         
         $resim = "../image/upload/" . $_FILES['dosya']['name'];
         
    
        $uyari = "<div style='color:green; font-weight:bold;' class='alert alert-success'></div>"; 
              
          
          }
          else
          {
         $uyari .= "<div style='color:red; font-weight:bold;' class='alert alert-danger'>*Resim boyutu 2Mb'dan büyük olamaz!<br></div>"; 
              }
      
      
      
  }
  else
  {
     $uyari .= "<div style='color:red; font-weight:bold;' class='alert alert-danger'>*Resim dosyası seçilmeli!<br></div>"; 
  }
}

$sqlblog = "select * from blogpage";
                    $queryblog = mysqli_query($db,$sqlblog);
                    while( $rowblog = mysqli_fetch_array( $queryblog,MYSQLI_ASSOC ) ) {
                        $blog_PP = $rowblog["Main_PP"];
                        $blog_site_title = $rowblog["Site_Title"];
                        $blog_site_desc = $rowblog["Site_Desc"];
                        $blog_button_title = $rowblog["Button_Title"];
                        $blog_button_link = $rowblog["Button_Link"];
                        $blog_twitter = $rowblog["Twitter"];
                        $blog_facebook = $rowblog["Facebook"];
                        $blog_instagram = $rowblog["Instagram"];

                    }


if(isset($_POST["blog_guncelle"])){
    if($_FILES['dosya']['name'] != null)
                                    {
                                        $blog_resim = $_FILES['dosya']['name'];
                                    }
                                    else
                                    {
                                        $blog_resim = $blog_PP;
                                    }
    $blog_baslik = $_POST["title"];
    $blog_aciklama = $_POST["desc"];
    $blog_hakkimda = $_POST["editor"];
    $blog_button_baslik = $_POST["button_title"];
    $blog_button_ling = $_POST["button_link"];
    $blog_tiwitter = $_POST["twitter"];
    $blog_feysbook = $_POST["facebook"];
    $blog_instegram = $_POST["instagram"];

    $sql_g = "UPDATE blogpage SET Main_PP='$blog_resim', Site_Title='$blog_baslik', Site_Desc='$blog_aciklama', About_Desc='$blog_hakkimda',Button_Title='$blog_button_baslik',Button_Link='$blog_button_ling',Twitter='$blog_tiwitter',Facebook='$blog_feysbook',Instagram='$blog_instegram' WHERE id=1";

                                    if (mysqli_query($db, $sql_g)) {
                                     $mesaj= "<div style='color:green; font-weight:bold;'>*Seçilen yazı başarıyla güncelledi.</div>";
                                    } else {
                                     $mesaj= "<div style='color:red; font-weight:bold;'>*Seçilen yazı güncellenirken bir hata meydana geldi.</div>".mysqli_error($db);
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
                                    <a href="blogsettings.php">Yazı Ekleme</a>
                                </li>
                                <li>
                                    <a href="#">Yazı Düzenleme ve Silme</a>
                                </li>
								<li>
                                    <a href="#">Admin ekle</a>
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

                        <h1 style="color:#327ab7; font-weight:bold;" class="page-header">Blog Anasayfa Düzenle</h1>
                        
                    </div>
                   <form method="POST" action="" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <h3 style="color:#327ab7; font-weight:bold;" class="page-header">Profil Pictures Settings</h3>
                        
                    </div>
                    Profil resmi : <input type="file" id="dosya" name="dosya"><br>
                    <div class="col-lg-12">
                        <h3 style="color:#327ab7; font-weight:bold;" class="page-header">About Me Settings</h3>
                        
                    </div>
                    
                    <input type="text" class="form-control" value="<?php echo $blog_site_title;  ?>" name="title" placeholder="Title"><br>
                    <input type="text" class="form-control" value="<?php echo $blog_site_desc;  ?>"  name="desc" placeholder="Desc"><br>
                    <textarea class="ckeditor" id="editor" name="editor"><?php echo $blog_site_desc ?></textarea><br>
                    <div class="col-lg-12">
                        <h3 style="color:#327ab7; font-weight:bold;" class="page-header">Button Settings</h3>
                        
                    </div>
                    <input type="text" class="form-control" value="<?php echo $blog_button_title;  ?>" name="button_title" placeholder="Button Title"><br>
                    <input type="text" class="form-control" value="<?php echo $blog_button_link;  ?>" name="button_link" placeholder="Button Link"><br>
                    <div class="col-lg-12">
                        <h3 style="color:#327ab7; font-weight:bold;" class="page-header">Social Media</h3>
                        
                    </div>
                    <input type="text" class="form-control" value="<?php echo $blog_twitter;  ?>" name="twitter" placeholder="Twitter"><br>
                    <input type="text" class="form-control" value="<?php echo $blog_facebook;  ?>" name="facebook" placeholder="Facebook"><br>
                    <input type="text" class="form-control" value="<?php echo $blog_instagram;  ?>" name="instagram" placeholder="Instagram"><br>
                    <button class="btn btn-default" name="blog_guncelle" type="submit">Update</button><br><br><br>
                    <?php echo @$mesaj; ?>
                    </form>
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
