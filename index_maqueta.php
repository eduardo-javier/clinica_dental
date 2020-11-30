<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Tienda de Camisetas</title>
		<link rel="stylesheet" href="assets/css/styles.css" />
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="logo">
					<img src="assets/img/camiseta.png" alt="Camiseta Logo" />
					<a href="index.php">
						DentalCare
					</a>
				</div>
			</header>

			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li>
						<a href="#">Inicio</a>
					</li>
					<li>
						<a href="#">Categoria 1</a>
					</li>
				</ul>
			</nav>

			<div id="content">

				<!-- BARRA LATERAL -->
				<aside id="lateral">

					<div id="login" class="block_aside">
						<h3>Entrar a la web</h3>
						<form action="#" method="post">
							<label for="email">Email</label>
							<input type="email" name="email" />
							<label for="password">Contraseña</label>
							<input type="password" name="password" />
							<input type="submit" value="Enviar" />
						</form>
						
						<ul>
							<li><a href="#">Mis pedidos</a></li>
							<li><a href="#">Gestionar pedidos</a></li>
							<li><a href="#">Gestionar categorias</a></li>
						</ul>
					</div>

				</aside>

				<!-- CONTENIDO CENTRAL -->
				<div id="central">
					<h1>Productos destacados</h1>
					
					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Camiseta Azul Ancha</h2>
						<p>30 euros</p>
						<a href="" class="button">Comprar</a>
					</div>

					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Camiseta Azul Ancha</h2>
						<p>30 euros</p>
						<a href="" class="button">Comprar</a>
					</div>

					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Camiseta Azul Ancha</h2>
						<p>30 euros</p>
						<a href="" class="button">Comprar</a>
					</div>

				</div>
			</div>

			<!-- PIE DE PÁGINA -->
			<footer id="footer">
				<p>Desarrollado por Eduardo &copy; <?= date('Y') ?></p>
			</footer>
		</div>
	</body>
</html>