<?php include "connect_mysql.php";
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


$sqlblog = "select * from blogpage where id=1";
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


 ?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Onat Aktaş | Blog</title>
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
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php"><?php echo $blog_site_title ?></a></h1>
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
									<a class="fa-search" href="#search">Arama</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Arama" />
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
										 	$category_id = $rowcategory["id"];
								?>
									<li>
										<a href="category.php?cs=<?php echo $category_id; ?>">
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



								<?php 

										$sayfa = "";
										$sayfa = @$_GET["p"];
										if(empty($sayfa) || !is_numeric($sayfa)){
											$sayfa = 1;
										}
										$kacar = 5;
										$sorgu2 ="SELECT * from blogyazilar";
										 
								$result2 = $db->query($sorgu2);
								$count2 = $result2->num_rows;
								
								$ssayisi = ceil($count2/$kacar);
								
										
										
															
										$nerden = ($sayfa*$kacar)-$kacar;

										
										$sql = "select blogyazilar.*, blogadmin.Username,blogadmin.Admin_PP , blogcategory.Category_Title,blogcategory.id AS bid FROM blogyazilar inner join blogadmin ON blogyazilar.Admin_id = blogadmin.id inner join blogcategory ON blogyazilar.Category_id = blogcategory.id ORDER BY blogyazilar.id DESC limit $nerden,$kacar";
										$query = mysqli_query($db,$sql);
										 while( $row = mysqli_fetch_array( $query,MYSQLI_ASSOC ) ) {
											
											 $kisayazi = substr($row["Article_Desc"],0,300);
											$sorgu ="SELECT * from blogcomments where blogcomments.yazi_id=".$row["id"];
										 
								$result = $db->query($sorgu);
								$count = $result->num_rows;

										
									  ?>
									 
									  <article class="post">
								<header>
									<div class="title">
										<h2><a href="yazi.php?py=<?php echo $row["id"] ?>"><?php echo $row["Article_Title"]; ?></a></h2>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?php echo $row["Share_Date"]; ?></time>
										<a href="#" class="author"><span class="name"><?php echo $row["Username"] ?></span><img src="../Admin/image/upload/<?php echo $row["Admin_PP"]; ?>" alt="" /></a>
									</div>
								</header>
								<a href="yazi.php?py=<?php echo $row["id"] ?>" class="image featured"><img height=300 src="../Admin/image/upload/<?php echo $row["Article_PP"]; ?>" alt="" /></a>
								<p><?php  echo $kisayazi." . . ." ?></p>
								<footer>
									<ul class="actions">
										<li><a href="yazi.php?py=<?php echo $row["id"] ?>" class="button big">Devamını Oku</a></li>
									</ul>
									<ul class="stats">
										<li><a href="category.php?cs=<?php  echo $row["bid"]; ?>"><?php echo $row["Category_Title"] ?></a></li>
										<li><a href="#" class="icon fa-comment"><?php echo $count ?></a></li>
									</ul>
								</footer>
							</article>
							<?php	
                            }
					  ?>
							<ul class="actions pagination">

							<?php
							
							if($sayfa==1)
							{
								$degistir ="disabled button big previous";
							}
							else
							{
								$degistir="button big previous";
							}
							if($sayfa == $ssayisi)
							{
								$degistirnext="disabled button big next";
							}
							else{
								$degistirnext ="button big next";
							}
							if($sayfa <= 0 || $sayfa > $ssayisi)
							{
								echo"<p><b>ARADIĞINIZ SAYFA BULUNAMADI</b></p>";
								$sayfa=1;
							}
					
							echo '<li><a href="index.php?p='.($sayfa-1).'" class="'.$degistir.'">Önceki</a></li>'; 
							echo '<li><a href="index.php?p='.($sayfa+1).'" class="'.$degistirnext.'">Sonraki</a></li>'; 

							
							 ?>

							</ul>

					</div>
					
					<!--  buraya gel-->

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="../Admin/image/upload/<?php echo $blog_PP; ?>" alt="" /></a>
								<header>
									<h2><?php echo $blog_site_title; ?></h2>
									<p><?php echo $blog_site_desc; ?></p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
							<h2>Popüler Konular</h2>
								<div class="mini-posts">
<?php
                                        $sqlp = "select * From blogyazilar ORDER BY blogyazilar.Post_View DESC limit 0,5";
										$queryp = mysqli_query($db,$sqlp);
										 while( $rowp = mysqli_fetch_array( $queryp,MYSQLI_ASSOC ) ) {
?>
									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="yazi.php?py=<?php echo $rowp["id"] ?>"><?php echo $rowp["Article_Title"] ?></a></h3>
												<time class="published" datetime="2015-10-20"><?php echo $rowp["Share_Date"] ?></time>
												
											</header>
											<a href="yazi.php?py=<?php echo $rowp["id"] ?>"  class="image"><img height=176 src="../Admin/image/upload/<?php echo $rowp["Article_PP"]; ?>" alt="" /></a>
										</article>
										<?php
										 }
										?>

								</div>
							</section>

						<!-- Posts List -->
							<section>
							<h2>Son Yorumlar</h2>
								<ul class="posts">
									<?php
                                        $sqlc = "SELECT * FROM blogcomments inner join bloguyeler on blogcomments.user_id = bloguyeler.id ORDER BY blogcomments.Comment_Date DESC limit 0,5";
										$queryc = mysqli_query($db,$sqlc);
										 while( $rowc = mysqli_fetch_array( $queryc,MYSQLI_ASSOC ) ) {
?>
									<li>
										<article>
											<header>
												<h3><a href="yazi.php?py=<?php echo $rowc["yazi_id"] ?>"><?php echo $rowc["Comment"] ?></a></h3>
												<time class="published" datetime="2015-10-06"><?php echo $rowc["Comment_Date"] ?></time>
											</header>
											<a href="#" class="image"><img src="../Admin/image/upload/<?php echo $rowc["User_PP"]; ?>" alt="" /></a>
										</article>
									</li>
									<?php
										 }
									?>
								</ul>
							</section>

						<!-- About -->
							<section class="blurb">
								<h2>Hakkımda</h2>
								<p><?php echo $blog_site_desc; ?></p>
								<ul class="actions">
									<li><a href="<?php echo $blog_button_link; ?>" class="button"><?php echo $blog_button_title; ?></a></li>
								</ul>
							</section>

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="<?php echo $blog_twitter; ?>" class="fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="<?php echo $blog_facebook; ?>" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="<?php echo $blog_instagram; ?>" class="fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								<p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
							</section>

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