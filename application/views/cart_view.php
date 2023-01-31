<body class="base-template card-template">
	<section class="main-section">
		<div class="container">
			<div class="main-inner">
				<h1>Корзина</h1>
				<div class="push50"></div>
				<div class="main">
					<table>
						<thead>
							<tr>
								<th>Наименование</th>
								<th>Цена</th>
								<th>Количество</th>
								<th>Итого</th>
							</tr>
						</thead>
						<? if (isset($data)) { ?>
							<? foreach ($data as $row) { ?>
								<tbody>
									<tr>
										<td><?= $row['name'] ?></td>
										<td><? echo number_format($row['price'], 0, ',', ' ') . '₽' ?></td>
										<td><?= number_format($row['count'], 0, ',', ' ') . 'шт.' ?></td>
										<td><?= number_format($row['total_price'], 0, ',', ' ') . '₽' ?></td>
									</tr>
								</tbody>
							<? } ?>
						<? } else { ?>
							<tbody>
								<tr>
									<td><?= "Корзина пуста" ?></td>
									<td><?= "Корзина пуста" ?></td>
									<td><?= "Корзина пуста" ?></td>
									<td><?= "Корзина пуста" ?></td>
								</tr>
							</tbody>
						<? } ?>
					</table>
					<div class="button-wrapper">
						<? if (isset($_SESSION['name']) && isset($_SESSION['login']) && isset($_COOKIE['cart'])) { ?>
							<a class="button" href="/formal">ОФОРМИТЬ</a>
						<? } elseif (isset($_COOKIE['cart']) && !isset($_SESSION['user'])) { ?>
							<a class="button" href="/login">ОФОРМИТЬ</a>
						<? } else { ?>
							<a class="button" href="#" >ОФОРМИТЬ</a>
						<? } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>