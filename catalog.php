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

                                <input type="text"
                                       name="filter[price_from]"
                                       value="<?= isset($_GET['filter']['price_from']) ? $_GET['filter']['price_from'] : ''; ?>">
                                <span>-</span>
                                <input type="text"
                                       name="filter[price_to]"
                                       value="<?= isset($_GET['filter']['price_to']) ? $_GET['filter']['price_to'] : ''; ?>">
                            </div>

                            <div id="slider-non-linear-step"></div>

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
                    <option value="price" <?= $_GET['sort'] === 'price' ? 'selected' : ''; ?>>Цена, от меньшего к большему</option>
                    <option value="-price" <?= $_GET['sort'] === '-price' ? 'selected' : ''; ?>>Цена, от большему к меньшего</option>
                    <option value="name" <?= $_GET['sort'] === 'name' ? 'selected' : ''; ?>>По алфавиту, от А до Я</option>
                    <option value="-name" <?= $_GET['sort'] === '-name' ? 'selected' : ''; ?>>По алфавиту, от Я до А</option>
                </select>

                <ul id="product-list"></ul>
            </div>

        </div>
    </div>
</section>
<!--SECTION CATALOG PAGE CONTENT END-->

<?php require __DIR__ . '/.footer.php'; ?>
