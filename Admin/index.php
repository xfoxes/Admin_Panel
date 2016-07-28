
<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="">
<title>SB Admin 2</title>
</head>
<body>
<?php
if(@$_SESSION["LoginAdmin"] != null )
{

 echo "
 <script language='javascript'>
    window.location.href ='pages/index.php'
</script>
 ";

}
else{
		
		echo "<script language='javascript'>
    window.location.href ='pages/login.php'
</script>";
	}
?>
</body>
</html>
