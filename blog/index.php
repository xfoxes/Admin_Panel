<?php include "connect_mysql.php"; ?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Future Imperfect by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
							<section>
							
								<ul class="actions vertical">
								
									<li><a href="login.php" class="button big fit">Giriş Yap</a></li>
									
									
								</ul>
							</section>

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

										
										$sql = "select blogyazilar.*, blogadmin.Username,blogadmin.Admin_PP , blogcategory.Category_Title FROM blogyazilar inner join blogadmin ON blogyazilar.Admin_id = blogadmin.id inner join blogcategory ON blogyazilar.Category_id = blogcategory.id ORDER BY blogyazilar.id DESC limit $nerden,$kacar";
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
										<h2><a href="#"><?php echo $row["Article_Title"]; ?></a></h2>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01"><?php echo $row["Share_Date"]; ?></time>
										<a href="#" class="author"><span class="name"><?php echo $row["Username"] ?></span><img src="../Admin/image/upload/<?php echo $row["Admin_PP"]; ?>" alt="" /></a>
									</div>
								</header>
								<a href="#" class="image featured"><img height=300 src="../Admin/image/upload/<?php echo $row["Article_PP"]; ?>" alt="" /></a>
								<p><?php  echo $kisayazi." . . ." ?></p>
								<footer>
									<ul class="actions">
										<li><a href="#" class="button big">Devamını Oku</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#"><?php echo $row["Category_Title"] ?></a></li>
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
								<a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
								<header>
									<h2>Future Imperfect</h2>
									<p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
							<h2>Popüler Konular</h2>
								<div class="mini-posts">

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Vitae sed condimentum</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Rutrum neque accumsan</a></h3>
												<time class="published" datetime="2015-10-19">October 19, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Odio congue mattis</a></h3>
												<time class="published" datetime="2015-10-18">October 18, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="#">Enim nisl veroeros</a></h3>
												<time class="published" datetime="2015-10-17">October 17, 2015</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
										</article>

								</div>
							</section>

						<!-- Posts List -->
							<section>
							<h2>Güncel Konular</h2>
								<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="#">Lorem ipsum fermentum ut nisl vitae</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Convallis maximus nisl mattis nunc id lorem</a></h3>
												<time class="published" datetime="2015-10-15">October 15, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Euismod amet placerat vivamus porttitor</a></h3>
												<time class="published" datetime="2015-10-10">October 10, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic10.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Magna enim accumsan tortor cursus ultricies</a></h3>
												<time class="published" datetime="2015-10-08">October 8, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic11.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Congue ullam corper lorem ipsum dolor</a></h3>
												<time class="published" datetime="2015-10-06">October 7, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic12.jpg" alt="" /></a>
										</article>
									</li>
								</ul>
							</section>

						<!-- About -->
							<section class="blurb">
								<h2>Hakkımda</h2>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
								<ul class="actions">
									<li><a href="#" class="button">Kişisel Sitem</a></li>
								</ul>
							</section>

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