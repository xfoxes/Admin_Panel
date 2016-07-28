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
if(isset($_POST["aboutme_pp_u"]))
{

         copy($_FILES['aboutme_pp']['tmp_name'] , "../image/upload/" . $_FILES['aboutme_pp']['name']); 
         
         $resim = "../image/upload/" . $_FILES['aboutme_pp']['name'];
         
    
        $uyari = "<div class='alert alert-success'>Resim Yükleme Başarılı</div>"; 
              
        $sql = "UPDATE sitepage SET Aboutme_PP=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_FILES["aboutme_pp"]["name"]));
          
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
if(isset($_POST["aboutme_main_title_u"]))
{
  $sql = "UPDATE sitepage SET Aboutme_Main_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["aboutme_main_title"]));
}
if(isset($_POST["aboutme_title_u"]))
{
  $sql = "UPDATE sitepage SET Aboutme_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["aboutme_title"]));
}
if(isset($_POST["aboutme_article_u"]))
{
  $sql = "UPDATE sitepage SET Aboutme_Article=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["aboutme_article"]));
}
if(isset($_POST["social_title_u"]))
{
  $sql = "UPDATE sitepage SET Social_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["social_title"]));
}
if(isset($_POST["social_facebook_u"]))
{
  $sql = "UPDATE sitepage SET Social_Facebook=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["social_facebook"]));
}
if(isset($_POST["social_article_u"]))
{
  $sql = "UPDATE sitepage SET Social_Article=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["social_article"]));
}
if(isset($_POST["social_twitter_u"]))
{
  $sql = "UPDATE sitepage SET Social_Twitter=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["social_twitter"]));
}
if(isset($_POST["social_instagram_u"]))
{
  $sql = "UPDATE sitepage SET Social_instagram=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["social_instagram"]));
}
if(isset($_POST["social_youtube_u"]))
{
  $sql = "UPDATE sitepage SET Social_Youtube=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["social_youtube"]));
}
if(isset($_POST["contact_title_u"]))
{
  $sql = "UPDATE sitepage SET Contact_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["contact_title"]));
}
if(isset($_POST["contact_article_u"]))
{
  $sql = "UPDATE sitepage SET Contact_Article=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["contact_article"]));
}
if(isset($_POST["contact_adres_title_u"]))
{
  $sql = "UPDATE sitepage SET Contact_Adress_Title=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["contact_adres_title"]));
}
if(isset($_POST["contact_adres_u"]))
{
  $sql = "UPDATE sitepage SET Contact_Adress=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["contact_adres"]));
}
if(isset($_POST["contact_phone_u"]))
{
  $sql = "UPDATE sitepage SET Contact_Phone=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["contact_phone"]));
}
if(isset($_POST["contact_mail_u"]))
{
  $sql = "UPDATE sitepage SET Contact_Mail=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["contact_mail"]));
}
if(isset($_POST["contact_mainmail_u"]))
{
  $sql = "UPDATE sitepage SET Contact_Main_Mail=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($_POST["contact_mainmail"]));
}




//____________,Project


if(isset($_GET['pd']))
{
	$delete = $db->exec("DELETE FROM sitepageproject WHERE id = ".$_GET['pd']);
    
}
if(isset($_POST["project-add"]))
{

         copy($_FILES['project-pp']['tmp_name'] , "../image/upload/" . $_FILES['project-pp']['name']); 
         
         $resim = "../image/upload/" . $_FILES['project-pp']['name'];
         
    
        $uyari = "<div class='alert alert-success'>Resim Yükleme Başarılı</div>"; 
              
			  $sql = "INSERT INTO sitepageproject (Project_Title,Project_Art,Project_PP,Project_Link) VALUES (:ptitle,:particle,:projectpp,:plink)";
$query = $db->prepare($sql);
$sonuc = $query->execute(array(':ptitle'=>$_POST["project-title"],':particle'=>$_POST["project-article"],':projectpp'=>$_FILES['project-pp']["name"],':plink'=>$_POST["project-link"]));
          
}

//------POST İŞLEMLERİ -------------------- BİTİŞ -------------------
if(isset($_POST["services-add"]))
{

         copy($_FILES['services-pp']['tmp_name'] , "../image/upload/" . $_FILES['services-pp']['name']); 
         
         $resim = "../image/upload/" . $_FILES['services-pp']['name'];
         
    
        $uyari = "<div class='alert alert-success'>Resim Yükleme Başarılı</div>"; 
              
			  $sql = "INSERT INTO sitepageservices (Services_Title,Services_Desc,Services_PP) VALUES (:setitle,:sdesc,:servicespp)";
$query = $db->prepare($sql);
$sonuc = $query->execute(array(':setitle'=>$_POST["services-title"],':sdesc'=>$_POST["services-desc"],':servicespp'=>$_FILES['services-pp']["name"]));
          
}

if(isset($_GET['sed']))
{
	$delete = $db->exec("DELETE FROM sitepageservices WHERE id = ".$_GET['sed']);
    
}
//_______________-SLİDER EKLEME
if(isset($_POST["slider_add"]))
{

         copy($_FILES['slider_pp']['tmp_name'] , "../image/upload/" . $_FILES['slider_pp']['name']); 
         
         $resim = "../image/upload/" . $_FILES['slider_pp']['name'];
         
    
        $uyari = "<div class='alert alert-success'>Resim Yükleme Başarılı</div>"; 
              
			  $sql = "INSERT INTO sitepageslider (Slider_Title,Slider_Desc,Slider_PP) VALUES (:stitle,:desc,:sliderpp)";
$query = $db->prepare($sql);
$sonuc = $query->execute(array(':stitle'=>$_POST["slider_title"],':desc'=>$_POST["slider_desc"],':sliderpp'=>$_FILES['slider_pp']["name"]));
          
}
if(isset($_GET['ssd']))
{
	$delete = $db->exec("DELETE FROM sitepageslider WHERE id = ".$_GET['ssd']);
    
}

//-------MENU SİLME VE GÜNCELLEME VE EKLEME İşlemleri
if(isset($_POST["menu-add"]))
{
	
	$sql = "INSERT INTO sitepagemenu (Menu_Title,Menu_Link) VALUES (:title,:link)";
$query = $db->prepare($sql);
$sonuc = $query->execute(array(':title'=>$_POST["menu-title"],':link'=>$_POST["menu-link"]));
}

if(isset($_GET['sd']))
{
	$delete = $db->exec("DELETE FROM sitepagemenu WHERE id = ".$_GET['sd']);
 
    
}
if(isset($_GET['ud']))
{
	$upid = $_GET['ud'];
	
	$query = $db->query("select * from sitepagemenu WHERE id = ".$_GET['ud'], PDO::FETCH_ASSOC);
                          if($query->rowCount()){
                            foreach ($query as $row) {
                                $btntitle = $row["Menu_Title"];
                                $btnlink = $row["Menu_Link"];						
                            }
	
						  }
}
if(isset($_POST["menu-update-u"]))
{
	$btntitle = $_POST["menu-title"];
	$btnlink = $_POST["menu-link"];
	$upid = $_GET['ud'];
	
	$sql = "UPDATE sitepagemenu SET Menu_Title=?,Menu_Link=?  WHERE id=".$upid;
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($btntitle,$btnlink));
	
}
//_______________________




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
						<li>
                            <a href="blogsettings.php"><i class="fa fa-wrench  fa-fw"></i> Blog Page Settings</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Yazı Ekleme</a>
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
						<section id="logo-title">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Logo Title</h2>
						<form method="POST" action="#logo-title">
                                 <div class="input-group custom-search-form">
                                 <input type="text" name="logo-title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="logo-title-update" id="logo-title-update">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
						</form>
            </section>
            <seciton id="menu-add">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Menu Add</h2>
                        <form method="POST" action="#menu-add">
                        <h3>Menu Title</h3>
                        <input type="text" name="menu-title" class="form-control" placeholder="">
                        <h3>Menu Link</h3>
                        <input type="text" name="menu-link" class="form-control" placeholder=""> <br>
                        <input type="submit" class="btn btn-primary" name="menu-add" id="menu-add" value="Add">
						</form>
            </seciton>


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
										<?php 
										
										$query = $db->query("select * from sitepagemenu", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
                                      $ButtonID = $row["id"];
                                      $ButtonName = $row["Menu_Title"];
								      $ButtonLink = $row["Menu_Link"];
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
						  <td><input name="menu-title" type="text" class="form-control" value="<?php echo @$btntitle ?>"></td>
						  <td><input name="menu-link" type="text" class="form-control" value="<?php echo @$btnlink ?>"></td>
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
                        <seciton id="slider-add"> 
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Slider Add</h2>
						 <form method="POST" action="#slider-add" enctype="multipart/form-data">
                                <h3>Slider Title</h3>
                                <input type="text" name="slider_title" class="form-control" placeholder="">
                                <h3>Slider Description</h3>
                                <input type="text" name="slider_desc" class="form-control" placeholder=""> 
                                <h3>Slider İmage</h3>
                                <input type="file" name="slider_pp"><br>
                                <input type="submit" class="btn btn-primary" name="slider_add" value="Add">
								</form>
                </seciton>
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
                                            
                                        </tr>
										<?php 
										
										$query = $db->query("select * from sitepageslider", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
                                      $SliderID = $row["id"];
                                      $Slidertitle = $row["Slider_Title"];
								      $SliderDesc = $row["Slider_Desc"];
									  $SliderPP = $row["Slider_PP"];
									  ?>
									  <tr>
									        <td><?php echo $SliderID ?></td>
                                            <td><?php echo $Slidertitle ?></td>
                                            <td><?php echo $SliderDesc ?></td>
											<td><img width=200 height=50 src="../image/upload/<?php echo $SliderPP?>" /></td>
											<td><a href="?ssd=<?php echo $SliderID ?>" />Buton Delete</td>
											</tr>
							<?php	
                            }
							
							                
                                            
											 
                          }
						  ?>
										
                                    </thead>
                                    <tbody>   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        <section id="about-section1">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">About Section 1</h2>

						<h3 class="page-header">Title</h3>
						<form method="POST" action="#about-section1">
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
                                  
                       </section>          
                <section id="about-section2">                 
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">About Section 2</h2>

						<h3 class="page-header">Title</h3>
						<form method="POST" action="#about-section2">
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
                 </section>
                 <section id="services">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Services </h2>

						<h3 class="page-header">Title</h3>

						<form method="POST" action="#services">
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
                 </section>
                 <section id="services-add">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Section Services Add</h2>
                                <form method="POST" action="#services-add" enctype="multipart/form-data">
                                <h3 class="page-header">Services İmage</h3>
                                
                                <input type="file" name="services-pp">
                                <h3>Services Title</h3>
                                <input type="text" name="services-title" class="form-control" placeholder="">
                                <h3>Services Description</h3>
                                <textarea class="ckeditor" name="services-desc"></textarea> <br>
                                <button class="btn btn-primary" type="submit" name="services-add" id="services-add">
                                 <b>Update</b>
                                 </button>
								 </form>
