<?php

include "../../blog/connect_mysql.php";

session_start();
if(@$_SESSION["LoginAdmin"] != null )
{


}
else{
		
		echo "<script language='javascript'>
    window.location.href ='login.php'
</script>";
	}

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
if(isset($_POST["yazi_guncelle"])){
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


if(isset($_GET['did']))
{
    $silid = $_GET['did'];
    $query = "DELETE FROM `blogyazilar` WHERE `id` = $silid";
    $result = $db->query($query);
 
    
}

if(isset($_GET['uid']))
{
    $upid = $_GET['uid'];
    
    $sqlyazi2 = "select * from blogyazilar WHERE id=".$upid;
                    $queryyazi2 = mysqli_query($db,$sqlyazi2);
                    while( $rowyazi2 = mysqli_fetch_array( $queryyazi2,MYSQLI_ASSOC ) ) {
                        
                        $yazi_title2 = $rowyazi2["Article_Title"];
                        $yazi_desc2 = $rowyazi2["Article_Desc"];
                        $yazi_tags = $rowyazi2["Tags"];
                        $yazi_PP = $rowyazi2["Article_PP"];
                    }
                        
}

if(isset($_POST["yazi_guncelle"])){
    $g_upid=$_GET["uid"];
    $g_title=$_POST["title"];
    $g_desc=$_POST["editor"];
    $g_category=$_POST["s_kategori"];
    $g_tags=$_POST["tags"];
    if($_FILES['dosya']['name'] != null)
                                    {
                                        $re_PP = $_FILES['dosya']['name'];
                                    }
                                    else
                                    {
                                        $re_PP = $yazi_PP;
                                    }

    $sql_g = "UPDATE blogyazilar SET Article_Title='$g_title', Article_Desc='$g_desc', Article_PP='$re_PP', Tags='$g_tags' WHERE id=".$g_upid;

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
                        <h1 style="color:#327ab7; font-weight:bold;" class="page-header">Article Edit & Delete</h1>
                        
                    </div>
                    <?php echo @$mesaj; ?>
                    </div>
                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Article Title</th>
                                            <th>Article Description</th>
                                            <th>Article Share Date</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                    <?php
                    $sqlyazi = "select * from blogyazilar order by id DESC";
                    $queryyazi = mysqli_query($db,$sqlyazi);
                    while( $rowyazi = mysqli_fetch_array( $queryyazi,MYSQLI_ASSOC ) ) {
                        $yazi_id = $rowyazi["id"];
                        $yazi_title = $rowyazi["Article_Title"];
                        $yazi_desc = $rowyazi["Article_Desc"];
                        $yazi_share_date = $rowyazi["Share_Date"];
                        

                    ?>
                    
                                    <tbody>
                                        <tr>
                                            <td><?php echo $yazi_id ?></td>
                                            <td><?php echo $yazi_title ?></td>
                                            <td><?php echo substr($yazi_desc,0,50).". . ."; ?></td>
                                            <td><?php echo $yazi_share_date ?></td>
                                            <td><a href="?uid=<?php echo $yazi_id ?>">Update</a></td>
                                            <td><a href="?did=<?php echo $yazi_id ?>">Delete</a></td>
                                        </tr>
                                    </tbody>
                                
                    <?php
                    }
                    ?>

                   
                    </table>
                    <div class="col-lg-12">
                        <h1 style="color:#327ab7; font-weight:bold;" class="page-header">Article Editing</h1>
                        
                    </div>

                    
                    <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="text" class="form-control" value="<?php echo @$yazi_title2; ?>" name="title" placeholder="Title"><br>
                    <b>Yazı Resmi Seçiniz :</b><input type="file" name="dosya"><br>
                    <img width="500" height="200" src="../image/upload/<?php echo $yazi_PP; ?>" alt="" /><br><br>
                    <textarea name="editor" id="editor" class="ckeditor"><?php echo @$yazi_desc2; ?></textarea><br>
                    
                    <b>Kategori :</b> <select name="s_kategori">
                    <?php 
                    $sqlcategory = "select * from blogcategory";
                    $querycategory = mysqli_query($db,$sqlcategory);
                    while( $rowcategory = mysqli_fetch_array( $querycategory,MYSQLI_ASSOC ) ) {
                        $kategori = $rowcategory["Category_Title"];
                        $kategori_id = $rowcategory["id"];
                    ?>
                        <option value="<?php echo $kategori_id ?>" ><?php echo $kategori; ?></option>
                    
                    <?php
                    }
                    ?>
                    </select>
                    <br>
                    <br>
                    <input type="text" class="form-control" value="<?php echo @$yazi_tags; ?>" name="tags" placeholder="#Etiket"><br>
                    <button class="btn btn-default" type="submit" name="yazi_guncelle" type="button">Güncelle</button>
                    </form>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    
                

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
