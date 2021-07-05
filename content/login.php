<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Online Based</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <style>
		.masuk{
			width:60%;
			margin:1px auto;
			background:#FFF;
			border-top:2px solid #060;
			padding:25px;
			padding-top:10px;
		}
		.logog{
			background:#fff;
			border:1px solid #aaa;
		}
		.logog:focus{
			background:#fff;	
		}
	</style>
</head>
<body style="background:#efefef">
<!-- HEADER !-->
	<nav class="navbar">
    	<div class="container-fluid">
        	<div class="navbar-header" style="margin-top:-15px;">
            	<a class="navbar-brand" href="#"><img height="55px" width="170px" src="asset/img/logo.png" /></a>
            </div>
            <div>
            	<ul class="nav navbar-nav navbar-right">
                	<li><a href="home"><span class="glyphicon glyphicon-home"></span> Back to Homepage</a></li>
                </ul>
            </div>
       	</div>
    </nav>
<?php
	include "controller/login.php";
?>
<!-- Content -->
	<div class="container" style="border:0px solid #ccc; width:50%; margin-top:5%">
    	<center>
        	<img src="asset/img/login.png" height="80px" width="400px;" />
        	<!--<h1 style="color:#090; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif">Login Pemilih</h1>!-->
        </center>
    	<div class="masuk">
        	<form role="form" action="" method="post">
            	<p style="font-family:arial; font-weight:700"><span class="glyphicon glyphicon-user"></span> NIS/NIP :</p>
            	<input name="nis" style="margin-top:0px;" type="text" class="form-control logog" placeholder="NIS / NIP" /><br />
            	<input type="submit" class="form-control btn btn-success" />
            </form>
        </div>
    </div>
      <div style="clear:both;"></div>
        <div class="container conlog">
          &copy; 2015-2016. Supported by :<br />
          <img src="asset/img/XII RPL.png" width="140px" height="100px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <img src="asset/img/XII RPL.png" width="140px" height="100px" />
        </div>
</body>
</script>
</script>
</html>