</section>

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
                                            
                                            
                                        </tr>
                                    </thead>
									<?php 
										
										$query = $db->query("select * from sitepageservices", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
									  ?>
									  <tr>
									        <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row["Services_Title"] ?></td>
                                            <td><?php echo $row["Services_Desc"] ?></td>
											<td><img width=100 src="../image/upload/<?php echo $row["Services_PP"]?>" /></td>
											<td><a href="?sed=<?php echo $row["id"] ?>" />Buton Delete</td>
											</tr>
							<?php	
                            }
							
							                
                                            
											 
                          }
						  ?>
                                    <tbody>   
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
<section id="projects">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Projects</h2>

						<h3 class="page-header">Title</h3>

						<form method="POST" action="#projects">
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
                 </section>
                 <section id="projects-add">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Project Add</h2>
                        <h3 class="page-header">Project-Title</h3>
						<form method="POST" action="#projects-add" enctype="multipart/form-data">
                            <input type="text" name="project-title" class="form-control" placeholder="">
                        <h3 class="page-header">Project-Article</h3>
                        <textarea class="ckeditor" name="project-article"></textarea> <br>
                        <h3 class="page-header">Project-İmage</h3>
                        <input type="file" name="project-pp">
                        <h3 class="page-header">Project-link</h3>
                            <input type="text" name="project-link" class="form-control" placeholder=""> <br>
                            <button class="btn btn-primary" type="submit" name="project-add" id="project-add">
                                 <b>Update</b>
                                 </button>
					    </form>
