<?php




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
$mail->AddAddress('bourn328@gmail.com', $email);
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
        <title>Onat Aktaş</title>		
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
						<a href="#body">Onat Aktaş</a>
					</h1>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="#body">Anasayfa</a></li>
                        <li><a href="#service">Ne yapıyorum ?</a></li>
                        <li><a href="#portfolio">portföy</a></li>
                        <li><a href="#testimonials">Başarılar</a></li>
                        <li><a href="#price">Hizmetler</a></li>
                        <li><a href="#contact">İletişim</a></li>
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
				
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">

						<div class="bg-img bg-img-1"></div>

						<div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDown">IZTECH RoboLeague 2015</h2>
                                <span class="animated fadeInDown">Yarışma sonra MSP'ler ile birlikte bir fotoğraf</span>
                               
                            </div>
                        </div>
						
					</div>
					
					<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
					
						<div class="bg-img bg-img-2"></div>
						<div class="slide-caption">
                            <div class="caption-content">
                                <h2>Microsoft İstanbul Kick-off</h2>
                                <span>Microsoft istanbul ofisinde geçirdiğimiz 3 günlük kick-off dan bir fotoğraf</span>
                                <!-- <a href="#" class="btn btn-blue btn-effect">Join US</a> DAHA SONRA KULLANILABİLİR -->
                            </div>
                        </div>
						
					</div>
					
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
						
						<div class="bg-img bg-img-3"></div>
						<div class="slide-caption">
                            <div class="caption-content">
                                <h2>Windows 10 Universal Windows Platformu Uygulama Geliştirme Etkinliği</h2>
                                <span>Deniz müzesinde olan geliştirici kampında bir fotoğraf</span>
                                 <!-- <a href="#" class="btn btn-blue btn-effect">Join US</a> DAHA SONRA KULLANILABİLİR -->
                            </div>
                        </div>

					</div>

				</div><!-- /sl-slider -->

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
								<h3>Uğraştığım bir kaç şey</h3>
								<div id="works">
									<div class="work-item">
										<p>Yarıda bıraktığım oyun projeleri üstünde çalışmaya devam ediyorum en kısa zamanda yayınlayacağım</p>
									</div>
									<div class="work-item">
										<p>Öz geçmiş CV sitesinden yani şuan bulunduğunuz siteye ek olarak kısa zamanda da bir blog eklemeyi düşünüyorum.</p>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
							<div class="welcome-block">
								<h3>Siteme Hoşgeldin :)</h3>								
						     	 <div class="message-body">
									<img src="img/member-1.jpg" class="pull-left" alt="member">
						       		<p>Benim Adım sitenin adından da anlaşılacağı üzere Onat Aktaş , Celal Bayar Üniversitesi Yazılım Mühendisliği bölümünde Hazırlık sınıfında okuyorum , ASP.net ve PHP ile web Programlama , Unity 3D game engine ile oyun yapımı ve windows üzerine uygulama geliştirme ile uğrasıyorum. </p>
						     	 </div>
						       	<a href="#" class="btn btn-border btn-effect pull-right">Blog'a Git</a>
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
							<h2 class="wow animated bounceInLeft">Neler Yapıyorum</h2>
							<p class="wow animated bounceInRight">Kısaca kendimi geliştirmek adına herşeyi...</p>
                            <p><a href='http://armut.com/HizmetVeren/onat-aktas-izmir-bornova-web-tasarim-ve-programlama_152056'> Onat Aktaş İzmir Bornova Web Tasarım ve Programlama - Armut.com  </a></p>
						</div>
						
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-home fa-3x"></i>
								</div>
								<h3>Web sitesi programlama</h3>
								<p>ASP.NET ve PHP ile size istediğiniz özelliklere sahip bir site yapabilirim</p>
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-tasks fa-3x"></i>
								</div>
								<h3>Oyun Yapımı</h3>
								<p>Unity 3D Game Engine ile sizlere kafanızda ki oyunu ekibimle beraber yapabilirim.</p>
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-clock-o fa-3x"></i>
								</div>
								<h3>Logo Tasarımı</h3>
								<p>Siteniz , Şirketiniz , Oyununuz , Sayfanız ve diğer şeyler için size logo tasarlayabilirim</p>
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-heart fa-3x"></i>
								</div>
								
								<h3>Windows Uygulama</h3>
								<p>Şirketinizin veya sizin ihtiyacınız olan uygulamaları sizlere yapabilirim.</p>							
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- end Service section -->
			
			<!-- portfolio section -->
			<section id="portfolio">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>Yaptığım Projeler</h2>
							<p>Gerçekleştirdiğim projeleri buradan takip edebilirsiniz.</p>
						</div>
						

						<ul class="project-wrapper wow animated fadeInUp">
							<li class="portfolio-item">
								<img src="img/portfolio/item.jpg" class="img-responsive" alt="Unity 3D TR Oyun programlama ve Yapımı" />
								<figcaption class="mask">
									<h3>Unity 3D TR</h3>
									<p>Herkesin oyun yapımı ile ilgili bilgi birikimlerini paylaşım yeni bilgiler öğrenebileceği bir site yaptım.</p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="Unity 3D TR" data-fancybox-group="works" href="img/portfolio/item.jpg"/>
                                    <i class="fa fa-search"></i></a></li>
									<li><a href="http://unity3dtr.com/"><i class="fa fa-link"></i></a></li>
								</ul>
							</li>
							
							<li class="portfolio-item">
								<img src="img/portfolio/item2.jpg" class="img-responsive" alt="Nazar Halı Yıkama"/>
								<figcaption class="mask">
									<h3>İzmir Nazar Halı Yıkama</h3>
									<p>İzmirde bulunan bir halı yıkamacı için açmış olduğum site</p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="Nazar Halı Yıkama" href="img/portfolio/item2.jpg" data-fancybox-group="works" /><i class="fa fa-search"></i></a></li>
									<li><a href=""><i class="fa fa-link"></i></a></li>
								</ul>
							</li>
							
							<li class="portfolio-item">
								<img src="img/portfolio/item3.jpg" class="img-responsive" alt="Glass Break Oyunu"/>
								<figcaption class="mask">
									<h3>Glass Break</h3>
									<p>Kendimi Denemek için yapıp , yayınladığım bir basit similasyon oyunu</p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="Glass Break" data-fancybox-group="works" href="img/portfolio/item3.jpg"/><i class="fa fa-search"></i></a></li>
									<li><a href="https://play.google.com/store/apps/details?id=com.Test.GlassBreak"><i class="fa fa-link"></i></a></li>
								</ul>
							</li>
							

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
								<h2>Hakkımda söylenenler</h2>
							</div>
							
							<div id="testimonial" class=" wow animated fadeInUp">
								<div class="testimonial-item text-center">
									<img src="img/yerlicevher.png" alt="Yerli Cevher Haber"/>
									<div class="clearfix">
										<span>Yerli Cevher</span>
										<p>Sizlere ilk olarak tanıtacağımız web sitesi ise <a style=" color:black;" href="http://unity3dtr.com/" rel="me"> Unity 3D</a> oyun motoru için Türkçe ders ve videolar sunan bir site. Onat Aktaş‘ın kurduğu bu yararlı siteye <a style=" color:black;" href="http://unity3dtr.com/" rel="me">Unity3dtr.com</a> adresinden ulaşabilir, sizler de ders ve video paylaşımında bulunabilirsiniz. Şunu unutmayalım, bilgi paylaştıkça çoğalır ve oyun sektörü için bu tarz girişimlere ülke olarak çok ihtiyacımız var.</p>
									</div>
								</div>
								
								
							</div>
						
						</div>
					</div>
				</div>
			</section>
			<!-- end Testimonial section -->
			
			<!-- Price section -->
			<section id="price">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>Hizmetler</h2>
							<p>Ücret karşılığı size Web hizmeti verebilirim.</p>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp">
							<div class="price-table text-center">
								<span>Alan Adı (Domain)</span>
								<div class="value">
									<span>TL</span>
									<span>25,00</span><br>
									<span>Yıllık</span>
								</div>
								<ul>
									<li>1 Yıllık Kullanım</li>
									<li>1 Yıllık Hizmet</li>
									<li>Yenileme Desteği</li>
									<li>Gizlilik Desteği</li>
									<li><a href="#contact">İletişime Geç</a></li>
								</ul>
							</div>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.4s">
							<div class="price-table featured text-center">
								<span>Hosting</span>
								<div class="value">
									<span>TL</span>
									<span>50,00</span><br>
									<span>Yıllık</span>
								</div>
								<ul>
									<li>15 GB Aylık Trafik</li>
									<li>1 GB Alan</li>
									<li>Linux Yada Windows</li>
									<li>1 Yıllık Hizmet</li>
									<li><a href="#contact">İletişime Geç</a></li>
								</ul>
							</div>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.8s">
							<div class="price-table text-center">
								<span>Web Site Kurulumu</span>
								<div class="value">
									<span>TL</span>
									<span>Belirsiz</span><br>
									<span>Yıllık</span>
								</div>
								<ul>
									<li>Alan Adı (Domain) ve Hosting Dahil 1 Yıl Hizmet</li>
									<li>Web sitesi Yönetimi Desteği</li>
									<li>SEO Hizmeti</li>
									<li>Sosyal Medya Desteği</li>
									<li><a href="#contact">İletişime Geç</a></li>
								</ul>
							</div>
						</div>
		
					</div>
				</div>
			</section>
			<!-- end Price section -->
			
			<!-- Social section -->
			<section id="social" class="parallax">
				<div class="overlay">
					<div class="container">
						<div class="row">
						
							<div class="sec-title text-center white wow animated fadeInDown">
								<h2>Beni Takip Et</h2>
								<p>Asağıdaki butonlardan beni sosyal medyada takip edebilirsin ve iletişim kurabilirsiniz.</p>
							</div>
							
							<ul class="social-button">
								<li class="wow animated zoomIn"><a href="https://www.facebook.com/onat.aktas.52"><i class="fa fa-thumbs-up fa-2x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="https://twitter.com/thetudors12"><i class="fa fa-twitter fa-2x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="https://www.youtube.com/user/Bourn329"><i class="fa fa-dribbble fa-2x"></i></a></li>							
							</ul>
							
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
							<h2>İletişim</h2>
							<p>Bana Mesaj atabilirsin.</p>
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
								<h3>İletişim Adreslerim</h3>						
								<p><i class="fa fa-pencil"></i>Manisa / Turgutlu<span>Posta Kodu : 45400</span> <span>Selvitepe Mah. Ankara Asfaltı Üzeri No:18</span><span>Türkiye</span></p><br>
								<p><i class="fa fa-phone"></i>Phone: Özel mesaj yoluyla isteyebilirsin :)</p>
								<p><i class="fa fa-envelope"></i>onat.akts@hotmail.com</p>
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