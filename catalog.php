<?php require __DIR__ . '/.header.php'; ?>

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
                    <form action="#" method="post">
                        <div class="forma">
                            <h4>Стоимость</h4>
                            <input type="range">
                            <h4>Высота</h4>
                            <div class="form_group">
                                <input type="checkbox" id="filter-size-100-input">
                                <label for="filter-size-100-input">
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    100см
                                </label>
                            </div>
                            <div class="form_group">
                                <input type="checkbox" id="filter-size-120-input">
                                <label for="filter-size-120-input">
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    120см
                                </label>
                            </div>
                            <div class="form_group">
                                <input type="checkbox" id="filter-size-130-input">
                                <label for="filter-size-130-input">
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    130см
                                </label>
                            </div>
                            <div class="form_group">
                                <input type="checkbox" id="filter-size-140-input">
                                <label for="filter-size-140-input">
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    140см
                                </label>
                            </div>
                            <div class="form_group">
                                <input type="checkbox" id="filter-size-150-input">
                                <label for="filter-size-150-input">
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    150см
                                </label>
                            </div>
                            <div class="form_group">
                                <input type="checkbox" id="filter-size-160-input">
                                <label for="filter-size-160-input">
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    160см
                                </label>
                            </div>
                            <div class="form_group">
                                <input type="checkbox" id="filter-size-180-input">
                                <label for="filter-size-180-input">
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    180см
                                </label>
                            </div>
                            <div class="btn_form_wrapper">
                                <button class="btn" type="submit">Показать</button>
                                <button class="btn grey" type="reset">Сбросить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="content_item">
                <select name="sort">
                    <option value="">Сортировать по ...</option>
                    <option value="price">Цена, от меньшего к большему</option>
                    <option value="-price">Цена, от большему к меньшего</option>
                    <option value="name">По алфавиту, от А до Я</option>
                    <option value="-name">По алфавиту, от Я до А</option>
                </select>

                <ul id="product-list"></ul>
            </div>

        </div>
    </div>
</section>
<!--SECTION CATALOG PAGE CONTENT END-->

<?php require __DIR__ . '/.footer.php'; ?>
