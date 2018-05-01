<!DOCTYPE html>
<html>
<head>
	<title>Pemesanan Tiket Kereta Api</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/bootstrap.min.css">
	
	<style type="text/css">
		body{
	        /* background-image : url("<?php echo base_url() ?>asset/back3.jpg"); */
	        background-repeat: no-repeat;
	        background-size : cover;
	        background-position:center;
	      }
	    li{
	    	font-size: 13pt;
	    }
	    nav{
	        background-repeat: no-repeat;
	        background-size : 100%;
	        align-content: center;
	    }
	    label{
	    	color: black;
	    	font-size: 13pt;
	    }
	</style>

</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">

		  <a class="navbar-brand" href="">PT. KERETA API KITA</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="form-inline my-2 my-lg-0" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url() .'utama/berandaAdmin'; ?>">Jadwal</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url() .'utama/pemesanan'; ?>">Pemesanan Tiket</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url() .'utama/admin'; ?>">Logout</a>
		      </li>
		    </ul>
		  </div>

		</div>
	</nav>