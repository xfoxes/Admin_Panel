<!DOCTYPE HTML>

<?php
include "Admin/pages/connect.php";
session_start();
$ensonsayi = 0;

 $query = $db->query("select * from ziyaretciler", PDO::FETCH_ASSOC);
                          if($query->rowCount()){
                            foreach ($query as $row) {
                                $ensonsayi = $row["ToplamZiyaret"];
	
                            }
                          }
						  



if(!isset($_SESSİON['hasVisited']))
{
	$_SESSİON['hasVisited'] = "yes";
	$ensonsayi += 1;
	
}
 $sql = "UPDATE ziyaretciler SET ToplamZiyaret=?  WHERE id=1";
                          $query = $db->prepare($sql);
                          $sonuc = $query->execute(array($ensonsayi));




                   $query = $db->query("select * from mainpage", PDO::FETCH_ASSOC);
                          if($query->rowCount()){
                            foreach ($query as $row) {
                                $title = $row["Title"];
                                $description = $row["Description"];
								$resimpp = $row["PP"];
								$resimbgp = $row["BGP"];
								$twitterlink = $row["Stwitter"];
								$facebooklink = $row["Sfacebook"];
								$instagramlink = $row["Sinstagram"];
								
                            }
                          }


 ?>
<html>
	<head>
	<style>
body{
		background-image: url("images/overlay.png"), -moz-linear-gradient(60deg, rgba(255, 165, 150, 0.5) 5%, rgba(0, 228, 255, 0.35)), url("Admin/image/upload/<?php echo $resimbgp; ?>");
		background-image: url("images/overlay.png"), -webkit-linear-gradient(60deg, rgba(255, 165, 150, 0.5) 5%, rgba(0, 228, 255, 0.35)), url("Admin/image/upload/<?php echo $resimbgp; ?>");
		background-image: url("images/overlay.png"), -ms-linear-gradient(60deg, rgba(255, 165, 150, 0.5) 5%, rgba(0, 228, 255, 0.35)), url("Admin/image/upload/<?php echo $resimbgp; ?>");
		background-image: url("images/overlay.png"), linear-gradient(60deg, rgba(255, 165, 150, 0.5) 5%, rgba(0, 228, 255, 0.35)), url("Admin/image/upload/<?php echo $resimbgp; ?>");
	}

	</style>
		<title>Onat Aktaş</title>
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

		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><img width="125" height="auto" src="Admin/image/upload/<?php echo $resimpp; ?>" alt="Onat Aktaş Profil Fotoğrafı" title="Onat Aktaş" /></span>
							<h1><?php echo $title; ?></h1>
							<?php echo $description; ?>
						</header>
						
						<footer>



                                <?php 
										
										$query = $db->query("select * from mainpagebuttons", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
                                      
                                      $ButtonName = $row["Title"];
								      $ButtonLink = $row["Link"];
									  ?>
									  <a href="<?php echo $ButtonLink; ?>" class="button"><?php echo $ButtonName; ?></a>
							          <?php	
                                      }	 
                                      }
						              ?>

                
                                      <br/><br/>

							<ul class="icons">
								<li><a href="<?php echo $twitterlink ?>" class="fa-twitter">Twitter</a></li>
								<li><a href="<?php echo $instagramlink ?>" class="fa-instagram">Instagram</a></li>
								<li><a href="<?php echo $facebooklink ?>" class="fa-facebook">Facebook</a></li>
							</ul>
						</footer>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; Onat Aktaş</li>
							<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56033150-4', 'auto');
  ga('send', 'pageview');

</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter37116210 = new Ya.Metrika({
                    id:37116210,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/37116210" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</html>