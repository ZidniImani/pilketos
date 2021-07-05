<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
    session_start();
    include "controller/koneksi.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Online Based</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
</head>
<body style="background:url(asset/img/bg6.png); background-size:cover;">
<!-- HEADER !-->
	<nav class="navbar">
    	<div class="container-fluid">
        	<div class="navbar-header" style="margin-top:-15px;">
            	<a class="navbar-brand" href="#"><img height="55px" width="170px" src="asset/img/logo.png" /></a>
            </div>
            <div>
            	<ul class="nav navbar-nav navbar-right">
                	<li><a href="#" data-toggle="modal" data-target="#Daftar"><span class="glyphicon glyphicon-user"></span> Daftar Admin?</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
       	</div>
    </nav>
<!-- Content !-->
<?php
    include "controller/loginadmin.php";
?>
<div class="container container-beranda">
  <h1 style="font-size:40px;">Pemilihan Ketua Osis</h1>
  <p>Web Based Aplication</p>
  <blockquote style="background:#fff; opacity:0.8; border-bottom:5px solid #aaa;">
    <p style="font-size:25px;; ">Silakan para pemilih login melalui tombol dibawah, siapkan NIS kalian masing-masing untuk login serta pastikan kalian sudah melapor pada <b>ADMIN</b></p>
    <footer><a href="login"class="btn btn-success" data-toggle="tooltip" title="Klik !">Login Pemilih</a></footer>
  </blockquote>
</div>
<!-- Login !-->
    <div class="modal fade" id="Login" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-color">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login Admin Disini</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="user">Username:</label>
                        <input name="user" type="text" class="form-control" id="user" placeholder="Enter username" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input name="pass" type="password" class="form-control" id="pwd" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-info">Masuk</button>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- Daftar -->
    <div class="modal fade" id="Daftar" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header modal-color">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Daftar Admin</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                    <div class="form-group">
                        <label data-toggle="tooltip" title="Minta izin admin dulu!" for="email">Kode: <span data-toggle="tooltip" title="Minta izin admin dulu!" class="glyphicon glyphicon-lock"></span></label>
                        <input data-toggle="tooltip" title="Minta izin admin dulu!" type="kode" class="form-control" id="kode" placeholder="Masukan Kode">
                    </div>
                    <div class="form-group">
                        <label for="email">Name:</label>
                        <input type="nama" class="form-control" id="nama" placeholder="Masukan Nama" autofocus>
                    </div>x
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="email@email.com">
                    </div>
                    <div class="form-group">
                        <label for="email">Username:</label>
                        <input type="username" class="form-control" id="username" placeholder="Masukan username">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Masukan password">
                    </div>
                    <button type="submit" class="btn btn-info">Daftar</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</script>
</script>
</html>