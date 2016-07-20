<?php

//db bağlantı
include "connect.php";
// db baglantı son
//resim yükleme

$uyari = "";
$baslik ="";



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
if(isset($_POST["bgimage-update"]))
{
  
  

  
  if(kontrol1($_FILES['dosyabg']['type']))
  {
      if(kontrol2($_FILES['dosyabg']['size']))
      {
         // Kontoller tamam
         
         copy($_FILES['dosyabg']['tmp_name'] , "../image/upload/" . $_FILES['dosyabg']['name']); 
         
         $resim = "../image/upload/" . $_FILES['dosyabg']['name'];
         
    
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

//POST İŞLEMLERİ

$titletxt ="";
$desptxt ="";
$pptxt ="";
$twittertxt="";
$facebooktxt="";
$instatxt="";

if(isset($_POST["title-update"]))
{
	if($_POST["title"]!=null)
	{
		$titletxt = $_POST["title"];
		
		 $sql = "UPDATE mainpage SET Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($titletxt));
						  
	}
	
}
if(isset($_POST["desp-update"]))
{
	if($_POST["editor"]!=null)
	{
		$desptxt = $_POST["editor"];
		
		 $sql = "UPDATE mainpage SET Description=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($desptxt));
						  
	}
	
}
if(isset($_POST["image-update"]))
{
	
		$pptxt = $_FILES['dosya']['name'];
		
		 $sql = "UPDATE mainpage SET PP=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($pptxt));
						  
	
	
}
if(isset($_POST["bgimage-update"]))
{
	
		$bgptxt = $_FILES['dosyabg']['name'];
		
		 $sql = "UPDATE mainpage SET BGP=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($bgptxt));
						  
	
	
}

if(isset($_POST["twitter-update"]))
{
	
		$twittertxt = $_POST["twitter"];
		
		 $sql = "UPDATE mainpage SET Stwitter=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($twittertxt));
						  
	
	
}
if(isset($_POST["facebook-update"]))
{
	
		$facebooktxt = $_POST["facebook"];
		
		 $sql = "UPDATE mainpage SET Sfacebook=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($facebooktxt));
						  
	
	
}
if(isset($_POST["insta-update"]))
{
	
		$instatxt = $_POST["insta"];
		
		 $sql = "UPDATE mainpage SET Sinstagram=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($instatxt));
						  
	
	
}

if(isset($_POST["button-add"]))
{
	$btntitleadd = $_POST["btnaddtitle"];
	$btnlinkadd = $_POST["btnaddlink"];
	
	
$sql = "INSERT INTO mainpagebuttons (Title,Link) VALUES (:title,:link)";
$query = $db->prepare($sql);
$sonuc = $query->execute(array(':title'=>$btntitleadd,':link'=>$btnlinkadd));
	
	
	
}



//_________________________________________

//Dosya Güncelleme İşlemleri

	
                        // başlık içerik çektik------------------------------------------------
                          $query = $db->query("select * from mainpage", PDO::FETCH_ASSOC);
                          if($query->rowCount()){
                            foreach ($query as $row) {
                                $title = $row["Title"];
                                $description = $row["Description"];
								$resimpp = $row["PP"];
								$resimbgp = $row["BGP"];
								
                            }
                          }
                          // başlık içerik çekme bitti-----------------------------------------



                          //başlık içerik güncelleme-------------------------------------------
                          
                          
                         
                           
                          //başlık içerik güncelle bitti---------------------------------------
           

//Dosya Silme ve Güncelleme İşlemleri

if(isset($_GET['sd']))
{
	$silid = $_GET['sd'];
	$delete = $db->exec("DELETE FROM mainpagebuttons WHERE id = ".$silid);
 
    
}

if(isset($_POST["btn_update"]))
{
	$btntitle = $_POST["btn_title"];
	$btnlink = $_POST["btn_link"];
	$upid = $_GET['ud'];
	
	$sql = "UPDATE mainpagebuttons SET Title=?,Link=?  WHERE id=".$upid;
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($btntitle,$btnlink));
	
}

if(isset($_GET['ud']))
{
	$upid = $_GET['ud'];
	
	$query = $db->query("select * from mainpagebuttons WHERE id = ".$upid, PDO::FETCH_ASSOC);
                          if($query->rowCount()){
                            foreach ($query as $row) {
                                $btntitle = $row["Title"];
                                $btnlink = $row["Link"];						
                            }
	
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
                    <form method="POST" action="#">

                    <div class="col-lg-12">
                        <h2 class="page-header">Title Set</h2>
                        <div class="input-group custom-search-form">
                        
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
						 <img src="../image/upload/<?php echo $resimpp?>" width=100px; height=100px; />
						<form method="POST" action="#" enctype="multipart/form-data">
                        <input name="dosya" type="file"> <br>
                        <input type="submit" class="btn btn-primary" name="image-update" id="image-update"><br><br>
						</form>
						<h2 class="page-header">BackGround-Picture Set</h2>
						 <img src="../image/upload/<?php echo $resimbgp?>" width=100px; height=100px; />
						<form method="POST" action="#" enctype="multipart/form-data">
                        <input name="dosyabg" type="file"> <br>
                        <input type="submit" class="btn btn-primary" name="bgimage-update" id="bgimage-update"><br><br>
						</form>
						 <h2 class="page-header">Button Add</h2>
						 <h3 class="page-header">Button title</h3>
						 <form method="POST" action="#">
						 <input name="btnaddtitle" type="text" class="form-control" placeholder="Title">
						 <h3 class="page-header">Button Link</h3>
						 <input name="btnaddlink" type="text" class="form-control" placeholder="Link"><br><br>
						 <input type="submit" class="btn btn-primary" name="button-add" id="button-add">
						 </form>
						 <h2 class="page-header">Social Link Set</h2>
						 <h2 class="page-header">Twitter</h2>
						 <form method="POST" action="#">
						 <div class="input-group custom-search-form">
                                <input name="twitter" type="text" class="form-control" placeholder="Twitter_Link">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="sumbit" name="twitter-update" id="twitter-update">
                                    <b>Update</b>
                                </button>
                            </span>
                            </div>
							</form>
						 <h2 class="page-header">Facebook</h2>
						 <form method="POST" action="#">
						 <div class="input-group custom-search-form">
                                <input name="facebook" type="text" class="form-control" placeholder="Facebook_Link">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="sumbit" name="facebook-update" id="facebook-update">
                                    <b>Update</b>
                                </button>
                            </span>
                            </div>
							</form>
						 <h2 class="page-header">Instagram</h2>
						 <form method="POST" action="#">
						 <div class="input-group custom-search-form">
                                <input name="insta" type="text" class="form-control" placeholder="Instagram_Link">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="sumbit" name="insta-update" id="insta-update">
                                    <b>Update</b>
                                </button>
                            </span>
                            </div>
							</form>
							<br><br>
							<div class="panel panel-default">
                        <div class="panel-heading">
                            Button Update
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Button Title</th>
                                            <th>Button Link</th>
											<th>Button Sil</th>
											<th>Button Değiştir</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
										<?php 
										
										$query = $db->query("select * from mainpagebuttons", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
                                      $ButtonID = $row["id"];
                                      $ButtonName = $row["Title"];
								      $ButtonLink = $row["Link"];
									  ?>
									  <tr>
									        <td><?php echo $ButtonID ?></td>
                                            <td><?php echo $ButtonName ?></td>
                                            <td><?php echo $ButtonLink ?></td>
											<td><a href="?sd=<?php echo $ButtonID ?>" />Buton Delete</td>
											<td><a href="?ud=<?php echo $ButtonID ?>" />Buton Update</td>
											</tr>
							<?php	
                            }
							
							                
                                            
											 
                          }
						  ?>
						  <tr>
						  <td><?php echo @$upid ?></td>
						  <form method="POST" action="#">
						  <td><input name="btn_title" type="text" class="form-control" value="<?php echo @$btntitle ?>"></td>
						  <td><input name="btn_link" type="text" class="form-control" value="<?php echo @$btnlink ?>"></td>
						  <td><input type="submit" class="btn btn-primary" name="btn_update" value="Update" id="btn_update"></td>
						  </form>
						  </tr>
						  
						  
                                            
											
											
											
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
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
