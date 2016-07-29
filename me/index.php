<?php

							

include "../Admin/Pages/connect.php";
$query = $db->query("select * from sitepage WHERE id = 1", PDO::FETCH_ASSOC);
                          if($query->rowCount()){
                          	// project_image eklenecek veri tabanına koymayı unutmuşuz galiba emin değilim çok uykum var :(
                            foreach ($query as $row) {
                                $logo_title = $row["Logo_Title"];
                                $about_title1 = $row["About_Title"];
                                $about_article1 = $row["About_Article1"];
                                $about_article2 =$row["About_Article2"];
                                $about2_title =$row["About2_Title"];
                                $about2_article1 =$row["About2_Article"];
                                $about2_pp =$row["About2_PP"];
                                $about2_button_title =$row["About2_Button_Title"];
                                $about2_button_link =$row["About2_Button_Link"];
                                $services_title =$row["Services_Title"];
                                $services_article =$row["Services_Article"];
                                $project_title =$row["Projects_Title"];
                                $project_article =$row["Projects_Article"];
                                $aboutme_main_title =$row["Aboutme_Main_Title"];
                                $aboutme_title =$row["Aboutme_Title"];
                                $aboutme_pp =$row["Aboutme_PP"];
                                $aboutme_article =$row["Aboutme_Article"];
                                $social_title =$row["Social_Title"];
                                $social_article =$row["Social_Article"];
                                $social_facebook =$row["Social_Facebook"];
                                $social_twitter =$row["Social_Twitter"];
                                $social_instagram =$row["Social_instagram"];
                                $social_youtube =$row["Social_Youtube"];
                                $contact_title =$row["Contact_Title"];
                                $contact_article =$row["Contact_Article"];
                                $contact_adress_title =$row["Contact_Adress_Title"];
                                $contact_adress =$row["Contact_Adress"];
                                $contact_phone =$row["Contact_Phone"];
                                $contact_mail =$row["Contact_Mail"];
                                $contact_main_mail =$row["Contact_Main_Mail"];

                            }
                        }



