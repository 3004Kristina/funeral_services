<?php require __DIR__ . '/.header.php'; ?>

<?php
$requestFilterSizes = isset($_GET['filter']['sizes']) ? (array) $_GET['filter']['sizes'] : [];
$filterSizes = [
    '100',
    '110',
    '120',
    '130',
    '140',
    '150',
    '160',
    '170',
];
?>

<!--SECTION CATALOG PAGE CONTENT START-->
<section class="catalog_page_content_wrapper">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/">Главная</a></li>
            <li><a href="#" class="active">Каталог товаров</a></li>
        </ul>
        <h2>ВЕНКИ</h2>
        <div class="catalog_page_content">
            <div class="content_item">
                <h4>Категории</h4>
                <ul class="categories">
                    <li><a href="#">Искусственные</a></li>
                    <li><a href="#" class="active">Из живых цветов</a></li>
                    <li><a href="#">Корзины искусственные</a></li>
                    <li><a href="#">Траурные композиции</a></li>
                    <li><a href="#"> Ленты на венок</a></li>
                </ul>

                <div class="form_wrapper">
                    <form action="" method="get" id="filter-form">
                        <div class="forma">

                            <h4>Стоимость</h4>
                            <div class="form_group_rage">
                                <label for="filter-price-from">
                                    <input type="hidden"  name="filter[price_from]" value="<?= isset($_GET['filter']['price_from']) ? $_GET['filter']['price_from'] : '0'; ?>">
                                    <input type="text"
                                           id="filter-price-from"
                                           value="<?= isset($_GET['filter']['price_from']) ? $_GET['filter']['price_from'] : ''; ?>">
                                </label>

                                <span>-</span>
                                <label for="filter-price-to">
                                    <input type="hidden"  name="filter[price_to]" value="<?= isset($_GET['filter']['price_to']) ? $_GET['filter']['price_to'] : '50000'; ?>">
                                    <input type="text"
                                           id="filter-price-to"
                                           value="<?= isset($_GET['filter']['price_to']) ? $_GET['filter']['price_to'] : ''; ?>">
                                </label>

                            </div>

                            <div id="price-range"></div>

                            <h4>Высота</h4>

                            <?php foreach ($filterSizes as $filterSize): ?>
                                <?php
                                $isChecked = \in_array($filterSize, $requestFilterSizes);
                                ?>
                                <div class="form_group_checkbox">
                                    <input type="checkbox"
                                           id="filter-size-<?= $filterSize; ?>-input"
                                           name="filter[sizes][]"
                                           value="<?= $filterSize; ?>"
                                        <?= $isChecked ? 'checked' : ''; ?>>
                                    <label for="filter-size-<?= $filterSize; ?>-input">
                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                        <?= $filterSize; ?>см
                                    </label>
                                </div>
                            <?php endforeach; ?>

                            <div class="btn_form_wrapper">
                                <button class="btn" type="submit">Показать</button>
                                <button class="btn grey" type="reset">Сбросить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="content_item">
                <select name="sort" form="filter-form">
                    <option value="">Сортировать по ...</option>
                    <option value="price" <?= (isset($_GET['sort']) ? $_GET['sort'] : null) === 'price' ? 'selected' : ''; ?>>Цена, от меньшего к большему</option>
                    <option value="-price" <?= (isset($_GET['sort']) ? $_GET['sort'] : null) === '-price' ? 'selected' : ''; ?>>Цена, от большему к меньшего</option>
                    <option value="name" <?= (isset($_GET['sort']) ? $_GET['sort'] : null) === 'name' ? 'selected' : ''; ?>>По алфавиту, от А до Я</option>
                    <option value="-name" <?= (isset($_GET['sort']) ? $_GET['sort'] : null) === '-name' ? 'selected' : ''; ?>>По алфавиту, от Я до А</option>
                </select>

                <ul id="catalog-products">
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/product.php" class="image-wrapper">
                            <img src="/img/product.png" alt="catalog">
                        </a>
                        <h2>Венок 1,2 метра</h2>
                        <div class="descr">Lorem ipsum dolor sit amet.</div>
                        <div class="price">
                            3500 <i class="fa fa-rub" aria-hidden="true"></i>
                        </div>
                        <div class="invisibly">
                            <div class="size_wrapper">
                                <h6>Высота, см.</h6>
                                <div class="size">
                                    <div class="size_item">100</div>
                                    <div class="size_item">120</div>
                                    <div class="size_item">140</div>
                                    <div class="size_item">160</div>
                                </div>
                            </div>
                            <div class="qty_wrapper">
                                <div class="qty">
                                    <input type="number" value="1" step="1" min="1">
                                    <button class="up"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    <button class="down"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>

                                <div class="btn_wrapper">
                                    <button class="btn">В корзину</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul id="catalog-paginator"></ul>
            </div>

        </div>
    </div>
</section>
<!--SECTION CATALOG PAGE CONTENT END-->

<?php require __DIR__ . '/.footer.php'; ?>
