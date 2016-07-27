<?php 
include "connect_mysql.php";
$ensonsayi="";
$yaziid;
$hatarecaptcha="";
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


if(isset($_GET["py"]))
{
	$yaziid = $_GET["py"];
}
if(isset($_POST["YorumYap"]))
{
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$privatekey ="6LcTziUTAAAAACPyWThrsxu5WCn11aLSZWRo7CTo";
	$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	$data = json_decode($response);
	if(isset($data->success) AND $data->success==true)
	{
		mysqli_query($db,"INSERT INTO blogcomments (Comment,yazi_id,user_id)
               VALUES ('".$_POST["yorumu"]."','".$_GET["py"]."',".@$_SESSION['LoginCont'].")");
		$hatarecaptcha="";
	}
	else{
		$hatarecaptcha = "* Yorum yazabilmek için robot doğrulamasını yapmalısınız.";
		
	}
}

$sqlview = "SELECT * FROM blogyazilar WHERE blogyazilar.id=".$yaziid;
										$queryview = mysqli_query($db,$sqlview);
										 while( $rowview = mysqli_fetch_array( $queryview,MYSQLI_ASSOC ) ) {
											 $ensonsayi = $rowview["Post_View"];
										 }

if(!isset($_SESSİON['hasVisited']))
{
	$_SESSİON['hasVisited'] = "yes";
	$ensonsayi += 1;
	
}
$sqlu = "UPDATE blogyazilar SET Post_View='".$ensonsayi."' WHERE id=".$yaziid;

if ($db->query($sqlu) === TRUE) { 
} else {
}


?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Single - Future Imperfect by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src='https://www.google.com/recaptcha/api.js'></script>
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
							<li><a href="profil_settings.php" class="button big fit">Ayarlar</a></li><br>
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
						<?php 
						$sql = "SELECT blogyazilar.* , blogadmin.*,blogcategory.Category_Title FROM blogyazilar inner join blogadmin ON blogyazilar.Admin_id = blogadmin.id inner join blogcategory ON blogyazilar.Category_id = blogcategory.id WHERE blogyazilar.id=".$yaziid;
										$postquery = mysqli_query($db,$sql);
										 while($row = mysqli_fetch_array( $postquery,MYSQLI_ASSOC)){
											 
											 ?>
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#"><?php echo $row["Article_Title"] ?></a></h2>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?php echo $row["Share_Date"]; ?></time>
										<a href="#" class="author"><span class="name"><?php echo $row["Username"]; ?></span><img src="../Admin/image/upload/<?php echo $row["Admin_PP"]; ?>" alt="" /></a>
									</div>
								</header>
								<span class="image featured"><img height=300 src="../Admin/image/upload/<?php echo $row["Article_PP"]; ?>" alt="" /></span>
								<?php echo $row["Article_Desc"] ?>
								<footer>
									<ul class="stats">
										<li><a href="#"><?php echo $row["Category_Title"] ?></a></li>
									</ul>
								</footer>
							</article>
							<?php
							
										 }
										 
							?>
							
							
							
							
							
							<article class="post">
							<header>
									<div class="title">
										<h2><a href="#">Yorumlar</a></h2>
									</div>		
							</header>
							<?php
								$sqlcom = "SELECT * FROM blogcomments inner join bloguyeler ON bloguyeler.id = blogcomments.user_id WHERE blogcomments.yazi_id=".$yaziid;
										$querycom = mysqli_query($db,$sqlcom);
										 while( $rowcom = mysqli_fetch_array( $querycom,MYSQLI_ASSOC ) ) {
											 $yorumtarih = substr($rowcom["Comment_Date"],0,10);
							?>
							<header>
									<div class="title">
										<p><?php echo $rowcom["Comment"] ?></p>
									</div>		
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?php echo $yorumtarih ?></time>
										<a href="#" class="author"><span class="name"><?php echo $rowcom["Username"] ?></span><img src="../Admin/image/upload/<?php echo $rowcom["User_PP"] ?>" alt="" /></a>
									</div>	
							</header>
							<?php
										 }
							?>
							<?php
							
							
							
							
							
							if(@$_SESSION['LoginCont'] != null)
							{
								$sqluser = "select * from bloguyeler WHERE bloguyeler.id=".$_SESSION['LoginCont'];
										$queryuser = mysqli_query($db,$sqluser);
										 while( $rowuser = mysqli_fetch_array( $queryuser,MYSQLI_ASSOC)){
											 $KullaniciAdi = $rowuser["Username"];
											 $KullaniciResmi = $rowuser["User_PP"];
										 }
							//GİRİŞ YAPILDIYSA
							?>
							<header>
									<div class="title">
									<form action="#" method="Post">
									<section id="yorumyap">
									<span style="color:red; font-weight:bold;"><?php echo $hatarecaptcha; ?></span>
										<textarea name="yorumu" style="resize:none;" rows="6" cols="0" placeholder="Ne düşünüyorsun ?"></textarea><br>
										<button style="width:200px; float:right;" class="button big fit" name="YorumYap" id="YorumYap" >YORUM YAP</button>
										<div class="g-recaptcha" data-sitekey="6LcTziUTAAAAAPRy5e2cU31J2DNqNMM4Thfro19o"></div>
										
										
								    </form>
									</section>
									</div>		
									<div class="meta">
										<time class="published" datetime="2015-11-01">November 1, 2015</time>
										<a href="#" class="author"><span class="name"><?php echo $KullaniciAdi; ?></span><img src="../Admin/image/upload/<?php echo $KullaniciResmi ?>" alt="" /></a>
									</div>	
							</header>
							<?php
							}
							else
							{
								?>
								<header>
									<div class="title">
										<a href="login.php"><b>Yorum yapmak için Giriş yapınız</b></a><br> <a href="register.php"><b>Eğer üye değilseniz Kayıt Olunuz</b></a>
									</div>		
									
							</header>
								
								<?php
							}

							
							?>
							
							
							
								
							
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