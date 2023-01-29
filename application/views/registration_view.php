<body class="base-template contacts-template login-template">
	<section class="main-section">
		<div class="container">
			<div class="main-inner">
				<div class="main">
					<h1>Пожалуйста, зарегистрируйтесь</h1>
					<div class="push40"></div>
					<form method="POST">
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
						<?php if ($data["reg_status"] == "Такой пользователь уже существует!") { ?>
							<p style="color:red">Такой пользователь уже существует!</p>
						<?php } ?>
						<?php if ($data["reg_status"] == "Заполните все поля!") { ?>
							<p style="color:red">Заполните все поля!</p>
						<?php } ?>
						<div class="wrapper-buttons">
							<div class="filter-wrap">
								<input type="submit" class="button" name="registration" value="Зарегистрироваться">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>