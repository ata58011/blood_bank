<?php
	include('../connection.php');
	session_start();

	if(!isset($_SESSION['membername']) AND $_SESSION['userid'] == ''){
		header('location:login.php');
	}
?>

<!doctype html>
<html lang="tr">

<head>
	<title>Admin Panelinize Hoş Geldiniz</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Panoyu ara...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Git</button></span>
					</div>
				</form>
			
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
						<?php
						$image = $connection->query("SELECT * FROM member WHERE username='".$_SESSION['membername']."'");
						$row = $image->fetch_array(); ?>
						
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../<?php echo $row['profile'];?>" class="img-circle" alt="Avatar"> <?php ?> <span><?php echo $_SESSION['membername'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="" data-toggle="modal" data-target="#profile"><i class="lnr lnr-user"></i> <span>Profilim</span></a></li>
								
								<li><a href="" data-toggle="modal" data-target="#logout"><i class="lnr lnr-exit"></i> <span>Çıkış Yap</span></a></li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- NAVBAR SONU -->
		<!-- SOL MENÜ -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="user_dashboard.php" class="active"><i class="lnr lnr-home"></i> <span>Pano</span></a></li>
						<li><a href="request.php" class=""><i class="lnr lnr-code"></i> <span>Talepler</span></a></li>
						<li><a href="donor.php" class=""><i class="lnr lnr-chart-bars"></i> <span>Bağış Yap</span></a></li>
						
						
						
					</ul>
				</nav>
			</div>
		</div>

		<!-- Çıkış Modalı -->
		 <div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Emin misiniz ?</h4>
        </div>
        <div class="modal-body">
          <p>Şimdi çıkış yapmak istiyor musunuz?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
         <a href="../logout.php"> <button type="button" class="btn btn-danger">Çıkış Yap</button></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Profil Düzenle Modalı -->
   <div class="modal fade" id="profile" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal içeriği-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profilimi Düzenle</h4>
        </div>
        <div class="modal-body">
          <p>Modal içeriğinde bir metin.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
      
    </div>
  </div>
