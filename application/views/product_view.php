<body class="base-template">
    <section class="main-section">
        <div class="container">
            <div class="main-inner">
                <h1><?= $data["product"]["name"] ?></h1>
                <div class="push70"></div>
                <form class="main-columns" method="POST">
                    <div class="gallery-wrapper">
                        <div class="page-slider-wrapper relative">
                            <div class="page-slider">
                                <? foreach ($data["product"]["attribute"]["images"]["value"] as $key => $image) { ?>
                                    <div class="item">
                                        <a class="fancybox" href=<?= "images/" . $image ?> data-fancybox="portfolio">
                                            <img src=<?= "images/" . $image ?> alt=<?= "изображение $key" ?>>
                                        </a>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                        <div class="page-thumbs-slider-wrapper">
                            <div class="push4"></div>
                            <div class="page-thumbs-slider">
                                <? foreach ($data["product"]["attribute"]["images"]["value"] as $key => $image) { ?>
                                    <div class="item">
                                        <? $key++ ?>
                                        <img src=<?= "images/" . $image ?> alt=<?= "изображение $key" ?>>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                        <div class="sizes-wrapper">
                            <? if(!isset($data["product"]["attribute"]["sizes"]["value"]) || count($data["product"]["attribute"]["sizes"]["value"]) != 0) {?>
                            <div class="sizes-title">
                                Размеры
                            </div>
                            <div class="sizes-buttons">
                                <div class="form_radio_group">
                                    <? if (in_array("Medium", $data["product"]["attribute"]["sizes"]["value"])) { ?>
                                        <div class="form_radio_group-item">
                                            <input id="medium" type="radio" name="size" value="medium" checked>
                                            <label for="medium">Medium</label>
                                        </div>
                                    <? } ?>
                                    <? if (in_array("Large", $data["product"]["attribute"]["sizes"]["value"])) { ?>
                                        <div class="form_radio_group-item">
                                            <input id="large" type="radio" name="size" value="large">
                                            <label for="large">Large</label>
                                        </div>
                                    <? } ?>
                                    <? if (in_array("X-Large", $data["product"]["attribute"]["sizes"]["value"])) { ?>
                                        <div class="form_radio_group-item">
                                            <input id="xlarge" type="radio" name="size" value="xlarge">
                                            <label for="xlarge">X-Large</label>
                                        </div>
                                    <? } ?>
                                    <? if (in_array("XX-Large", $data["product"]["attribute"]["sizes"]["value"])) { ?>
                                        <div class="form_radio_group-item">
                                            <input id="xxlarge" type="radio" name="size" value="xxlarge">
                                            <label for="xxlarge">XX-Large</label>
                                        </div>
                                    <? } ?>
                                    <? if (in_array("XXX-Large", $data["product"]["attribute"]["sizes"]["value"])) { ?>
                                        <div class="form_radio_group-item">
                                            <input id="xxxlarge" type="radio" name="size" value="xxxlarge">
                                            <label for="xxxlarge">XXX-Large</label>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                            <? } ?>
                        </div>
                    </div>
                    <div class="chars-wrapper">
                        <ul>
                            <li>Код товара:<?= ' ' . $data["product"]["articul"] ?></li>
                            <li>Бренд:<?= ' ' . $data["product"]["attribute"]["brand"]["value"] ?></li>
                            <li>Пол: <?= ' ' . $data["product"]["attribute"]["gender"]["value"] ?></li>
                            <li>Тип: <?= ' ' . $data["product"]["attribute"]["type"]["value"] ?></li>
                            <li>Сезон: <?= ' ' . $data["product"]["attribute"]["season"]["value"] ?></li>
                            <li>Материал ткани: <?= ' ' . $data["product"]["attribute"]["material"]["value"] ?></li>
                            <li>Температурный режим: <?= ' ' . $data["product"]["attribute"]["temperature"]["value"] ?></li>
                            <li>Водонепроницаемость, мм: <?= ' ' . $data["product"]["attribute"]["waterproof"]["value"] ?></li>
                            <li>Цвет: <?= ' ' . $data["product"]["attribute"]["color"]["value"] ?></li>
                            <li>Страна производства: <?= ' ' . $data["product"]["attribute"]["country"]["value"] ?></li>
                        </ul>
                    </div>
                    <div class="price-wrapper">
                        <div class="text">
                            <? if ($data["product"]["in_stock"] == '1') { ?>
                                <?= "В наличии" ?>
                            <? } else { ?>
                                <?= "Нет в наличии" ?>
                            <? } ?>
                        </div>
                        <div class="price">
                            <?= $data["product"]["price"] . '₽' ?>
                        </div>
                        <div class="add-product">
                            <div class="element-counter">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn-minus" onclick="dec_product()" data-type="minus"></button>
                                    </span>
                                    <input type="text" name="count" id="count-product" class="form-control input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn-plus" id="btn-plus" onclick="add_product()" data-type="plus"></button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="button" name="add" value="cart/add">Добавить в корзину</button>
                        </div>
                        <div class="link-wrap">
                            <a href="#feedback" class="fancyboxModal">Нашли дешевле? Снизим цену!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="push55"></div>
    </div>
    <div class="fancybox_modal" id="feedback">
        <div class="title-h3 text-center" id="feedback_title">Нашли дешевле? Снизим цену!</div>
        <div class="push20"></div>
        <div class="subtitle">Укажите имя, почту и ссылку на такой же товар с низкой ценой, мы с вами свяжемся</div>
        <div class="push40"></div>
        <div class="rf">
            <form method="post" class="ajax_form">
                <div class="form-group">
                    <input name="fio" value="" type="text" class="form-control required" required placeholder="Ваше имя *">
                </div>
                <div class="form-group">
                    <input name="mail" value="" type="email" class="form-control required" required placeholder="Ваша  почта *">
                </div>
                <div class="form-group">
                    <input name="link" value="" type="text" class="form-control required" required placeholder="Ссылка на товар *">
                </div>
                <div class="subtitle">*-поля обязательные для заполнения</div>
                <div class="push20"></div>
                <div class="text-center">
                    <input name="feedbackbtn" type="submit" class="button" value="Отправить">
                </div>
            </form>
        </div>

</body>