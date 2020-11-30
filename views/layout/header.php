<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Dentalcare</title>
		<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="logo">
					<img src="<?=base_url?>assets/img/logo.jpg" alt="logo" />
					<a href="index.php">
						Dentalcare
					</a>
				</div>
			</header>

			<!-- MENU -->
			<?php $categorias=Utils::showCategorias();?>
			<nav id="menu">
				<ul>
					<li>
						<a href="<?=base_url?>">Inicio</a>
					</li>
					<?php while($cat=$categorias->fetch_object()):?>
						<li>
						<a href="<?=base_url?>categoria/ver&idCategoria=<?=$cat->idCategoria?>"><?=$cat->Descripcion?></a>
					</li>
					<?php endwhile; ?>

				</ul>
			</nav>

			<div id="content">