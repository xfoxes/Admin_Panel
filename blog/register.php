<?php
include "../Admin/pages/connect_mysql.php";?>
<?php $hata = ""; ?>
<?php

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
						<h1><a href="#">Future Imperfect</a></h1>
						<nav class="links">
							<ul>
								<li><a href="#">Lorem</a></li>
								<li><a href="#">Ipsum</a></li>
								<li><a href="#">Feugiat</a></li>
								<li><a href="#">Tempus</a></li>
								<li><a href="#">Adipiscing</a></li>
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
											

											$insert = mysql_query("INSERT INTO bloguyeler SET
                                             Name  = '$name',
                                             Surname = '$surname',
                                             Email = '$email',
                                             Username = '$user_name',
                                             User_PP = '$user_PP',
                                             Password  = '$password',
                                             User_Status  = 0,
                                             Cont_Key  = 123");
                                             if ( $insert ){
                                                  $last_id = mysql_insert_id();
                                                  print "<div style='color:green; font-weight:bold;'>*Üye olma işlemi başarılı, sisteme giriş yapabilmek için lütfen e-mailinize gelen aktivasyon kodunu doğrulayınız.</div>";
                                                  echo $uyari;
                                             }


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