$isim ="";
$email ="";
$baslik ="";
$icerik ="";
$kontrol ="";
if(isset($_POST["gonder"]))
{
	if(isset($_POST["isim"]) && isset($_POST["email"]) && isset($_POST["konu"]) && isset($_POST["icerik"]))
	{
		
	
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$privatekey ="6Lc5RRITAAAAAAEKHHyLYTd-bahhuePu3PN-sA3h";
	$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	
	$data = json_decode($response);
	
	if(isset($data->success) AND $data->success==true)
	{
		
$isim = $_POST["isim"];
$email = $_POST["email"];
$baslik = $_POST["konu"];
$icerik =$_POST["icerik"];

include 'class.phpmailer.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->Username = 'onataktasdestek@gmail.com';
$mail->Password = '987654321q';
$mail->SetFrom($mail->Username, $isim);
$mail->AddAddress($contact_main_mail, $email);
$mail->CharSet = 'UTF-8';
$mail->Subject = $baslik;
$mail->MsgHTML($icerik);
if($mail->Send()) {
    $kontrol = 'Mesajınız Başarılı bir şekilde ulaştırıldı , Teşekkürler';
} else {
    $kontrol = 'Mesajınız gönderirken bir hata oluştu daha sonra tekrar deneyiniz yada Sosyal platformları kullanabilirsiniz.';
}

	}
	else
	{
		$kontrol = 'Robot doğrulamasını yapmanız gerekli';
	}



}
else
{
	$kontrol = 'Boş yer bırakmamanız gerekli';
}
}


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    	<!-- meta character set -->
        <meta name="owner" content="Onat Aktaş" />
        <meta name="copyright" content="(c) 2015" />
        <link rel="shortcut icon" href="img/favicon.png">

        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Onat Aktaş | Me</title>		
		<!-- Meta Description -->
        <meta name="description" content="Merhaba benim adım Onat Aktaş, Burada benim hakkımda daha çok bilgiye kolayça ulaşabilir ve kişisel blog, yaptığım projeler ve verdiğim hizmetlere göz atabilirsiniz.">
        <meta name="title" content="Onat Aktaş Kişisel Sitesi" />
        <meta name="keywords" content="Onat Aktaş, Onat Aktaş Kimdir , Onat Aktaş Kişisel Site , Onat Aktaş Özgeçmiş , Onat Aktaş Kişisel Blog">
        <meta name="author" content="Onat Aktaş">
         <meta name="owner" content="Onat Aktaş" />
        <meta name="copyright" content="(c) 2015" />
        <link rel="shortcut icon" href="images/favicon.png">
		
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSS
		================================================== -->
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/slit-slider.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">

		<!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>

    </head>
	
    <body id="body">
		<!-- preloader -->
		<div id="preloader">
            <div class="loder-box">
            	<div class="battery"></div>
            </div>
		</div>
		<!-- end preloader -->

        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
					<h1 class="navbar-brand">
						<a href="#body"><?php echo $logo_title; ?></a>
					</h1>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
                    <?php $query = $db->query("select * from sitepagemenu", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
                                      	?>
                                      		<li><a style="font-weight:bold;" href="<?php echo $row["Menu_Link"] ?>"><?php echo $row["Menu_Title"] ?></a></li>
                                      	<?php
                                      }
                                  }

                                       ?>
                        
                       
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->
		
		<main class="site-content" role="main">
		
        <!--
        Home Slider
        ==================================== -->
		
		<section id="home-slider">
            <div id="slider" class="sl-slider-wrapper">

				<div class="sl-slider">
				<?php $query = $db->query("select * from  sitepageslider", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
                                      	?>
                                      		
                                      	
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">

						<div class="bg-img bg-img1"><img width="100%" height="100%" src="../Admin/image/upload/<?php echo $row["Slider_PP"] ?>"</div>

						<div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDown"><?php echo $row["Slider_Title"] ?></h2>
                                <span class="animated fadeInDown"><?php echo $row["Slider_Desc"] ?></span>
                               
                            </div>
                        </div>
						
					</div>
					
					

				</div><!-- /sl-slider -->
 <?php
                                      }
                                  }

                                       ?>
                <!-- 
                <nav id="nav-arrows" class="nav-arrows">
                    <span class="nav-arrow-prev">Previous</span>
                    <span class="nav-arrow-next">Next</span>
                </nav>
                -->
                
                <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
                    <a href="javascript:;" class="sl-prev">
                        <i class="fa fa-angle-left fa-3x"></i>
                    </a>
                    <a href="javascript:;" class="sl-next">
                        <i class="fa fa-angle-right fa-3x"></i>
                    </a>
                </nav>
                

				<nav id="nav-dots" class="nav-dots visible-xs visible-sm hidden-md hidden-lg">
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>
				</nav>

			</div><!-- /slider-wrapper -->
		</section>
		
        <!--
        End Home SliderEnd
        ==================================== -->
			
			<!-- about section -->
			<section id="about" >
				<div class="container">
					<div class="row">
						<div class="col-md-4 wow animated fadeInLeft">
							<div class="recent-works">
								<h3><?php echo $about_title1; ?></h3>
								<div id="works">
									<div class="work-item">
										<?php echo $about_article1; ?>
									</div>
									<div class="work-item">
										<?php echo $about_article2; ?>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
							<div class="welcome-block">
								<h3><?php echo $about2_title; ?></h3>								
						     	 <div class="message-body">
									<img src="../Admin/image/upload/<?php echo $about2_pp; ?>" class="pull-left" alt="member">
						       		<?php echo $about2_article1 ?>
						     	 </div>
						       	<a href="<?php echo $about2_button_link; ?>" class="btn btn-border btn-effect pull-right"><?php echo $about2_button_title; ?></a>
						    </div>
						</div>
					</div>
				</div>
			</section>
			<!-- end about section -->
			
			
			<!-- Service section -->
			<section id="service">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center">
							<h2 class="wow animated bounceInLeft"><?php echo $services_title; ?></h2>
							<p class="wow animated bounceInRight"><?php echo $services_article; ?></p>
                            <p><a href='http://armut.com/HizmetVeren/onat-aktas-izmir-bornova-web-tasarim-ve-programlama_152056'> Onat Aktaş İzmir Bornova Web Tasarım ve Programlama - Armut.com  </a></p>
						</div>
						





							<?php $query = $db->query("select * from  sitepageservices", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
                                      	?>



						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn">
							<div class="service-item">
								
									<img width=150 height=150 src="../Admin/image/upload/<?php echo $row["Services_PP"]; ?>" />
								
								<h3><?php echo $row["Services_Title"]; ?></h3>
								<?php echo $row["Services_Desc"]; ?>
							</div>
						</div>
					
						<?php
					}
				}
				?>







						
					</div>
				</div>
			</section>
			<!-- end Service section -->
			
			<!-- portfolio section -->
			<section id="portfolio">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center wow animated fadeInDown">
							<h2><?php echo $project_title; ?></h2>
							<?php echo $project_article; ?>
						</div>
						

						<ul class="project-wrapper wow animated fadeInUp">
						
						
						<?php $query = $db->query("select * from  sitepageproject", PDO::FETCH_ASSOC);
                                       if($query->rowCount()){
                                      foreach ($query as $row) {
                                      	?>

                                <li class="portfolio-item">
								<img width=375 height=250 src="../Admin/image/upload/<?php echo $row["Project_PP"]; ?>"  alt="<?php echo $row["Project_Art"]; ?>" />
								<figcaption class="mask">
									<h3><?php echo $row["Project_Title"]; ?></h3>
									<?php echo $row["Project_Art"]; ?>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="<?php echo $row["Project_Title"]; ?>" data-fancybox-group="works" href="../Admin/image/upload/<?php echo $row["Project_PP"]; ?>"/>
                                    <i class="fa fa-search"></i></a></li>
									<li><a href="<?php echo $row["Project_Link"]; ?>"><i class="fa fa-link"></i></a></li>
								</ul>
							</li>

					
						<?php
					}
				}
				?>
						
						
						
							
							
							
							
						</ul>
						
					</div>
				</div>
			</section>
			<!-- end portfolio section -->
			
			<!-- Testimonial section -->
			<section id="testimonials" class="parallax">
				<div class="overlay">
					<div class="container">
						<div class="row">
						
							<div class="sec-title text-center white wow animated fadeInDown">
								<h2><?php echo $aboutme_main_title; ?></h2>
							</div>
							
							<div id="testimonial" class=" wow animated fadeInUp">
								<div class="testimonial-item text-center">
									<img src="../Admin/image/upload/<?php echo $aboutme_pp ?>" alt="<?php echo $aboutme_title ?>"/>
									<div class="clearfix">
										<span><?php echo $aboutme_title ?></span>
										
										<?php echo $aboutme_article ?>
										
									</div>
								</div>
								
								
							</div>
						
						</div>
					</div>
				</div>
			</section>
			<!-- end Testimonial section -->
			<!-- Social section -->
			<section id="social" class="parallax">
				<div class="overlay" style="background-color:#009EE3;>
					<div class="container">
						<div class="row">
						
							<div class="sec-title text-center white wow animated fadeInDown">
								<h2><?php echo $social_title ?></h2>
								<?php echo $social_article ?>
							</div>
							<div class="footer-social">
							<ul>
								<li class="wow animated zoomIn" data-wow-delay="1.2s"> <a href="<?php $social_facebook ?>"><i class="fa fa-thumbs-up fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="1.2s"><a href="<?php $social_twitter ?>"><i class="fa fa-twitter fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="1.2s"><a href="<?php $social_youtube ?>"><i class="fa fa-youtube fa-3x"></i></a></li>						
							</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end Social section -->
			
			<!-- Contact section -->
			<section id="contact" >
				<div class="container">
					<div class="row">
						
						<div class="sec-title text-center wow animated fadeInDown">
							<h2><?php echo $contact_title ?></h2>
							<?php echo $contact_article ?>
						</div>
						
						
						<div class="col-md-7 contact-form wow animated fadeInLeft">
							<form action="#" method="post">
								<div class="input-field">
									<input type="text" name="isim" id="isim" class="form-control" placeholder="İsmin...">
								</div>
								<div class="input-field">
									<input type="email" name="email" id="email" class="form-control" placeholder="E-posta...">
								</div>
								<div class="input-field">
									<input type="text" name="konu" id="konu" class="form-control" placeholder="Konu...">
								</div>
								<div class="input-field">
									<textarea name="icerik" id="icerik" class="form-control" placeholder="Mesajın..."></textarea>
								</div>
                                <div class="input-field">
                                <span style="color:#0F0";><?php echo $kontrol; ?></span>
                                <div class="g-recaptcha" data-sitekey="6Lc5RRITAAAAAHkPZ9XNIUmi3xbGsUwq87dsWnJo"></div>
                                </div>
						       	<button type="submit" name="gonder" id="gonder" class="btn btn-blue btn-effect">Gönder</button>
							</form>
                            <span></span>
					</div>
						
						<div class="col-md-5 wow animated fadeInRight">
							<address class="contact-details">
								<h3><?php echo $contact_adress_title ?></h3>						
								<p><i class="fa fa-pencil"></i><?php echo $contact_adress ?>
								<p><i class="fa fa-phone"></i><?php echo $contact_phone ?></p>
								<p><i class="fa fa-envelope"></i><?php echo $contact_mail ?></p>
							</address>
						</div>
			
					</div>
				</div>
			</section>
			<!-- end Contact section -->
			
			
		
		</main>
		
		<footer id="footer">
			<div class="container">
				<div class="row text-center">
					<div class="footer-content">
						
						
						<div class="footer-social">
							<ul>
								<li class="wow animated zoomIn"><a href="https://www.facebook.com/onat.aktas.52"><i class="fa fa-thumbs-up fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="https://twitter.com/thetudors12"><i class="fa fa-twitter fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-skype fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.9s"><a href="#"><i class="fa fa-dribbble fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="1.2s"><a href="https://www.youtube.com/user/Bourn329"><i class="fa fa-youtube fa-3x"></i></a></li>
							</ul>
						</div>
						<span style='font-size: 14px; display: inline-block; text-align: center; width: 300px;font-family: Trebuchet MS, Helvetica, Arial, sans-serif;'><a title='Onat Aktaş Web Tasarım ve Programlama Armut' href='http://armut.com/HizmetVeren/onat-aktas-izmir-bornova-web-tasarim-ve-programlama_152056' style='background: none; 
                                padding:0; border:0;'><img src='http://armut.com/images/armut-uyesidir-mavi.png' style='display: block; margin-bottom: 6px; padding:0; border: 0;' /></a><a 
                                href="http://armut.com/HizmetVeren/onat-aktas-izmir-bornova-web-tasarim-ve-programlama_152056" style="border:0;">Onat Aktaş  Web Tasarım ve Programlama Armut</a></span>
						<p>Copyright &copy; 2014-2015 Design and Developed By<a href="http://www.themefisher.com">Themefisher</a> </br> Onat Aktaş Tarafından düzenlenmiştir. </p>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- Essential jQuery Plugins
		================================================== -->
		<!-- Main jQuery -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
		<!-- Single Page Nav -->
        <script src="js/jquery.singlePageNav.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="js/jquery.fancybox.pack.js"></script>
		<!-- Google Map API -->
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- Fullscreen slider -->
        <script src="js/jquery.slitslider.js"></script>
        <script src="js/jquery.ba-cond.min.js"></script>
		<!-- onscroll animation -->
        <script src="js/wow.min.js"></script>
		<!-- Custom Functions -->
        <script src="js/main.js"></script>
    </body>
</html>