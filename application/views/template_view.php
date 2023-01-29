<!DOCTYPE html>
<html>

<head>
	<title>Рыбалка и спорт</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="icon" type="image/png" href="favicon.png" />
	<link href="/css/style.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,600;1,500&display=swap" rel="stylesheet">
</head>
<header>
	<div class="header-wrapper">
		<div class="container">
			<div class="header">
				<div class="logo-wrap">
					<a href="/" class="logo-img-wrap">
						<img src="images/logo.svg" alt="">
					</a>
					<div class="name-company">
						<span>Рыбалка и спорт</span>
						<? if (isset($_SESSION["name"])) {
							echo "<br>Добро пожаловать, <span><a href='#'>пользователь " . $_SESSION["name"] . "!" . "</a></span>";
						}
						?>
					</div>
				</div>
				<nav class="top-menu">
					<ul>
						<li>
							<a href="/catalog">Каталог</a>
						</li>
						<li>
							<a href="#">Избранное</a>
						</li>
						<li>
							<a href="/contacts">Контакты</a>
						</li>
						<li>
							<a href="#">Помощь</a>
						</li>
					</ul>
					<div class="header-buttons">
						<? if (isset($_SESSION["name"])) {
							echo "<a href='/logout' class='header-feed button'>" . "Выйти";
						} else {
							echo "<a href='/login' class='header-feed button'>" . "Вход";
						}
						?>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_3_18)">
								<path d="M14 2.00665H1.99996C1.26329 2.00665 0.666626 2.60332 0.666626 3.33999V5.99999H1.99996V3.32665H14V12.68H1.99996V9.99999H0.666626V12.6733C0.666626 13.41 1.26329 13.9933 1.99996 13.9933H14C14.7366 13.9933 15.3333 13.4067 15.3333 12.6733V3.33999C15.3333 2.60332 14.7366 2.00665 14 2.00665ZM7.33329 10.6667L9.99996 7.99999L7.33329 5.33332V7.33332H0.666626V8.66665H7.33329V10.6667Z" fill="white" />
							</g>
							<defs>
								<clipPath id="clip0_3_18">
									<rect width="16" height="16" fill="white" />
								</clipPath>
							</defs>
						</svg>
						</a>
						<a href="/card" class="header-feed button">
							Корзина
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_4_27)">
									<path d="M4.66663 12C3.92996 12 3.33996 12.5967 3.33996 13.3333C3.33996 14.07 3.92996 14.6667 4.66663 14.6667C5.40329 14.6667 5.99996 14.07 5.99996 13.3333C5.99996 12.5967 5.40329 12 4.66663 12ZM0.666626 1.33333V2.66666H1.99996L4.39663 7.72333L3.49663 9.35666C3.39329 9.54999 3.33329 9.76666 3.33329 9.99999C3.33329 10.7367 3.92996 11.3333 4.66663 11.3333H12.6666V9.99999H4.94996C4.85663 9.99999 4.78329 9.92666 4.78329 9.83333C4.78329 9.80333 4.78996 9.77666 4.80329 9.75333L5.39996 8.66666H10.3666C10.8666 8.66666 11.3033 8.38999 11.5333 7.97999L13.9166 3.65333C13.97 3.55999 14 3.44999 14 3.33333C14 2.96333 13.7 2.66666 13.3333 2.66666H3.47663L2.84329 1.33333H0.666626ZM11.3333 12C10.5966 12 10.0066 12.5967 10.0066 13.3333C10.0066 14.07 10.5966 14.6667 11.3333 14.6667C12.07 14.6667 12.6666 14.07 12.6666 13.3333C12.6666 12.5967 12.07 12 11.3333 12Z" fill="white" />
								</g>
								<defs>
									<clipPath id="clip0_4_27">
										<rect width="16" height="16" fill="white" />
									</clipPath>
								</defs>
							</svg>
						</a>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<div class="push50"></div>
<?php include 'application/views/' . $content_view; ?>

<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.fancybox3.min.js"></script>
<script src="js/scripts.js"></script>

</html>