<?php include "connect_mysql.php";
session_start();
ob_start();

?>

<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<<title>Onat Aktaş | Blog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <meta name="description" content="Merhaba benim adım Onat Aktaş, Burada benim hakkımda daha çok bilgiye kolayça ulaşabilir ve kişisel blog, yaptığım projeler ve verdiğim hizmetlere göz atabilirsiniz." />
        <meta name="title" content="Onat Aktaş Özgeçmiş ve Kişisel Blog" />
        <meta name="keywords" content="Onat Aktaş, Onat Aktaş Kimdir , Onat Aktaş Kişisel Site , Onat Aktaş Özgeçmiş , Onat Aktaş Kişisel Blog" />
        <meta name="author" content="Onat Aktaş" />
        <meta name="owner" content="Onat Aktaş" />
        <meta name="copyright" content="(c) 2015" />
        <link rel="shortcut icon" href="images/favicon.png">
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

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3>Lorem ipsum</h3>
											<p>Feugiat tempus veroeros dolor</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Dolor sit amet</h3>
											<p>Sed vitae justo condimentum</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Feugiat veroeros</h3>
											<p>Phasellus sed ultricies mi congue</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Etiam sed consequat</h3>
											<p>Porta lectus amet ultricies</p>
										</a>
									</li>
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<li><a href="#" class="button big fit">Log In</a></li>
								</ul>
							</section>

					</section>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Giriş Yap</a></h2>
										
									</div>
									
								</header>
								<form action="#" method="POST">
								<input  type="text" name="email" placeholder="Email" required="required"><br>
								<input  type="password" name="password" placeholder="Şifre" required="required"><br>
								
								<button type="submit" name="login" class="button big fit">Giriş yap</button>
								</form>
								<?php
								    if(isset($_POST["login"])){
										
										$email = @$_POST['email'];
										$sifre = @$_POST['password'];
										
										$sqlk = "select * from bloguyeler where Email='".$email."' and Password='".$sifre."'	";
										$queryk = mysqli_query($db,$sqlk);
										 while( $rowk = mysqli_fetch_array( $queryk,MYSQLI_ASSOC ) ) {
											  
											$user_id = $rowk["id"];
											$kul_ad = $rowk["Username"];
											
										 }
										 if(@$user_id != null)
										 {
											$_SESSION['LoginCont'] = $user_id;
											$_SESSION['KullaniciAdi'] = $kul_ad;
											echo"<script> window.location='http://localhost/Onat Aktas-me/Admin_Panel/blog/'; </script>";
										 }
										 else
											 {
												 echo "<div style='color:red; font-weight:bold;'>*Kullanıcı adı veya şifre yanlış</div>";
												 
											 }
										 
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