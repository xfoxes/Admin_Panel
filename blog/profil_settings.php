<?php
session_start();
include "../Admin/pages/connect.php";
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
if(isset($_POST["profil_settings_u"])){
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

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3>Lorem ipsum</h3>
											<p>Feugiat tempus veroeros dolor</p>
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
										<h2><a href="#">Profil ayarları</a></h2>
										
									</div>
									
								</header>
								<?php
									$query_user = $db->query("select * from bloguyeler", PDO::FETCH_ASSOC);
                          			if($query_user->rowCount()){
                            			foreach ($query_user as $row) {
                                			$v_name = $row["Name"];
                                			$v_surname = $row["Surname"];
											$v_email = $row["Email"];
											$v_username = $row["Username"];
											$v_password = $row["Password"];
											$v_PP = $row["User_PP"];
											
								        }
								    }
								?>
								<form action="#" method="POST" enctype="multipart/form-data">
								<input  type="text" name="re_name" value="<?php echo $v_name; ?>" placeholder="İsmini Değiştir" ><br>
								<input  type="text" name="re_surname" value="<?php echo $v_surname; ?>" placeholder="Soyadını Değiştir" ><br>
								<input  type="text" name="re_email" value="<?php echo $v_email; ?>" placeholder="Emailini Değiştir" ><br>
								<input  type="text" name="re_username" value="<?php echo $v_username; ?>" placeholder="Kullanıcı Adını Değiştir" ><br>
								<input  type="text" name="re_password" value="<?php echo $v_password; ?>" placeholder="Şifreni Değiştir" ><br>
								<input  type="text" name="try_re_password" placeholder="Yeni Şifreni Tekrar Gir" ><br>
								Profil Resmini Seçiniz : <input  type="file"  name="dosya" id="dosya"><br><br>
								
								<button type="submit" name="profil_settings_u" class="button big fit">Kaydet</button>
								</form>
								<?php
								if(isset($_POST["profil_settings_u"])){

									
									$re_name = $_POST["re_name"];
									$re_surname = $_POST["re_surname"];
									$re_email = $_POST["re_email"];
									$re_username = $_POST["re_username"];
									$re_password = $_POST["re_password"];
									$try_re_password = $_POST["try_re_password"];
									if($_FILES['dosya']['name'] != null)
									{
										$re_PP = $_FILES['dosya']['name'];
									}
									else
									{
										$re_PP = $v_PP;
									}
									

									if($re_password == $try_re_password){

									$sql = "UPDATE bloguyeler SET Name='$re_name', Surname='$re_surname', Email='$re_email', Username='$re_username', User_PP='$re_PP', Password='$re_password' WHERE id=".$_SESSION["LoginCont"];
                         		    $query = $db->prepare($sql);
                          			$sonuc = $query->execute(array($re_name,$re_surname,$re_email,$re_username,$re_PP,$re_password));

                          			if($query){
                          				echo"<div style='color:green; font-weight:bold;'>*Yeni profil bilgileriniz başarıyla güncellendi.</div>";
                          			}
                          			else{
                          				echo "<div style='color:red; font-weight:bold;'>*Profil bilgilerini güncellerden bir hata meydana geldi.</div>";
                          			}

                                    }else{
                                    	echo "<div style='color:red; font-weight:bold;'>*Şifreler uyuşmuyor</div>";
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