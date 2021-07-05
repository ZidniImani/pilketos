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
</head>
<body style="background:url('asset/img/bg.jpg')">
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
	<div class="panel panel-primary log">
      <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Login untuk pemilih</div>
        <div class="panel-body">
		      <form role="form" action="" method="post">
    		    <div class="form-group">
      			 <label for="nis">NIS:</label>
      			 <input type="nis" name="nis" class="form-control" id="nis" placeholder="NIS kalian">
    		    </div>
    			   <center><button type="Log in" class="btn btn-success logwidth"><span class="glyphicon glyphicon-arrow-right"></span> Login</button></center>
  		    </form>      	
      	</div>
      </div>
      <div style="clear:both;"></div>
        <div class="container conlog">
          &copy; 2015-2016. Programmed and Designed by <b>XII RPL</b>
        </div>
</body>
</script>
</script>
</html>