<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<title>OSFM - Open Source Fotball Manager!</title>
</head>

<body>

	<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
		<a class="navbar-brand" href="<?= site_url();?>">OSFM!</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
			<?= view('common/stickymenu',['user'=>$user,'team'=>$team]);?>
		</div>
	</nav>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 p-0">
		<?php if($user === NULL) {
			echo view('user/sidelogin' , ['errors' => $loginErrors ?? []]);
		}else{
			echo view('common/sidemenu',['user'=>$user,'team'=>$team]);
		}
		
		?>
		</div>
		<div class="col-md-10">