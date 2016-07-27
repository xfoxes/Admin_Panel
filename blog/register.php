<?php
include "connect_mysql.php";


session_start();
if(isset($_GET["query"]))
{
	$sqlarama = "select * from blogyazilar WHERE blogyazilar.Article_Title LIKE '%".$_GET["query"]."%'";
										$queryarama = mysqli_query($db,$sqlarama);
										 while( $rowarama = mysqli_fetch_array( $queryarama,MYSQLI_ASSOC ) ) {
											 $git = $rowarama["id"];
										 }
										 header ("location:http://localhost/Onat Aktas-me/Admin_Panel/blog/yazi.php?py=".$git);
	
}
if(isset($_POST['cikisyap']))
{
	session_destroy();
	header('Location: '.$_SERVER['REQUEST_URI']);
}



$hata = "";


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
if(isset($_POST["register_u"])){
if(kontrol1($_FILES['dosya']['type']))
  {
      if(kontrol2($_FILES['dosya']['size']))
      {
         // Kontoller tamam
         
         copy($_FILES['dosya']['tmp_name'] , "../Admin/image/upload/" . $_FILES['dosya']['name']); 
         
         $resim = "../Admin/image/upload/" . $_FILES['dosya']['name'];
         
    
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


								?>

<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Single - Future Imperfect by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="single">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">Onat Aktaş</a></h1>
						<nav class="links">
							<ul>
								<li><a href="index.php">Anasayfa</a></li>
								<li><a href="#">Hakkımda</a></li>
								<li><a href="#">İletişim</a></li>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Search" />
								</form>
								
							</section>
							<section>
							<ul class="actions vertical">
							<?php 
							if(@$_SESSION['LoginCont'] != null)
							{
							?>
                             <!-- GİRİŞ YAPILDIĞI DURUM -->
							
							<center><li> Merhaba <?php echo $_SESSION['KullaniciAdi']; ?> </li></center>
							<li><a href="profil_settings.php" class="button big fit">Ayarlar</a></li>
							<form method="post" action="#">
							<li>
							<button class="button big fit" name="cikisyap" type="submit" >Çıkış Yap </button>
							</li>
							</form>
						    <?php
							}
							
							else{
								?>
								<!-- GİRİŞ YAPILMADIĞI DURUM -->
									<li><a href="login.php" class="button big fit">Giriş Yap</a></li>
									<li><a href="register.php" class="button big fit">Kayıt Ol</a></li>
									
								
							<?php
							
							}
							?>
									
								</ul>
							</section>

						<!-- Links -->
							<section>
							<header>
							<div class="title">
							<center><h2>Kategoriler</h2></center>
							<hr>
							</div>
							</header>
							
								<ul class="links">
								<?php
								$sqlcategory = "select * from blogcategory";
										$querycategory = mysqli_query($db,$sqlcategory);
										 while( $rowcategory = mysqli_fetch_array( $querycategory,MYSQLI_ASSOC ) ) {
								?>
									<li>
										<a href="#">
											<h3><?php echo $rowcategory["Category_Title"]?></h3>
											<p><?php echo $rowcategory["Category_Desc"]?></p>
										</a>
									</li>
									<?php
										 }
										 ?>
								</ul>
							</section>

						<!-- Actions -->
							


					</section>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Üye Ol</a></h2>
										<p>Aşağıdaki üye formundan üye olabilirsiniz</p>
									</div>
									
								

								</header>
								<form action="#hata" method="POST" enctype="multipart/form-data">
								<input  type="text" name="name" placeholder="Adınız" required="required"><br>
								<input  type="text" name="surname" placeholder="Soyadınız" required="required"><br>
								<input  type="email" name="email" placeholder="E-mail" required="required"><br>
								Bir profil resmi seçin <input 	name="dosya" id="dosya" type="file"><br><br>
								<input  type="text" name="user-name" placeholder="Kullanıcı Adı" required="required"><br>
								<input  type="password" name="password" placeholder="Şifre" required="required"><br>
								<input  type="password" name="re-password" placeholder="Tekrar Şifre" required="required"><br>
								<button type="submit" name="register_u" id="register_u" class="button big fit">Üye ol</button>
								
								</form>
								<?php
								
									if(isset($_POST["register_u"])){
										$name = $_POST["name"];
										$surname = $_POST["surname"];
										$email = $_POST["email"];
										$user_name = $_POST["user-name"];
										$user_PP = $_FILES['dosya']['name'];
										$password = $_POST["password"];
										$re_password = $_POST["re-password"];

										if($password == $re_password){
											

										mysqli_query($db,"INSERT INTO bloguyeler (Name,Surname,Email,Username,User_PP,Password)
               VALUES ('".$name."','".$surname."','".$email."','".$user_name."','".$user_PP."','".$password."')");


										}
										
										else{
											$hata = "<div id='hata' style='color:red; font-weight:bold;'>*Şifreler Uyuşmuyor, lütfen kontrol edip tekrar deneyiniz</div>";
										}
									}
								?>

								<?php echo $hata; ?>
								
							</article>


							
							
							
							

					</div>

				<!-- Footer -->
					<section id="footer">
						<ul class="icons">
							<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
							<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>