</section>

                                

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
                                            
                                            
                                        </tr>
                                    </thead>
									<?php 
										
										$query = $db->query("select * from sitepageproject", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
									  ?>
									  <tr>
									        <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row["Project_Title"] ?></td>
                                            <td><?php echo $row["Project_Art"] ?></td>
											<td><img width=100 src="../image/upload/<?php echo $row["Project_PP"]?>" /></td>
											<td><?php echo $row["Project_Link"] ?></td>
											<td><a href="?pd=<?php echo $row["id"] ?>" />Buton Delete</td>
											</tr>
							<?php	
                            }
							
							                
                                            
											 
                          }
						  ?>
                                    <tbody>   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        <section id="about">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">About me</h2>
						<h3 class="page-header">Main Title</h3>
                                <form method="POST" action="#about">
                                <div class="input-group custom-search-form">
                                 <input type="text" name="aboutme_main_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="aboutme_main_title_u" id="aboutme_main_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
                        <h3 class="page-header">Title</h3>
                                <form method="POST" action="#">
                                <div class="input-group custom-search-form">
                                 <input type="text" name="aboutme_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="aboutme_title_u" id="aboutme_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
                                
                        <h3 class="page-header">About me image</h3>
                                <form method="POST" action="#" enctype="multipart/form-data">
                                <input type="file" name="aboutme_pp"><br>
                                <button class="btn btn-success" type="submit" name="aboutme_pp_u" id="aboutme_pp_u">
                                 <b>Update</b>
                                 </button>
                                 </form>

						<h3 class="page-header">Article</h3>
                                <form method="POST" action="#" enctype="multipart/form-data">
                                <textarea class="ckeditor" name="aboutme_article"></textarea><br>
                                <button class="btn btn-success" type="submit" name="aboutme_article_u" id="aboutme_article_u">
                                 <b>Update</b>
                                 </button>
                                 </form>
                                 </section>
                                 <section id="social">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Social</h2>

						<h3 class="page-header">Title</h3>
                                 <form method="POST" action="#social">
                                <div class="input-group custom-search-form">
                                 <input type="text" name="social_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="social_title_u" id="social_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
						<h3 class="page-header">Article</h3>
                            <form method="POST" action="#">
                        <textarea class="ckeditor" name="social_article"></textarea> <br>
                                <button class="btn btn-success" type="submit" name="social_article_u" id="title-update">
                                 <b>Update</b>
                                 </button>
                                 </form>
						<h3 class="page-header">Facebook</h3>
                        <form method="POST" action="#">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="social_facebook" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="social_facebook_u" id="social_facebook_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
						<h3 class="page-header">Twitter</h3>
                        <form method="POST" action="#">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="social_twitter" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="social_twitter_u" id="social_twitter_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
						<h3 class="page-header">İnstagram</h3>
            <form method="POST" action="#">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="social_instagram" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="social_instagram_u" id="social_instagram_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
						<h3 class="page-header">Youtube</h3>
            <form method="POST" action="#">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="social_youtube" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="social_youtube_u" id="social_youtube_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
                                 </section>
                                 <section id="contact">
						<h2 style="color:#bb0a1e; font-weight:bold;" class="page-header">Contact</h2>
						<h3 class="page-header">Title</h3>
            <form method="POST" action="#contact">
                        <div class="input-group custom-search-form">
                                 <input type="text" name="contact_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="contact_title_u" id="contact_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
						<h3 class="page-header">Article</h3>
             <form method="POST" action="#">
                                <textarea class="ckeditor" name="contact_article"></textarea> <br>
                                <button class="btn btn-success" type="submit" name="contact_article_u" id="contact_article_u">
                                 <b>Update</b>
                                 </button>
                                 </form>
						<h3 class="page-header">Adress Title</h3>
            <form method="POST" action="#">
                                <div class="input-group custom-search-form">
                                 <input type="text" name="contact_adres_title" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="contact_adres_title_u" id="contact_adres_title_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
						<h3 class="page-header">Adress</h3>
            <form method="POST" action="#">
                                <textarea class="ckeditor" name="contact_adres"></textarea> <br>
                                <button class="btn btn-success" type="submit" name="contact_adres_u" id="contact_adres_u">
                                 <b>Update</b>
                                 </button>
                                 </form>
						<h3 class="page-header">Phone</h3>
            <form method="POST" action="#">
                                <div class="input-group custom-search-form">
                                 <input type="text" name="contact_phone" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="contact_phone_u" id="contact_phone_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
						<h3 class="page-header">Mail</h3>
            <form method="POST" action="#">
                                <div class="input-group custom-search-form">
                                 <input type="text" name="contact_mail" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="contact_mail_u" id="contact_mail_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
						<h3 class="page-header">Main Mail</h3>
            <form method="POST" action="#">
                                <div class="input-group custom-search-form">
                                 <input type="text" name="contact_mainmail" class="form-control" placeholder="">
                                 <span class="input-group-btn">
                                 <button class="btn btn-success" type="submit" name="contact_mainmail_u" id="contact_mainmail_u">
                                 <b>Update</b>
                                 </button>
                                 </span>
                                 </div>
                                 </form>
                                 </section>
						
						
						
						
						
						
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
