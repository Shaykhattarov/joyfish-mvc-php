<body class="base-template catalog-template">
	<div class="main-wrapper">
		<section class="main-section">
			<div class="container">
				<div class="main-inner">
					<h1>Костюмы-поплавки для рыбалки</h1>
					<div class="push70"></div>
					<div class="main-columns">
						<div class="filter-column">
							<div class="price-wrapper item">
								<div class="filter-title">
									Цена
								</div>
								<div class="filter-wrap">
									<div class="form-group">
										<label for="pricefrom">От</label>
										<input name="pricefrom" id="pricefrom" value="" type="text" class="form-control">
									</div>
									<div class="form-group">
										<label for="priceto">До</label>
										<input name="priceto" id="priceto" value="" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="brand-wrapper item">
								<div class="filter-title">
									Бренд
								</div>
								<div class="filter-wrap" id="checkbox-filter">
									<? foreach ($data["brand"] as $row) { ?>
										<div class="form-group" >
											<input type="checkbox" class="custom-checkbox" id=<?= $row["value_text"] ?> data-filter=<?= $row["value_text"] ?> value=<?= $row["value_text"] ?>>
											<label for=<?= $row["value_text"] ?>><?= $row["value_text"] ?></label>
										</div>
									<? } ?>
								</div>
							</div>
							<div class="sort-wrapper item">
								<div class="filter-title">
									Сортировать по:
								</div>
								<div class="filter-wrap">
									<a href="/catalog?sort=name" class="button">Названию</a>
									<a href="/catalog?sort=price" class="button">Цене</a>
									<a href="/catalog?sort=sale" class="button">Хиты продаж</a>
								</div>
							</div>
						</div>
						<div class="catalog-column">
							<? foreach ($data["catalog"] as $row) { ?>
								<div class="item" data-category=<?= $row["brand"]?> style="display: none;">
									<a href="/product" class="absolute"></a>
									<div class="variants">
										5 вариантов
									</div>
									<div class="item-img">
										<img src="images/pr1.png" alt="product">
									</div>
									<div class="item-content">
										<div class="item-exist">
											<? if ($row["in_stock"] == 1) { ?>
												<?="в наличии"?>
											<? } else { ?>
												<?="нет в наличии"?>
											<? } ?>
										</div>
										<div class="item-price">
											<?= $row["price"] . "₽" ?>
										</div>
										<div class="item-title">
											<?= $row["name"] ?>
										</div>
									</div>
								</div>
							<? } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="push55"></div>
	</div>
</body>