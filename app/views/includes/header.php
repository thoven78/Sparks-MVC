<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/style.css" />
		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
	</head>
<body>
	<div id="wrapper">
	<div class="header">
		<ul>
			<?php if (!Session::get('username')): ?>
			<li><a href="/">Home</a></li>
			<li><a href="/about">About</a></li>
			<li><a href="/contact">Contact</a></li>
			<?php endif; ?>
			<?php if (Session::get('username')): ?>
			<li><a href="/dashboard">Dashboard</a></li>
			<?php if (Session::get('role') == 'owner'): ?>
			<li><a href="/user">Users</a></li>
			<?php endif; ?>
			<li><a href="/dashboard/logOut">Log out</a></li>
			<?php else: ?>
			<li><a href="/login">login</a></li>
			<?php endif; ?>
		</ul>
	</div>

	