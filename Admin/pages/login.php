<?php 
include "../../blog/connect_mysql.php";
session_start();

if(isset($_POST["Login"]))
{
	$Adminmail= $_POST["email"];
	$Adminpass= $_POST["password"];
	@$remember = $_POST["remember"];
	
	
	
	$sqlk = "select * from blogadmin where Username='".$Adminmail."' and Password='".$Adminpass."'	";
										$queryk = mysqli_query($db,$sqlk);
										 while( $rowk = mysqli_fetch_array( $queryk,MYSQLI_ASSOC ) ) {
											  
											$Admin_id = $rowk["id"];
                                            $_SESSION["adminid"] = $Admin_id;
											
											
										 }
										 if(@$Admin_id != null)
										 {
											$_SESSION["LoginAdmin"] = "ON";
											if(isset($_POST["remember"]))
	{
		setcookie("Admin",$Adminmail, time() + (60*60*720));
		setcookie("Pass",$Adminpass, time() + (60*60*720));
		setcookie("Check","checked",time() + (60*60*720));
	}
	else
	{
		setcookie("Admin",$Adminmail, time() - (60*60*720));
		setcookie("Pass",$Adminpass, time() - (60*60*720));
		setcookie("Check","checked",time() - (60*60*720));
	}
											echo"<script> window.location='index.php'; </script>";
										 }
										 else
											 {
												 $GirisHatasi ="<div style='color:red; font-weight:bold;'>*Kullanıcı adı veya şifre yanlış</div>";
												 
											 }
											 
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
					<?php echo @$GirisHatasi ?>
                        <form action="#" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required="required" placeholder="Username" name="email" value="<?php echo @$_COOKIE['Admin']; ?>" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="required" placeholder="Password" value="<?php echo @$_COOKIE['Pass']; ?>" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="on" <?php echo @$_COOKIE['Check']; ?>>Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="btn btn-lg btn-success btn-block" name="Login" type="submit" value="Login" >
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
