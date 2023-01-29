<body class="base-template contacts-template">
<section class="main-section">
			<div class="container">
				<div class="main-inner">
					<div class="push50"></div>
					<div class="main-columns">
						<div class="edit-column">
							<h1>Редактируемая часть сайта</h1>
							<div class="push50"></div>
							<form>
								<div class="form-group select-form-group">
									<select class="select-css form-control" name="categories"> 
										<option value="" disabled selected hidden>Категории</option>
										<option value="Категория 1">Категория 1</option> 
										<option value="Категория 2">Категория 2</option> 
										<option value="Категория 3">Категория 3</option> 
									</select>
								</div>
								<div class="form-group">
									<input name="name" type="text" class="form-control" placeholder="Название">
								</div>
								<div class="form-group">
									<textarea class="form-control" name="decription" placeholder="Описание"></textarea>
								</div>
								<div class="form-group">
									<input name="price" type="text" class="form-control" placeholder="Цена">
								</div>
								<div class="filter-wrap">
									<input type="submit" class="button" name="edit" value="Редактировать">
									<input type="submit" class="button" name="delete" value="Удалить">
									<input type="submit" class="button" name="add" value="Добавить">
								</div>
							</form>
						</div>
						
						<div class="track-column">
							<h2>Отслеживание заказа</h2>
							<div class="push50"></div>
							<table>
								<thead>
									<tr><th>Имя пользователя</th><th>Наименование<br> торговой единицы</th><th>Количество единиц</th><th>Статус оплаты</th><th>Статус заказа</th></tr>
								</thead>
								<tbody>
									<tr><td>Евгений</td><td>Комбинезон<br> Плавающий Akara Nautilus</td><td>1шт.</td><td>Не оплачен</td><td>Не отправлен</td></tr>
								</tbody>
							</table>
							<div class="push50"></div>
							<h2>Нашли дешевле? Снизим цену</h2>
							<div class="push50"></div>
							<table class="table-service">
								<thead>
									<tr><th>Имя</th><th>Почта</th><th>Ссылка</th>
								</thead>
								<tbody>
									<tr><td>Ирина</td><td>mail@gmail.ru</td><td><a href="https://link_exampl.ru">https://link_exampl.ru</a></td>
								</tbody>
							</table>
							<div class="push50"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
</body>