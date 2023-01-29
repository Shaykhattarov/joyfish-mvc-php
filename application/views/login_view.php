<body class="base-template contacts-template login-template">
	<section class="main-section">
		<div class="container">
			<div class="main-inner">
				<div class="main">
					<h1>Пожалуйста, авторизируйтесь</h1>
					<div class="push40"></div>
					<form action="" method="POST">
						<div class="form-group">
							<label for="name">Введите имя</label>
							<input name="name" type="text" id="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="name">Введите email</label>
							<input name="email" type="text" id="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="name">Введите пароль</label>
							<input name="password" type="password" id="name" class="form-control">
						</div>
						<div class="sizes-buttons">
							<div class="form_radio_group">
								<div class="form_radio_group-item">
									<input id="user" type="radio" name="typeuser" value="user" checked>
									<label for="user">Я пользователь</label>
								</div>
								<div class="form_radio_group-item">
									<input id="admin" type="radio" name="typeuser" value="admin">
									<label for="admin">Я администратор</label>
								</div>
							</div>
						</div>
						<? if($data["login_status"] == "Введены неверные данные!") { ?>
						<div class="push15"></div>
						<p style="color:red">Логин и/или пароль введены неверно.</p>
						<? } ?>
						<? if ($data["login_status"] == "Заполните все поля!") { ?>
						<div class="push15"></div>
						<p style="color:red">Заполните все поля.</p>
						<?	} ?>
						<div class="wrapper-buttons">
							<div class="filter-wrap">
								<input type="submit" class="button" name="login" value="Войти">
							</div>
							<div class="filter-wrap">
								<a href="/registration" class="button">Зарегистрироваться</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
</body>
